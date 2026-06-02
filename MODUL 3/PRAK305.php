<?php
$input = isset($_POST['input']) ? $_POST['input'] : '';
?>

<!DOCTYPE html>
<html>
<body>
<form method="post">
    <input type="text" name="input">
    <button type="submit">submit</button>
</form>

<?php
if ($input !== '') {
    $str    = strtolower($input);   
    $panjang = strlen($str);

    echo "<p><b>Input:</b></p><p>$input</p>";
    echo "<p><b>Output:</b></p><p>";

    $i = 0;
    while ($i < $panjang) {
        $karakter = $str[$i];
        $j = 0;
        while ($j < $panjang) {
            if ($j == 0) {
                echo strtoupper($karakter);
            } else {
                echo $karakter;
            }
            $j++;
        }
        $i++;
    }

    echo "</p>";
}
?>
</body>
</html>