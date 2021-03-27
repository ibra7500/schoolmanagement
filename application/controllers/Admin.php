<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	function index(){
		$data['judul'] = 'Admin Dashboard';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/templates/footer');
	}
}