<?php
function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
include('../koneksi.php');
require_once("../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM karyawan k INNER JOIN jabatan j ON k.id_jabatan = j.id_jabatan INNER JOIN provinsi p ON k.provinsi = p.id_prov INNER JOIN kabupaten kb ON k.kabupaten = kb.id_kab INNER JOIN kecamatan kc ON k.kecamatan = kc.id_kec ORDER BY tgl_masuk ASC");
$html = '<center><h3>Daftar Nama Karyawan</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
    <td>No.</td>
    <td>Nama Lengkap</td>
    <td>Tempat/Tgl. Lahir</td>
    <td>Nomor HP</td>
    <td>Tanggal Masuk</td>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['nama_depan'] ." ". $row['nama_tengah']  ." ". $row['nama_belakang']."</td>
 <td>".$row['tempat_lahir'] .", ". date('d/m/Y', strtotime($row['tgl_lahir']))."</td>
 <td>"."+62" . number_format($row['nomor_hp_pribadi'], 0, ".", "-")."</td>
 <td>".tanggal_indonesia($row['tgl_masuk'])."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_karyawan.pdf');
?>