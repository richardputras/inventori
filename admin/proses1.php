<?php
// Load file koneksi.php
include "../koneksi.php";

// Load plugin PHPExcel nya
include "../libraries/PHPExcel/PHPExcel.php";

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal file excel
$excel->getProperties()->setCreator('My Notes Code')
					   ->setLastModifiedBy('My Notes Code')
					   ->setTitle("Data Karyawan")
					   ->setSubject("Karyawan")
					   ->setDescription("Laporan Semua Data Karyawan")
					   ->setKeywords("Data Karyawan");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

$query = "SELECT * FROM karyawan k INNER JOIN jabatan j ON k.id_jabatan = j.id_jabatan INNER JOIN provinsi p ON k.provinsi = p.id_prov INNER JOIN kabupaten kb ON k.kabupaten = kb.id_kab INNER JOIN kecamatan kc ON k.kecamatan = kc.id_kec ORDER BY tgl_masuk";

$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->setCellValue('A1', "DATA KARYAWAN"); // Set kolom A1 dengan tulisan "DATA KARYAWAN"
$excel->getActiveSheet()->mergeCells('A1:V1'); // Set Merge Cell pada kolom A1 sampai V1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1

// Buat header tabel nya pada baris ke 4
$excel->getActiveSheet()->setCellValue('A4', "Nomor"); 
$excel->getActiveSheet()->setCellValue('B4', "NIP");
$excel->getActiveSheet()->setCellValue('C4', "NIK"); 
$excel->getActiveSheet()->setCellValue('D4', "Nama Lengkap"); 
$excel->getActiveSheet()->setCellValue('E4', "Jenis Kelamin");
$excel->getActiveSheet()->setCellValue('F4', "Tempat/Tgl Lahir");
$excel->getActiveSheet()->setCellValue('G4', "Email Pribadi");
$excel->getActiveSheet()->setCellValue('H4', "Email Kantor");
$excel->getActiveSheet()->setCellValue('I4', "Nomor HP Pribadi");
$excel->getActiveSheet()->setCellValue('J4', "Nomor HP Kantor");
$excel->getActiveSheet()->setCellValue('K4', "Alamat(Sesuai KTP)");
$excel->getActiveSheet()->setCellValue('L4', "RT/RW");
$excel->getActiveSheet()->setCellValue('M4', "Kodepos");
$excel->getActiveSheet()->setCellValue('N4', "Provinsi");
$excel->getActiveSheet()->setCellValue('O4', "Kabupaten/Kota");
$excel->getActiveSheet()->setCellValue('P4', "Kecamatan");
$excel->getActiveSheet()->setCellValue('Q4', "Alamat Alternatif");
$excel->getActiveSheet()->setCellValue('R4', "Status");
$excel->getActiveSheet()->setCellValue('S4', "Jumlah Anak");
$excel->getActiveSheet()->setCellValue('T4', "Jabatan");
$excel->getActiveSheet()->setCellValue('U4', "Status Kerja");
$excel->getActiveSheet()->setCellValue('V4', "Tanggal Masuk");

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('N4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('O4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('P4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Q4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('R4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('S4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('T4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('U4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('V4')->applyFromArray($style_col);

// Set height baris ke 1, 2, 3 dst
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('10')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('12')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('13')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('14')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('15')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('16')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('17')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('18')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('19')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('20')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('21')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('22')->setRowHeight(20);

$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $tgllahir = date('d-m-Y', strtotime($data['tgl_lahir'])); // Ubah format tanggal jadi dd-mm-yyyy
	$tglmsk = date('d-m-Y', strtotime($data['tgl_masuk'])); // Ubah format tanggal jadi dd-mm-yyyy

	$excel->getActiveSheet()->setCellValue('A'.$numrow, $no);
	$excel->getActiveSheet()->setCellValue('B'.$numrow, $data['nip']);
	$excel->getActiveSheet()->setCellValue('C'.$numrow, $data['nik']);
	$excel->getActiveSheet()->setCellValue('D'.$numrow, $data['nama_depan'] ." ". $data['nama_tengah']  ." ". $data['nama_belakang']);
	$excel->getActiveSheet()->setCellValue('E'.$numrow, $data['jenis_kelamin']);
	$excel->getActiveSheet()->setCellValue('F'.$numrow, $data['tempat_lahir'] ." / ". $tgllahir);
	$excel->getActiveSheet()->setCellValue('G'.$numrow, $data['email_pribadi']);
	$excel->getActiveSheet()->setCellValue('H'.$numrow, $data['email_kantor']);
	$excel->getActiveSheet()->setCellValue('I'.$numrow, $data['nomor_hp_pribadi']);
	$excel->getActiveSheet()->setCellValue('J'.$numrow, $data['nomor_hp_kantor']);
	$excel->getActiveSheet()->setCellValue('K'.$numrow, $data['alamat']);
	$excel->getActiveSheet()->setCellValue('L'.$numrow, $data['rt_rw']);
	$excel->getActiveSheet()->setCellValue('M'.$numrow, $data['kode_pos']);
	$excel->getActiveSheet()->setCellValue('N'.$numrow, $data['nama']);
	$excel->getActiveSheet()->setCellValue('O'.$numrow, $data['nama_kab']);
	$excel->getActiveSheet()->setCellValue('P'.$numrow, $data['nama_kec']);
	$excel->getActiveSheet()->setCellValue('Q'.$numrow, $data['alamat_alternatif']);
	$excel->getActiveSheet()->setCellValue('R'.$numrow, $data['status']);
	$excel->getActiveSheet()->setCellValue('S'.$numrow, $data['jml_anak']);
	$excel->getActiveSheet()->setCellValue('T'.$numrow, $data['nama_jabatan']);
	$excel->getActiveSheet()->setCellValue('U'.$numrow, $data['status_kerja']);
	$excel->getActiveSheet()->setCellValue('V'.$numrow, $tglmsk);

	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);

	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(6); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(29.43); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(7); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet()->setTitle("Laporan Data Karyawan");
$excel->getActiveSheet();

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Karyawan.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
