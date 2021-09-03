<?php

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    function index()
    {
		if($this->session->userdata('status') == "login"){
			redirect(base_url("home"));
		}
        $data['judul'] = 'Login | E-learning';
        $this->load->view('templates/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('templates/footer', $data);
    }

    function lupa_pass()
    {
        $data['judul'] = 'Lupa Password | Akademik';
        $this->load->view('templates/header', $data);
        $this->load->view('login/lupa_pass', $data);
        $this->load->view('templates/footer', $data);
    }

    function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'pass' => md5($password)
			);
		$cek = $this->Login_model->cek_login("tb_pengguna",$where)->num_rows();
        $muncul = $this->Login_model->cek_login("tb_pengguna",$where)->row_array();        

		if($cek > 0){

			$data_session = array(
				'nama' => $muncul['nama'],
                'level' => $muncul['level'],
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url('home'));

		}else{            
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
			redirect(base_url());
		}
	}

    function aksi_login_fb(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'pass' => $password
			);
		$cek = $this->Login_model->cek_login("tb_pengguna",$where)->num_rows();
        $muncul = $this->Login_model->cek_login("tb_pengguna",$where)->row_array();        

		if($cek > 0){

			$data_session = array(
				'nama' => $muncul['nama'],
                'level' => $muncul['level'],
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url('home'));

		}else{            
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
			redirect(base_url());
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
