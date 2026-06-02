<?php
$hasilOutput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nilai'])) {
    $nilai = $_POST['nilai'];
    $ejaan = "";

    if ($nilai == 0) {
        $ejaan = "Nol";
    } elseif ($nilai > 0 && $nilai < 10) {
        $ejaan = "Satuan";
    } elseif ($nilai >= 11 && $nilai < 20) {
        $ejaan = "Belasan";
    } elseif ($nilai == 10 || ($nilai >= 20 && $nilai < 100)) {
        $ejaan = "Puluhan";
    } elseif ($nilai >= 100 && $nilai < 1000) {
        $ejaan = "Ratusan";
    } else {
        $ejaan = "Anda Menginput Melebihi Limit Bilangan";
    }

    $hasilOutput = "<b>Hasil: $ejaan</b>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK204</title>
</head>
<body>
    <form method="POST">
        Nilai: <input type="number" name="nilai" value="<?= $_POST['nilai'] ?? '' ?>" required><br>
        <input type="submit" value="Konversi">
    </form>
    <br>

    <?= $hasilOutput ?>

</body>
</html>