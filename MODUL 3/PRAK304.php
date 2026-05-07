<?php
$star = "star.png";

if (isset($_POST['tambah'])) {
    $jumlah = (int)$_POST['jumlah'] + 1;
} elseif (isset($_POST['kurang'])) {
    $jumlah = max(0, (int)$_POST['jumlah'] - 1);
} elseif (isset($_POST['submit'])) {
    $jumlah = (int)$_POST['jumlah'];
} else {
    $jumlah = null;
}
?>

<!DOCTYPE html>
<html>
<body>

<?php if ($jumlah === null): ?>
    <form method="post">
        Jumlah bintang <input type="number" name="jumlah"><br>
        <button type="submit" name="submit">Submit</button>
    </form>

<?php else: ?>
    <p>Jumlah bintang <?= $jumlah ?></p>
    <?php
    $i = 1;
    while ($i <= $jumlah) {
        echo "<img src='$star' width='80' height='80'>";
        $i++;
    }
    ?>
    <br>
    <form method="post">
        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>
<?php endif; ?>

</body>
</html>