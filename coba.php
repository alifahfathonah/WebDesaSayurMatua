<?php


$table = "Barang";
$data = array(
    'BarangNama' => 'Laptop',
    'BarangHarga' => 5500000,
    'BarangTipe' => 2,
    'BarangGambar' => 'laptop.jpg'
);

$field = array();
function insert($data)
{
    foreach ($data as $k => $y) {
        $field[] = "$k = '$y' ";
    }
    return $field;
}

$sql = "Insert Into $table set " . join(',', insert($data));
echo $sql;
