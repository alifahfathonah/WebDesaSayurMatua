<?php
class Pekerjaan_model extends CI_Model
{

    public function selectAll()
    {
        return $this->db->get('tb_pekerjaan')->result();
    }

    public function insert()
    {
        $data = [
            'pekerjaan_id' =>   $this->input->post("idPekerjaan", true),
            'pekerjaan_nama' =>   $this->input->post("namaPekerjaan", true),
        ];
        $this->db->insert('tb_pekerjaan', $data);
    }

    public function selectbyid($id)
    {
        $this->db->where('pekerjaan_id', $id);
        return $this->db->get('tb_pekerjaan')->row();
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(pekerjaan_id) as pekerjaan_id from tb_pekerjaan");
        $hasil = $query->row();
        return $hasil;
    }

    public function update($id)
    {
        $idpekerjaan = $id;
        $data = [
            'pekerjaan_nama' =>   $this->input->post("namaPekerjaan_edit", true),
        ];
        // return $idpekerjaan;
        $this->db->where('pekerjaan_id', $id);
        $this->db->update('tb_pekerjaan', $data);
    }

    public function delete($id)
    {

        $this->db->where('pekerjaan_id', $id);
        $this->db->delete('tb_pekerjaan'); //nama tabel
    }
}
