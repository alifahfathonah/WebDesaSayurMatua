<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        cekaccess();
    }

    function dataadmin()
    {
        $admin = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();
        return $admin;
    }

    public function index()
    {

        $users = $this->User_model->selectAll();
        $data = array(
            'users' => $users,
            'admin' => $this->dataadmin(),
            'judul' => 'Profile'

        );
        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('User/index', $data);
        $this->load->view('layout/Footer');
    }

    public function edit()
    {
        $data = array(

            'admin' => $this->dataadmin(),
            'judul' => 'Edit Profile'

        );

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');

        if ($this->form_validation->run() == False) {
            $this->load->view('layout/Header', $data);
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('User/profile_edit', $data);
            $this->load->view('layout/Footer');
        } else {
            $username = $this->input->post("username");
            $name = $this->input->post("name");



            //gambar upload
            $upload_image = $_FILES['image']['name'];
            // var_dump($upload_image);
            // die;
            if ($upload_image) {
                $config['upload_path'] = './assets/images/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['admin']['admin_image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('admin_image', $new_image);
                } else {

                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> ' . $this->upload->display_errors() . '
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
                    redirect('User/edit');
                    // echo $this->upload->display_errors();

                }
            }

            $this->db->set('admin_nama', $name);
            $this->db->where('admin_user', $username);
            $this->db->update('tb_admin');
            // var_dump($result);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Berhasil!!! Data anda sudah diubah oleh sistem
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
            redirect('User');
        }
    }

    public function changePassword()
    {

        $this->form_validation->set_rules(
            'OldPassword',
            'Password lama',
            'required|trim|min_length[3]',
        );
        $this->form_validation->set_rules(
            'NewPassword',
            'Password baru',
            'required|trim|min_length[3]|matches[NewPasswordConfirm]',
            [
                'matches' => 'Password tidak sama',
                'min_length' => 'Password harus 3 Karakter'
            ]
        );
        $this->form_validation->set_rules(
            'NewPasswordConfirm',
            'Konfirmasi Password',
            'required|trim|min_length[3]|matches[NewPassword]',
            [
                'matches' => 'Password tidak sama',
                'min_length' => 'Password harus 3 Karakter'
            ]
        );
        $data['judul'] = 'Ganti Password';
        $data['admin'] = $this->dataadmin();
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/Header', $data);
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('User/index', $data);
            $this->load->view('layout/Footer');
        } else {
            $nowpassword = $this->input->post("OldPassword");
            $newpassword = $this->input->post("NewPassword");

            if (!password_verify($nowpassword, $data['admin']['admin_password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Gagal!!! Password lama anda tidak cocok
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
                redirect('User/changePassword');
            } else {
                if ($nowpassword == $newpassword) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-rounded mb-3"> Password anda sama dengan password lama
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
                    redirect('User/changePassword');
                } else {
                    $pass_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $this->db->set('admin_password', $pass_hash);
                    $this->db->where('admin_user', $this->dataadmin()['admin_user']);
                    $this->db->update('tb_admin');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> Password anda telah diganti
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');

                    redirect('User');
                }
            }
        }
    }
}
