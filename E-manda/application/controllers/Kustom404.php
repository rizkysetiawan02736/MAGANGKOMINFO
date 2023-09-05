<?php
defined('BASEPATH') OR exit('Tidak ada akses skrip langsung yang diperbolehkan');

Class Kustom404 extends CI_Controller {

  function __construct()
    {
        parent::__construct();
         // load base_url
        $this->load->helper('url');
       

    }

  public function index(){
 
    $this->output->set_status_header('404'); 
    $this->load->view('error404/error404');
 
  }

}