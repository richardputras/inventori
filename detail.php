<?php
//memasukkan koneksi database
include '../koneksi.php';

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
   //membuat variabel id berisi post['id']
   $id = $_POST['id'];
   //query standart select where id
   $view = "SELECT * FROM karyawan WHERE id='$id'";
   // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $result = mysqli_query($koneksi, $view);
   $number = mysqli_num_rows($result);
   //jika ada datanya
   if ($number > 0) {
      //fetch data ke dalam veriabel $row_view
      while ($row_view = mysqli_fetch_array($result)) {
         //menampilkan data dengan table
         echo '
		    <p>Berikut ini adalah detail dari data <b>' . $row_view['nama'] . '</b></p>
		    <table class="table table-bordered">
            <tr>
               <th>NOMOR INDUK PEGAWAI (NIP)</th>
               <td>' . $row_view['nip'] . '</td>
            </tr>
            <tr>
				   <th>NOMOR IDENTITAS (NIK)</th>
				   <td>' . $row_view['nik'] . '</td>
			   </tr>
            <tr>
				   <th>NAMA LENGKAP</th>
				   <td>' . $row_view['nama'] . '</td>
			   </tr>
			   <tr>
				   <th>JENIS KELAMIN</th>
				   <td>' . $row_view['jenis_kelamin'] . '</td>
			   </tr>
			   <tr>
				   <th>TEMPAT LAHIR</th>
				   <td>' . $row_view['tempat_lahir'] . '</td>
            </tr>
            <tr>
				   <th>TANGGAL LAHIR</th>
				   <td>' . $row_view['tgl_lahir'] . '</td>
            </tr>
            <tr>
				   <th>EMAIL PRIBADI</th>
				   <td>' . $row_view['email_pribadi'] . '</td>
            </tr>
            <tr>
				   <th>EMAIL CORPORATE</th>
				   <td>' . $row_view['email_corporate'] . '</td>
            </tr>
            <tr>
				   <th>NOMOR HP</th>
				   <td>' . $row_view['nomor_hp'] . '</td>
            </tr>
            <tr>
				   <th>NOMOR TELP RUMAH</th>
				   <td>' . $row_view['nomor_telp_rmh'] . '</td>
            </tr>
            <tr>
				   <th>STATUS</th>
				   <td>' . $row_view['status'] . '</td>
            </tr>
            <tr>
				   <th>JUMLAH ANAK</th>
				   <td>' . $row_view['jml_anak'] . '</td>
            </tr>
            <tr>
				   <th>TANGGAL MASUK</th>
				   <td>' . $row_view['tgl_masuk'] . '</td>
            </tr>
            <tr>
				   <th>ALAMAT SEKARANG</th>
				   <td>' . $row_view['alamat'] . '</td>
            </tr>
            <tr>
				   <th>KODE POS</th>
				   <td>' . $row_view['kode_pos'] . '</td>
            </tr>
            
		    </table>
        ';
      }
   }
}
