<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('User_model');
    }
    public function index()
    {
        if($this->Login_model->logged_id())
		{
			redirect('dashboard');
		}else{
		$this->load->view('login/login');
		}
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordx = md5($password);
        $set = $this->Login_model->login($username, $passwordx);
        if($set)
        { 
            $log = [
                'id_user' => $set->id_user,
                'username' => $set->username,
                'id_user_level' => $set->id_user_level,
                'status' => 'Logged'
            ];
            $this->session->set_userdata($log);            
            redirect('dashboard');
          
        }
        else
        {
            $this->session->set_flashdata('message', 'Username atau Password Salah');
            redirect('masuk');
        }
        
    }

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('masuk');
    }

    public function home()
    { 
        $data['page'] = "Dashboard";
		$this->load->view('admin/index', $data);
    }

    public function logiin()
	{
		$this->load->view('login/login');
    }
}

/* End of file Login.php */
?>
