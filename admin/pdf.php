<?php
include('../koneksi.php');
require_once("../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM barang b INNER JOIN supplier s ON b.id_supplier = s.id_supplier INNER JOIN karyawan k ON b.id_pemegang = k.id ORDER BY tgl_bayar ASC");
$html = '<center><h3>Daftar Nama Barang</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
    <td>No</td>
	<td>Nama Barang</td>
	<td>Deskripsi</td>
	<td>Jumlah</td>
	<td>Harga Satuan</td>
	<td>Tanggal Beli</td>
	<td>Tanggal Terima</td>
	<td>Kondisi Barang</td>
	<td>Status Barang</td>
	<td>Penanggung Jawab</td>
	<td>Nama Supplier</td>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['nama_barang']."</td>
 <td>".$row['deskripsi']."</td>
 <td>".$row['qty']."</td>
 <td>"."IDR" . ' ' . number_format($row['harga_beli'], 2, ",", ".")."</td>
 <td>".date('d F Y', strtotime($row['tgl_bayar']))."</td>				            
 <td>".date('d F Y', strtotime($row['tgl_terima']))."</td>
 <td>".$row['kondisi_barang']."</td>
 <td>".$row['status_barang']."</td>
 <td>".$row['nama_depan'] ." ". $row['nama_belakang']."</td>
 <td>".$row['nama_supplier']."</td>
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
$dompdf->stream('laporan_barang.pdf');
?>