<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller{
    public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Agenda_model');

           
        }

        public function index()
        {
            if ($this->session->userdata('id_user_level') != "1") {
                ?>
                    <script type="text/javascript">
                        alert('Anda tidak berhak mengakses halaman ini!');
                        window.location='<?php echo base_url("Login/home"); ?>'
                    </script>
                <?php
                }

            $data['page'] = "Agenda";
			$data['list'] = $this->Agenda_model->tampil();
            $this->load->view('agenda/create', $data);
        }

        //menampilkan view create
        public function create()
        {
			$data['page'] = "Agenda";
            $this->load->view('agenda/create', $data);
        }

         //menambahkan data ke database
         public function store()
         {
            $data = [
				'id_user' => $this->input->post('id_user'),
				'nama_agenda' => $this->input->post('nama_agenda'),
				'tanggal' => $this->input->post('tanggal'),
				'jam' => $this->input->post('jam'),
				'tempat' => $this->input->post('tempat'),
				'leading_sector' => $this->input->post('leading_sector'),
				'disposisi' => $this->input->post('disposisi'),
				'keterangan' => $this->input->post('keterangan')
			];

            $this->form_validation->set_rules('id_user', 'id_user', 'required');
            $this->form_validation->set_rules('nama_agenda', 'nama_agenda', 'required');
			$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
			$this->form_validation->set_rules('jam', 'jam', 'required');
			$this->form_validation->set_rules('tempat', 'tempat', 'required');
			$this->form_validation->set_rules('leading_sector', 'leading_sector', 'required');
			$this->form_validation->set_rules('disposisi', 'disposisi', 'required');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

            if ($this->form_validation->run() != false) {
				$result = $this->Agenda_model->insert($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
					redirect('Agenda');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('Agenda/create');
				
			}
                

         }

         

        public function update($id)
        {
            // TODO: implementasi update data berdasarkan $id
            $id = $this->input->post('id');
            $data = array(
                'nama_agenda' => $this->input->post('nama_agenda'),
                'tanggal' => $this->input->post('tanggal'),
            );

            $this->Agenda_model->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('Agenda');
        }
    
        public function destroy($id)
        {
            $this->Agenda_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Agenda');
        }


        public function hasil1()
        {  
            $data = [
                'page' => "agenda1",
				'hasil'=> $this->Agenda_model->get_hasil1()
            ];
			
            $this->load->view('agenda/agenda1', $data);
        }


}