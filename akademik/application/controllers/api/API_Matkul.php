<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class API_Matkul extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Matkul_model');
    }

    public function index_get()
    {
        $matkul = $this->Matkul_model->getMatkul();

        if ($matkul == true) {
            $this->response([
                'status' => true,
                'data' => $matkul
            ], REST_Controller::HTTP_OK);
        }elseif ($matkul == false) {
            $this->response([
                'status' => true,
                'data' => $matkul
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

        $data = $this->Matkul_model->deleteMatkul($id);

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
            "kd_mk" => $this->post('kd_mk'),
            "nama_mk" => $this->post('nama_mk'),
            "sks" => $this->post('sks'),
            "prodi" => $this->post('prodi')
        ];
        $data = $this->Matkul_model->createMatkul($data);
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
            "kd_mk" => $this->put('kd_mk'),
            "nama_mk" => $this->put('nama_mk'),
            "sks" => $this->put('sks'),
            "prodi" => $this->put('prodi')
        ];

        if ($this->Matkul_model->updateMatkul($data, $id) > 0) {
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
}