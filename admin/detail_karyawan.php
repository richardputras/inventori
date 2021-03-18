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

//memasukkan koneksi database
include '../koneksi.php';

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
   //membuat variabel id berisi post['id']
   $id = $_POST['id'];
   //query standart select where id
   $view = "SELECT * FROM karyawan k INNER JOIN jabatan j ON k.id_jabatan = j.id_jabatan INNER JOIN provinsi p ON k.provinsi = p.id_prov INNER JOIN kabupaten kb ON k.kabupaten = kb.id_kab INNER JOIN kecamatan kc ON k.kecamatan = kc.id_kec WHERE id='$id'";
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
				   <td>' . tanggal_indonesia($row_view['tgl_lahir']) . '</td>
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
				   <th>ALAMAT (SESUAI KTP)</th>
				   <td>' . $row_view['alamat'] . '</td>
            </tr>
            <tr>
				   <th>RT/RW</th>
				   <td>' . $row_view['rt_rw'] . '</td>
            </tr>
            <tr>
				   <th>KODE POS</th>
				   <td>' . $row_view['kode_pos'] . '</td>
            </tr>
            <tr>
				   <th>PROVINSI</th>
				   <td>' . $row_view['nama'] . '</td>
            </tr>
            <tr>
				   <th>KABUPATEN/KOTA</th>
				   <td>' . $row_view['nama_kab'] . '</td>
            </tr>
            <tr>
				   <th>KECAMATAN</th>
				   <td>' . $row_view['nama_kec'] . '</td>
            </tr>
            <tr>
				   <th>ALAMAT (ALTERNATIF)</th>
				   <td>' . $row_view['alamat_alternatif'] . '</td>
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
				   <th>JABATAN</th>
				   <td>' . $row_view['nama_jabatan'] . '</td>
            </tr>
            <tr>
				   <th>STATUS KERJA</th>
				   <td>' . $row_view['status_kerja'] . '</td>
            </tr>
            <tr>
				   <th>TANGGAL MASUK</th>
				   <td>' . tanggal_indonesia($row_view['tgl_masuk']) . '</td>
            </tr>
		    </table>
        ';
      }
   }
}
