<?php
$dataMhs = [
    [
        "no" => 1, 
        "nama" => "Ridho", 
        "matkul" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2, 
        "nama" => "Ratna", 
        "matkul" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3, 
        "nama" => "Tono", 
        "matkul" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

for ($i = 0; $i < count($dataMhs); $i++) {
    $totalSks = 0;
    foreach ($dataMhs[$i]["matkul"] as $mk) {
        $totalSks += $mk["sks"];
    }
    $dataMhs[$i]["total_sks"] = $totalSks;
    
    if ($totalSks < 7) {
        $dataMhs[$i]["keterangan"] = "Revisi KRS";
    } else {
        $dataMhs[$i]["keterangan"] = "Tidak Revisi";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK403</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; text-align: left; }
        th { background-color: #d3d3d3; }
        .revisi { background-color: #ff4d4d; }
        .tidak-revisi { background-color: #4dff4d; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($dataMhs as $mhs) : ?>
            <?php $jmlMatkul = count($mhs["matkul"]); ?>
            <tr>
                <td rowspan="<?= $jmlMatkul ?>"><?= $mhs['no'] ?></td>
                <td rowspan="<?= $jmlMatkul ?>"><?= $mhs['nama'] ?></td>
                
                <td><?= $mhs["matkul"][0]["nama_mk"] ?></td>
                <td><?= $mhs["matkul"][0]["sks"] ?></td>
                
                <td rowspan="<?= $jmlMatkul ?>"><?= $mhs['total_sks'] ?></td>
                
                <td rowspan="<?= $jmlMatkul ?>" class="<?= ($mhs['keterangan'] == 'Revisi KRS') ? 'revisi' : 'tidak-revisi' ?>">
                    <?= $mhs['keterangan'] ?>
                </td>
            </tr>
            
            <?php for ($j = 1; $j < $jmlMatkul; $j++) : ?>
            <tr>
                <td><?= $mhs["matkul"][$j]["nama_mk"] ?></td>
                <td><?= $mhs["matkul"][$j]["sks"] ?></td>
            </tr>
            <?php endfor; ?>
            
        <?php endforeach; ?>
    </table>
</body>
</html>