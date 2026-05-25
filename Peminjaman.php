<?php

require 'Model.php';

if (isset($_GET['hapus'])) {
    deletePeminjaman($_GET['hapus']);
    header("Location: Peminjaman.php");
    exit;
}

$dataPeminjaman = getAllPeminjaman();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="nav">
    <a href="Member.php">Member</a>
    <a href="Buku.php">Buku</a>
    <a href="Peminjaman.php">Peminjaman</a>
</div>

<h2>Data Peminjaman</h2>

<a href="FormPeminjaman.php" class="btn btn-tambah">+ Tambah Peminjaman</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Judul Buku</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($dataPeminjaman)) :
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td><?= $row['tgl_pinjam'] ?></td>
            <td><?= $row['tgl_kembali'] ? $row['tgl_kembali'] : '-' ?></td>
            <td>
                <a href="FormPeminjaman.php?id=<?= $row['id_peminjaman'] ?>" class="btn btn-edit">Edit</a>
                <a href="Peminjaman.php?hapus=<?= $row['id_peminjaman'] ?>"
                   class="btn btn-hapus"
                   onclick="return confirm('Yakin hapus data peminjaman ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>