<?php

    session_start();

    require "./connectDatabase.php";

    //echo "Dentro do arquivo ProcessarCadastroPrecos.php";

    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/

    $codigoPlano = addslashes($_POST['cod-plano-selecionado']);

    if($codigoPlano == 'none'){

        $_SESSION['plano-invalido'] = true;
        
        header("Location: ./restrito.php");
    }

    $minimoVidas = addslashes($_POST['min-vidas']);
    $faixa1 = addslashes($_POST['faixa1']);
    $faixa2 = addslashes($_POST['faixa2']);
    $faixa3 = addslashes($_POST['faixa3']);

    $faixa1 = str_replace(",", ".", $faixa1);
    $faixa2 = str_replace(",", ".", $faixa2);
    $faixa3 = str_replace(",", ".", $faixa3);

    $sql = "INSERT INTO precos (cod_plano, minimo_vidas, faixa1, faixa2, faixa3) VALUES (?, ?, ?, ?, ?)";

    $query = $pdo->prepare($sql);
    $query->execute(array($codigoPlano, $minimoVidas, $faixa1, $faixa2, $faixa3));

    header("Location: ./restrito.php");

?>