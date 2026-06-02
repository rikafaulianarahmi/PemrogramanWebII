<?php
$pesanNama = "";
$pesanNim = "";
$pesanJK = "";
$nama = "";
$nim = "";
$jk = "";
$hasilOutput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;
    
    if (empty($_POST["nama"])) {
        $pesanNama = "nama tidak boleh kosong";
        $isValid = false;
    } else {
        $nama = $_POST["nama"];
    }

    if (empty($_POST["nim"])) {
        $pesanNim = "nim tidak boleh kosong";
        $isValid = false;
    } else {
        $nim = $_POST["nim"];
    }

    if (empty($_POST["jk"])) {
        $pesanJK = "jenis kelamin tidak boleh kosong";
        $isValid = false;
    } else {
        $jk = $_POST["jk"];
    }

    if ($isValid) {
        $hasilOutput = "<b>Output:</b><br>$nama <br>$nim <br>$jk <br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK202</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $nama ?>"> 
        <span class="error">* <?= $pesanNama ?></span><br>
        
        Nim: <input type="text" name="nim" value="<?= $nim ?>"> 
        <span class="error">* <?= $pesanNim ?></span><br>
        
        Jenis Kelamin: <span class="error">* <?= $pesanJK ?></span><br>
        <input type="radio" name="jk" value="Laki-Laki" <?php if ($jk == "Laki-Laki") echo "checked"; ?>> Laki-Laki<br>
        <input type="radio" name="jk" value="Perempuan" <?php if ($jk == "Perempuan") echo "checked"; ?>> Perempuan<br>
        
        <input type="submit" value="Submit">
    </form>
    <br>

    <?= $hasilOutput ?>

</body>
</html>