<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

class Login_model extends CI_Model
{
    private $_client;

	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/ta/akademik/api/pengguna/Pengguna'
        ]);
    }

    function cek_login($where, $oauth_uid, $oauth_uid_fb){	
        
        if ($where == null) {
            $data = [
                "email" => $this->input->post('email'),
                "pass" => MD5($this->input->post('password')),
                'rahasia' => 'universitas'
            ];    

            $response = $this->_client->request('POST', 'credential',[
                'form_params' => $data
            ]);
        }else {
            $data = [
                'email' => $where,
                'oauth_uid' => $oauth_uid ,
                'oauth_uid_fb' => $oauth_uid_fb ,
                'rahasia' => 'universitas'
            ]; 
            $response = $this->_client->request('POST', 'credential',[
                'form_params' => $data
            ]);
        }     

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
	}

    function log_login($where,$oauth_uid, $oauth_uid_fb){	
        
        if ($where == null) {
            $data = [
                "email" => $this->input->post('email'),
                "pass" => MD5($this->input->post('password')),
                'rahasia' => 'universitas'
            ];    

            $response = $this->_client->request('POST', 'log',[
                'form_params' => $data
            ]);
        }else {
            $data = [
                'email' => $where,
                'oauth_uid' => $oauth_uid ,
                'oauth_uid_fb' => $oauth_uid_fb ,
                'rahasia' => 'universitas'
            ]; 
            $response = $this->_client->request('POST', 'log',[
                'form_params' => $data
            ]);
        } 

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
	}
}