<?php 
$valor = $_POST["valor"];
$taxa = $_POST["taxa"];
$meses = $_POST["meses"];
$resultado = ($valor + (($valor*$taxa)/100))* $meses;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Resultado</h1>
    <h2><?= $resultado?></h2>
</body>
</html>