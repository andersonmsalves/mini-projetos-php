<?php
    session_start();

    require "./conexao.php";

    echo "<br>Na rotina processar<br>";

    // Pegar os campos informados e prevenindo possiveis ataques de SQL Injection:
    /*$filtroBuscado = preg_replace('/[^[:alpha:]_]/', '',$_POST['filter']);
    $valorBuscado = preg_replace('/[^[:alpha:]_]/', '',$_POST['value-search']);*/
    $filtroBuscado =  addslashes($_POST['filter']);
    $valorBuscado = addslashes($_POST['value-search']);

    echo "<br>Filtro buscado: " . $filtroBuscado . "<br>";
    echo "<br>Valor buscado: " . $valorBuscado . "<br>";

    //print_r($pdo);
    //die;

    if($valorBuscado == ""){
        $query = "SELECT * FROM carros";
    }else{
        $query = "SELECT * FROM carros WHERE $filtroBuscado LIKE '%$valorBuscado%' ";
    }
        
    $query = $pdo->query($query);

    $_SESSION['return-search'] = $query->fetchAll();

    echo sizeof($_SESSION['return-search']);

    //die;

    header("Location: ./index.php");


?>