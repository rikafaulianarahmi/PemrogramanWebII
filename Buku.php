<?php

require 'Model.php';

if (isset($_GET['hapus'])) {
    deleteBuku($_GET['hapus']);
    header("Location: Buku.php");
    exit;
}

$dataBuku = getAllBuku();
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

<h2>Data Buku</h2>

<a href="FormBuku.php" class="btn btn-tambah">+ Tambah Buku</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($dataBuku)) :
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td><?= htmlspecialchars($row['penulis']) ?></td>
            <td><?= htmlspecialchars($row['penerbit']) ?></td>
            <td><?= $row['tahun_terbit'] ?></td>
            <td>
                <a href="FormBuku.php?id=<?= $row['id_buku'] ?>" class="btn btn-edit">Edit</a>
                <a href="Buku.php?hapus=<?= $row['id_buku'] ?>"
                   class="btn btn-hapus"
                   onclick="return confirm('Yakin hapus buku ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>