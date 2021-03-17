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
					   ->setTitle("Data Karyawan")
					   ->setSubject("Karyawan")
					   ->setDescription("Laporan Semua Data Karyawan")
					   ->setKeywords("Data Karyawan");

// Buat header tabel nya pada baris ke 1
$csv->setActiveSheetIndex(0)->setCellValue('A1', "Nomor"); 
$csv->setActiveSheetIndex(0)->setCellValue('B1', "NIP");
$csv->setActiveSheetIndex(0)->setCellValue('C1', "NIK"); 
$csv->setActiveSheetIndex(0)->setCellValue('D1', "Nama Lengkap"); 
$csv->setActiveSheetIndex(0)->setCellValue('E1', "Jenis Kelamin");
$csv->setActiveSheetIndex(0)->setCellValue('F1', "Tempat/Tgl Lahir");
$csv->setActiveSheetIndex(0)->setCellValue('G1', "Email Pribadi");
$csv->setActiveSheetIndex(0)->setCellValue('H1', "Email Kantor");
$csv->setActiveSheetIndex(0)->setCellValue('I1', "Nomor HP Pribadi");
$csv->setActiveSheetIndex(0)->setCellValue('J1', "Nomor HP Kantor");
$csv->setActiveSheetIndex(0)->setCellValue('K1', "Alamat(Sesuai KTP)");
$csv->setActiveSheetIndex(0)->setCellValue('L1', "RT/RW");
$csv->setActiveSheetIndex(0)->setCellValue('M1', "Kodepos");
$csv->setActiveSheetIndex(0)->setCellValue('N1', "Provinsi");
$csv->setActiveSheetIndex(0)->setCellValue('O1', "Kabupaten/Kota");
$csv->setActiveSheetIndex(0)->setCellValue('P1', "Kecamatan");
$csv->setActiveSheetIndex(0)->setCellValue('Q1', "Alamat Alternatif");
$csv->setActiveSheetIndex(0)->setCellValue('R1', "Status");
$csv->setActiveSheetIndex(0)->setCellValue('S1', "Jumlah Anak");
$csv->setActiveSheetIndex(0)->setCellValue('T1', "Jabatan");
$csv->setActiveSheetIndex(0)->setCellValue('U1', "Status Kerja");
$csv->setActiveSheetIndex(0)->setCellValue('V1', "Tanggal Masuk");

$query = "SELECT * FROM karyawan k INNER JOIN jabatan j ON k.id_jabatan = j.id_jabatan INNER JOIN provinsi p ON k.provinsi = p.id_prov INNER JOIN kabupaten kb ON k.kabupaten = kb.id_kab INNER JOIN kecamatan kc ON k.kecamatan = kc.id_kec ORDER BY tgl_masuk";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $tgllahir = date('d-m-Y', strtotime($data['tgl_lahir'])); // Ubah format tanggal jadi dd-mm-yyyy
	$tglmsk = date('d-m-Y', strtotime($data['tgl_masuk'])); // Ubah format tanggal jadi dd-mm-yyyy

	$csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nip']);
	$csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['nik']);
	$csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['nama_depan'] ." ". $data['nama_tengah']  ." ". $data['nama_belakang']);
	$csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['jenis_kelamin']);
	$csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['tempat_lahir'] ." / ". $tgllahir);
	$csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['email_pribadi']);
	$csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['email_kantor']);
	$csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['nomor_hp_pribadi']);
	$csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['nomor_hp_kantor']);
	$csv->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['alamat']);
	$csv->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['rt_rw']);
	$csv->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['kode_pos']);
	$csv->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['nama']);
	$csv->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data['nama_kab']);
	$csv->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['nama_kec']);
	$csv->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data['alamat_alternatif']);
	$csv->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data['status']);
	$csv->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data['jml_anak']);
	$csv->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data['nama_jabatan']);
	$csv->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data['status_kerja']);
	$csv->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $tglmsk);

	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set orientasi kertas jadi LANDSCAPE
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$csv->getActiveSheet(0)->setTitle("Laporan Data Karyawan");
$csv->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Karyawan.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>
