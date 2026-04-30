<?php
$mahasiswa = [
    ["nama" => "Andi", "nim" => "001", "uts" => 70, "uas" => 80],
    ["nama" => "Budi", "nim" => "002", "uts" => 50, "uas" => 60],
    ["nama" => "Yoga", "nim" => "003", "uts" => 90, "uas" => 85],
    ["nama" => "Dina", "nim" => "004", "uts" => 40, "uas" => 55],
    ["nama" => "Eka", "nim" => "005", "uts" => 75, "uas" => 70],
];

function nilaiAkhir($uts, $uas) {
    return ($uts + $uas) / 2;
}

function grade($nilai) {
    if ($nilai >= 80) {
        return "A";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 60) {
        return "C";
    } elseif ($nilai >= 50) {
        return "D";
    } else {
        return "E";
    }
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabel Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        .merah {
            background-color: #ffcccc;
        }
    </style>
</head>
<body>

<h2>Tabel Nilai Mahasiswa</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
        <th>Grade</th>
    </tr>

    <?php
    $no = 1;

    foreach ($mahasiswa as $mhs) {
        $akhir = nilaiAkhir($mhs["uts"], $mhs["uas"]);
        $g = grade($akhir);
        $total += $akhir;

        $warna = "";
        if ($akhir < 60) {
            $warna = "merah";
        }

        echo "<tr class='$warna'>";
        echo "<td>$no</td>";
        echo "<td>{$mhs['nama']}</td>";
        echo "<td>{$mhs['nim']}</td>";
        echo "<td>{$mhs['uts']}</td>";
        echo "<td>{$mhs['uas']}</td>";
        echo "<td>$akhir</td>";
        echo "<td>$g</td>";
        echo "</tr>";

        $no++;
    }

    $rata = $total / count($mahasiswa);
    ?>
</table>

<br>

<h3>Rata-rata kelas: <?php echo $rata; ?></h3>

</body>
</html>