<?php
class Warga_model extends CI_Model
{
    public function login($username, $password)
    {
        return $this->db->query("select * from user where nama_user='" + $username + "'
        and password='" . $password . "'")->row();
    }
    public function insert()
    {

        $data = [
            'NIK' =>   $this->input->post("nik", true),
            'NKK' =>   $this->input->post("nkk", true),
            'Nama' =>   $this->input->post("nama", true),
            'Sex' =>   $this->input->post("gender"),
            'Alamat' =>   $this->input->post("alamat", true),
            'TempatLahir' =>   $this->input->post("tmptlahir", true),
            'TglLahir' =>   $this->input->post("tgllahir", true),
            'Agama' =>   $this->input->post("agama", true),
            'Pekerjaan' =>   $this->input->post("pekerjaan", true),
            'PendidikanTerakhir' =>   $this->input->post("pendidikan", true),
            'Status' =>   'Hidup',
        ];

        $this->db->insert('warga', $data);
    }

    public function selectAll()
    {
        return $this->db->get('Warga')->result();
    }

    public function delete($id)
    {
        //Kondisi data yang ingin di hapus
        //parameter pertama nama kolom
        //parameter kedua nilai nya
        $this->db->where('id_user', $id);

        $this->db->delete('user'); //nama tabel
    }

    public function select_by_id($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

    public function update_user($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
}
