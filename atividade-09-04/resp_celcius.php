<?php
$idade1 = $_POST['Primeiro_n'];

$result = ($idade1 * 9/5) + 32;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        A temperatura de celcius para fahrenheit é de <?= $result?>;
    </h1>
</body>
</html>