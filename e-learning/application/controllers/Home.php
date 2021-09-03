<?php

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        
    }

    function index()
    {
        if ($this->session->userdata("level") != "Mahasiswa") {
            $this->session->set_userdata('status') == "";
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
            redirect(base_url("login"));
        }
        $data['judul'] = 'Home | E-learning';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }

}
