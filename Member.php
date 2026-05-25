<?php

require 'Model.php';

if (isset($_GET['hapus'])) {
    deleteMember($_GET['hapus']);
    header("Location: Member.php");
    exit;
}

$dataMember = getAllMember();
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

<h2>Data Member</h2>

<a href="FormMember.php" class="btn btn-tambah">+ Tambah Member</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Nomor Member</th>
            <th>Alamat</th>
            <th>Tgl Mendaftar</th>
            <th>Tgl Terakhir Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($dataMember)) :
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['nomor_member']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= $row['tgl_mendaftar'] ?></td>
            <td><?= $row['tgl_terakhir_bayar'] ?></td>
            <td>
                <a href="FormMember.php?id=<?= $row['id_member'] ?>" class="btn btn-edit">Edit</a>
                <a href="Member.php?hapus=<?= $row['id_member'] ?>"
                   class="btn btn-hapus"
                   onclick="return confirm('Yakin hapus member ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>