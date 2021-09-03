<?php

class A_Matkul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matkul_model');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        if ($this->session->userdata('level') != "Mahasiswa") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['judul'] = "Matkul | Akademik";
        $data['matkul'] = $this->Matkul_model->getMatkul();

        $this->load->view('api/akademik/templates/header', $data);
        $this->load->view('api/akademik/templates/navbar', $data);
        $this->load->view('api/akademik/matkul/index', $data);
        $this->load->view('api/akademik/templates/footer', $data);
    }
}