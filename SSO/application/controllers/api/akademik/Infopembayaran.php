<?php

class Infopembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "Mahasiswa") {
            redirect(base_url("login"));
        }
    }

    function index()
    {
        $data['judul'] = 'Pembayaran | Akademik';
        $this->load->view('api/akademik/templates/header', $data);
        $this->load->view('api/akademik/templates/navbar', $data);
        $this->load->view('api/akademik/infopembayaran/index', $data);
        $this->load->view('api/akademik/templates/footer', $data);
    }

}
