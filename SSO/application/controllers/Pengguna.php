<?php

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}elseif ($this->session->userdata('level') == "Pegawai") {
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
            redirect(base_url("login"));
        }elseif ($this->session->userdata('level') != "Admin") {
            redirect(base_url("aplikasi"));
        }
    }

    public function index($pengguna)
    {
        $data['judul'] = 'Pengguna | SSO';
        $data['level'] = $pengguna;
        
        if ($pengguna == "Pegawai" || $pengguna == "Mahasiswa" ) {
            // $where = array(
            //     'level' => $pengguna
            //     );
            $id = null;
            $data['pengguna'] = $this->Pengguna_model->ambilData($pengguna, $id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pengguna/index', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function hapus($id)
    {
        $pengguna = null;
        $data = $this->Pengguna_model->ambilData($pengguna, $id);
        $this->Pengguna_model->hapusData($id); 
        
        $this->session->set_flashdata('flash', 'Username atau Password salah!');
        
        foreach ($data as $dataa) {
        redirect(base_url('pengguna/index/'.$dataa['level']));
        }
    }

    public function tambah()
    {
        $level = $this->input->post('level');

        $this->Pengguna_model->tambahData();

        redirect(base_url('pengguna/index/'.$level));
    }

    public function ubah()
    {    
        $level = $this->input->post('level');
        $this->Pengguna_model->ubahData();

        redirect(base_url('pengguna/index/'.$level));
        
    }

}

