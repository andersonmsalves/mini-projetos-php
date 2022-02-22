<?php
    session_start();

    require "./connectDatabase.php";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    /*echo $_SESSION['codigo-plano'] . "<br>";
    echo $_SESSION['num-vidas'] . "<br>";*/

    $codigo = addslashes($_SESSION['codigo-plano']);
    $vidas = addslashes($_SESSION['num-vidas']);

    $sql = "SELECT * FROM precos WHERE cod_plano = ? AND minimo_vidas <= ? ORDER BY minimo_vidas DESC";
    $query = $pdo->prepare($sql);
    $query->execute(array($codigo, $vidas));

    $numItens = $query->rowCount();
    
    //die;

    //echo "<br>Numero itens: $numItens<br>";

    if($numItens == 0){
        $_SESSION['erro'] = true;

        header("Location: ./contratar.php");
    }else{
        // Resultado da busca retornou com sucesso:
        $opcao = $query->fetch(); // Retorna o primeiro registro dos conjunto de registros encontrados que atendam as condições.

        $faixa1 = $opcao['faixa1'];
        $faixa2 = $opcao['faixa2'];
        $faixa3 = $opcao['faixa3'];

        $idades = $_POST['idades'];

        $precos = array(); // Array para armazenar os valores referentes a cada beneficiario;
        $faixas = array(); // Array para armazenar a faixa respectiva de cada beneficiário.
        $total = 0; // Variavel acumuladora;

        $lenArray = sizeof($idades);

        for($i = 0; $i < $lenArray; $i++){

            if($idades[$i] > 40){

                $precos[] = $faixa3;
                $faixas[] = 3;
                $total += $faixa3;

            }else if($idades[$i] >= 18 && $idades[$i] <= 40){

                $precos[] = $faixa2;
                $faixas[] = 2;
                $total += $faixa2;

            }else if($idades[$i] > 0 && $idades[$i] < 18){
                $precos[] = $faixa1;
                $faixas[] = 1;
                $total += $faixa1;
            }

            
        }//endfor;

        $_SESSION['array-nomes'] = $_POST['nomes'];
        $_SESSION['array-idades'] = $_POST['idades'];
        $_SESSION['array-precos'] = $precos;
        $_SESSION['array-faixas'] = $faixas;
        $_SESSION['total'] = $total;

        $sql = "SELECT nome FROM planos WHERE cod_plano = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($codigo));

        $resultado = $query->fetch();

        $_SESSION['nome-plano'] = $resultado['nome'];

        // Voltar para a página de contratar plano:
        header("Location: ./contratar.php");

        //print_r($resultado);
    }//endElse;

?>