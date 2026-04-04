<?php
$smartphones = [
    "hp1" => "Samsung Galaxy S22", 
    "hp2" => "Samsung Galaxy S22+", 
    "hp3" => "Samsung Galaxy A03", 
    "hp4" => "Samsung Galaxy Xcover 5"
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK105</title>
    <style>
        table {
            border: 1px solid black;
            border-spacing: 2px; 
        }
        
        th, td {
            border: 1px solid black;
            text-align: left; 
        }
        
        th {
            background-color: red;
            padding: 25px 10px; 
            font-size: 26px; 
            font-weight: bold;
        }
        
        td {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php foreach ($smartphones as $key => $hp) : ?>
        <tr>
            <td><?= $hp ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>