<?php

class Matkul_model extends CI_Model
{
    public function getMatkul(){
		return $this->db->get_where('tb_matkul')->result_array();
	}		

	public function deleteMatkul($id)
	{
		$this->db->delete('tb_matkul', ['id' => $id]);
		return $this->db->affected_rows();
	}
	
	public function createMatkul($data)
	{
		$this->db->insert('tb_matkul', $data);
		return $this->db->affected_rows();
	}

	public function updateMatkul($data, $id)
	{
		$this->db->update('tb_matkul', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
}