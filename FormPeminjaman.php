<?php

date_default_timezone_set('Asia/Makassar');

require 'Model.php';

$id     = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit = $id > 0;
$data   = $isEdit ? getPeminjamanById($id) : null;

$db          = buatKoneksi();
$listMember  = mysqli_query($db, "SELECT id_member, nama_member FROM member ORDER BY nama_member");
$listBuku    = mysqli_query($db, "SELECT id_buku, judul_buku FROM buku ORDER BY judul_buku");
mysqli_close($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member   = $_POST['id_member'];
    $id_buku     = $_POST['id_buku'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if ($isEdit) {
        $tgl_pinjam = $_POST['tgl_pinjam'];
        updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    } else {
        $tgl_pinjam = date('Y-m-d');
        insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    }

    header("Location: Peminjaman.php");
    exit;
}

$id_member_val   = $isEdit ? $data['id_member']   : '';
$id_buku_val     = $isEdit ? $data['id_buku']     : '';
$tgl_pinjam_val  = $isEdit ? $data['tgl_pinjam']  : date('Y-m-d');
$tgl_kembali_val = $isEdit ? $data['tgl_kembali'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= $isEdit ? 'Edit' : 'Tambah' ?> Peminjaman</h2>

<div class="card">

    <?php if (!$isEdit): ?>
    <div class="info-waktu">
        🕐 Tanggal pinjam (Banjarmasin/WITA): 
        <strong id="jamSekarang"></strong>
    </div>
    <?php endif; ?>

    <form method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>

        <label>Member</label>
        <select name="id_member" required>
            <option value="">-- Pilih Member --</option>
            <?php while ($m = mysqli_fetch_assoc($listMember)): ?>
            <option value="<?= $m['id_member'] ?>"
                <?= $m['id_member'] == $id_member_val ? 'selected' : '' ?>>
                <?= htmlspecialchars($m['nama_member']) ?>
            </option>
            <?php endwhile; ?>
        </select>

        <label>Buku</label>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php while ($b = mysqli_fetch_assoc($listBuku)): ?>
            <option value="<?= $b['id_buku'] ?>"
                <?= $b['id_buku'] == $id_buku_val ? 'selected' : '' ?>>
                <?= htmlspecialchars($b['judul_buku']) ?>
            </option>
            <?php endwhile; ?>
        </select>

        <?php if ($isEdit): ?>
        <label>Tgl Pinjam</label>
        <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam_val ?>" required>
        <?php endif; ?>

        <label>Tgl Kembali</label>
        <input type="date" name="tgl_kembali" value="<?= $tgl_kembali_val ?>">

        <br>
        <button type="submit" class="btn-simpan">💾 Simpan</button>
        <a href="Peminjaman.php" class="btn-batal">Batal</a>
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