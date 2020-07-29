<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cekaccess();
        $this->load->model('Warga_model');
        $this->load->model('User_model');
        // $this->load->library('form_validation');
        // $this->load->helper('my_function_helper');
    }
    //SESSION
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
            'judul' => 'Beranda'

        );
        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('layout/Footer');
    }

    public function role()
    {

        $data = array(
            'role' => $this->db->get('admin_role')->result_array(),
            'admin' => $this->dataadmin(),
            'judul' => 'Role'

        );
        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('Admin/role', $data);
        $this->load->view('layout/Footer');
    }

    public function roleAccess($role_id)
    {
        $data['judul'] = 'Role Access';
        $data['admin'] = $this->dataadmin();

        $data['role'] = $this->db->get_where('admin_role', ['role_id' => $role_id])->row_array();

        $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get('admin_menu')->result_array();


        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('Admin/role-access', $data);
        $this->load->view('layout/Footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ];

        $result = $this->db->get_where('admin_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('admin_access_menu', $data);
        } else {
            $this->db->delete('admin_access_menu', $data);
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> 
           Akses telah diubah                     
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
    }

    public function listwarga()
    {
        $users = $this->Warga_model->selectAll();

        $data = array(
            'users' => $users,
            'admin' => $this->dataadmin(),
            'judul' => "Daftar Penduduk"

        );
        // var_dump($data);
        //menampilkan halaman Header.php pada folder view > View
        $this->load->view('layout/Header', $data);
        //menampilkan halaman Sidebar.php pada folder view > View
        $this->load->view('layout/Sidebar', $data);
        //menampilkan halaman Sidebar.php pada folder view > Admin
        $this->load->view('Warga/Index', $data);
        //menampilkan halaman Footer.php pada folder view > View
        $this->load->view('layout/Footer');
    }

    public function listadmin()
    {
        $list = $this->User_model->selectAll();

        $data = array(
            'list' => $list,
            'admin' => $this->dataadmin(),
            'judul' => "Daftar Penduduk"

        );
        // var_dump($data);
        //menampilkan halaman Header.php pada folder view > View
        $this->load->view('layout/Header', $data);
        //menampilkan halaman Sidebar.php pada folder view > View
        $this->load->view('layout/Sidebar', $data);
        //menampilkan halaman Sidebar.php pada folder view > Admin
        $this->load->view('Admin/View_list', $data);
        //menampilkan halaman Footer.php pada folder view > View
        $this->load->view('layout/Footer');
    }
    public function deleteuser($id)
    {
        $this->User_model->deleteuser($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> 
           Admin telah di hapus                     
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        redirect('Admin/listadmin');
    }

    public function changeaccessadmin()
    {


        $this->User_model->updateakses($this->input->post("idadmin_edit", true));
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">  Berhasil!!! Anda telah mengubah daftar pekerjaan
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        redirect('Admin/listadmin');
        // }
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
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $pekerjaan = array('TIDAK TAMAT', 'SD/SEDERAJAT', 'SMP/SEDERAJAT', 'SMA/SEDERAJAT', 'D1', 'D3', 'S1/SEDERAJAT', 'S2/SEDERJAT', 'S3');
        $data = array(
            'admin' => $this->dataadmin(),
            'judul' => 'Tambah Data Penduduk',
            'job' => $pekerjaan

        );

        // $data['admin'] = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/Header', $data);
            //menampilkan halaman Sidebar.php pada folder view > View
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Warga/View_inputwarga.php');
            $this->load->view('layout/Footer');
        } else {
            $this->Warga_model->insert();
            redirect('Admin/listwarga');
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
        $pekerjaan = array('TIDAK TAMAT', 'SD/SEDERAJAT', 'SMP/SEDERAJAT', 'SMA/SEDERAJAT', 'D1', 'D3', 'S1/SEDERAJAT', 'S2/SEDERJAT', 'S3');
        $warga = $this->Warga_model->select_by_id($id);
        $data = array(
            'admin' => $this->dataadmin(),
            'judul' => 'Edit Data Penduduk',
            'warga' => $warga,
            'job' => $pekerjaan

        );

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
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Warga/View_editwarga', $data);
            $this->load->view('layout/Footer');
        } else {
        }
    }
}
