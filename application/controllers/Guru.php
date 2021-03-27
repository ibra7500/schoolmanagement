<?php
require('./assets/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require('./assets/fpdf/fpdf.php');

class Guru extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Guru_Model');
		
	}

	function index() 
	{
		
		$data['judul'] = 'Daftar Guru';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('guru/index', $data)
;		$this->load->view('admin/templates/footer');
	}

	function load_data()
	{
		$data = $this->Guru_Model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			'nign' => $this->input->post('nign'),
			'nama_guru' => $this->input->post('nama_guru'),
			'ttl' => $this->input->post('ttl'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email')
			);
		$this->Guru_Model->insert($data);
	}

	function update()
	{
		$data = array(
		$this->input->post('table_column') => $this->input->post('value')
		);

		$this->Guru_Model->update($data, $this->input->post('nign'));
	}

	function delete()
	{
		$this->Guru_Model->delete($this->input->post('nign'));
	}

	public function export_excel(){
		$user = $this->Guru_Model->load_data();
 		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setLastModifiedBy('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NIGN')
		->setCellValue('B1', 'Nama Guru')
		->setCellValue('C1', 'TTL')
		->setCellValue('D1', 'Jenis Kelamin')
		->setCellValue('E1', 'Alamat')
		->setCellValue('F1', 'No Telp')
		->setCellValue('G1', 'Email');
	

		$i=2; foreach($user as $user) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $user->nign)
		->setCellValue('B'.$i, $user->nama_guru)
		->setCellValue('C'.$i, $user->ttl)
		->setCellValue('D'.$i, $user->jk)
		->setCellValue('E'.$i, $user->alamat)
		->setCellValue('F'.$i, $user->no_telp)
		->setCellValue('G'.$i, $user->email);
		$i++;
	}

	$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

	$spreadsheet->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Laporan Data Guru.xlsx"');
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
        $pdf = new FPDF('l','mm','A3');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,9,'Laporan Data Guru',0,1,'C');
        $pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,8,'NIGN',1,0,'C');
        $pdf->Cell(85,8,'Nama Guru',1,0,'C');
        $pdf->Cell(45,8,'Tempat, Tanggal Lahir',1,0,'C');
        $pdf->Cell(30,8,'Jenis Kelamin',1,0,'C');
        $pdf->Cell(125,8,'Alamat',1,0,'C');
        $pdf->Cell(30,8,'Nomor Telpon',1,0,'C');
        $pdf->Cell(65,8,'Email',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $user = $this->Guru_Model->load_data();
        foreach ($user as $row){
            $pdf->Cell(25,8,$row->nign,1,0);
            $pdf->Cell(85,8,$row->nama_guru,1,0);
            $pdf->Cell(45,8,$row->ttl,1,0);
            $pdf->Cell(30,8,$row->jk,1,0); 
            $pdf->Cell(125,8,$row->alamat,1,0); 
            $pdf->Cell(30,8,$row->no_telp,1,0);
            $pdf->Cell(65,8,$row->email,1,1);  
        }
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(0,9,'Laporan Data Guru',0,1,'C');
        $pdf->Output();
    }

	function chart()
	{
	  $data1['judul'] = 'Daftar Guru';
	  $data['hasil']=$this->Guru_Model->graph();
	  $this->load->view('admin/templates/header', $data1);
	  $this->load->view('guru/chart',$data);
	  $this->load->view('admin/templates/footer', $data1);
	}
}