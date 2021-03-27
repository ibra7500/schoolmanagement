<?php

class Guru_Model extends CI_model {

	function load_data()
	{
		$query = $this->db->query("SELECT * from guru");
        return $query->result();
	}

	function insert($data) 
	{
		$this->db->insert('guru', $data);
	}

	 function update($data, $nign)
	 {
        $this->db->where('nign', $nign);
        $this->db->update('guru', $data);
    }

	function delete($nign)
	{
		$this->db->where('nign', $nign);
		$this->db->delete('guru');
	}

	function graph() {
		$this->db->group_by('jk');
		$this->db->select('jk');
		$this->db->select("count(*) as total");
		return $this->db->from('guru')
			   ->get()
			   ->result();
	}
}