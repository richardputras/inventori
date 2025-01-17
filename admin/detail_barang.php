<?php
//memasukkan koneksi database
include '../koneksi.php';

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
   //membuat variabel id berisi post['id']
   $id = $_POST['id'];
   //query standart select where id
   $view = "SELECT * FROM barang b INNER JOIN supplier s WHERE b.id_supplier = s.id_supplier AND id_barang='$id'";
   // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $result = mysqli_query($koneksi, $view);
   $number = mysqli_num_rows($result);
   //jika ada datanya
   if ($number > 0) {
      //fetch data ke dalam veriabel $row_view
      while ($row_view = mysqli_fetch_array($result)) {
         //menampilkan data dengan table
         echo '
		    <p>Berikut ini adalah detail dari data <b>' . $row_view['nama_barang'] . '</b></p>
		    <table class="table table-bordered">
            <tr>
               <th>KODE BARANG</th>
               <td>' . $row_view['kode_barang'] . '</td>
            </tr>
            <tr>
               <th>NAMA BARANG</th>
               <td>' . $row_view['nama_barang'] . '</td>
            </tr>
            <tr>
			      <th>DESKRIPSI BARANG</th>
			      <td>' . $row_view['deskripsi'] . '</td>
            </tr>
            <tr>
			      <th>JUMLAH</th>
			      <td>' . $row_view['qty'] . '</td>
            </tr>
            <tr>
		         <th>SATUAN</th>
			      <td>' . $row_view['satuan'] . '</td>
            </tr>
            <tr>
			      <th>TGL. BELI</th>
			      <td>' . date('d F Y', strtotime($row_view['tgl_bayar'])) . '</td>
            </tr>
            <tr>
			      <th>TGL. TERIMA BARANG</th>
			      <td>' . date('d F Y', strtotime($row_view['tgl_terima'])) . '</td>
            </tr>
            <tr>
               <th>HARGA BELI</th>
               <td>' . "IDR" . ' ' . number_format($row_view['harga_beli'], 2, ",", ".") . '</td>
            </tr>
            <tr>
			      <th>KONDISI BARANG</th>
		         <td>' . $row_view['kondisi_barang'] . '</td>
			   </tr>
			   <tr>
			      <th>STATUS BARANG</th>
			      <td>' . $row_view['status_barang'] . '</td>
            </tr>
            <tr>
			      <th>LOKASI BARANG</th>
			      <td>' . $row_view['lokasi'] . '</td>
            </tr>
            <tr>
			      <th>KETERANGAN</th>
			      <td>' . $row_view['keterangan'] . '</td>
            </tr>
            <tr>
			      <th>GARANSI</th>
			      <td>' . $row_view['garansi'] . '</td>
			   </tr>
            <tr>
               <th>KATEGORI</th>
               <td>' . $row_view['kategori'] . '</td>
            </tr>
			   <tr>
			      <th>SUPPLIER</th>
			      <td>' . $row_view['nama_supplier'] . '</td>
			   </tr>
		    </table>
        ';
      }
   }
}
