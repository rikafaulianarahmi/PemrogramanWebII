<?php
$hasilOutput = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];
    $nama3 = $_POST['nama3'];

    if ($nama1 > $nama2) {
        $temp = $nama1; $nama1 = $nama2; $nama2 = $temp;
    }
    if ($nama2 > $nama3) {
        $temp = $nama2; $nama2 = $nama3; $nama3 = $temp;
    }
    if ($nama1 > $nama2) {
        $temp = $nama1; $nama1 = $nama2; $nama2 = $temp;
    }

    $hasilOutput = "<b>Output:</b><br>$nama1 <br>$nama2 <br>$nama3 <br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK201</title>
</head>
<body>
    <form method="POST">
        Nama: 1 <input type="text" name="nama1" required><br>
        Nama: 2 <input type="text" name="nama2" required><br>
        Nama: 3 <input type="text" name="nama3" required><br>
        <input type="submit" value="Urutkan">
    </form>
    <br>

    <?= $hasilOutput ?>
    
</body>
</html>