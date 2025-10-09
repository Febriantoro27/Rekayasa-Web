<html>
<head>
    <title>Data Wisata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Daftar Wisata</h2>

    <?php
    function curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    $json_data = curl("http://localhost/RekayasaWeb/GetWisata1.php");

    $data = json_decode($json_data, true);

    if (!empty($data) && is_array($data)) {
        echo "<table>";
        echo "<tr><th>KOTA</th><th>LANDMARK</th><th>TARIF</th></tr>";

        foreach ($data as $item) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['kota']) . "</td>";
            echo "<td>" . htmlspecialchars($item['landmark']) . "</td>";
            echo "<td>" . htmlspecialchars($item['tarif']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>Data tidak ditemukan atau format JSON salah.</p>";
    }
    ?>
</body>
</html>
