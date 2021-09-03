<?php

class Buku extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Buku_model');

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
        $data['judul'] = 'Buku | Perpustakaan';
        $data['buku'] = $this->Buku_model->getBuku();
        $this->load->view('api/perpustakaan/templates/header', $data);
        $this->load->view('api/perpustakaan/templates/navbar', $data);
        $this->load->view('api/perpustakaan/buku/index', $data);
        $this->load->view('api/perpustakaan/templates/footer', $data);
    }

    public function tambah()
    {
        $this->Buku_model->createBuku();

        redirect( base_url('buku') );
    }

    public function ubah()
    {
        $this->Buku_model->updateBuku();

        redirect( base_url('buku') );
    }

    public function hapus($id)
    {
        $this->Buku_model->deleteBuku($id);

        redirect( base_url('buku') );
    }

}
