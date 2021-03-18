<?php
include "../koneksi.php";

if (isset($_POST['provinsi'])) {
    $provinsi = $_POST["provinsi"];

    $sql = "SELECT * FROM kabupaten WHERE id_prov = '$provinsi'";
    $hasil = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_array($hasil)) {
?>
        <option value="<?php echo $data['id_kab']; ?>"><?php echo $data['nama_kab']; ?></option>
    <?php
    }
}
if (isset($_POST['kabupaten'])) {
    $id_kabupaten = $_POST["kabupaten"];

    $sql = "SELECT * FROM kecamatan WHERE id_kab = '$id_kabupaten'";
    $hasil = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_array($hasil)) {
    ?>
        <option value="<?php echo $data['id_kec']; ?>"><?php echo $data['nama_kec']; ?></option>
<?php
    }
}
?>