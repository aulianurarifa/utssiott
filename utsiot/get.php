<?php
require_once("koneksi.php");

$sql = null;
if (isset($_GET["Show"])) { // http://localhost/prakiot/koneksi.php?Show=all
    $data = $_GET["Show"]; // Nama parameter yang benar adalah "Show"
    
    if ($data == "all") {
        // Query untuk mendapatkan suhu dan humidity max, min, rata-rata, suhu dan humidity tertinggi, dan suhu dan humidity terendah per bulan
        $sql = "
            SELECT 
                MONTH(ts) AS bulan, 
                MAX(suhu) AS suhu_max,
                MIN(suhu) AS suhu_min,
                AVG(suhu) AS suhu_rata_rata,
                MAX(humid) AS humid_max,
                MIN(humid) AS humid_min,
                AVG(humid) AS humid_rata_rata,
                MIN(suhu) AS suhu_terendah,
                MAX(suhu) AS suhu_tertinggi,
                MIN(humid) AS humid_terendah,
                MAX(humid) AS humid_tertinggi
            FROM 
                tb_cuaca
            GROUP BY 
                MONTH(ts)
        ";
    } else {
        $data = intval($data); // Sanitasi data untuk menghindari SQL Injection
        $sql = "
            SELECT 
                MONTH(ts) AS bulan, 
                MAX(suhu) AS suhu_max,
                MIN(suhu) AS suhu_min,
                AVG(suhu) AS suhu_rata_rata,
                MAX(humid) AS humid_max,
                MIN(humid) AS humid_min,
                AVG(humid) AS humid_rata_rata,
                MIN(suhu) AS suhu_terendah,
                MAX(suhu) AS suhu_tertinggi,
                MIN(humid) AS humid_terendah,
                MAX(humid) AS humid_tertinggi
            FROM 
                tb_cuaca
            WHERE 
                id = $data
            GROUP BY 
                MONTH(ts)
        ";
    }

    $hasil = $koneksi->query($sql);
    if ($hasil->num_rows > 0) {
        $response = array();
        while ($rows = $hasil->fetch_assoc()) {
            // Tambahkan data yang diperlukan ke response
            $response[] = [
                "bulan" => $rows["bulan"],
                "suhu_max" => $rows["suhu_max"],
                "suhu_min" => $rows["suhu_min"],
                "suhu_rata_rata" => $rows["suhu_rata_rata"],
                "humid_max" => $rows["humid_max"],
                "humid_min" => $rows["humid_min"],
                "humid_rata_rata" => $rows["humid_rata_rata"],
                "suhu_terendah" => $rows["suhu_terendah"],
                "suhu_tertinggi" => $rows["suhu_tertinggi"],
                "humid_terendah" => $rows["humid_terendah"],
                "humid_tertinggi" => $rows["humid_tertinggi"]
            ];
        }
        echo json_encode($response);
    } else {
        echo json_encode(["message" => "tidak ada data"]);
    }
    $koneksi->close();
} else {
    echo json_encode(["message" => "Parameter tidak lengkap"]);
}
?>
