
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_model extends CI_Model
{

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(suratmasuk_id) as suratmasuk_id from tb_suratmasuk");
        $hasil = $query->row();
        return $hasil;
    }

    public function cekkodeSuratKTP()
    {
        $query = $this->db->query("SELECT MAX(nomorsurat) as suratmasuk_id from tb_surat_ktp");
        $hasil = $query->row();
        return $hasil;
    }

    public function selectAll_sm()
    {
        return $this->db->get('tb_suratmasuk')->result();
    }

    public function select_by_id_sm($id)
    {
        $this->db->where('suratmasuk_id', $id);
        return $this->db->get('tb_suratmasuk')->row();
    }

    public function delete_sm($id)
    {
        $this->db->where('suratmasuk_id', $id);
        $this->db->delete('tb_suratmasuk');
    }

    public function insert_sm()
    {
        $upload_file = $_FILES['suratfile']['name'];
        if ($upload_file) {
            $config['upload_path'] = './assets/Surat/SuratMasuk';
            $config['allowed_types'] = 'pdf|docx|doc|xls';
            $config['max_size']     = '2048';


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('suratfile')) {

                $newfile = $this->upload->data('file_name');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3"> Berhasil!!! File di upload
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-rounded mb-3"> ' . $this->upload->display_errors() . '
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
                redirect('Surat/TambahSuratMasuk');
            }
        }

        $inputan = [
            'suratmasuk_id' =>   $this->input->post("idsuratmasuk", true),
            'suratmasuk_no' =>   $this->input->post("nosm", true),
            'suratmasuk_judul' =>   $this->input->post("judulsm", true),
            'suratmasuk_asal' =>   $this->input->post("asalsm", true),
            'suratmasuk_tanggal' =>   $this->input->post("tglmasuksm", true),
            'suratmasuk_file' =>   $newfile,
            'suratmasuk_deskripsi' =>   $this->input->post("Deskripsi", true),

        ];

        $this->db->insert('tb_suratmasuk', $inputan);
    }
}
?>