<?php

require('./assets/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require('./assets/fpdf/fpdf.php');

class Kelas extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Kelas_Model');
		
	}

	function index() 
	{
		
		$data['judul'] = 'Daftar Kelas';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('kelas/index', $data);
		$this->load->view('admin/templates/footer');
	}

	function load_data()
	{
		$data = $this->Kelas_Model->load_data();
		echo json_encode($data);
	}

	function chart()
	{
	  $data1['judul'] = 'Daftar Kelas';
	  $data['hasil']=$this->Kelas_Model->graph();
	  $this->load->view('admin/templates/header', $data1);
	  $this->load->view('kelas/chart',$data);
	  $this->load->view('admin/templates/footer', $data1);
	}
	public function export_excel(){
		$user = $this->Kelas_Model->load_data_laporan();
 		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setLastModifiedBy('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'ID Kelas')
		->setCellValue('B1', 'Kelas')
		->setCellValue('C1', 'Jumlah Siswa');
	

		$i=2; foreach($user as $user) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $user->id_kelas)
		->setCellValue('B'.$i, $user->kelas)
		->setCellValue('C'.$i, $user->total);
		$i++;
	}

	$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

	$spreadsheet->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Laporan Data Kelas.xlsx"');
	header('Cache-Control: max-age=0');
	header('Cache-Control: max-age=1');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: cache, must-revalidate');
	header('Pragma: public');

	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
	$writer->save('php://output');
	exit;
	}

	function export_pdf(){
        $pdf = new FPDF('l','mm','a4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,9,'Laporan Data Kelas',0,1,'C');
        $pdf->Cell(10,9,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(75,8,'ID Kelas',1,0,'C');
        $pdf->Cell(125,8,'Kelas',1,0,'C');
        $pdf->Cell(75,8,'Jumlah Siswa',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $user = $this->Kelas_Model->load_data_laporan();
        foreach ($user as $row){
            $pdf->Cell(75,8,$row->id_kelas,1,0,'C');
            $pdf->Cell(125,8,$row->kelas,1,0,'C');
            $pdf->Cell(75,8,$row->total,1,1,'C');

        }

        $pdf->Output();
    }
}