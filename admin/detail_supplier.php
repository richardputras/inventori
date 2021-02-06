<?php
//memasukkan koneksi database
include '../koneksi.php';

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
   //membuat variabel id berisi post['id']
   $id = $_POST['id'];
   //query standart select where id
   $view = "SELECT * FROM supplier WHERE id_supplier='$id'";
   // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $result = mysqli_query($koneksi, $view);
   $number = mysqli_num_rows($result);
   //jika ada datanya
   if ($number > 0) {
      //fetch data ke dalam veriabel $row_view
      while ($row_view = mysqli_fetch_array($result)) {
         //menampilkan data dengan table
         echo '
		    <p>Berikut ini adalah detail dari data <b>' . $row_view['nama_supplier'] . '</b></p>
            <table class="table table-bordered">
            <tr>
               <th>KODE SUPPLIER</th>
               <td>' . $row_view['kode_supplier'] . '</td>
            </tr>
            <tr>
               <th>NAMA SUPPLIER</th>
               <td>' . $row_view['nama_supplier'] . '</td>
            </tr>
            <tr>
				<th>ALAMAT</th>
				<td>' . $row_view['alamat'] . '</td>
			</tr>
            <tr>
				<th>KOTA</th>
				<td>' . $row_view['kota'] . '</td>
			</tr>
			<tr>
                <th>TELEPON</th>
                <td>' . $row_view['telepon'] . '</td>
            </tr>
            <tr>
                <th>BANK</th>
                <td>' . $row_view['bank'] . '</td>
            </tr>
            <tr>
                <th>NO. REKENING</th>
                <td>' . $row_view['no_rek'] . '</td>
            </tr>
            <tr>
                <th>CONTACT PERSON</th>
                <td>' . $row_view['contact_person'] . '</td>
            </tr>
            <tr>
                <th>NO. CONTACT PERSON</th>
                <td>' . $row_view['no_contact_person'] . '</td>
            </tr>
		    </table>
        ';
      }
   }
}