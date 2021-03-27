<?php
require('./assets/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require('./assets/fpdf/fpdf.php');

class Matpel extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Matpel_Model');
		
	}

	function index() 
	{
		
		$data['judul'] = 'Daftar Mata Pelajaran';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('matpel/index', $data);
		$this->load->view('admin/templates/footer');
	}

	function load_data()
	{
		$data = $this->Matpel_Model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			'id_matpel' => $this->input->post('id_matpel'),
			'nama_matpel' => $this->input->post('nama_matpel'),
			'nign' => $this->input->post('nign')
			);
		$this->Matpel_Model->insert($data);
	}

	function update()
	{
		$data = array(
		$this->input->post('table_column') => $this->input->post('value')
		);

		$this->Matpel_Model->update($data, $this->input->post('id_matpel'));
	}

	function delete()
	{
		$this->Matpel_Model->delete($this->input->post('id_matpel'));
	}

	public function export_excel(){
		$user = $this->Matpel_Model->load_data_laporan();
 		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setLastModifiedBy('Mohammad Rahadyan Ibrahim - Tugas Besar 2')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'ID Matpel')
		->setCellValue('B1', 'Nama Mata Pelajaran')
		->setCellValue('C1', 'Pengajar');
	

		$i=2; foreach($user as $user) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $user->id_matpel)
		->setCellValue('B'.$i, $user->nama_matpel)
		->setCellValue('C'.$i, $user->nama_guru);
		$i++;
	}

	$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

	$spreadsheet->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Laporan Data Mata Pelajaran.xlsx"');
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
        $pdf = new FPDF('l','mm',array(100,340));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,9,'Laporan Data Mata Pelajaran',0,1,'C');
        $pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,8,'ID Mata Pelajaran',1,0);
        $pdf->Cell(125,8,'Nama Mata Pelajaran',1,0);
        $pdf->Cell(125,8,'Pengajar',1,1);
        $pdf->SetFont('Arial','',10);
        $user = $this->Matpel_Model->load_data_laporan();
        foreach ($user as $row){
            $pdf->Cell(35,8,$row->id_matpel,1,0);
            $pdf->Cell(125,8,$row->nama_matpel,1,0);
            $pdf->Cell(125,8,$row->nama_guru,1,1);

        }

        $pdf->Output();
    }

}