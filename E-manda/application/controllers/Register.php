<?php

class Register extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->model('User_model');

        
        }
    
		public function index()
	{
        $data['page'] = "Register";
		$this->load->view('login/register', $data);
	}

    public function create()
        {
            $data['page'] = "Register";
			$data['user_level'] = $this->User_model->user_level();
            $this->load->view('login/register',$data);
        }

    public function store()
        {
            
			$data = [
				'id_user_level' => $this->input->post('privilege'),
				'nama' => strtoupper($this->input->post('nama')),
				'jabatan' => strtoupper($this->input->post('jabatan')),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'no_whatsapp' => $this->input->post('no_whatsapp'),
				'password' => md5($this->input->post('password'))
			];
			
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('privilege', 'id_user_level', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');	
			$this->form_validation->set_rules('no_whatsapp', 'no_whatsapp', 'required');		
			$this->form_validation->set_rules('jabatan', 'jabatan', 'required');		
			$this->form_validation->set_rules('nama', 'nama', 'required');		

			if ($this->form_validation->run() != false) {
				$result = $this->User_model->insert($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
					redirect('daftar');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('daftar');
				
			}
            

        }
	
}