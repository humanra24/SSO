<?php

class Coba extends CI_Controller
{

    function index()
    {
        $data['judul'] = 'Coba | SSO';
        $data['matkul'] = $this->Buku_model->getBuku1();
        $this->load->view('coba/index', $data);
    }

}
