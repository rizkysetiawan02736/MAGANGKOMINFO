<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penugasan extends CI_Controller{
    public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Penugasan_model');

           
        }

        public function index()
        {
            $data['page'] = "Penugasan";
			$data['list'] = $this->Penugasan_model->tampil();
            $this->load->view('penugasan/tabelpenugasan', $data);
        }

        public function bertugas($id_agenda)
        {
            $data['page'] = "Agenda";
			$data['lust'] = $this->Penugasan_model->tampil_bertugas($id_agenda);
            $this->load->view('agenda/bertugas', $data);
        }


        public function destroy($id_penugasan)
        {
            $this->Penugasan_model->delete($id_penugasan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('tabelpenugasan');
        }

  


}