<?php

class Buku_model extends CI_Model
{
    	public function getBuku(){
		return $this->db->get_where('tb_buku')->result_array();
	}		

	public function deleteBuku($id)
	{
		$this->db->delete('tb_buku', ['id' => $id]);
		return $this->db->affected_rows();
	}
	
	public function createBuku($data)
	{
		$this->db->insert('tb_buku', $data);
		return $this->db->affected_rows();
	}

	public function updateBuku($data, $id)
	{
		$this->db->update('tb_buku', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
}