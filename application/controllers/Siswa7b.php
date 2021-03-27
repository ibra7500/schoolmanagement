<?php
require('./assets/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require('./assets/fpdf/fpdf.php');

class Siswa7b extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Siswa7b_Model');
		
	}

	function index() 
	{
		
		$data['judul'] = 'Daftar Siswa 7-B';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('siswa7b/index', $data);
		$this->load->view('admin/templates/footer');
	}

	function load_data()
	{
		$data = $this->Siswa7b_Model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			'nisn' => $this->input->post('nisn'),
			'id_kelas' => $this->input->post('id_kelas'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'ttl' => $this->input->post('ttl'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email')
			);
		$this->Siswa7b_Model->insert($data);
	}

	function update()
	{
		$data = array(
		$this->input->post('table_column') => $this->input->post('value')
		);

		$this->Siswa7b_Model->update($data, $this->input->post('nisn'));
	}

	function delete()
	{
		$this->Siswa7b_Model->delete($this->input->post('nisn'));
	}

	function chart()
	{
	  $data1['judul'] = 'Daftar Guru';
	  $data['hasil']=$this->Siswa7b_Model->graph();
	  $this->load->view('admin/templates/header', $data1);
	  $this->load->view('siswa7b/chart',$data);
	  $this->load->view('admin/templates/footer', $data1);
	}

	public function export_excel(){
		$user = $this->Siswa7b_Model->load_data();
 		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setLastModifiedBy('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NISN')
		->setCellValue('B1', 'ID Kelas')
		->setCellValue('C1', 'Nama Siswa')
		->setCellValue('D1', 'TTL')
		->setCellValue('E1', 'Jenis Kelamin')
		->setCellValue('F1', 'Alamat')
		->setCellValue('G1', 'No Telp')
		->setCellValue('H1', 'Email');
	

		$i=2; foreach($user as $user) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $user->nisn)
		->setCellValue('B'.$i, $user->id_kelas)
		->setCellValue('C'.$i, $user->nama_siswa)
		->setCellValue('D'.$i, $user->ttl)
		->setCellValue('E'.$i, $user->jk)
		->setCellValue('F'.$i, $user->alamat)
		->setCellValue('G'.$i, $user->no_telp)
		->setCellValue('H'.$i, $user->email);
		$i++;
	}

	$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

	$spreadsheet->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Laporan Data Siswa 7-B.xlsx"');
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
        $pdf->Cell(0,9,'Laporan Data Siswa Kelas 7-B',0,1,'C');
        $pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,8,'NISN',1,0,'C');
        $pdf->Cell(25,8,'ID Kelas',1,0,'C');
        $pdf->Cell(60,8,'Nama Siswa',1,0,'C');
        $pdf->Cell(50,8,'Tempat, Tanggal Lahir',1,0,'C');
        $pdf->Cell(30,8,'Jenis Kelamin',1,0,'C');
        $pdf->Cell(125,8,'Alamat',1,0,'C');
        $pdf->Cell(30,8,'Nomor Telpon',1,0,'C');
        $pdf->Cell(65,8,'Email',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $user = $this->Siswa7b_Model->load_data();
        foreach ($user as $row){
            $pdf->Cell(25,8,$row->nisn,1,0);
            $pdf->Cell(25,8,$row->id_kelas,1,0);
            $pdf->Cell(60,8,$row->nama_siswa,1,0);
            $pdf->Cell(50,8,$row->ttl,1,0);
            $pdf->Cell(30,8,$row->jk,1,0); 
            $pdf->Cell(125,8,$row->alamat,1,0); 
            $pdf->Cell(30,8,$row->no_telp,1,0);
            $pdf->Cell(65,8,$row->email,1,1);  
        }

        $pdf->Output();
    }

}