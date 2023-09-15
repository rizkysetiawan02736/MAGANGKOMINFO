<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penugasan_model extends CI_Model {


        public function tampil(){
            $this->db->select('*');  
            $this->db->from('penugasan');
            $this->db->join('agenda', 'penugasan.id_agenda=agenda.id_agenda');
            $this->db->join('user', 'penugasan.id_user=user.id_user');
            
            // $this->db->where('penugasan.id_user', $this->session->userdata('id_user'));
            // $this->db->where('tanggal >= NOW()');
            $this->db->order_by('tanggal ASC');
            return $this->db->get()->result();
        }

        public function tampil_bertugas($id_agenda){
            $this->db->select('*');  
            $this->db->from('penugasan');
            $this->db->join('user', 'penugasan.id_user=user.id_user');
            $this->db->where('id_agenda', $id_agenda);
            return $this->db->get()->result();
        }


        public function delete($id_penugasan)
        {
            $this->db->where('id_penugasan', $id_penugasan);
            $this->db->delete('penugasan');
        }
		
		
		
        

}
