<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parsing Data JSON</title>
</head>
<body>
    <h1>Data dari PHP dalam Format JSON</h1>

    <?php
    // Mengambil data dari `data.php`
    $json = file_get_contents('http://localhost/utsioti/data.php');
    $data = json_decode($json, true); // Mengubah JSON menjadi array asosiatif

    if ($data) {
        // Menampilkan data utama
        echo "<h2>Informasi Suhu</h2>";
        echo "<p>Suhu Maksimum: {$data['suhumax']}</p>";
        echo "<p>Suhu Minimum: {$data['suhumin']}</p>";
        echo "<p>Suhu Rata-Rata: {$data['suhureta']}</p>";

        // Menampilkan data `nilai_suhu_max_humid_max`
        echo "<h2>Data Nilai Suhu dan Kelembaban Maksimum</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Index</th><th>Suhu</th><th>Kelembaban</th><th>Kecepatan</th><th>Timestamp</th></tr>";
        foreach ($data['nilai_suhu_max_humid_max'] as $item) {
            echo "<tr>";
            echo "<td>{$item['idx']}</td>";
            echo "<td>{$item['suhu']}</td>";
            echo "<td>{$item['humid']}</td>";
            echo "<td>{$item['kecepatan']}</td>";
            echo "<td>{$item['timestamp']}</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Menampilkan data `month_year_max`
        echo "<h2>Data Bulan dan Tahun Maksimum</h2>";
        echo "<ul>";
        foreach ($data['month_year_max'] as $monthYear) {
            echo "<li>Bulan-Tahun: {$monthYear['month_year']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Error: Gagal mengambil data JSON.</p>";
    }
    ?>
</body>
</html>
