<?php
$mahasiswa = [
    ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
    ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
    ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
    ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
];

for ($i = 0; $i < count($mahasiswa); $i++) {
    $mahasiswa[$i]["akhir"] = ($mahasiswa[$i]["uts"] * 0.4) + ($mahasiswa[$i]["uas"] * 0.6);
    
    if ($mahasiswa[$i]["akhir"] >= 80) {
        $mahasiswa[$i]["huruf"] = "A";
    } elseif ($mahasiswa[$i]["akhir"] >= 70) {
        $mahasiswa[$i]["huruf"] = "B";
    } elseif ($mahasiswa[$i]["akhir"] >= 60) {
        $mahasiswa[$i]["huruf"] = "C";
    } elseif ($mahasiswa[$i]["akhir"] >= 50) {
        $mahasiswa[$i]["huruf"] = "D";
    } else {
        $mahasiswa[$i]["huruf"] = "E";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK402</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 10px; }
        th { background-color: #d3d3d3; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['uts'] ?></td>
            <td><?= $row['uas'] ?></td>
            <td><?= $row['akhir'] ?></td>
            <td><?= $row['huruf'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>