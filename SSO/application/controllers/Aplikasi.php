<?php

class Aplikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}elseif ($this->session->userdata('level') == "Pegawai") {
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
            redirect(base_url("login"));
        } elseif ($this->session->userdata('level') == "Admin") {
            redirect(base_url("pengguna/index/Mahasiswa"));
        }
    }

    function index()
    {
        $data['judul'] = 'Aplikasi | SSO';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('aplikasi/index', $data);
        $this->load->view('templates/footer', $data);
    }

}
