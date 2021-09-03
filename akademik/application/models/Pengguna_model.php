<?php

class Pengguna_model extends CI_Model
{
    public function getPengguna($level, $id){	
		if($id == null){
		return $this->db->get_where('tb_pengguna', ['level' => $level])->result_array();
		}else{
		return $this->db->get_where('tb_pengguna', ['id_pengguna' => $id])->result_array();
		}
	}		

	public function deletePengguna($id)
	{
		$this->db->delete('tb_pengguna', ['id_pengguna' => $id]);
		return $this->db->affected_rows();
	}
	
	public function createPengguna($data)
	{
		$this->db->insert('tb_pengguna', $data);
		return $this->db->affected_rows();
	}

	public function updatePengguna($data, $id)
	{
		$this->db->update('tb_pengguna', $data, ['id_pengguna' => $id]);
		return $this->db->affected_rows();
	}

	public function credentialPengguna($email, $pass)
	{
		$data = [
		'email' => $email,
		'pass' => $pass
		];

		if($pass == null){
		return $this->db->get_where('tb_pengguna', ['email' => $email])->num_rows();
		}else{
		return $this->db->get_where('tb_pengguna', $data)->num_rows();
		}
	}

	public function logPengguna($email, $pass)
	{
		$data = [
		'email' => $email,
		'pass' => $pass
		];

		if($pass == null){
		return $this->db->get_where('tb_pengguna', ['email' => $email])->result_array();
		}else{
		return $this->db->get_where('tb_pengguna', $data)->result_array();
		}
	}
}