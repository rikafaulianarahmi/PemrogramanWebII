<?php
$jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;
?>

<!DOCTYPE html>
<html>
<body>
<form method="post">
    Jumlah Peserta : <input type="number" name="jumlah" value="<?= $jumlah ?>">
    <br><button type="submit">Cetak</button>
</form>

<?php
if ($jumlah > 0) {
    $i = 1;
    while ($i <= $jumlah) {
        $warna = ($i % 2 == 0) ? "green" : "red";
        echo "<h2 style='color:$warna'>Peserta ke-$i</h2>";
        $i++;
    }
}
?>
</body>
</html>