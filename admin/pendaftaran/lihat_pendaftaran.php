<?php
include '../../config/koneksi.php';
include '../../include/function/general.php';

require_once('../../include/library/tcpdf/config/lang/eng.php');
require_once('../../include/library/tcpdf/tcpdf.php');

$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
if ($pg == '')
{
	header('Location: index.php');
}
elseif ($pg == 'form')
{
	$no = isset($_GET['no']) ? $_GET['no'] : '';
	if ($no == '')
	{
		header('Location: index.php');
	}
	$sql = "SELECT * 
		FROM formulir
		WHERE nomor_formulir = '$no'";
	//echo $sql;
	$Q 	= mysql_query($sql);
	//echo mysql_num_rows($Q);
	if (mysql_num_rows($Q) < 1)
	{
		header('Location: index.php');
		//echo 'tes';
	}
	
	// create new PDF document
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Bimbingan Belajar EOC');
	$pdf->SetTitle('Formulir Pendaftaran - '.$no);
	$pdf->SetSubject('Formulir');
	$pdf->SetKeywords('formulir, PDF, bimbel, pendaftaran, kursus');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	$pdf->setFooterData(array(0,64,0), array(0,64,128));

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}
	$pdf->setFontSubsetting(true);
	$pdf->AddPage();
	$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));	
	$pdf->SetFont('helvetica', 'B', 14, '', true);
	$row = mysql_fetch_assoc($Q);	
	list($tanggal, $jam) = explode(' ', $row['tanggal_daftar']);
	$pdf->Cell(0, 0, 'Formulir Pendaftaran / '.$no, 0, 1, 'C', 0, '', 0);
	$pdf->SetFont('helvetica', 'I', 8, '', true);
	$pdf->Cell(0, 0, 'Generated on '.tanggal_indonesia($tanggal).' '.$jam, 0, 1, 'C', 0, '', 0);
	$pdf->SetFont('helvetica', '', 12, '', true);
	$pdf->Cell(0, 0, '', 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Nama', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['nama'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Email', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['email'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Jenis Kelamin', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['jenis_kelamin'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Tempat / tanggal Lahir', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['kota_lahir'].', '.$row['tanggal_lahir'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Agama', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['agama'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Alamat', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->MultiCell(0, 4, $row['alamat'], 0, 'L', 1, 1, '', '', true);
	$pdf->Cell(50, 0, 'No. Telepon', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['tlp'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Asal Sekolah', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['sekolah'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Kelas', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['kelas'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Hobi', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['hobi'], 0, 1, '', 0, '', 0);	
	$pdf->Cell(50, 0, 'Cita-cita', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['cita'], 0, 1, '', 0, '', 0);	
	$pdf->Cell(50, 0, 'Nama Ayah', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['ayah'], 0, 1, '', 0, '', 0);	
	$pdf->Cell(50, 0, 'Pekerjaan Ayah', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['pekerjaanayah'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Nama Ibu', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['ibu'], 0, 1, '', 0, '', 0);
	$pdf->Cell(50, 0, 'Pekerjaan Ibu', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['pekerjaanibu'], 0, 1, '', 0, '', 0);	
	$program = array('Bimbel', 'Kursus B.Inggris', 'Kursus Komputer', 'Les Private');
	$program_diambil 	= str_split($row['kode_program']);
	
	$pdf->Cell(50, 0, 'Kode Program', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Cell(0, 0, $row['kode_program'], 0, 1, '', 0, '', 0);
	for ($i =0; $i<count($program_diambil); $i++)
	{
		if ($program_diambil[$i] == 1)
		{
			$pdf->Cell(50, 0, '', 0, 0, '', 0, '', 0);
			$pdf->Cell(4, 0, '', 0, 0, '', 0, '', 0);
			$pdf->Cell(0, 0, '- '.$program[$i], 0, 1, '', 0, '', 0);		
		}
	}
	$pdf->Cell(50, 0, 'Foto', 0, 0, '', 0, '', 0);
		$pdf->Cell(4, 0, ':', 0, 0, '', 0, '', 0);
		$pdf->Image('../../'.$row['foto'], '', '', 40, 50, '', '', '', false, 300, '', false, false, 1, false, false, false);
	$pdf->ln(60);
	$pdf->Cell(100, 0, '', 0, 0, 'R', 0, '', 0);
		$pdf->Cell(0, 0, tanggal_indonesia($tanggal).',', 0, 0, 'C', 0, '', 0);
	$pdf->ln(40);
	$pdf->SetFont('helvetica', 'UBI', 12, '', true);
	$pdf->Cell(100, 0, '', 0, 0, 'R', 0, '', 0);
		$pdf->Cell(0, 0, $row['nama'], 0, 0, 'C', 0, '', 0);
	$pdf->Output('Formulir-'.$no.'.pdf', 'I');
}