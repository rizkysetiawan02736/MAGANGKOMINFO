<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('User_model');

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
        $data['page'] = "Send";
		$data['list'] = $this->User_model->tampil();
		$this->load->view('admin/send',$data);
	}

	public function cari(){
		$nama=$_GET['nama'];
		$cari=$this->User_model->cari_user($nama)->result();
		echo json_encode($cari);
	}

	public function send_notif()
	{

		if (isset($_POST["submit"])) 
		{
			$nama = $_POST["nama"];
			$no_whatsapp = $_POST["no_whatsapp"];
			$pdf = $_POST["file"];
		
		
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
					'message' => "Diberitahukan kepada saudara $nama untuk dapat menghadiri agenda sesuai jadwal berikut. $pdf",
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

			if (isset($response)) 
			{
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan berhasil dikirim!</div>');
            redirect('Send');
			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesan gagal dikirim!</div>');
				redirect('Send');

			}

		
		}


		
	}

	

	


}
