<?php
    include "../koneksi.php";
    include "excel_reader2.php";
?>
    
<?php
    // upload file xls
    $target = basename($_FILES['namafile']['name']) ;
    move_uploaded_file($_FILES['namafile']['tmp_name'], $target);
    
    // beri permisi agar file xls dapat di baca
    chmod($_FILES['namafile']['name'],0777);
    
    // mengambil isi file xls
    $data = new Spreadsheet_Excel_Reader($_FILES['namafile']['name'],false);
    // menghitung jumlah baris data yang ada
    $jumlah_baris = $data->rowcount($sheet_index=0);
    
    // jumlah default data yang berhasil di import
    $berhasil = 0;  
    for ($i=2; $i<=$jumlah_baris; $i++){
            $nama   = $data->val($i, 1);
            $jk     = $data->val($i, 2);
            $tempat = $data->val($i, 3);
            $tgl    = $data->val($i, 4);
            $alamat = $data->val($i, 5);
            $kota   = $data->val($i, 6);
            $agama  = $data->val($i, 7);
            
            if($nama != "" && $jk !="" && $tempat !="" && $tgl !="" && $alamat !="" && $kota !="" && $agama !=""){
                // input data ke database (table murid)
                mysqli_query($koneksi, "INSERT INTO murid VALUES ('', '$nama', '$jk', '$tempat', '$tgl', '$alamat', '$kota', '$agama')");
                $berhasil++;
            }
    }
    
    // hapus kembali file .xls yang di upload tadi
        unlink($_FILES['namafile']['name']);
    
    // alihkan halaman ke index.php
        header("location:lihat_hasil2.php?berhasil=$berhasil");
?>