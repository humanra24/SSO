<?php

class Home extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        if ($this->session->userdata('level') == "Admin") {
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
			redirect(base_url());
        }
    }

    public function index()
    {
        $data['judul'] = 'Home | Perpustakaan';
        $this->load->view('api/perpustakaan/templates/header', $data);
        $this->load->view('api/perpustakaan/templates/navbar', $data);
        $this->load->view('api/perpustakaan/home/index', $data);
        $this->load->view('api/perpustakaan/templates/footer', $data);
    }
}