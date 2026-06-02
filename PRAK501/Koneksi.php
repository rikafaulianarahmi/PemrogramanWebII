<?php

function buatKoneksi() {
    $host     = "sql204.infinityfree.com";
    $user     = "if0_42013342";
    $password = "rkrk91051";
    $database = "if0_42013342_prak501";

    $koneksi = mysqli_connect($host, $user, $password, $database);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    mysqli_set_charset($koneksi, "utf8mb4");

    return $koneksi;
}
?>