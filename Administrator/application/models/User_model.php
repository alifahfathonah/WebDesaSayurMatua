<?php
class User_model extends CI_Model
{
    public function selectAll()
    {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->join('admin_role', 'admin_role.role_id=tb_admin.role_id');
        $query = $this->db->get();
        return $query->result();
        // return $this->db->get('tb_admin')->result();
    }

    public function deleteuser($id)
    {
        $this->db->where('admin_id', $id);
        $this->db->delete('tb_admin'); //nama tabel
    }

    public function updateakses($id)
    {
        $idAdmin = $id;
        $data = [
            'role_id' =>   $this->input->post("hakakses", true),
        ];
        // return $idpekerjaan;
        $this->db->where('admin_id', $idAdmin);
        $this->db->update('tb_admin', $data);
    }
}
