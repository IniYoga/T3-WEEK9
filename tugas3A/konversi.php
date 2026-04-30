<?php
function celsiusToFahrenheit($c) {
    return ($c * 9/5) + 32;
}

function fahrenheitToCelsius($f) {
    return ($f - 32) * 5/9;
}

function celsiusToKelvin($c) {
    return $c + 273.15;
}

$hasil = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = $_POST["suhu"];
    $konversi = $_POST["konversi"];

    if (!is_numeric($suhu)) {
        $error = "Input harus berupa angka!";
    } else {
        if ($konversi == "c_to_f") {
            $hasil = "$suhu °C = " . celsiusToFahrenheit($suhu) . " °F";
        } elseif ($konversi == "f_to_c") {
            $hasil = "$suhu °F = " . fahrenheitToCelsius($suhu) . " °C";
        } elseif ($konversi == "c_to_k") {
            $hasil = "$suhu °C = " . celsiusToKelvin($suhu) . " K";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Konversi Suhu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            text-align: center;
            margin-top: 60px;
        }

        .container {
            background: white;
            padding: 25px;
            width: 350px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 15px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background: #4facfe;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #007bff;
        }

        .hasil {
            margin-top: 15px;
            font-weight: bold;
            color: green;
        }

        .error {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Konversi Suhu</h2>

    <form method="POST">
        <input type="text" name="suhu" placeholder="Masukkan suhu..." required>

        <select name="konversi">
            <option value="c_to_f">Celsius → Fahrenheit</option>
            <option value="f_to_c">Fahrenheit → Celsius</option>
            <option value="c_to_k">Celsius → Kelvin</option>
        </select>

        <button type="submit">Konversi</button>
    </form>

    <?php if ($hasil != ""): ?>
        <div class="hasil"><?php echo $hasil; ?></div>
    <?php endif; ?>

    <?php if ($error != ""): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

</body>
</html>