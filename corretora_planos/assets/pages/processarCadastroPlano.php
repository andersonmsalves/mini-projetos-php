<?php
    session_start();

    require "./connectDatabase.php";

    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/

    $codigo = addslashes($_POST['cod-plano']);
    $registro = addslashes($_POST['registro-plano']);
    $nome = addslashes($_POST['nome-plano']);
    $descricaoPlano = addslashes($_POST['descricao-plano']);

    /*echo "Registro: $registro<br>";
    echo "Nome: $nome<br>";
    echo "Descrição: $descricaoPlano<br>";*/

    $sql = "INSERT INTO planos (cod_plano, registro, nome, descricao) VALUES (?, ?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($codigo, $registro, $nome, $descricaoPlano));  

    $_SESSION['plano-registrado'] = array($registro, $nome);

    header("Location: ./restrito.php");

    die;

    echo "<br>Dentro do aquivo processarCadastroPlano.php<br>";
?>