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
        $data['matkul'] = $this->Matkul_model->ambilData("tb_matkul")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('matkul/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $where = array(
			'id' => $id
			);
        $this->Matkul_model->hapusData("tb_matkul",$where);
        $this->session->set_flashdata('flash', 'Username atau Password salah!');
        redirect(base_url('matkul'));
    }

    public function tambah()
    {        
        $data = [
            "kd_mk" => $this->input->post('kd'),
            "nama_mk" => $this->input->post('nama'),
            "sks" => $this->input->post('sks'),
            "prodi" => $this->input->post('prodi')
        ];

        $this->Matkul_model->tambahData("tb_matkul",$data);

        redirect(base_url('matkul'));
    }

    public function ubah()
    {
        $where = [
            'id' => $this->input->post('id')
        ];

        $data = [
            "kd_mk" => $this->input->post('kd'),
            "nama_mk" => $this->input->post('nama'),
            "sks" => $this->input->post('sks'),
            "prodi" => $this->input->post('prodi')
        ];

        $this->Matkul_model->ubahData("tb_matkul",$data,$where);

        redirect(base_url('matkul'));
    }

}

