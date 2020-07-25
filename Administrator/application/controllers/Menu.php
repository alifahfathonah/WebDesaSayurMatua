<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_menu');
        cekaccess();
    }

    function dataadmin()
    {
        $admin = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();
        return $admin;
    }

    public function index()
    {
        $data = array(
            'menu' => $this->db->get('admin_menu')->result_array(),
            'admin' => $this->dataadmin(),
            'judul' => "Menu Management"
        );
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|is_unique[tb_pekerjaan.pekerjaan_id]', [
            'is_unique' => 'ID Menu sudah ada'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/Header', $data);
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Menu/index', $data);
            $this->load->view('layout/Footer');
        } else {
            $this->db->insert('admin_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">   Menu berhasil ditambahkan!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            redirect('Menu');
        }
    }

    public function submenu()
    {
        $data = array(
            'subMenu' => $this->Model_menu->getSubMenu(),
            'admin' => $this->dataadmin(),
            'judul' => "Submenu Management"
        );
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/Header', $data);
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Menu/submenu', $data);
            $this->load->view('layout/Footer');
        } else {
            $active = 1;
            if ($this->input->post('is_active') != null) {
                $active = 1;
            } else {
                $active = 0;
            }
            // die();
            $data = [
                'title' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $active
            ];
            $this->db->insert('admin_sub_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">  Sub Menu berhasil ditambahkan!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');

            redirect('Menu/submenu');
        }
    }
}
