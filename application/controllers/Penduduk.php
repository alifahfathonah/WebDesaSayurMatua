<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Penduduk_model");
        $this->load->model("Warga_model");
    }

    public function login()
    {
        // if ($this->session->userdata("nik")) {
        //     redirect('Penduduk/Beranda');
        // }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == False) {
            $this->load->view("layout/auth_header");
            $this->load->view("Penduduk/LoginPenduduk");
            $this->load->view("layout/auth_footer");
        } else {
            $this->_login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("nik");
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">   Akun anda telah logout
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        redirect('Penduduk/login');
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $penduduk = $this->db->get_where('warga', ['NIK' => $username])->row_array();
        // var_dump($penduduk);
        // die();
        if ($penduduk) {
            // echo $penduduk['Status'];
            // //ada
            //jika user aktif
            if ($penduduk['Status'] == "Hidup") {
                //cek password
                if ($pass == $penduduk['NIK']) {
                    // echo $penduduk['NIK'];
                    $data = [
                        'nik' => $penduduk['NIK'],
                        'role_id' => 4
                    ];
                    $this->session->set_userdata($data);
                    // $this->session->userdata("nik");
                    // die();
                    redirect("Penduduk/Beranda");
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Password anda salah
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>');
                    redirect('Penduduk/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> 
                Akun tidak aktif lagi                       
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
                redirect('Penduduk/login');
            }
        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> 
            Akun tidak ditemukan                       
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            redirect('Penduduk/login');
        }
    }

    function dataadmin()
    {
        $penduduk = $this->db->get_where('warga', ['NIK' => $this->session->userdata('nik')])->row_array();
        return $penduduk;
    }

    public function Beranda()
    {
        // echo $this->session->userdata('nik');
        $cekrequest = $this->db->get_where('tb_request_ktp', ['NIK' => $this->dataadmin()['NIK'], 'status' => 0]);
        $cekstatus = $this->db->get_where('tb_request_ktp', ['NIK' => $this->dataadmin()['NIK'], 'status' => 1]);
        $status = false;

        $button = "";
        $txtbutton = "Request";
        if ($cekrequest->num_rows() < 1) {
        } else {
            $button = "disabled";
            $txtbutton = "Anda sudah request";
        }
        if ($cekstatus->num_rows() < 1) {
        } else {
            $button = "disabled";
            $txtbutton = "Anda sudah request";
            $status = true;
        }
        $data = array(
            'penduduk' => $this->dataadmin(),
            'judul' => 'Tambah Admin',
            'button' => $button,
            'txtbutton' => $txtbutton,
            'status' => $status

        );
        // var_dump($data);
        $this->load->view("layout/header", $data);
        $this->load->view('layout/sidebarpenduduk', $data);
        $this->load->view("Penduduk/Index", $data);
        $this->load->view("layout/footer");
    }

    public function edit($id)
    {
        $pekerjaan = array('TIDAK TAMAT', 'SD/SEDERAJAT', 'SMP/SEDERAJAT', 'SMA/SEDERAJAT', 'D1', 'D3', 'S1/SEDERAJAT', 'S2/SEDERJAT', 'S3');
        $warga = $this->Warga_model->select_by_id($id);
        $data = array(
            'penduduk' => $this->dataadmin(),
            'judul' => 'Edit Data Penduduk',
            'warga' => $warga,
            'job' => $pekerjaan

        );

        $nik = $this->input->post('nik');

        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nkk', 'NKK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tmptlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tangga Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/Header', $data);
            //menampilkan halaman Sidebar.php pada folder view > View
            $this->load->view('layout/sidebarpenduduk', $data);
            $this->load->view('Penduduk/EditPenduduk', $data);
            $this->load->view('layout/Footer');
        } else {
            $datainput = [
                'NIK' => $nik,
                'NKK' => $this->input->post('nkk'),
                'Nama' => $this->input->post('nama'),
                'Sex' => $this->input->post('gender'),
                'Alamat' => $this->input->post('alamat'),
                'TempatLahir' => $this->input->post('tmptlahir'),
                'TglLahir' => $this->input->post('tgllahir'),
                'Agama' => $this->input->post('agama'),
                'Pekerjaan' => $this->input->post('pekerjaan'),
                'PendidikanTerakhir' => $this->input->post('pendidikan'),
            ];
            $this->Warga_model->update_warga($datainput, $nik);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> 
            Data Berhasil di rubah                      
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            redirect('Penduduk/Beranda');
        }
    }

    public function sendktp()
    {
        $nik = $this->session->userdata("nik");
        $datainput = [
            'NIK' => $nik,
            'nosuratrequest' => 1,
            'tgl_pengajuan' => time(),
            'tgl_approve' => 0,
            'tgl_habismasa' => 0,
            'status' => 0
        ];
        $this->db->insert('tb_request_ktp', $datainput);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> 
            KTP BERHASIL DI REQUEST                     
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        redirect('Penduduk/Beranda');
    }

    public function requestktp($id)
    {


        $agama = $this->db->get_where('tb_agama', ['agama_id' => $this->dataadmin()['Agama']])->row();
        $pekerjaan = $this->db->get_where('tb_pekerjaan', ['pekerjaan_id' => $this->dataadmin()['Pekerjaan']])->row();
        $data = array(
            'penduduk' => $this->dataadmin(),
            'judul' => 'Request Penduduk',
            'agama' => $agama,
            'pekerjaan' => $pekerjaan,
            // 'warga' => $warga,
        );

        $this->load->view('layout/Header', $data);
        //menampilkan halaman Sidebar.php pada folder view > View
        $this->load->view('layout/sidebarpenduduk', $data);
        $this->load->view('Penduduk/View_RequestKTP', $data);
        $this->load->view('layout/Footer');
    }

    public function KTP($nik)
    {
        // $kt
        $idrequest = $this->db->query("SELECT MAX(tgl_pengajuan),id_request,nosuratrequest,tgl_approve,tgl_habismasa from tb_request_ktp GROUP BY NIK HAVING NIK ='$nik' ")->row();

        // var_dump();
        // die();
        $nomorsurat = $this->db->get_where('tb_surat_ktp', ['id_request' => $idrequest->id_request])->row();
        $agama = $this->db->get_where('tb_agama', ['agama_id' => $this->dataadmin()['Agama']])->row();
        $pekerjaan = $this->db->get_where('tb_pekerjaan', ['pekerjaan_id' => $this->dataadmin()['Pekerjaan']])->row();
        $data = array(
            'penduduk' => $this->dataadmin(),
            'judul' => 'Request Penduduk',
            'agama' => $agama,
            'pekerjaan' => $pekerjaan,
            'tanggal' => $idrequest,
            'nosurat' => $nomorsurat
            // 'warga' => $warga,
        );
        // var_dump($data);
        // die();

        $this->load->view('layout/Header', $data);
        //menampilkan halaman Sidebar.php pada folder view > View
        $this->load->view('layout/sidebarpenduduk', $data);
        $this->load->view('Penduduk/SuratRequesKTP', $data);
        $this->load->view('layout/Footer');
    }
}
