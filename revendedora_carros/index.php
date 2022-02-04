<?php
    //Obs: session_start deve vir antes de qualquer outra instrução de php, pois pode dar erro segundo Bonieky Lacerda.
    session_start(); 

    require './conexao.php';

    $allRows = "SELECT * FROM carros";

    $allRows = $pdo->query($allRows);

    echo "<br>Numero de registros: " . ($allRows->rowCount() - 1) . "<br>";
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Carros com Filtros</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/style-responsivo.css"/>
</head>
    <body>
        <div class="container">
        
        <div class="formulario">
        <form method="post" action="processar.php">

            <label for="filter">Filtro:</label>
            <select name="filter">
                <option value="id">ID</option>
                <option value="marca">Marca</option>
                <option value="modelo">Modelo</option>
                <option value="versao">Versão</option>
                <option value="segmento">Segemento</option>
                <option value="tipo">Tipo</option>
                <option value="categoria">Categoria</option>
                <option value="ano_modelo">Ano do Modelo</option>
                <option value="descricao">Descrição</option>
                
                
            </select>

            <label for="value-search">Valor:</label>
            <input type="text" name="value-search" placeholder="valor buscado">


            <button type="submit" name="btn-processar">Processar</button>

        </form>

        <?php
            if(isset($_SESSION['return-search'])){

                if(sizeof($_SESSION['return-search']) == 1001){

                    echo "Numero de registros retornados: " . (sizeof($_SESSION['return-search']) - 1);

                }else{

                    echo "Numero de registros retornados: " . sizeof($_SESSION['return-search']);
                }
                
            }
        ?>
        </div>

        <div class="opcoes">
            <div class="grupo-opcoes">
            <h2>Infos principais</h2>
            <input type="checkbox" id="campo-id" checked>ID<br>
            <input type="checkbox" id="campo-marca" checked>Marca<br>
            <input type="checkbox" id="campo-modelo" checked>Modelo<br>
            <input type="checkbox" id="campo-versao" checked>Versão<br>
            </div>

            <div class="grupo-opcoes">
            <h2>Info complementares</h2>
            <input type="checkbox" id="campo-descricao" checked>Descrição<br>
            <input type="checkbox" id="campo-tipo" checked>Tipo<br>
            <input type="checkbox" id="campo-categoria" checked>Categoria<br>
            <input type="checkbox" id="campo-segmento" checked>Segmento<br>
            </div>

            <div class="grupo-opcoes">
            <h2>Ano</h2>
            <input type="checkbox" id="campo-ano_fabricacao" checked>Ano de Fabricação<br>
            <input type="checkbox" id="campo-ano_modelo" checked>Ano do Modelo<br>
            </div>

            <div class="grupo-opcoes">
            <h2>Demais infos</h2>
            <input type="checkbox" id="campo-portas" checked>Portas<br>
            <input type="checkbox" id="campo-preco" checked>Preço<br>
            <input type="checkbox" id="campo-dt_cadastro" checked>Data Cadastro<br>
            </div>
        </div>

        <?php
            if(isset($_POST['btn-processar'])){
                echo "Botão processar foi clicado";
            }         

            $campos = array("ID", "Marca", "Modelo", "Versão", "Descrição", "Tipo", "Categoria", "Segemento", "Ano de Fabricação", "Ano do Modelo", "Nº Portas", "Preço(R$)", "Data de Cadastro");

            //echo "<br>Número de campos: " . sizeof($campos);

            echo "<h2>Tabela de Carros</h2>";
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        /*foreach($campos as $campo){
                            echo "<th class='$campo'>$campo</th>";
                        }*/
                        for($i = 0; $i < sizeof($campos); $i++){

                            echo "<th class='col-$i'>$campos[$i]</th>";
                        }

                    echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                    if(!isset($_SESSION['return-search'])){

                        $registros = $allRows->fetchAll();

                        // Descartar a primeira linha de cabeçalho:
                        $lenRegistros = sizeof($registros);

                        for($i = 1; $i < $lenRegistros; $i++){
                            
                            // Para cada registro criar uma tr:
                            echo "<tr>";

                            // Para cada campo criar um td:
                            for($j = 0; $j < 13; $j++){

                                $valorCampo = $registros[$i][$j];

                                if($valorCampo == "" || $valorCampo == "\0"){

                                    $valorCampo = "Vazio";
                                
                                }

                                echo "<td class='col-$j'>$valorCampo</td>";
                            }

                            echo "</tr>";
                        
                        }// Endfor
                    }else{ // Aqui estamos no caso do retorno da query que foi processada pelo arquivo processar.php:

                        $registros = $_SESSION['return-search'];

                        // Descartar a primeira linha de cabeçalho:
                        $lenRegistros = sizeof($registros);

                        if($lenRegistros == 1001){
                            $i = 1;
                        }else{
                            $i = 0;
                        }

                        for($i; $i < $lenRegistros; $i++){
                            
                            // Para cada registro criar uma tr:
                            echo "<tr>";

                            // Para cada campo criar um td:
                            for($j = 0; $j < 13; $j++){
                                
                                $valorCampo = $registros[$i][$j];

                                if($valorCampo == "" || $valorCampo == "\0"){

                                    $valorCampo = "Vazio";
                                }
                                
                                echo "<td>$valorCampo</td>";
                            }

                            echo "</tr>";
                        
                        }// Endfor
                    }

                    
                echo "</tbody>";

            echo "</table>";

        ?>
        </div>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>