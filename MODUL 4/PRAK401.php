<?php
$panjang = $lebar = $nilai = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $nilai = $_POST["nilai"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK401</title>
    <style>
        table { border-collapse: collapse; }
        td { border: 1px solid black; padding: 5px; width: 30px; text-align: center; }
    </style>
</head>
<body>
    <form method="POST">
        Panjang: <input type="text" name="panjang" value="<?= $panjang ?>"><br>
        Lebar: <input type="text" name="lebar" value="<?= $lebar ?>"><br>
        Nilai: <input type="text" name="nilai" value="<?= $nilai ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $nilaiArray = explode(" ", $nilai);
        $totalElemen = $panjang * $lebar;

        if (count($nilaiArray) == $totalElemen) {
            $index = 0;
            echo "<table>";
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $nilaiArray[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<b>Panjang nilai tidak sesuai dengan ukuran matriks</b>";
        }
    }
    ?>
</body>
</html>