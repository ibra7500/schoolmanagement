<?php

class Siswa8b_Model extends CI_model {

	function load_data()
	{
		$query = $this->db->query("SELECT * from SISWA where id_kelas = 'KLS0082'");
        return $query->result();
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

	function graph() 
	{
		$id_kelas = 'KLS0082';
		$this->db->group_by('jk');
		$this->db->select('jk');
		$this->db->select("count(*) as total");
		$this->db->where('id_kelas', $id_kelas);
		return $this->db->from('siswa')
			   ->get()
			   ->result();
	}
}