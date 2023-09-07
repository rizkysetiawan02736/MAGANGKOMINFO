<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller{
    public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Agenda_model');

            if ($this->session->userdata('id_user_level') != "1") {
                ?>
                    <script type="text/javascript">
                        
                        window.location="<?php echo base_url(); ?>404_override"
                    </script>
                <?php
                }

           
        }

        public function index()
        {
            $data['page'] = "Agenda";
			$data['list'] = $this->Agenda_model->tampil();
            $this->load->view('agenda/create', $data);
        }


        

        //menampilkan view create
        public function create()
        {
			$data['page'] = "Agenda";
            $data['list'] = $this->Agenda_model->getdata();
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
					redirect('tambahagenda');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('tambahagenda');
				
			}
                

         }

         public function show($id_agenda)
        {
            $Agenda = $this->Agenda_model->show($id_agenda);
            $data = [
				'page' => "Agenda",
                'data' => $Agenda
            ];
            $this->load->view('Agenda/show', $data);
        }


         public function edit($id_agenda)
        {
            $Agenda = $this->Agenda_model->show($id_agenda);
            $data = [
                'page' => "Agenda",
				'Agenda' => $Agenda
            ];
            $this->load->view('Agenda/edit', $data);
        }

         

         public function update($id_agenda)
        {
            // TODO: implementasi update data berdasarkan $id_user
            $id_user = $this->input->post('id_agenda');
            $data = array(
                'page' => "Agenda",
				'id_user' => $this->input->post('id_user'),
				'nama_agenda' => $this->input->post('nama_agenda'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'tempat' => $this->input->post('tempat'),
                'leading_sector' => $this->input->post('leading_sector'),
                'disposisi' => $this->input->post('disposisi'),
                'keterangan' => $this->input->post('keterangan')
            );

            $this->Agenda_model->update($id_agenda, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('tabelagendaadmin');
        }
    
        public function destroy($id_agenda)
        {
            $this->Agenda_model->delete($id_agenda);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('tabelagendaadmin');
        }

        public function cari(){
            $nama=$_GET['nama'];
            $cari=$this->Agenda_model->cari_user($nama)->result();
            echo json_encode($cari);
        }


}