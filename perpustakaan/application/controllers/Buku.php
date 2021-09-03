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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'judul_buku' => $this->input->post('judul'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'th_terbit' => $this->input->post('tahun')
        ];
        $this->Buku_model->createBuku($data);

        redirect( base_url('buku') );
    }

    public function ubah()
    {
        $id = [
            'id' => $this->input->post('id')
        ];
        $data = [
            'judul_buku' => $this->input->post('judul'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'th_terbit' => $this->input->post('tahun')
        ];
        $this->Buku_model->ubah($data,$id);

        redirect( base_url('buku') );
    }

    public function hapus($id)
    {
        $where = [
            'id' => $id
        ];

        $this->Buku_model->hapus($where);

        redirect( base_url('buku') );
    }

}
