<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');
        $this->load->helper('my_function_helper');
        cekaccess();
    }

    public function index()
    {

        $dariDB = $this->Pekerjaan_model->cekkode();
        // var_dump($dariDB);

        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB->pekerjaan_id, 3, 4);

        $kodeBarangSekarang = $nourut + 1;
        // echo ($kodeBarangSekarang);
        // die;
        $admin = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();
        $users = $this->Pekerjaan_model->selectAll();
        $data = array(
            'users' => $users,
            'admin' => $admin,
            'judul' => 'Pekerjaan',
            'kode_barang' => $kodeBarangSekarang

        );

        $this->form_validation->set_rules(
            'namaPekerjaan',
            'Nama Pekerjaan',
            'required|trim|is_unique[tb_pekerjaan.pekerjaan_nama]',
            [
                'is_unique' => 'Nama Pekerjaan sudah terdaftar'
            ]
        );
        $this->form_validation->set_rules('idPekerjaan', 'ID Pekerjaan', 'required|trim|is_unique[tb_pekerjaan.pekerjaan_id]', [
            'is_unique' => 'ID pekerjaan sudah terdaftar'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/Header', $data);
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Pekerjaan/index', $data);
            $this->load->view('layout/Footer');
        } else {
            $this->Pekerjaan_model->insert();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">  Berhasil!!! Anda telah menambahkan daftar pekerjaan
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            redirect('Pekerjaan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('namaPekerjaan_edit', 'Nama Pekerjaan', 'required|trim|is_unique[tb_pekerjaan.pekerjaan_nama]', [
            'is_unique' => 'Nama pekerjaan sudah ada'
        ]);
        if ($this->form_validation->run() == false) {
            redirect('Pekerjaan');
        } else {
            $this->Pekerjaan_model->update($this->input->post("idPekerjaan_edit", true));
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">  Berhasil!!! Anda telah mengubah daftar pekerjaan
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            redirect('Pekerjaan');
        }
    }

    public function delete($id)
    {
        $this->Pekerjaan_model->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">   Berhasil!!! data pekerjaan anda telah dihapus
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        redirect('Pekerjaan');
    }
}
