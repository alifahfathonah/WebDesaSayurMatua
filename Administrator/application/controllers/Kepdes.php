<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepdes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->library('form_validation');
        $this->load->helper('my_function_helper');
        cekaccess();
    }


    function dataadmin()
    {
        $admin = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();
        return $admin;
    }


    public function index()
    {

        $users = $this->Warga_model->selectAll();
        $data = array(
            'users' => $users,
            'admin' => $this->dataadmin(),
            'judul' => "Dashbord"
        );

        // var_dump($data['admin']);

        // );
        // // var_dump($data);
        //menampilkan halaman Header.php pada folder view > View
        $this->load->view('layout/Header', $data);
        //menampilkan halaman Sidebar.php pada folder view > View
        $this->load->view('layout/Sidebar', $data);
        //menampilkan halaman Sidebar.php pada folder view > Admin
        $this->load->view('Kepdes/index', $data);
        //menampilkan halaman Footer.php pada folder view > View
        $this->load->view('layout/Footer');
    }

    public function delete($id)
    {
        $this->Warga_model->delete($id);
        redirect(site_url('user'));
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nkk', 'NKK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tmptlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tangga Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('Pendidikan', 'Pendidikan', 'required');

        $data = array(
            'admin' => $this->dataadmin(),

        );

        // $data['admin'] = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/Header');
            //menampilkan halaman Sidebar.php pada folder view > View
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Warga/View_inputwarga.php');
            $this->load->view('layout/Footer');
        } else {
            $this->Warga_model->insert();
            redirect('Home');
        }
    }

    public function create_action()
    {




        $id_user = $this->input->post('id_user');
        if ($id_user == "") {
            $this->Warga_model->insert();
            redirect('/Admin');
        } else {
            $username = $this->input->post("nameuser");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $data_inputan = array('nama_user' => $username, 'email_user' => $email, 'password' => $password);

            $this->Warga_model->update_user($data_inputan, $id_user);
            redirect('/Admin');
        }
    }

    public function edit($id)
    {
        $user = $this->Warga_model->select_by_id($id);
        $data = array('user' => $user,);
        $this->load->view('Admin/View_create', $data);
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
}
