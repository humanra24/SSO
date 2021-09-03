<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

class Pengguna_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://hurasan.site/Akademik/api/'
        ]);
    }

    public function ambilData($pengguna, $id){	

        $response = $this->_client->request('GET', 'pengguna',[
            'query' => [
                'rahasia' => 'universitas',
                'level' => $pengguna,
                'id' => $id
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];

	}
    
    public function hapusData($id)
    {
        $response = $this->_client->request('DELETE', 'pengguna',[
            'form_params' => [
                'rahasia' => 'universitas',
                'id' => $id
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function tambahData()
    {
        $tgl = $this->input->post('tgl');
        $tanggal = date('Y-m-d', strtotime($tgl));
        
        $data = [
            "NI" => $this->input->post('NI'),
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "pass" => $this->input->post('pass'),
            "tgl_lahir" => $tanggal,
            "alamat" => $this->input->post('alamat'),
            "no_telp" => $this->input->post('hp'),
            "level" => $this->input->post('level'),
            'rahasia' => 'universitas'
        ];

        $response = $this->_client->request('POST', 'pengguna',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function ubahData()
    {
        $tgl = $this->input->post('tgl');
        $tanggal = date('Y-m-d', strtotime($tgl));

        $data = [
            "NI" => $this->input->post('NI'),
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "tgl_lahir" => $tanggal,
            "alamat" => $this->input->post('alamat'),
            "hp" => $this->input->post('hp'),
            'id' => $this->input->post('id'),
            'rahasia' => 'universitas'
        ];

        $response = $this->_client->request('PUT', 'pengguna', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}