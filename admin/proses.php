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
					   ->setTitle("Data Barang")
					   ->setSubject("Barang")
					   ->setDescription("Laporan Semua Data Barang")
					   ->setKeywords("Data Barang");

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

$query = "SELECT * FROM barang b INNER JOIN supplier s WHERE b.id_supplier = s.id_supplier ORDER BY tgl_bayar";

$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->setCellValue('A1', "DATA BARANG"); // Set kolom A1 dengan tulisan "DATA BARANG"
$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1

// Buat header tabel nya pada baris ke 4
$excel->getActiveSheet()->setCellValue('A4', "Nomor"); // Set kolom A4 dengan tulisan "Nomor"
$excel->getActiveSheet()->setCellValue('B4', "Kode Barang"); // Set kolom B4 dengan tulisan "Kode Barang"
$excel->getActiveSheet()->setCellValue('C4', "Nama Barang"); // Set kolom C4 dengan tulisan "Nama Barang"
$excel->getActiveSheet()->setCellValue('D4', "Deskripsi"); // Set kolom D4 dengan tulisan "Jumlah"
$excel->getActiveSheet()->setCellValue('E4', "Jumlah");// Set kolom E4 dengan tulisan "Harga Satuan"
$excel->getActiveSheet()->setCellValue('F4', "Harga Satuan");
$excel->getActiveSheet()->setCellValue('G4', "Tanggal Beli");
$excel->getActiveSheet()->setCellValue('H4', "Kondisi Barang");
$excel->getActiveSheet()->setCellValue('I4', "Status Barang");
$excel->getActiveSheet()->setCellValue('J4', "Supplier");

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

$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$tgl = date('d-m-Y', strtotime($data['tgl_bayar'])); // Ubah format tanggal jadi dd-mm-yyyy

	$excel->getActiveSheet()->setCellValue('A'.$numrow, $no);
	$excel->getActiveSheet()->setCellValue('B'.$numrow, $data['kode_barang']);
	$excel->getActiveSheet()->setCellValue('C'.$numrow, $data['nama_barang']);
	$excel->getActiveSheet()->setCellValue('D'.$numrow, $data['deskripsi']);
	$excel->getActiveSheet()->setCellValue('E'.$numrow, $data['qty']);
	$excel->getActiveSheet()->setCellValue('F'.$numrow, $data['harga_beli']);
	$excel->getActiveSheet()->setCellValue('G'.$numrow, $tgl);
	$excel->getActiveSheet()->setCellValue('H'.$numrow, $data['kondisi_barang']);
	$excel->getActiveSheet()->setCellValue('I'.$numrow, $data['status_barang']);
	$excel->getActiveSheet()->setCellValue('J'.$numrow, $data['nama_supplier']);

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

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet()->setTitle("Laporan Data Barang");
$excel->getActiveSheet();

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Barang.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
