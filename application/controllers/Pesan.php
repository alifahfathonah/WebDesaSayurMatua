<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;


class Pesan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function pesan_get($id_pesan = "")
    {
        if ($id_pesan == '') {
            $pesan = $this->db->get('pesan')->result();
        } else {
            $this->db->where('id_pesan', $id_pesan);
            $pesan = $this->db->get('pesan')->result();
        }
        $this->response($pesan);
    }



    function pesan_put()
    {
        $id_pesan = $this->put('id_pesan');
        $data = array(
            'id_pesan' => $this->put('id_pesan'),
            'nik' => $this->put('nik'),
            'pesan' => $this->put('pesan'),
        );
        $this->db->where('id_pesan', $id_pesan);
        $update = $this->db->update('pesan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id_pesan = $this->delete('id_pesan');
        $this->db->where('id_pesan', $id_pesan);
        $delete = $this->db->delete('pesan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function pesan_post()
    {
        $data = array(
            'id_pesan' => $this->input->post('id_pesan'),
            'nik' => $this->input->post('nik'),
            'pesan' => $this->input->post('pesan')
        );
        // print_r($data);
        $insert = $this->db->insert('pesan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
