<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller{
    public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Agenda_model');

           
        }

        public function index()
        {
            $data['page'] = "Agenda";
			$data['list'] = $this->Agenda_model->tampil();
            $this->load->view('agenda/tabelagendarencana', $data);
        }



        
    public function hadir_pribadi($id_agenda)
    {
        $sql="UPDATE agenda SET disposisi='Hadir Pribadi' WHERE id_agenda=$id_agenda";
        $this->db->query($sql);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">  Kehadiran telah berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('tabelagenda');
    }

    public function diwakilkan($id_agenda)
    {
        $sql="UPDATE agenda SET disposisi='Diwakilkan' WHERE id_agenda=$id_agenda";
        $this->db->query($sql);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">  Kehadiran telah berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('tabelagenda');
    }

  


}