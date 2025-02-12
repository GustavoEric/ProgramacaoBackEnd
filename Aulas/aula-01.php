<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="txtNascimento" placeholder="Digite seu ano de nascimento:">
        <button type="submit">Enviar</button>
    </form>
    <?php
    //Declaração de variaveis
    $nascimento = (int) $_POST['txtNascimento'];
    $anoAtual = date('Y');
    $copas=[];
    $cont=0;

    //Adicionando anos de copas do mundo no array
    for($i=1930;$i<=$anoAtual; $i+=4){
        $copas[] = $i;
    }
    print_r($copas);

    //For do nascimeno até o ano atual e comparando com as copas do mundo no array e somando +1 no contador
    for($x=$nascimento; $x<=$anoAtual; $x++){
        foreach ($copas as $copaAno) {
           if($x == $copaAno){
            $cont++;
           }
        }
    }
    echo('<br>Desde o dia do seu nascimento ocorerram '.$cont. ' copas do mundo');
?>
</body>
</html>