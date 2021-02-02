<?php
//memasukkan koneksi database
include '../koneksi.php';

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
   //membuat variabel id berisi post['id']
   $id = $_POST['id'];
   //query standart select where id
   $view = "SELECT * FROM jabatan WHERE id_jabatan='$id'";
   // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $result = mysqli_query($koneksi, $view);
   $number = mysqli_num_rows($result);
   //jika ada datanya
   if ($number > 0) {
      //fetch data ke dalam veriabel $row_view
      while ($row_view = mysqli_fetch_array($result)) {
         //menampilkan data dengan table
         echo '
		    <p>Berikut ini adalah detail dari data <b>' . $row_view['nama_jabatan'] . '</b></p>
		    <table class="table table-bordered">
            <tr>
               <th>NAMA JABATAN</th>
               <td>' . $row_view['nama_jabatan'] . '</td>
            </tr>
            <tr>
				   <th>DIVISI</th>
				   <td>' . $row_view['divisi'] . '</td>
			   </tr>
            <tr>
				   <th>JOB DESK</th>
				   <td>' . $row_view['job_desc'] . '</td>
			   </tr>
			   <tr>
				   <th>STATUS KERJA</th>
				   <td>' . $row_view['status_kerja'] . '</td>
			   </tr>
			   <tr>
				   <th>GAJI POKOK</th>
				   <td>' . "IDR " . number_format($row_view['gaji_pokok'], 2, ",", ".") . '</td>
            </tr>
            <tr>
				   <th>TUNJANGAN</th>
				   <td>' . "IDR " . number_format($row_view['tunjangan'], 2, ",", ".") . '</td>
            </tr>
            <tr>
				   <th>FASILITAS</th>
				   <td>' . $row_view['fasilitas'] . '</td>
            </tr>
            <tr>
				   <th>TOTAL GAJI</th>
				   <td>' . "IDR " . number_format($row_view['total_gaji'], 2, ",", ".") . '</td>
            </tr>
            <tr>
				   <th>TGL GAJI</th>
				   <td>' . $row_view['tgl_gaji'] . '</td>
            </tr>
            <tr>
				   <th>KENAIKAN GAJI</th>
				   <td>' . $row_view['kenaikan_gaji'] . '</td>
            </tr>
            <tr>
				   <th>TGL KENAIKAN GAJI</th>
				   <td>' . date('d F Y', strtotime($row_view['tgl_naik_gaji'])) . '</td>
            </tr>
		    </table>
        ';
      }
   }
}
