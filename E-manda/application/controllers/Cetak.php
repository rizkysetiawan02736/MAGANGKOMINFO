<?php 
require 'vendor/autoload.php';
class Cetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');

    }

    function index()
    {
        
        $data['list'] = $this->Agenda_model->getAgendauser();
        $data['lust'] = $this->Agenda_model->tampil_tanggal();
        $data['lost'] = $this->Agenda_model->tampil_jabatan();
        // $data['last'] = $this->Agenda_model->getAgendaadmin();
        // $this->load->view('agenda/cetak',$data);
        $html = $this->load->view('agenda/cetak',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>10,
            'margin_right'=>10,
            'margin_left'=>10,
            'margin_bottom'=>10,
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        

        
    }

    function cetakAdmin()
    {
        $data['last'] = $this->Agenda_model->getAgendaadmin();
        $data['lost'] = $this->Agenda_model->tampil_jabatan();
        $html = $this->load->view('agenda/cetakadmin',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>10,
            'margin_right'=>10,
            'margin_left'=>10,
            'margin_bottom'=>10,
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        

        
    }

    public function hasil()
        {  
            $data['agenda_user'] = $this->Agenda_model->getAgendauser();
            $data = [
                'page' => "tabelagenda",
				'agenda_user'=> $this->Agenda_model->getAgendauser()
            ];
			
            $this->load->view('agenda/tabelagenda', $data);
        }


    public function hasiladmin()
        {  
            $data = [
                'page' => "tabelagendaadmin",
				'agenda_admin'=> $this->Agenda_model->getAgendaadmin()
            ];
			
            $this->load->view('agenda/tabelagendaadmin', $data);
        }

    
}