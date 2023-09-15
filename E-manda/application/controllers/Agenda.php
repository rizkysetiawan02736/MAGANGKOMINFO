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
			$data['page'] = "Hasil";
            $data['list'] = $this->Agenda_model->getdata();
            $this->load->view('agenda/create', $data);
        }

         //menambahkan data ke database
         public function store()
         {
            $data = [
				
				'nama_agenda' => $this->input->post('nama_agenda'),
				'tanggal' => $this->input->post('tanggal'),
				'jam' => $this->input->post('jam'),
				'tempat' => $this->input->post('tempat'),
				'leading_sector' => $this->input->post('leading_sector'),
				'keterangan' => $this->input->post('keterangan')
			];

            
            $this->form_validation->set_rules('nama_agenda', 'nama_agenda', 'required');
			$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
			$this->form_validation->set_rules('jam', 'jam', 'required');
			$this->form_validation->set_rules('tempat', 'tempat', 'required');
			$this->form_validation->set_rules('leading_sector', 'leading_sector', 'required');
			

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
				'page' => "Hasil",
                'data' => $Agenda
            ];
            $this->load->view('Agenda/show', $data);
        }


         public function edit($id_agenda)
        {
            $Agenda = $this->Agenda_model->show($id_agenda);
            $data = [
                'page' => "Hasil",
				'Agenda' => $Agenda
            ];
            $this->load->view('Agenda/edit', $data);
        }

         

         public function update($id_agenda)
        {
            // TODO: implementasi update data berdasarkan $id_agenda
            $id_agenda = $this->input->post('id_agenda');
            $data = array(
                'page' => "Hasil",		
				'nama_agenda' => $this->input->post('nama_agenda'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'tempat' => $this->input->post('tempat'),
                'leading_sector' => $this->input->post('leading_sector'),
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
            // $no_whatsapp=$_GET['no_whatsapp'];
            $cari=$this->Agenda_model->cari_user($nama)->result();
            echo json_encode($cari);
        }

        
    // public function hadir_pribadi($id_penugasan)
    // {
    //     $sql="UPDATE penugasan SET disposisi='Hadir Pribadi' WHERE id_penugasan=$id_penugasan";
    //     $this->db->query($sql);
    //     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">  Kehadiran telah berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //     redirect('tabelagenda');
    // }

    // public function diwakilkan($id_penugasan)
    // {
    //     $sql="UPDATE penugasan SET disposisi='Diwakilkan' WHERE id_penugasan=$id_penugasan";
    //     $this->db->query($sql);
    //     $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">  Kehadiran telah berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //     redirect('tabelagenda');
    // }

    public function tambah_penugasan()
         {
            $nama = $_POST["nama"];
			$no_whatsapp = $_POST["no_whatsapp"];
            $data = [
				'id_user' => $this->input->post('id_user'),
				'id_agenda' => $this->input->post('id_agenda'),
				// 'disposisi' => $this->input->post('disposisi')
			];

            $this->form_validation->set_rules('id_user', 'id_user', 'required');
            $this->form_validation->set_rules('id_agenda', 'id_agenda', 'required');

            $curl = curl_init();
		
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.fonnte.com/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'target' => $no_whatsapp,
					'message' => "Diberitahukan kepada saudara $nama bahwa ada agenda yang harus anda ikuti, buka aplikasi E-MANDA untuk mengisi daftar hadir agenda.",
					// 'url'=> $pdf,
					// 'filename'=> 'aa',
					'countryCode' => '62', //optional
				),
				CURLOPT_HTTPHEADER => array(
					'Authorization: 3HB!!3+uhZxBm7NmSR!f' //change TOKEN to your actual token
				),
			));
		
			$response = curl_exec($curl);
		
			curl_close($curl);
			

            if ($this->form_validation->run() != false) {
				$result = $this->Agenda_model->insert_penugasan($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dikirim!</div>');
					redirect('tabelagendaadmin');
				}
                if (isset($response)) 
			    {
			    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan berhasil dikirim!</div>');
                redirect('tabelagendaadmin');
			    }
                // else {
			    // 	// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesan gagal dikirim!</div>');
			    // 	redirect('tabelagendaadmin');
                
			    // }
			    } else {
			    	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dikirim!</div>');
			    	redirect('tabelagendaadmin');
                
			    } 

            
                

         }

         public function penugasan($id_agenda)
        {

            $Agenda = $this->Agenda_model->show($id_agenda);
            $data = [
				'page' => "Hasil",
                'list' => $this->Agenda_model->getdata(),
                'data' => $Agenda
            ];
            $this->load->view('Agenda/penugasan', $data);
        }


}