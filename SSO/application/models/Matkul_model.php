<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;


class Matkul_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://hurasan.site/Akademik/api/'
        ]);
    }

    public function getMatkul(){	
		
        $response = $this->_client->request('GET', 'API_Matkul',[
            'query' => [
                'rahasia' => 'universitas'
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];

	}
    
    public function deleteMatkul($id)
    {
        $response = $this->_client->request('DELETE', 'API_Matkul',[
            'form_params' => [
                'rahasia' => 'universitas',
                'id' => $id
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function createMatkul()
    {
        $data = [
            "kd_mk" => $this->input->post('kd'),
            "nama_mk" => $this->input->post('nama'),
            "sks" => $this->input->post('sks'),
            "prodi" => $this->input->post('prodi'),
            'rahasia' => 'universitas'
        ];
        $response = $this->_client->request('POST', 'API_Matkul',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateMatkul()
    {
        $data = [
            "id" => $this->input->post('id'),
            "kd_mk" => $this->input->post('kd'),
            "nama_mk" => $this->input->post('nama'),
            "sks" => $this->input->post('sks'),
            "prodi" => $this->input->post('prodi'),
            'rahasia' => 'universitas'
        ];
        $response = $this->_client->request('PUT', 'API_Matkul',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}