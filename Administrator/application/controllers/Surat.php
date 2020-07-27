<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        cekaccess();
    }

    function dataadmin()
    {
        $admin = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();
        return $admin;
    }

    public function SuratMasuk()
    {

        $surat = $this->Surat_model->selectAll();
        $data = array(
            'surat' => $surat,
            'admin' => $this->dataadmin(),
            'judul' => 'Daftar Surat Masuk'

        );
        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('Surat/View_SuratMasuk', $data);
        $this->load->view('layout/Footer');
    }

    // EDIT SURAT MASUK
    public function edit_sm()
    {
    }

    // DELETE SURAT MASUK
    public function delete_sm($id)
    {
        $this->Surat_model->delete($id);
        redirect("Surat/SuratMasuk");
    }
}
