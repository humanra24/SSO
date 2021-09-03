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
}