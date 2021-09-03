<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load google library 
        $this->load->library('facebook');

        $this->load->model('Login_model');
        $this->load->helper('url');
        $this->load->helper('cookie');
    }

    public function index()
    {
        $google_client = new Google_Client();
        $google_client->setClientId('xxxx'); //Define your ClientID
        $google_client->setClientSecret('xxx'); //Define your Client Secret Key
        $google_client->setRedirectUri('xxx'); //Define your Redirect Uri
        $google_client->addScope('email');
        $google_client->addScope('profile');
        
        if($this->session->userdata('status') == 'login'){
            redirect('aplikasi');
        }else{           
            $login_button = '';
            $log_button = '';
            if(!$this->session->userdata('access_token'))
                {
                    $login_button = '<a href="'.$google_client->createAuthUrl().'" title="Login dengan google"><img src="assets\img\google.png" class="rounded float-start"></a>';

                    $log_button = '<a href="'.$google_client->createAuthUrl().'" title="Login dengan google"><img src="assets\gabung.png" class="rounded float-start"></a>';

                    $data['log_button'] = $log_button;

                    $data['login_button'] = $login_button;

                    $redirect_to = site_url('login/with_facebook');
                    $data['facebook_login_url'] = $this->facebook->create_auth_url($redirect_to);

                    $data['judul'] = 'Login | SSO';
                    $this->load->view('templates/header', $data);
                    $this->load->view('login/index', $data);
                    $this->load->view('templates/footer', $data);
                    
                }else
                {
                    redirect(base_url());
                }
            
        }
}

public function with_google()
{
    require "vendor/autoload.php";
    $google_client = new Google_Client();

    $google_client->setClientId('xxx'); //Define your ClientID

    $google_client->setClientSecret('xxx'); //Define your Client Secret Key

    $google_client->setRedirectUri('xxx'); //Define your Redirect Uri

    $google_client->addScope('email');

    $google_client->addScope('profile');

    if(isset($_GET["code"]))
    {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if(!isset($token["error"]))
        {
            $google_client->setAccessToken($token['access_token']);

            $this->session->set_userdata('access_token', $token['access_token']);

            $google_service = new Google_Service_Oauth2($google_client);

            $data = $google_service->userinfo->get();
            
            $where = $data['email'];
            $oauth_uid = $data['id'];
            $oauth_uid_fb = null;

            echo $oauth_uid;

            $cek = $this->Login_model->cek_login($where,$oauth_uid, $oauth_uid_fb);
            $muncul = $this->Login_model->log_login($where, $oauth_uid, $oauth_uid_fb);        

                if($cek > 0){
                    foreach ($muncul as $muncull) {
                        $data_session = array(
                            'nama' => $muncull['nama'],
                            'level' => $muncull['level'],
                            'email' => $where,
                            'NI' => $muncull['NI'],
                            'password' => $muncull['pass'],
                            'status' => "login"
                            );

                        $this->session->set_userdata($data_session);
                    }
                }     
                if(!$this->session->userdata('access_token'))
                {
                    redirect(base_url('aplikasi'));
                }
                else
                {
                    $this->session->set_flashdata('google', 'Akun google anda tidak terdaftar!');
                    $this->session->unset_userdata('access_token');
                    redirect(base_url('login'));
                } 
            
        }
    }
}


    public function with_facebook()
    {
        $code = $this->input->get('code');

        if ($code)
        {
            try {
                $helper = $this->facebook->create_helper();
                $access_token = $this->facebook->get_access_token();
                $this->facebook->set_access_token($access_token);
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                exit('Graph returned an error: ' . $e->getMessage());
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                exit('Facebook SDK returned an error: ' . $e->getMessage());
            }

            if (!isset($access_token)) {
                if ($helper->getError()) {
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Error: " . $helper->getError() . "\n";
                    echo "Error Code: " . $helper->getErrorCode() . "\n";
                    echo "Error Reason: " . $helper->getErrorReason() . "\n";
                    echo "Error Description: " . $helper->getErrorDescription() . "\n";
                } else {
                    header('HTTP/1.0 400 Bad Request');
                    echo 'Bad request';
                }
                exit;
            }

            $user = $this->facebook->get_user();
            $email = $user['email'];
            $oauth_uid_fb = $user['id'];
            $oauth_uid = null;

            $cek = $this->Login_model->cek_login($email,$oauth_uid, $oauth_uid_fb);
            $muncul = $this->Login_model->log_login($email,$oauth_uid, $oauth_uid_fb);        
    
            if($cek > 0){
                foreach ($muncul as $muncull) {
                    $data_session = array(
                        'nama' => $muncull['nama'],
                        'level' => $muncull['level'],
                        'email' => $email,
                        'NI' => $muncull['NI'],
                        'password' => $muncull['pass'],
                        'status' => "login"
                        );
    
                    $this->session->set_userdata($data_session);
                }
                redirect(base_url('aplikasi'));
            }
            else
            {
                $this->session->unset_userdata($access_token);
                $this->session->set_flashdata('fb', 'Akun facebook anda tidak terdaftar!');
                redirect('login');
            }
        
        }
        else
        {
            show_404();
        }
    }

    public function lupa_pass()
    {
        $data['judul'] = 'Lupa Password | SSO';
        $this->load->view('templates/header', $data);
        $this->load->view('login/lupa_pass', $data);
        $this->load->view('templates/footer', $data);
    }

    public function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

        $md5pass = md5($password);
        $where = null;
		$cek = $this->Login_model->cek_login($where, $oauth_uid, $oauth_uid_fb);
        $muncul = $this->Login_model->log_login($where, $oauth_uid, $oauth_uid_fb);        

		if($cek > 0){
            foreach ($muncul as $muncull) {
                $data_session = array(
                    'nama' => $muncull['nama'],
                    'level' => $muncull['level'],
                    'email' => $email,
                    'NI' => $muncull['NI'],
                    'password' => $md5pass,
                    'status' => "login"
                    );

                $this->session->set_userdata($data_session);
            }
			redirect(base_url('aplikasi'));

		}else{            
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
			redirect(base_url('login'));
		}
	}

	public function logout(){
        $data_session = array(
            'nama' => NULL,
            'level' => NULL,
            'email' => NULL,
            'password' => NULL,
            'status' => NULL
            );
            $this->session->unset_userdata('access_token');
            $this->session->unset_userdata('user_data');
		// Remove token and user data from the session
		$this->session->unset_userdata($data_session);
		// Destroy entire session data
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

    public function aplikasi()
    {
        $client = new Client();

        $data = [
            "email" => $this->input->post('email'),
            "pass" => $this->input->post('password'),
            'rahasia' => 'universitas'
        ];    

        $response = $client->request('POST', 'http://localhost/ta/akademik/api/pengguna/login',[
            'form_params' => $data
        ]);

        redirect('http://localhost/ta/akademik/std');
    }
}
