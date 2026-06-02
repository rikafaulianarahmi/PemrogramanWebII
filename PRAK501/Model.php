<?php
require 'Koneksi.php';

function getAllMember() {
    $db     = buatKoneksi();
    $result = mysqli_query($db, "SELECT * FROM member ORDER BY id_member DESC");
    mysqli_close($db);
    return $result;
}

function getMemberById($id) {
    $db     = buatKoneksi();
    $id     = (int)$id;
    $result = mysqli_query($db, "SELECT * FROM member WHERE id_member = $id");
    $data   = mysqli_fetch_assoc($result);
    mysqli_close($db);
    return $data;
}

function insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_bayar) {
    $db           = buatKoneksi();
    $nama         = mysqli_real_escape_string($db, $nama);
    $nomor        = mysqli_real_escape_string($db, $nomor);
    $alamat       = mysqli_real_escape_string($db, $alamat);
    $tgl_mendaftar = mysqli_real_escape_string($db, $tgl_mendaftar);
    $tgl_bayar    = mysqli_real_escape_string($db, $tgl_bayar);

    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar)
            VALUES ('$nama', '$nomor', '$alamat', '$tgl_mendaftar', '$tgl_bayar')";

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_bayar) {
    $db       = buatKoneksi();
    $id       = (int)$id;
    $nama     = mysqli_real_escape_string($db, $nama);
    $nomor    = mysqli_real_escape_string($db, $nomor);
    $alamat   = mysqli_real_escape_string($db, $alamat);
    $tgl_bayar = mysqli_real_escape_string($db, $tgl_bayar);

    $sql = "UPDATE member
            SET nama_member='$nama', nomor_member='$nomor',
                alamat='$alamat', tgl_terakhir_bayar='$tgl_bayar'
            WHERE id_member = $id";

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function deleteMember($id) {
    $db     = buatKoneksi();
    $id     = (int)$id;
    $result = mysqli_query($db, "DELETE FROM member WHERE id_member = $id");
    mysqli_close($db);
    return $result;
}

// FUNGSI BUKU

function getAllBuku() {
    $db     = buatKoneksi();
    $result = mysqli_query($db, "SELECT * FROM buku ORDER BY id_buku DESC");
    mysqli_close($db);
    return $result;
}

function getBukuById($id) {
    $db     = buatKoneksi();
    $id     = (int)$id;
    $result = mysqli_query($db, "SELECT * FROM buku WHERE id_buku = $id");
    $data   = mysqli_fetch_assoc($result);
    mysqli_close($db);
    return $data;
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $db       = buatKoneksi();
    $judul    = mysqli_real_escape_string($db, $judul);
    $penulis  = mysqli_real_escape_string($db, $penulis);
    $penerbit = mysqli_real_escape_string($db, $penerbit);
    $tahun    = (int)$tahun;

    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit)
            VALUES ('$judul', '$penulis', '$penerbit', $tahun)";

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $db       = buatKoneksi();
    $id       = (int)$id;
    $judul    = mysqli_real_escape_string($db, $judul);
    $penulis  = mysqli_real_escape_string($db, $penulis);
    $penerbit = mysqli_real_escape_string($db, $penerbit);
    $tahun    = (int)$tahun;

    $sql = "UPDATE buku
            SET judul_buku='$judul', penulis='$penulis',
                penerbit='$penerbit', tahun_terbit=$tahun
            WHERE id_buku = $id";

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function deleteBuku($id) {
    $db     = buatKoneksi();
    $id     = (int)$id;
    $result = mysqli_query($db, "DELETE FROM buku WHERE id_buku = $id");
    mysqli_close($db);
    return $result;
}

// FUNGSI PEMINJAMAN
function getAllPeminjaman() {
    $db  = buatKoneksi();
    $sql = "SELECT p.*, m.nama_member, b.judul_buku
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku   b ON p.id_buku   = b.id_buku
            ORDER BY p.id_peminjaman DESC";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function getPeminjamanById($id) {
    $db     = buatKoneksi();
    $id     = (int)$id;
    $result = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = $id");
    $data   = mysqli_fetch_assoc($result);
    mysqli_close($db);
    return $data;
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $db          = buatKoneksi();
    $id_member   = (int)$id_member;
    $id_buku     = (int)$id_buku;
    $tgl_pinjam  = mysqli_real_escape_string($db, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($db, $tgl_kembali);

    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali)
            VALUES ($id_member, $id_buku, '$tgl_pinjam', '$tgl_kembali')";

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $db          = buatKoneksi();
    $id          = (int)$id;
    $id_member   = (int)$id_member;
    $id_buku     = (int)$id_buku;
    $tgl_pinjam  = mysqli_real_escape_string($db, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($db, $tgl_kembali);

    $sql = "UPDATE peminjaman
            SET id_member=$id_member, id_buku=$id_buku,
                tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali'
            WHERE id_peminjaman = $id";

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function deletePeminjaman($id) {
    $db     = buatKoneksi();
    $id     = (int)$id;
    $result = mysqli_query($db, "DELETE FROM peminjaman WHERE id_peminjaman = $id");
    mysqli_close($db);
    return $result;
}
?>