<?php
// Load file koneksi.php
include "../koneksi.php";

// Load plugin PHPExcel nya
include "../libraries/PHPExcel/PHPExcel.php";

// Panggil class PHPExcel nya
$csv = new PHPExcel();

// Settingan awal file excel
$csv->getProperties()->setCreator('My Notes Code')
					   ->setLastModifiedBy('My Notes Code')
					   ->setTitle("Data Barang")
					   ->setSubject("Barang")
					   ->setDescription("Laporan Semua Data Barang")
					   ->setKeywords("Data Barang");

// Buat header tabel nya pada baris ke 1
$csv->setActiveSheetIndex(0)->setCellValue('A1', "Nomor"); // Set kolom A1 dengan tulisan "Nomor"
$csv->setActiveSheetIndex(0)->setCellValue('B1', "Kode Barang"); // Set kolom B1 dengan tulisan "Kode Barang"
$csv->setActiveSheetIndex(0)->setCellValue('C1', "Nama Barang"); // Set kolom C1 dengan tulisan "Nama Barang"
$csv->setActiveSheetIndex(0)->setCellValue('D1', "Deskripsi"); // Set kolom D1 dengan tulisan "Jumlah"
$csv->setActiveSheetIndex(0)->setCellValue('E1', "Jumlah");// Set kolom E1 dengan tulisan "Harga Satuan"
$csv->setActiveSheetIndex(0)->setCellValue('F1', "Harga Satuan");
$csv->setActiveSheetIndex(0)->setCellValue('G1', "Tanggal Beli");
$csv->setActiveSheetIndex(0)->setCellValue('H1', "Kondisi Barang");
$csv->setActiveSheetIndex(0)->setCellValue('I1', "Status Barang");
$csv->setActiveSheetIndex(0)->setCellValue('J1', "Supplier");

$query = "SELECT * FROM barang b INNER JOIN supplier s WHERE b.id_supplier = s.id_supplier ORDER BY tgl_bayar";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$tgl = date('d-m-Y', strtotime($data['tgl_bayar'])); // Ubah format tanggal jadi dd-mm-yyyy

	$csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['kode_barang']);
	$csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['nama_barang']);
	$csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['deskripsi']);
	$csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['qty']);
	$csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['harga_beli']);
	$csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $tgl);
	$csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['kondisi_barang']);
	$csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['status_barang']);
	$csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['nama_supplier']);

	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set orientasi kertas jadi LANDSCAPE
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$csv->getActiveSheet(0)->setTitle("Laporan Data Barang");
$csv->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Barang.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = new PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>
