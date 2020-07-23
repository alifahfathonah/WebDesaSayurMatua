
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata("username")) {
            redirect('User');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == False) {
            $this->load->view("layout/auth_header");
            $this->load->view("auth/View_Login");
            $this->load->view("layout/auth_footer");
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $admin = $this->db->get_where('tb_admin', ['admin_user' => $username])->row_array();

        if ($admin) {
            //ada
            //jika user aktif
            if ($admin['admin_active'] == 1) {
                //cek password
                if (password_verify($pass, $admin['admin_password'])) {
                    $data = [
                        'username' => $admin['admin_user'],
                        'nama_admin' => $admin['admin_nama'],
                        'role_id' => $admin['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // if ($admin['role_id'] == 1) {
                    //     redirect("Admin");
                    // } else if ($admin['role_id'] == 2) {
                    //     redirect("Kepdes");
                    // } else {
                    //     redirect("User");
                    // }
                    redirect("User");
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Password anda salah
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>');
                    redirect('/Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-rounded mb-3"> Akun belum diaktivasi
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>');
                redirect('/Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Akun tidak ditemukan
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>');
            redirect('/Auth');
        }
    }

    public function register()
    {

        // $data['']
        $email = $this->input->post('Email', true);
        if ($this->session->userdata("username")) {
            redirect('User');
        }
        $this->form_validation->set_rules('Nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('Username', 'Username', 'required|trim|is_unique[tb_admin.admin_user]', [
            'is_unique' => 'Username ini telah terdaftar'
        ]);
        $this->form_validation->set_rules('Email', 'Email', 'required|trim|is_unique[tb_admin.admin_email]', [
            'is_unique' => 'Email ini telah terdaftar'
        ]);
        $this->form_validation->set_rules(
            'Password',
            'Password',
            'required|trim|min_length[3]|matches[Password2]',
            [
                'matches' => 'Password tidak sama',
                'min_length' => 'Password harus 3 Karakter'
            ]
        );
        $this->form_validation->set_rules('Password2', 'Password', 'required|trim|matches[Password]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Form Registerasi";
            $this->load->view("layout/header", $data);
            $this->load->view("auth/View_Registrasi");
            $this->load->view("layout/footer");
        } else {
            $data = [
                'admin_nama' => htmlspecialchars($this->input->post('Nama', true)),
                'admin_user' => htmlspecialchars($this->input->post('Username', true)),
                'admin_email' => htmlspecialchars($email),
                'admin_image' => 'default.jpg',
                'admin_password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
                'admin_datecreate' => time(),
                // 'admin_password' => $this->input->post('Password'),
                'role_id' => 1,
                'admin_active' => 0,
            ];

            $token = base64_encode(random_bytes(32));
            // var_dump($token);
            $admin_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            // die;

            $this->db->insert('tb_admin', $data);
            $this->db->insert('admin_token', $admin_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Selamat akun anda telah terdaftar. Silahkan lakukan aktifasi akun</div>');
            redirect('/Auth');
        }
    }

    private function _sendEmail($token, $tipe)
    {

        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'joyoom34@gmail.com';
        $config['smtp_pass'] = 'andra18ti082_joyoom';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from('joyoom34@gmail.com', 'Desa Sayur Mahincat');
        $this->email->to($this->input->post('Email'));
        if ($tipe == 'verify') {

            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link berikut untuk verifikasi akun : <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('Email') . '&token=' . urlencode($token) . '">Aktif</a>');
        } else {
            $this->email->subject('Reset Password Akun');
            $this->email->message('Klik link berikut untuk reset password akun : <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('Email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_admin', ['admin_email' => $email])->row_array();
        if ($user) {
            $admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();
            if ($admin_token) {
                if (time() - $admin_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('admin_active', 1);
                    $this->db->where('admin_email', $email);
                    $this->db->update('tb_admin');

                    $this->db->delete('admin_token', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Selamat akun anda telah terdaftar.<a href="' . base_url('Auth') . '" class="alert-link"> Login </a>                           </div>');
                    redirect('/Auth');
                } else {
                    $this->db->delete('tb_admin', ['admin_email' => $email]);
                    $this->db->delete('admin_token', ['admin_email' => $email]);

                    $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Akun aktifasi gagal! token anda telah habis masa</div>');

                    redirect('/Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Akun aktifasi gagal! token anda salah</div>');
                redirect('/Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Akun aktifasi gagal! Email salah</div>');
            redirect('/Auth');
        }
    }

    public function forget()
    {
        $this->form_validation->set_rules('Email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/auth_header");
            $this->load->view("auth/View_Forget");
            $this->load->view("layout/auth_footer");
        } else {
            $email = $this->input->post("Email");
            $admin = $this->db->get_where('tb_admin', ['admin_email' => $email, 'admin_active' => 1])->row_array();
            if ($admin) {


                $token = base64_encode(random_bytes(32));
                $admin_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('admin_token', $admin_token);
                $this->_sendEmail($token, 'forget');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Password anda salah
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>');

                redirect('Auth/forget');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3">   Email anda tidak terdaftar atau belum aktif
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>');

                redirect('Auth/forget');
            }
        }
    }

    public function blocked()
    {
        $this->load->view("auth/blocked");
    }

    public function logout()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("nama_admin");
        $this->session->unset_userdata("role_id");

        $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Anda telah logout</div>');
        redirect('/Auth');
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // var_dump($email);
        $admin = $this->db->get_where('tb_admin', ['admin_email' => $email])->row_array();


        if ($admin) {

            $admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();

            if ($admin_token) {
                $this->session->set_userdata('reset', $email);
                $this->session->set_userdata('name', $admin['admin_user']);

                $this->changePassword();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Akun aktifasi gagal! token anda tidak terdaftar</div>');
                redirect('Auth/forget');
                // echo "gagal";
            }
        } else {
            // echo "gagal";
            $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Akun aktifasi gagal! email anda salah</div>');
            redirect('Auth/forget');
        }
    }

    public function changePassword()
    {

        if (!$this->session->userdata('reset')) {
            redirect('Auth');
        }
        $data['judul'] = 'Ganti Password';

        $this->form_validation->set_rules(
            'Password1',
            'Password',
            'required|trim|min_length[3]|matches[Password2]',
            [
                'matches' => 'Password tidak sama',
                'min_length' => 'Password harus 3 Karakter'
            ]
        );
        $this->form_validation->set_rules(
            'Password2',
            'Konfirmasi Password',
            'required|trim|min_length[3]|matches[Password1]',
            [
                'matches' => 'Password tidak sama',
                'min_length' => 'Password harus 3 Karakter'
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/auth_header", $data);
            $this->load->view("auth/View_changepassword");
            $this->load->view("layout/auth_footer");
        } else {

            $password = password_hash($this->input->post('Password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset');

            $this->db->set('admin_password', $password);
            $this->db->where('admin_email ', $email);
            $this->db->update('tb_admin');
            $this->db->delete('admin_token', ['email' => $email]);

            $this->session->unset_userdata('reset');
            $this->session->unset_userdata('name');

            $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Sukses! Password anda telah di ganti</div>');
            redirect('/Auth');
        }
    }
}
