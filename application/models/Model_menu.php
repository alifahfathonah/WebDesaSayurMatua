<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_menu extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `admin_sub_menu`.*,`admin_menu`.`menu`
                    FROM `admin_sub_menu` JOIN `admin_menu`
                    ON   `admin_sub_menu`.`menu_id` = `admin_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function selectmenu_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('admin_sub_menu')->row();
    }

    public function updatesubmenu($id)
    {
        $idsubmenu = $id;
        $active = 1;
        if ($this->input->post('is_active') != null) {
            $active = 1;
        } else {
            $active = 0;
        }
        // die();
        $data = [
            'title' => $this->input->post('judul'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $active
        ];
        $this->db->where('id', $id);
        $this->db->update('admin_sub_menu', $data);
    }

    public function deletesubmenu($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('admin_sub_menu'); //nama tabel
    }




    public function deletemenu($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('admin_menu'); //nama tabel
    }
}
