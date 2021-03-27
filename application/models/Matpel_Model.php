<?php

class Matpel_Model extends CI_model {

	function load_data()
	{
		$query = $this->db->query("SELECT * from matpel");
        return $query->result_array();
	}

	function insert($data) 
	{
		$this->db->insert('matpel', $data);
	}

	 function update($data, $id_matpel)
	 {
        $this->db->where('id_matpel', $id_matpel);
        $this->db->update('matpel', $data);
    }

	function delete($id_matpel)
	{
		$this->db->where('id_matpel', $id_matpel);
		$this->db->delete('matpel');
	}

	function load_data_laporan() 
	{
		$query = $this->db->query("SELECT id_matpel, nama_matpel, nama_guru from matpel LEFT JOIN guru ON matpel.nign = guru.nign");
		return $query->result();
	}
}