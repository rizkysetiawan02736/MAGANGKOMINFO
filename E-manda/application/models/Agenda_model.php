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
            $query = $this->db->query('SELECT DISTINCT tanggal FROM agenda where tanggal >= NOW()');
            return $query->result();
        }

        public function tampil_jabatan()
        {
            $query = $this->db->query('SELECT DISTINCT user.jabatan FROM user inner join agenda on user.id_user=agenda.id_user');
            return $query->result();
        }

        public function tampil_gabungan()
        {
            // $query = $this->db->get('applicant_job where close_date >= NOW()');
            $query = $this->db->query('SELECT * FROM agenda join user WHERE agenda.id_user=user.id_user AND tanggal >= NOW()');
            // $query = $this->db->query('SELECT DISTINCT tanggal, nama_agenda, tempat, leading_sector, disposisi, keterangan, jabatan FROM agenda inner join user on agenda.id_user=user.id_user');
            return $query->result();
        }

        public function update($id, $data = [])
        {
            $ubah = array(
                'nama_agenda' => $data['nama_agenda'],
                'tanggal'  => $data['tanggal']
            );

            $this->db->where('id', $id);
            $this->db->update('agenda', $ubah);
        }

        public function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('agenda');
        }

        public function get_hasil1()
        {
			$query = $this->db->query('SELECT * FROM agenda WHERE tanggal >= NOW()');
            return $query->result();
        }
}
