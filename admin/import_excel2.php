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
            $checkStudent = "SELECT id FROM murid WHERE id='$value[0]' ";
            $checkStudent_result = mysqli_query($koneksi, $checkStudent);
            
            if(mysqli_num_rows($checkStudent_result) > 0)
            {
                // Already Exists means please 
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[3])->format('Y-m-d');
                $up_query = "UPDATE murid SET nama_lengkap = '$value[1]', jenis_kelamin = '$value[2]', tgl_lahir = '$date', email = '$value[4]', telepon = '$value[5]', profesi = '$value[6]', jenjang = '$value[7]', sekolah = '$value[8]', domisili = '$value[9]', created_at = '$timestamp' WHERE id ='$value[0]' ";
                $up_result = mysqli_query($koneksi, $up_query);
                $msg = 1;
            }
            else
            {
                // New record Insert
                // format tanggal
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[3])->format('Y-m-d');
                $in_query = "INSERT INTO murid VALUES (null, '$value[1]', '$value[2]', '$date', '$value[4]', '$value[5]', '$value[6]', '$value[7]', '$value[8]', '$value[9]', '$timestamp')";
                $in_result = mysqli_query($koneksi, $in_query);
                $msg = 1;
            }
            if(isset($msg))
            {
                $_SESSION['status'] = "File imported successfully!";
                header("Location: murid.php");
            }
            else
            {
                $_SESSION['status'] = "File importing failed!";
                header("Location: murid.php");
            }
        }
    }
?>