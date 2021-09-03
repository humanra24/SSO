<?php

class Matkul_model extends CI_Model
{
    public function ambilData($table){	
		return $this->db->get_where($table);
	}
    
    public function hapusData($table,$where)
    {
        $this->db->delete($table, $where);
    }

    public function tambahData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function ubahData($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }
}