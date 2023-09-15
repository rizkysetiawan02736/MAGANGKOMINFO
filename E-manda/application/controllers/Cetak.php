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
        
        $data['list'] = $this->Agenda_model->getPenugasanxAgenda();
        $data['lust'] = $this->Agenda_model->getPenugasanxAgenda();
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

    // public function hasil()
    //     {  
           
    //         $data = [
    //             'page' => "tabelagenda",
	// 			'agenda_user'=> $this->Agenda_model->getAgendauser()
    //         ];
			
    //         $this->load->view('agenda/tabelagendarencana', $data);
    //     }


    public function hasil()
        {  
           
            $data = [
                'page' => "Hasil",
				'agenda_user'=> $this->Agenda_model->getPenugasanxAgenda()
            ];
			
            $this->load->view('agenda/tabelagendarencana', $data);
        }


    public function hasiladmin()
        {  
            $data = [
                'page' => "Hasil",
				'agenda_admin'=> $this->Agenda_model->getAgendaadmin()
            ];
			
            $this->load->view('agenda/tabelagendaadmin', $data);
        }

    public function cetak_excel(){
        $data['list'] = $this->Agenda_model->getAgendaadmin();

        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rizky Setiawan");
        $object->getProperties()->setLastModifiedBy("Kominfo");
        $object->getProperties()->setTitle("E-manda");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1','No');
        $object->getActiveSheet()->setCellValue('B1','Tanggal');
        $object->getActiveSheet()->setCellValue('C1','Jam');
        $object->getActiveSheet()->setCellValue('D1','Agenda');
        $object->getActiveSheet()->setCellValue('E1','Tempat');
        $object->getActiveSheet()->setCellValue('F1','Leading Sector');
        $object->getActiveSheet()->setCellValue('G1','Keterangan');

        $baris = 2;
        $no = 1;

        foreach ($data['list'] as $agd){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $agd->tanggal);
            $object->getActiveSheet()->setCellValue('C'.$baris, $agd->jam);
            $object->getActiveSheet()->setCellValue('D'.$baris, $agd->nama_agenda);
            $object->getActiveSheet()->setCellValue('E'.$baris, $agd->tempat);
            $object->getActiveSheet()->setCellValue('F'.$baris, $agd->leading_sector);
            $object->getActiveSheet()->setCellValue('G'.$baris, $agd->keterangan);

            $baris++;
        }

        $filename="Data_Agenda".'.xlsx';

        $object->getActiveSheet()->setTitle("Data Agenda");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');

        exit;

    }

    
}