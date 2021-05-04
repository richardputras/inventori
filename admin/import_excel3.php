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
            $checkRPP = "SELECT id FROM rpp WHERE id='$value[0]' ";
            $checkRPP_result = mysqli_query($koneksi, $checkRPP);

            if(mysqli_num_rows($checkRPP_result) > 0)
            {
                // Already Exists means please 
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[16])->format('Y-m-d');
                $date2 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[17])->format('Y-m-d');
                $up_query = "UPDATE rpp SET jenjang = '$value[1]', kelas = '$value[2]', semester = '$value[3]', mapel = '$value[4]', tema = '$value[5]', subtema = '$value[6]', bulan_pembuatan = '$value[7]', pembuat = '$value[8]', harga = '$value[9]', jmlh_quiz = '$value[10]', jmlh_pr = '$value[11]', jmlh_materi = '$value[12]', jmlh_story_board = '$value[13]', jmlh_video = '$value[14]', media = '$value[15]', tgl_mulai = '$date', tgl_selesai = '$date2', link = '$value[18]', created_at = '$timestamp' WHERE id ='$value[0]' ";
                $up_result = mysqli_query($koneksi, $up_query);
                $msg = 1;
            }
            else
            {
                // New record Insert
                // format tanggal
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[16])->format('Y-m-d');
                $date2 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[17])->format('Y-m-d');
                $in_query = "INSERT INTO rpp VALUES (null, '$value[1]', '$value[2]', '$value[3]', '$value[4]', '$value[5]', '$value[6]', '$value[7]', '$value[8]', '$value[9]', '$value[10]', '$value[11]', '$value[12]', '$value[13]', '$value[14]', '$value[15]', '$date', '$date2', '$value[18]', '$timestamp')";
                $in_result = mysqli_query($koneksi, $in_query);
                $msg = 1;
            }
            if(isset($msg))
            {
                $_SESSION['status'] = "File imported successfully!";
                header("Location: rpp.php");
            }
            else
            {
                $_SESSION['status'] = "File importing failed!";
                header("Location: rpp.php");
            }
        }      
    }
?>