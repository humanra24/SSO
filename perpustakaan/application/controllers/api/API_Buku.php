<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class API_Buku extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
    }

    public function index_get()
    {
        $buku = $this->Buku_model->getBuku();

        if ($buku == true) {
            $this->response([
                'status' => true,
                'data' => $buku
            ], REST_Controller::HTTP_OK);
        }elseif ($buku == false) {
            $this->response([
                'status' => true,
                'data' => $buku
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

        $data = $this->Buku_model->deleteBuku($id);

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
            'judul_buku' => $this->post('judul'),
            'pengarang' => $this->post('pengarang'),
            'penerbit' => $this->post('penerbit'),
            'th_terbit' => $this->post('tahun')
        ];

        $data = $this->Buku_model->createBuku($data);
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
            'judul_buku' => $this->put('judul'),
            'pengarang' => $this->put('pengarang'),
            'penerbit' => $this->put('penerbit'),
            'th_terbit' => $this->put('tahun')
        ];

        if ($this->Buku_model->updateBuku($data, $id) > 0) {
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