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
            $checkTuton = "SELECT id FROM tuton WHERE id='$value[0]' ";
            $checkTuton_result = mysqli_query($koneksi, $checkTuton);
            
            if(mysqli_num_rows($checkTuton_result) > 0)
            {
                // Already Exists means please 
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[5])->format('Y-m-d');
                $up_query = "UPDATE tuton SET nama = '$value[1]', jenis_tuton = '$value[2]',  mapel = '$value[3]', tempat_lahir = '$value[4]', tgl_lahir = '$date', jk = '$value[6]', agama = '$value[7]', min_income = '$value[8]', max_income = '$value[9]', durasi = '$value[10]', jenjang = '$value[11]', referensi = '$value[12]', email = '$value[13]', status = '$value[14]', created_at = '$timestamp' WHERE id ='$value[0]' ";
                $up_result = mysqli_query($koneksi, $up_query);
                $msg = 1;
            }
            else
            {
                // New record Insert
                // format tanggal
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[5])->format('Y-m-d');
                $in_query = "INSERT INTO tuton VALUES (null, '$value[1]', '$value[2]', '$value[3]', '$value[4]', '$date', '$value[6]', '$value[7]', '$value[8]', '$value[9]', '$value[10]', '$value[11]', '$value[12]', '$value[13]', '$value[14]', '$timestamp')";
                $in_result = mysqli_query($koneksi, $in_query);
                $msg = 1;
            }
            if(isset($msg))
            {
                $_SESSION['status'] = "File imported successfully!";
                header("Location: tuton.php");
            }
            else
            {
                $_SESSION['status'] = "File importing failed!";
                header("Location: tuton.php");
            }
        }
    }
?>