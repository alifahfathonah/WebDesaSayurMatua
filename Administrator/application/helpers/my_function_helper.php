<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Fungsi untuk membuat tanggal dengan format Indonesia
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

//cek login
function cekaccess()
{
    $ci = get_instance();
    if (!$ci->session->userdata("username")) {
        redirect('Auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        //mengecek ke database pada tabel admin_menu , apakah ada nilai dari $menu sama dengan data yang ada di kolom menu 
        $queryMenu = $ci->db->get_where('admin_menu', ['menu' => $menu])->row_array();
        // var_dump($queryMenu);
        $menu_id = $queryMenu['id'];
        // var_dump($menu_id);

        $userAccess = $ci->db->get_where('admin_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        // var_dump($userAccess);
        if ($userAccess->num_rows() < 1) {
            // echo "yes";
            redirect('Auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('admin_access_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function sex($sex)
{
    if ($sex == "P") {
        return "Perempuan";
    } else {
        return "Laki-laki";
    }
}

// Fungsi untuk membuat bulan dengan format Indonesia
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}




// Fungsi untuk menampilkan data dalam bentuk combobox
function comboboxmanual($name, $id, $value, $isi, $selected)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='custom-select col-6'>";
    $cmb .= "<option value=''>-- PILIH --</option>";
    foreach ($value as $d) {
        $cmb .= "<option value='" . $d . "'";
        $cmb .= $selected == $d ? "selected='selected'" : '';
        $cmb .= ">" . strtoupper($d) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function combobox($name, $id, $table, $field, $primary_key, $selected)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='custom-select col-6'>";
    $data = $ci->db->get($table)->result();
    $cmb .= "<option value=''>-- PILIH --</option>";
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$primary_key . "'";
        $cmb .= $selected == $d->$primary_key ? "selected='selected'" : '';
        $cmb .= ">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}
