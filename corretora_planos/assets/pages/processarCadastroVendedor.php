<?php
    require "./connectDatabase.php";

    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/

    $nome = addslashes($_POST['nome-vendedor']);
    $email = addslashes($_POST['email-vendedor']);
    $senha = md5(addslashes($_POST['password-vendedor']));


    /*echo "Nome: $nome <br>";
    echo "E-mail: $email <br>";
    echo "Senha $senha<br>";*/


    $sql = "INSERT INTO vendedores (nome, email, senha) VALUE (?, ?, ?)";

    $query = $pdo->prepare($sql);
    $query->execute(array($nome, $email, $senha));

    $_SESSION['vendedor-cadastrado'] = array($nome, $email);

    header("Location: ./restrito.php");
?>