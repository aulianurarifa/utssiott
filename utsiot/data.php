<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Suhu dan Kelembapan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .section h3 {
            margin: 0 0 10px;
            font-size: 1.2em;
            color: #333;
        }
        .data-item {
            margin-bottom: 8px;
            padding: 8px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .data-item strong {
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Suhu dan Kelembapan</h2>

    <?php
    // Data JSON yang akan ditampilkan
    $data = [
        "suhumax" => 36,
        "suhumin" => 30,
        "suhu_rata" => 33.5,
        "hasil_suhu_max_humid_max" => [
            [
                "idx" => 131,
                "suhum" => 36,
                "humid" => 36,
                "kecerahan" => 23,
                "timestamp" => "2010-09-18 07:23:33"
            ],
            [
                "idx" => 226,
                "suhum" => 36,
                "humid" => 36,
                "kecerahan" => 27,
                "timestamp" => "2011-05-02 12:29:44"
            ]
        ],
        "month_year_max" => [
            [
                "humid" => 6,
                "month_year" => "9-2010"
            ],
            [
                "month_year" => "8-2011"
            ]
        ]
    ];

    // Tampilkan Ringkasan
    echo '<div class="section">';
    echo '<h3>Ringkasan</h3>';
    echo '<div class="data-item"><strong>Suhu Maksimum:</strong> ' . $data['suhumax'] . '</div>';
    echo '<div class="data-item"><strong>Suhu Minimum:</strong> ' . $data['suhumin'] . '</div>';
    echo '<div class="data-item"><strong>Suhu Rata-rata:</strong> ' . $data['suhu_rata'] . '</div>';
    echo '</div>';

    // Tampilkan Data Suhu dan Kelembapan Maksimum
    echo '<div class="section">';
    echo '<h3>Data Suhu dan Kelembapan Maksimum</h3>';
    foreach ($data['hasil_suhu_max_humid_max'] as $record) {
        echo '<div class="data-item">';
        echo '<strong>Index:</strong> ' . $record['idx'] . '<br>';
        echo '<strong>Suhu:</strong> ' . $record['suhum'] . '<br>';
        echo '<strong>Kelembapan:</strong> ' . $record['humid'] . '<br>';
        echo '<strong>Kecerahan:</strong> ' . $record['kecerahan'] . '<br>';
        echo '<strong>Timestamp:</strong> ' . $record['timestamp'];
        echo '</div>';
    }
    echo '</div>';

    // Tampilkan Kelembapan Maksimum Bulanan
    echo '<div class="section">';
    echo '<h3>Kelembapan Maksimum Bulanan</h3>';
    foreach ($data['month_year_max'] as $month) {
        echo '<div class="data-item">';
        echo '<strong>Kelembapan:</strong> ' . (isset($month['humid']) ? $month['humid'] : 'N/A') . '<br>';
        echo '<strong>Bulan-Tahun:</strong> ' . $month['month_year'];
        echo '</div>';
    }
    echo '</div>';
    ?>
</div>

</body>
</html>
