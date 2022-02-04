<?php
    $typeDatabase = "mysql";
    $dbname = "db_carros";
    $host = "localhost";

    $infoConection = "$typeDatabase:dbname=$dbname;host=$host";

    $dbuser = "root";
    $dbpassword = "";

    try{

        $pdo = new PDO($infoConection, $dbuser, $dbpassword);

        echo "Conexão com banco de dados estabelecida com sucesso!";

    }catch(PDOException $e){

        echo "Falou: " . $e->getMessage();
    }
?>