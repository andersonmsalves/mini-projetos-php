<?php
    session_start();

    require "./connectDatabase.php";
    require "./funcoes.php";

    $nomePlano = $_SESSION['nome-plano'];

    $sql = "SELECT cod_contrato FROM contratos ORDER BY cod_contrato DESC";
    $query = $pdo->query($sql);

    if(!$query){
        // Não há contrato na tabela de contrato, portanto:
        $codigoContrato = 1;

        // var $codigoContrato será utilizado para nomear de forma apropriada o arquivo JSON na pasta data/contratos.

    }else{

        $registroUltimoContrato = $query->fetch();
        $codigoContrato = $registroUltimoContrato['cod_contrato'] + 1;
    }

    $dadosContrato = gerarContrato(); // Ainda no formato de array.

    /*echo "<pre>";
    print_r($dadosContrato);
    echo "</pre>";*/

    // Necessário passar dados para o formato JSON:
    $dadosContratoJSON = json_encode($dadosContrato);

    /*echo "<pre>";
    print_r($dadosContratoJSON);
    echo "</pre>";*/

    $path = "./../data/contratos/";
    $nomeContrato = "contrato_" . $codigoContrato . ".json";
    $pathCompleto = $path . $nomeContrato;

    /*echo "<br>Caminho: $path<br>";
    echo "<br>Nome contrato: $nomeContrato<br>";
    echo "<br>Path completo: $pathCompleto<br>";*/

    $arquivoContrato = fopen($pathCompleto, 'w');
    fwrite($arquivoContrato, $dadosContratoJSON);
    fclose($arquivoContrato);

    $nomes = implode(";",$_SESSION['array-nomes']);
    $idades = implode(";", $_SESSION['array-idades']);
    $faixas = implode(";", $_SESSION['array-faixas']);
    $precos = implode(";", $_SESSION['array-precos']);
    $total = $_SESSION['total'];

    $sql = "INSERT INTO contratos (nomes, idades, faixas, precos, total, data_contrato) VALUES (?, ?, ?, ?, ?, NOW())";
    $query = $pdo->prepare($sql);
    $query->execute(array($nomes, $idades, $faixas, $precos, $total));

    $_SESSION['nome-contrato'] = $nomeContrato;

    unset($_SESSION['nome-plano']);

    header("Location: ./../../index.php");

?>