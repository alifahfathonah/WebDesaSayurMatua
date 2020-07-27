
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_model extends CI_Model
{
    public function selectAll()
    {
        return $this->db->get('tb_suratmasuk')->result();
    }

    public function select_by_id($id)
    {
        $this->db->where('suratmasuk_id', $id);
        return $this->db->get('tb_suratmasuk')->row();
    }

    public function delete($id)
    {
        $this->db->where('suratmasuk_id', $id);
        $this->db->delete('tb_suratmasuk');
    }
}
?>