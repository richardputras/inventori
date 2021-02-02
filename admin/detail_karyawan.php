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
		    <p>Berikut ini adalah detail dari data <b>' . $row_view['nama_depan'] . '</b></p>
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
				   <th>NAMA DEPAN</th>
				   <td>' . $row_view['nama_depan'] . '</td>
            </tr>
            <tr>
				   <th>NAMA TENGAH</th>
				   <td>' . $row_view['nama_tengah'] . '</td>
            </tr>
            <tr>
				   <th>NAMA BELAKANG</th>
				   <td>' . $row_view['nama_belakang'] . '</td>
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
				   <td>' . date('d F Y', strtotime($row_view['tgl_lahir'])) . '</td>
            </tr>
            <tr>
				   <th>EMAIL PRIBADI</th>
				   <td>' . $row_view['email_pribadi'] . '</td>
            </tr>
            <tr>
				   <th>EMAIL KANTOR</th>
				   <td>' . $row_view['email_kantor'] . '</td>
            </tr>
            <tr>
				   <th>NOMOR HP PRIBADI</th>
				   <td>' . $row_view['nomor_hp_pribadi'] . '</td>
            </tr>
            <tr>
				   <th>NOMOR HP KANTOR</th>
				   <td>' . $row_view['nomor_hp_kantor'] . '</td>
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
				   <th>ALAMAT (SESUAI KTP)</th>
				   <td>' . $row_view['alamat'] . '</td>
            </tr>
            <tr>
				   <th>ALAMAT ALTERNATIF</th>
				   <td>' . $row_view['alamat_alternatif'] . '</td>
            </tr>
            <tr>
				   <th>RT/RW</th>
				   <td>' . $row_view['rt_rw'] . '</td>
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
