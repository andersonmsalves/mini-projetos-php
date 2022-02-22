<script src="./../js/funcoes.js"></script>

<?php
    session_start();

    require "./connectDatabase.php";
    require "./funcoes.php";

    if(!isset($_SESSION['id_vendedor'])){
        
        header("Location: ../../index.php");
    }

    if(isset($_SESSION['erro'])){

        echo "<script type='text/javascript'>conditionError();</script>";

        unset($_SESSION['erro']);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planium</title>
    <link rel="stylesheet" type="text/css" href="../css/skeleton.css" />
    <link rel="stylesheet" type="text/css" href="../css/media-queries.css"/>
</head>
<body>
    <div class="container">
        <header>
            <div class="img-header">
                <img src="../resources/images/care.png" alt="logo-site"/>
            </div>

            <div class="header-content">
                <nav>
                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="./sobre.php">Sobre</a></li>
                        <li><a href="./planos.php">Planos</a></li>
                        <li><a href="./contato.php">Contato</a></li>
                        <li class="active"><a href="#">Contratar</a></li>
                        <li><a href="./restrito.php">Restrito</a></li>
                        <li><a href="./tutorial.php">Tutorial</a></li>
                    </ul>
                </nav>

                <div class="header-content-complement">
                    <p id="relogio"></p>
                </div>
            </div>
            
        </header>

        <div class="conteudo-site">
        <aside>
            <h3>Login</h3>
            <form>
                <?php 
                    if(!isset($_SESSION['id_vendedor'])){
                        echo "<input type='text' name='username' placeholder='username'/>";
                        echo "<input type='password' name='password' placeholder='password'/>";

                        echo "<button type='submit' name='btn-login'>Entrar</button>";
                    
                    }else{

                        echo "<button type='submit' name='btn-login' disabled>Logado</button>";
                        echo "<button name='btn-logout' id='btn-logout'>Sair</button>";
                    }
                    
                ?> 
            </form>

        </aside>

        <?php
            $sql = "SELECT cod_plano, nome FROM planos ORDER BY cod_plano";
            $resultado = $pdo->query($sql);              
        ?>

        <main>
            <h2>Página contratar</h2>

            <form id="form-escolher-plano" action="" method="post">

                <label for="plano-escolhido">Plano:</label>
                <select name="plano-escolhido">
                    <option value="">Selecione</option>

                    <?php
                        if($resultado->rowCount() > 0){ // Houve registros retornados.

                            foreach($resultado->fetchAll() as $registro){
        
                                echo "<option value='" . $registro['cod_plano'] . " '> " . $registro['nome'] . "</option>";                     
                            }//endforeach;
                        }//endif;
                    ?>
                </select>

                <label for="num-vidas">Numero de integrantes:</label>
                <input type="number" name="num-vidas" min="1" step="1" placeholder="0" required>

                <button type="submit" name="btn-plano-numVidas">Escolher</button>
            </form>

            <?php
                if(isset($_POST['btn-plano-numVidas'])){
                    
                    $codigo = addslashes($_POST['plano-escolhido']);
                    $numVidas = addslashes($_POST['num-vidas']);
                    
                    $codigo = (int) $codigo;
                    $_SESSION['codigo-plano'] = $codigo;

                    $numVidas = (int) $numVidas;
                    $_SESSION['num-vidas'] = $numVidas;

                    if($codigo != "" && $codigo != 0){
                        echo "<form id='form-cadastro-integrantes' action='./processarDadosContrato.php' method='post'>";

                            for($i = 0; $i < $numVidas; $i++){
                                $cadastro = $i + 1;
                                echo "<label>Nome $cadastro:</label>";
                                echo "<input type='text' maxlength='40' name='nomes[]' placeholder='Nome $cadastro' required>";
                                echo "<label>Idade $cadastro:</label>";
                                echo "<input type='number' name='idades[]' placeholder='0' required>";
                            
                            }//endfor;
                            echo "<button type='submit' name='btn-processar-infos'>Proximo</button>";
                        echo "</form>";
                    }else{
                        echo "<script>alert('Escolha um plano')</script>";
                    }
            
                    //unset($_POST['btn-plano-numVidas']);
                }
            ?>

            <?php
                if(isset($_SESSION['nome-plano'])){

                    $nomePlano = $_SESSION['nome-plano'];
                    echo "<h3>$nomePlano</h3>";

                    $nomesContratantes = $_SESSION['array-nomes'];
                    $idadesContratantes = $_SESSION['array-idades'];
                    $faixasContratantes = $_SESSION['array-faixas'];
                    $arrayPrecos = $_SESSION['array-precos'];
                    $total = $_SESSION['total'];

                    $qtdContratantes = sizeof($nomesContratantes);

                    echo "<table>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Nome</th>";
                                echo "<th>Idade</th>";
                                echo "<th>Faixa</th>";
                                echo "<th>Preço(R$)</th>";
                            echo "</tr>";
                        echo "</thread>";

                        echo "<tbody>";
                            for($i = 0; $i < $qtdContratantes; $i++){
                                echo "<tr>";
                                echo "<td>". $nomesContratantes[$i] ."</td>";
                                echo "<td>". $idadesContratantes[$i] ."</td>";
                                echo "<td>". $faixasContratantes[$i] ."</td>";
                                echo "<td>". $arrayPrecos[$i]."</td>";
                                echo "</tr>";
                            }

                            echo "<tr>";
                                echo "<td colspan='3' style='text-align: right;'>Valor total do contrato R$</td>";
                                echo "<td>" . $total. "</td>";
                            echo "</tr>";
                        echo "<tbody>";                
                    echo "</table>";

                    echo "<form action='./processarContratacao.php' method='post'>";
                        echo "<button type='submit' name='btn-contratar'>Contratar</button>";
                    echo "</form>";
                }//endif;
            ?>
        </main>
        </div>

        <footer>
            <p>Desenvolvido por Anderson M. S. Alves</p>
        </footer>
    </div>
    
    <!--Scripts-->
    <script src="../js/relogioDigital.js"></script>
    <script src="../js/manipulacaoDOM.js"></script>
</body>
</html>