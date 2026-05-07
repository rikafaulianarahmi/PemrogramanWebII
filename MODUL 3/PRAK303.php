<?php
$bawah = isset($_POST['bawah']) ? (int)$_POST['bawah'] : '';
$atas  = isset($_POST['atas'])  ? (int)$_POST['atas']  : '';
$star  = "star.png";
?>

<!DOCTYPE html>
<html>
<body>
<form method="post">
    Batas Bawah : <input type="number" name="bawah" value="<?= $bawah ?>"><br>
    Batas Atas : <input type="number" name="atas" value="<?= $atas ?>"><br>
    <button type="submit">Cetak</button>
</form>

<?php
if ($bawah !== '' && $atas !== '' && $bawah <= $atas) {
    $i = (int)$bawah;
    echo "<p style='font-size:24px'>";
    do {
        
        if (($i + 7) % 5 == 0) {
            echo "<img src='$star' width='30' height='30'> ";
        } else {
            echo "$i ";
        }
        $i++;
    } while ($i <= (int)$atas);
    echo "</p>";
}
?>
</body>
</html>