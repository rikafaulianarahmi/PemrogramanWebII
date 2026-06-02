<?php
$hasilKonversi = "";
$nilai = $_POST['nilai'] ?? '';
$dari = $_POST['dari'] ?? '';
$ke = $_POST['ke'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($nilai) && !empty($dari) && !empty($ke)) {
    $suhu = 0;
    $satuan = "";

    if ($dari == "Celcius") {
        if ($ke == "Celcius") { $suhu = $nilai; $satuan = "°C"; }
        elseif ($ke == "Fahrenheit") { $suhu = ($nilai * 9/5) + 32; $satuan = "°F"; }
        elseif ($ke == "Rheamur") { $suhu = $nilai * 4/5; $satuan = "°R"; }
        elseif ($ke == "Kelvin") { $suhu = $nilai + 273.15; $satuan = "°K"; }
    }
    elseif ($dari == "Fahrenheit") {
        if ($ke == "Celcius") { $suhu = ($nilai - 32) * 5/9; $satuan = "°C"; }
        elseif ($ke == "Fahrenheit") { $suhu = $nilai; $satuan = "°F"; }
        elseif ($ke == "Rheamur") { $suhu = ($nilai - 32) * 4/9; $satuan = "°R"; }
        elseif ($ke == "Kelvin") { $suhu = ($nilai - 32) * 5/9 + 273.15; $satuan = "°K"; }
    }
    elseif ($dari == "Rheamur") {
        if ($ke == "Celcius") { $suhu = $nilai * 5/4; $satuan = "°C"; }
        elseif ($ke == "Fahrenheit") { $suhu = ($nilai * 9/4) + 32; $satuan = "°F"; }
        elseif ($ke == "Rheamur") { $suhu = $nilai; $satuan = "°R"; }
        elseif ($ke == "Kelvin") { $suhu = ($nilai * 5/4) + 273.15; $satuan = "°K"; }
    }
    elseif ($dari == "Kelvin") {
        if ($ke == "Celcius") { $suhu = $nilai - 273.15; $satuan = "°C"; }
        elseif ($ke == "Fahrenheit") { $suhu = ($nilai - 273.15) * 9/5 + 32; $satuan = "°F"; }
        elseif ($ke == "Rheamur") { $suhu = ($nilai - 273.15) * 4/5; $satuan = "°R"; }
        elseif ($ke == "Kelvin") { $suhu = $nilai; $satuan = "°K"; }
    }
    
    $hasilKonversi = "<b>Hasil Konversi: " . round($suhu, 1) . " " . $satuan . "</b>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK203</title>
</head>
<body>
    <form method="POST">
        Nilai: <input type="number" step="any" name="nilai" value="<?= $nilai ?>" required><br><br>
        
        Dari:<br>
        <input type="radio" name="dari" value="Celcius" <?= ($dari == "Celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit" <?= ($dari == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur" <?= ($dari == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin" <?= ($dari == "Kelvin") ? "checked" : "" ?>> Kelvin<br><br>
        
        Ke:<br>
        <input type="radio" name="ke" value="Celcius" <?= ($ke == "Celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit" <?= ($ke == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur" <?= ($ke == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin" <?= ($ke == "Kelvin") ? "checked" : "" ?>> Kelvin<br><br>
        
        <input type="submit" value="Konversi">
    </form>
    <br>

    <?= $hasilKonversi ?>

</body>
</html>