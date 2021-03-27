<?php

class Siswa extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Siswa_Model');
		
	}

	function index() 
	{
		
		$data['judul'] = 'Daftar Siswa';
		$this->load->view('templates/header', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footer');
	}

	function load_data()
	{
		$data = $this->Siswa_Model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			'nisn' => $this->input->post('nisn'),
			'id_kelas' => $this->input->post('id_kelas'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'ttl' => $this->input->post('ttl'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email')
			);
		$this->Siswa_Model->insert($data);
	}

	function update()
	{
		$data = array(
		$this->input->post('table_column') => $this->input->post('value')
		);

		$this->Siswa_Model->update($data, $this->input->post('nisn'));
	}

	function delete()
	{
		$this->Siswa_Model->delete($this->input->post('nisn'));
	}
}