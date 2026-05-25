<?php
$tinggi = isset($_POST['tinggi']) ? (int)$_POST['tinggi'] : 0;
$gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
?>

<!DOCTYPE html>
<html>
<body>
<form method="post">
    Tinggi : <input type="number" name="tinggi" value="<?= $tinggi ?>"><br>
    Alamat Gambar : <input type="text" name="gambar" value="<?= htmlspecialchars($gambar) ?>" size="40"><br>
    <button type="submit">Cetak</button>
</form>

<?php
if ($tinggi > 0 && $gambar != '') {
    $baris = 1;
    while ($baris <= $tinggi) {
        $indent = ($baris - 1) * 32;
        echo "<div style='margin-left:{$indent}px'>";
        $kolom = $tinggi - $baris + 1;
        $j = 1;
        while ($j <= $kolom) {
            echo "<img src='$gambar' width='32' height='32'>";
            $j++;
        }
        echo "</div>";
        $baris++;
    }
}
?>
</body>
</html>