<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Agenda_model extends CI_Model {
		
		
		
        public function insert($data = [])
        {
            $result=$this->db->insert('agenda', $data);
            return $result;
    
        }

        public function tampil()
        {
            $query = $this->db->get('agenda');
            return $query->result();
        }

        public function tampil_tanggal()
        {
            $this->db->where('agenda.id_user', $this->session->userdata('id_user'));
            $this->db->select_min('tanggal');
            $this->db->where('tanggal >= NOW()');
            return $this->db->get('agenda')->result();
        }

        public function tampil_jabatan()
        {
            $this->db->where('user.id_user', $this->session->userdata('id_user'));
            return $this->db->get('user')->result();
            

        }

        public function tampil_gabungan()
        {
            // $query = $this->db->get('applicant_job where close_date >= NOW()');
            $query = $this->db->query('SELECT * FROM agenda join user WHERE agenda.id_user=user.id_user AND tanggal >= NOW()');
            // $query = $this->db->query('SELECT DISTINCT tanggal, nama_agenda, tempat, leading_sector, disposisi, keterangan, jabatan FROM agenda inner join user on agenda.id_user=user.id_user');
            return $query->result();
        }

        public function update($id_agenda, $data = [])
        {
            $ubah = array(
                'id_user'  => $data['id_user'],
                'nama_agenda' => $data['nama_agenda'],
                'tanggal'  => $data['tanggal'],
                'jam'  => $data['jam'],
                'tempat'  => $data['tempat'],
                'leading_sector'  => $data['leading_sector'],
                'disposisi'  => $data['disposisi'],
                'keterangan'  => $data['keterangan']
                
            );

            $this->db->where('id_agenda', $id_agenda);
            $this->db->update('agenda', $ubah);
        }

        public function delete($id_agenda)
        {
            $this->db->where('id_agenda', $id_agenda);
            $this->db->delete('agenda');
        }

        // public function get_hasil()
        // {   
		// 	$query = $this->db->query('SELECT DISTINCT tanggal FROM agenda WHERE tanggal >= NOW()');
        //     return $query->result();
        // }

        // public function getAgendauser(){
        //     $this->db->where('agenda.id_user', $this->session->userdata('id_user'));
        //     return $this->db->get('agenda')->result();
        // }
        
        public function getAgendauser(){
            $this->db->where('agenda.id_user', $this->session->userdata('id_user'));
            $this->db->where('tanggal >= NOW()');
            return $this->db->get('agenda')->result();
        }

        public function getAgendaadmin()
        {
            $query = $this->db->query('SELECT * FROM agenda');
            return $query->result();
        }

        public function show($id_agenda)
        {
            $this->db->where('id_agenda', $id_agenda);
            $query = $this->db->get('agenda');
            return $query->row();
        }

        function getdata()
    {
        $query = $this->db->query("SELECT nama FROM user ORDER BY id_user");

        return $query->result();
    }

    public function cari_user($id_user)
        {
            $query=$this->db->get_where('user',array('nama'=>$id_user));
            return $query;
        }
}
