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
        $data['list'] = $this->Agenda_model->tampil_gabungan();
        $data['lust'] = $this->Agenda_model->tampil_tanggal();
        $data['lost'] = $this->Agenda_model->tampil_jabatan();
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

    
}