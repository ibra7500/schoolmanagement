<?php

class Siswa_Model extends CI_model {

	function load_data()
	{
		$query = $this->db->query("SELECT * from SISWA where id_kelas = 'KLS0071'");
        return $query->result_array();
	}

	function insert($data) 
	{
		$this->db->insert('siswa', $data);
	}

	 function update($data, $nisn)
	 {
        $this->db->where('nisn', $nisn);
        $this->db->update('siswa', $data);
    }

	function delete($nisn)
	{
		$this->db->where('nisn', $nisn);
		$this->db->delete('siswa');
	}
}