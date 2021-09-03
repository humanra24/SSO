<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

class Buku_model extends CI_Model
{
	private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://hurasan.site/Perpustakaan/api/'
        ]);
    }

    public function getBuku(){	
		
        $this->db->select('*');
        $this->db->from('tb_buku');

	}

    public function getBuku(){	
		
        $response = $this->_client->request('GET', 'API_Buku',[
            'query' => [
                'rahasia' => 'universitas'
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];

	}
    
    public function deleteBuku($id)
    {
        $response = $this->_client->request('DELETE', 'API_Buku',[
            'form_params' => [
                'rahasia' => 'universitas',
                'id' => $id
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function createBuku()
    {
		$data = [
            'judul_buku' => $this->input->post('judul'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'th_terbit' => $this->input->post('tahun'),
			'rahasia' => 'universitas'
        ];
        $response = $this->_client->request('POST', 'API_Buku',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateBuku()
    {
        $data = [
			'id' => $this->input->post('id'),
            'judul_buku' => $this->input->post('judul'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'th_terbit' => $this->input->post('tahun'),
			'rahasia' => 'universitas'
        ];
        $response = $this->_client->request('PUT', 'API_Buku',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}