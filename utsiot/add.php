<?php
require_once("koneksi.php");

if (isset($_GET["suhu"])) {
    $data = mysqli_real_escape_string($koneksi, $_GET["suhu"]);
    $sql = "INSERT INTO tb_cuaca (suhu) VALUES ('$data')";

    if (mysqli_query($koneksi, $sql)) {
        echo "berhasil";
    } else {
        echo "gagal";
    }
    mysqli_close($koneksi);
} else {
    echo "Data suhu tidak ditemukan";
}
?>
