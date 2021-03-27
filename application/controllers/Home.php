<?php

class Home extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->model('Login_Model');
	}

	function index() {
		$data['judul'] = 'Login Aplikasi';
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	function aksi_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(

			'username' => $username,
			'password' => $password

			);

		$cek = $this->Login_Model->cek_login("admin", $where)->num_rows();
		if ($cek>0) {
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			redirect(base_url("admin"));
		}

		else {
			echo"Username dan Password Salah!";
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}