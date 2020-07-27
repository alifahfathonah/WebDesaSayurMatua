
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

        $data = [
            'suratmasuk_id' =>   $this->input->post("idsuratmasuk", true),
            'suratmasuk_no' =>   $this->input->post("nosm", true),
            'suratmasuk_judul' =>   $this->input->post("judulsm", true),
            'suratmasuk_asal' =>   $this->input->post("asalsm", true),
            'suratmasuk_tanggal' =>   $this->input->post("tglmasuksm", true),
            'suratmasuk_file' =>   null,
            'suratmasuk_deskripsi' =>   $this->input->post("Deskripsi", true),

        ];

        $this->db->insert('tb_suratmasuk', $data);
    }
}
?>