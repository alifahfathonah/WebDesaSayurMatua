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

    function autokode()
    {
        $dariDB = $this->Surat_model->cekkode();
        $nourut = substr($dariDB->suratmasuk_id, 3, 4);
        $autokde = $nourut + 1;
        return $autokde;
    }

    public function SuratMasuk()
    {

        $surat = $this->Surat_model->selectAll_sm();
        $data = array(
            'surat' => $surat,
            'admin' => $this->dataadmin(),
            'judul' => 'Daftar Surat Masuk',


        );
        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('Surat/View_SuratMasuk', $data);
        $this->load->view('layout/Footer');
    }

    // Tambah SURAT MASUK
    public function DetailSuratMasuk($id)
    {
        $detail = $this->Surat_model->select_by_id_sm($id);
        $data = array(
            'detail' => $detail,
            'admin' => $this->dataadmin(),
            'judul' => 'Detail Surat ' . $detail->suratmasuk_judul,


        );
        $this->load->view('layout/Header', $data);
        $this->load->view('layout/Sidebar', $data);
        $this->load->view('Surat/View_DetailSuratMasuk', $data);
        $this->load->view('layout/Footer');
    }


    // Tambah SURAT MASUK
    public function TambahSuratMasuk()
    {
        $data = array(
            'admin' => $this->dataadmin(),
            'autokode' => $this->autokode(),
            'judul' => 'Tambah Data Surat Masuk'

        );
        $this->form_validation->set_rules('nosm', 'Nomor surat', 'required|trim');
        $this->form_validation->set_rules('judulsm', 'Judul surat', 'required|trim');
        $this->form_validation->set_rules('asalsm', 'Asal surat', 'required|trim');
        $this->form_validation->set_rules('tglmasuksm', 'Tanggal masuk surat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/Header', $data);
            //menampilkan halaman Sidebar.php pada folder view > View
            $this->load->view('layout/Sidebar', $data);
            $this->load->view('Surat/View_formsuratmasuk.php');
            $this->load->view('layout/Footer');
        } else {
            $this->Surat_model->insert_sm();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> Berhasil!!! Data sudah ditambah
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            redirect('Surat/SuratMasuk');
        }
    }

    // EDIT SURAT MASUK
    public function EditSuratMasuk()
    {
    }

    // DELETE SURAT MASUK
    public function DeleteSuratMasuk($id)
    {
        $datafile = $this->Surat_model->select_by_id_sm($id);
        unlink(FCPATH . 'assets/Surat/SuratMasuk/' . $datafile->suratmasuk_file);
        // die();
        $this->Surat_model->delete_sm($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> Berhasil!!! Data telah dihapus
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        redirect("Surat/SuratMasuk");
    }

    public function DownloadSuratMasuk($filename)
    {


        force_download('assets/Surat/SuratMasuk/' . $filename, NULL);
    }
}
