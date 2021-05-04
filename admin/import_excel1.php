<?php
    session_start();
    include "../koneksi.php";
    require '../vendor/autoload.php';
 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
    if(isset($_POST['upload']))
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        // lokasi file excel
        $targetPath = $_FILES['namafile']['tmp_name'];
        $spreadsheet = $reader->load($targetPath);
        
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // hapus baris pertama
        unset($rows[0]);

        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $timestamp = $dt->format('Y-m-d G:i:s');

        foreach($rows as $key => $value)
        {
            $checkKelas = "SELECT id_kelas FROM kelas WHERE id_kelas='$value[0]' ";
            $checkKelas_result = mysqli_query($koneksi, $checkKelas);
            
            if(mysqli_num_rows($checkKelas_result) > 0)
            {
                // Already Exists means please 
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[3])->format('Y-m-d');
                $up_query = "UPDATE kelas SET judul = '$value[1]', mapel = '$value[2]', tanggal = '$date', jam = '$value[4]', durasi = '$value[5]', jenjang = '$value[6]', tuton = '$value[7]', paid = '$value[8]', harga = '$value[9]', income = '$value[10]', total_income = '$value[11]', total_daftar = '$value[12]', jumlah_murid = '$value[13]', created_at = '$timestamp' WHERE id_kelas ='$value[0]' ";
                $up_result = mysqli_query($koneksi, $up_query);
                $msg = 1;
            }
            else
            {
                // New record Insert
                // format tanggal
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[3])->format('Y-m-d');
                $in_query = "INSERT INTO kelas VALUES (null, '$value[1]', '$value[2]', '$date', '$value[4]', '$value[5]', '$value[6]', '$value[7]', '$value[8]', '$value[9]', '$value[10]', '$value[11]', '$value[12]', '$value[13]', '$timestamp')";
                $in_result = mysqli_query($koneksi, $in_query);
                $msg = 1;
            }
            if(isset($msg))
            {
                $_SESSION['status'] = "File imported successfully!";
                header("Location: kelas.php");
            }
            else
            {
                $_SESSION['status'] = "File importing failed!";
                header("Location: kelas.php");
            }
        }
    }
?>