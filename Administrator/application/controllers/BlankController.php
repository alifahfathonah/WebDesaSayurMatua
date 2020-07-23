<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlankController extends CI_Controller
{

    function index()
    {
        $this->load->view("blank"); // memanggil blank pada folder views
    }
}
