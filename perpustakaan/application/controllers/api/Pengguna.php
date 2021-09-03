<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengguna extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
    }

    public function index_get()
    {
	$id = $this->get('id');
        $level = $this->get('level');
        $pengguna = $this->Pengguna_model->getPengguna($level,$id);

        if ($pengguna == true) {
            $this->response([
                'status' => true,
                'data' => $pengguna
            ], REST_Controller::HTTP_OK);
        }elseif ($pengguna == false) {
            $this->response([
                'status' => true,
                'data' => $pengguna
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        $data = $this->Pengguna_model->deletePengguna($id);

        if ($id == null ) {
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($data > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'data' => $data,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status' => falsee,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    
    public function index_post()
    {
        $data = [
            "NI" => $this->post('NI'),
            "nama" => $this->post('nama'),
            "email" => $this->post('email'),
            "pass" => MD5($this->post('pass')),
            "tgl_lahir" => $this->post('tgl_lahir'),
            "alamat" => $this->post('alamat'),
            "no_telp" => $this->post('no_telp'),
            "level" => $this->post('level')
        ];
        $data = $this->Pengguna_model->createPengguna($data);
        if ($data > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'new mahasiswa has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            "NI" => $this->put('NI'),
            "nama" => $this->put('nama'),
            "email" => $this->put('email'),
            "pass" => MD5($this->put('pass')),
            "tgl_lahir" => $this->put('tgl_lahir'),
            "alamat" => $this->put('alamat'),
            "no_telp" => $this->put('hp')
        ];

        if ($this->Pengguna_model->updatePengguna($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been updated'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function credential_post()
    {
        $email = $this->post('email');
        $pass = $this->post('pass');

        $data = $this->Pengguna_model->credentialPengguna($email, $pass);
        if ($data > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'mahasiswa ada'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
		'data' => $data,
                'message' => 'mahasiswa ga ada'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function log_post()
    {
  
        $email = $this->post('email');
        $pass = $this->post('pass');
        
        $data = $this->Pengguna_model->logPengguna($email, $pass);
        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'log mahasiswa'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
		'data' => $data,
                'message' => 'log mahasiswa ga ada'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function aplikasi_post()
    {
        $email = $this->post('email');
        $pass = $this->post('pass');

        $data = $this->Pengguna_model->credentialPengguna($email, $pass);
	$dataa = $this->Pengguna_model->logPengguna($email, $pass);
        if ($data > 0) {
		foreach ($dataa as $muncull) {
                        $data_session = array(
                            'nama' => $muncull['nama'],
                            'level' => $muncull['level'],
                            'email' => $email,
                            'NI' => $muncull['NI'],
                            'password' => $muncull['pass'],
                            'status' => "login"
                            );

                        $this->session->set_userdata($data_session);
                    }
            redirect('home');
        }else{
            $this->response([
                'status' => false,
		'data' => $data,
                'message' => 'mahasiswa ga ada'
            ], REST_Controller::HTTP_OK);
        }
    }
	
    public function login_post()
    {

        $email = $this->post('email');
        $pass = $this->post('pass');
        
        $info = $this->Pengguna_model->credentialPengguna($email, $pass);
        $data = $this->Pengguna_model->logPengguna($email, $pass);
        if ($info > 0) {
                foreach ($data as $dataa) {
                $data_session = array(
                    'nama' => $dataa['nama'],
                    'level' => $dataa['level'],
                    'status' => "login"
                    );
    
                $this->session->set_userdata($data_session);
                }
                redirect(base_url('home'));
    
            }
        
    }
}