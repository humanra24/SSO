<?php

class Matkul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matkul_model');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}elseif ($this->session->userdata('level') == "Pegawai") {
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
            redirect(base_url("login"));
        }elseif ($this->session->userdata('level') != "Admin") {
            redirect(base_url("aplikasi"));
        }
    }

    public function index()
    {
        $data['judul'] = "Matkul | SSO";
        $data['matkul'] = $this->Matkul_model->getMatkul();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('matkul/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $this->Matkul_model->deleteMatkul($id);
        $this->session->set_flashdata('flash', 'Username atau Password salah!');
        redirect(base_url('matkul'));
    }

    public function tambah()
    {        
        $this->Matkul_model->createMatkul();

        redirect(base_url('matkul'));
    }

    public function ubah()
    {
        $this->Matkul_model->updateMatkul();

        redirect(base_url('matkul'));
    }

}

