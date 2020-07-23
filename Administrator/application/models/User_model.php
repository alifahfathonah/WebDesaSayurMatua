<?php
class User_model extends CI_Model
{
    public function selectAll()
    {
        return $this->db->get('tb_admin')->result();
    }
}
