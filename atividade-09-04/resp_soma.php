<?php 
$num1 = $_POST['Primeiro_n'];
$num2 = $_POST['Segundo_n'];

$result = $num1 * $num2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>A Soma de <?= $num1?> mais <?= $num2?> é <?= $result?></h1>
</body>
</html>