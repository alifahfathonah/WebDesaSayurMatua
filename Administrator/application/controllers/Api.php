<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pekerjaan_model');
    }

    function index()
    {
        $data = $this->Pekerjaan_model->selectAll();
        json_encode($data->result_array());
    }
}
