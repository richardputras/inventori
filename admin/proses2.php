<?php
// Load file koneksi.php
include "../koneksi.php";

require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', "DATA KONSUMSI"); // Set kolom A1 dengan tulisan "DATA KONSUMSI"
$sheet->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai J1
$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1

// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "Nomor"); // Set kolom A3 dengan tulisan "Nomor"
$sheet->setCellValue('B3', "Nama Barang"); // Set kolom B3 dengan tulisan "Nama Barang"
$sheet->setCellValue('C3', "Harga Beli");
$sheet->setCellValue('D3', "Tanggal Beli");
$sheet->setCellValue('E3', "Stok Awal");
$sheet->setCellValue('F3', "Satuan");
$sheet->setCellValue('G3', "Stok Akhir");
$sheet->setCellValue('H3', "Request Stok");
$sheet->setCellValue('I3', "Tanggal Habis");
$sheet->setCellValue('J3', "Status");

$query = "SELECT * FROM konsumsi ORDER BY tglhabis";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$tgl = date('d-m-Y', strtotime($data['tglbeli'])); // Ubah format tanggal jadi dd-mm-yyyy
    $tgl2 = date('d-m-Y', strtotime($data['tglhabis'])); // Ubah format tanggal jadi dd-mm-yyyy

	$sheet->setCellValue('A'.$numrow, $no++);
	$sheet->setCellValue('B'.$numrow, $data['nama']);
	$sheet->setCellValue('C'.$numrow, $data['harga_beli']);
	$sheet->setCellValue('D'.$numrow, $tgl);
    $sheet->setCellValue('E'.$numrow, $data['stok_awal']);
	$sheet->setCellValue('F'.$numrow, $data['satuan']);
	$sheet->setCellValue('G'.$numrow, $data['stok_akhir']);
	$sheet->setCellValue('H'.$numrow, ' ');
	$sheet->setCellValue('I'.$numrow, $tgl2);
	$sheet->setCellValue('J'.$numrow, $data['status']);

	$numrow++; // Tambah 1 setiap kali looping
}

$styleArray = [
	'borders' => [
		'allBorders' => [
			'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		],
	],
];
$numrow = $numrow - 1;
$sheet->getStyle('A3:J'.$numrow)->applyFromArray($styleArray);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Konsumsi.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>
