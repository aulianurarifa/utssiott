<?php
    $koneksi = new mysqli("localhost","root","","iot");
    if($koneksi -> connect_error){
        echo "belum tersedia";
    }
?>