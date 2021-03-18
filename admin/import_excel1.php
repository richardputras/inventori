<?php
    include "../koneksi.php";
    include "../libraries/ExcelReader/excel_reader2.php";
    
    if ($_POST['upload'] == "upload") {
        $type = explode(".",$_FILES['namafile']['name']);
        
        if (empty($_FILES['namafile']['name'])) {
            ?>
                <script language="JavaScript">
                    alert('Oops! Please select file ...');
                    document.location='./';
                </script>
            <?php
        }
        else if(strtolower(end($type)) !='xls'){
            ?>
                <script language="JavaScript">
                    alert('Oops! Please upload only Excel XLS file ...');
                    document.location='./';
                </script>
            <?php
        }
        
        else{
        $target = basename($_FILES['namafile']['name']) ;
        move_uploaded_file($_FILES['namafile']['tmp_name'], $target);
    
        $data = new Spreadsheet_Excel_Reader($_FILES['namafile']['name'],false);
    
        $baris = $data->rowcount($sheet_index=0);
    
        for ($i=2; $i<=$baris; $i++){
            $id     = $data->val($i, 1);
            $hari   = $data->val($i, 2);
            $tgl    = $data->val($i, 3);
            $jam    = $data->val($i, 4);
            $jumlah = $data->val($i, 5);
            $judul  = $data->val($i, 6);
            $harga  = $data->val($i, 7);
        
            $query = mysqli_query("INSERT INTO kelas (id_kelas, hari, tanggal, jam, jumlah_murid, judul, harga) VALUES ('$id', '$tgl', '$jam', '$jumlah', '$judul', '$harga')");        
        }
    
            if(!$query){
                ?>
                    <script language="JavaScript">
                        alert('<b>Oops!</b> 404 Error Server.');
                        document.location='./';
                    </script>
                <?php
            }
            else{
                ?>
                    <script language="JavaScript">
                        alert('Good! Import Excel file success...');
                        document.location='./';
                    </script>
                <?php
            }
        unlink($_FILES['namafile']['name']);
        }
    }
?>