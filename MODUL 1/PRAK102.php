<?php
$nim = "2410817120017"; 

$panjang = 8.9;
$lebar = 14.7;
$tinggi = 5.4;

$volume = 0.5 * $panjang * $lebar * $tinggi;

echo number_format($volume, 3, '.', '') . " m3";
?>