<?php

date_default_timezone_set('Asia/Makassar');

require 'Model.php';

$id       = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit   = $id > 0;
$data     = $isEdit ? getMemberById($id) : null;

// Proses simpan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = $_POST['nama_member'];
    $nomor  = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_bayar = $_POST['tgl_terakhir_bayar'];

    if ($isEdit) {
        updateMember($id, $nama, $nomor, $alamat, $tgl_bayar);
    } else {
        $tgl_mendaftar = date('Y-m-d H:i:s');
        insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_bayar);
    }

    header("Location: Member.php");
    exit;
}

// Nilai default untuk form
$nama_val   = $isEdit ? htmlspecialchars($data['nama_member'])        : '';
$nomor_val  = $isEdit ? htmlspecialchars($data['nomor_member'])       : '';
$alamat_val = $isEdit ? htmlspecialchars($data['alamat'])             : '';
$bayar_val  = $isEdit ? $data['tgl_terakhir_bayar']                   : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= $isEdit ? 'Edit' : 'Tambah' ?> Member</h2>

<div class="card">
    <?php if (!$isEdit): ?>
    <div class="info-waktu">
        🕐 Waktu pendaftaran (Banjarmasin/WITA): 
        <strong id="jamSekarang"></strong>
    </div>
    <?php endif; ?>

    <form method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>

        <label>Nama Member</label>
        <input type="text" name="nama_member" value="<?= $nama_val ?>" required>

        <label>Nomor Member</label>
        <input type="text" name="nomor_member" maxlength="15" value="<?= $nomor_val ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3"><?= $alamat_val ?></textarea>

        <label>Tgl Terakhir Bayar</label>
        <input type="date" name="tgl_terakhir_bayar" value="<?= $bayar_val ?>">

        <br>
        <button type="submit" class="btn-simpan">💾 Simpan</button>
        <a href="Member.php" class="btn-batal">Batal</a>
    </form>
</div>

<script>
    function tampilkanJam() {
        const sekarang = new Date();
        const wita = new Date(sekarang.getTime() + (8 * 60 * 60 * 1000));
        const str  = wita.toISOString().replace('T', ' ').substring(0, 19);
        const el   = document.getElementById('jamSekarang');
        if (el) el.textContent = str + ' WITA';
    }
    tampilkanJam();
    setInterval(tampilkanJam, 1000); 
</script>

</body>
</html>