<?php

class Kelas_Model extends CI_model {

	function load_data()
	{
		$query = $this->db->query("SELECT * from kelas");
        return $query->result_array();
	}

	function graph() {

		$this->db->group_by('id_kelas');
		$this->db->select('id_kelas');
		$this->db->select("count(nisn) as total");
		return $this->db->from('siswa')
			   ->get()
			   ->result();
	}

	function load_data_laporan() 
	{
		$query = $this->db->query("SELECT COUNT(nama_siswa) as total, siswa.id_kelas, kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas GROUP BY kelas");
		return $query->result();
	}

}

