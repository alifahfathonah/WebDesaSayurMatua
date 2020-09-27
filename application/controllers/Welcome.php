<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Warga_model');
	}

	public function index()
	{
		$nama = "Andra H. Al Hafiz HSB";
		$data = array('nama' => $nama);
		$this->load->view("View_Login", $data);
	}

	public function cek_login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$cek_login = $this->Warga_model->login($username, md5($password));

		if (empty($cek_login)) {
			redirect("/");
		} else {
			echo "Berhasil Login";
		}
	}

	public function register()
	{
		if ($this->input->post()) {
			$username = $this->input->post("namesurname");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$data_inputan = array('nama_user' => $username, 'email_user' => $email, 'password' => md5($password));

			$this->Warga_model->insert($data_inputan);
			redirect('/');
		} else {
			$this->load->view("View_Register");
		}
	}
}
