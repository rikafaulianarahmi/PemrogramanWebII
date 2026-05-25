<?php

require 'Model.php';

$id     = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit = $id > 0;
$data   = $isEdit ? getBukuById($id) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul    = $_POST['judul_buku'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];

    if ($isEdit) {
        updateBuku($id, $judul, $penulis, $penerbit, $tahun);
    } else {
        insertBuku($judul, $penulis, $penerbit, $tahun);
    }

    header("Location: Buku.php");
    exit;
}

$judul_val    = $isEdit ? htmlspecialchars($data['judul_buku'])  : '';
$penulis_val  = $isEdit ? htmlspecialchars($data['penulis'])     : '';
$penerbit_val = $isEdit ? htmlspecialchars($data['penerbit'])    : '';
$tahun_val    = $isEdit ? $data['tahun_terbit']                  : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= $isEdit ? 'Edit' : 'Tambah' ?> Buku</h2>

<div class="card">
    <form method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>

        <label>Judul Buku</label>
        <input type="text" name="judul_buku" value="<?= $judul_val ?>" required>

        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= $penulis_val ?>">

        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= $penerbit_val ?>">

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" min="1900" max="2099" value="<?= $tahun_val ?>">

        <br>
        <button type="submit" class="btn-simpan">💾 Simpan</button>
        <a href="Buku.php" class="btn-batal">Batal</a>
    </form>
</div>

</body>
</html>