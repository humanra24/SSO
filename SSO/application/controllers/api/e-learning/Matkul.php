<?php

class Matkul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matkul_model');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

    public function index()
    {
        
        $data['judul'] = "Matkul | E-learning";
        $data['matkul'] = $this->Matkul_model->getMatkul();

        $this->load->view('api/e-learning/templates/header', $data);
        $this->load->view('api/e-learning/templates/navbar', $data);
        $this->load->view('api/e-learning/matkul/index', $data);
        $this->load->view('api/e-learning/templates/footer', $data);
    }
}

