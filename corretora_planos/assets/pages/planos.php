<?php
    session_start();

    require "./connectDatabase.php";
    require "./funcoes.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Sobre</title>
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
                        <li ><a href="../../index.php">Home</a></li>
                        <li ><a href="./sobre.php">Sobre</a></li>
                        <li class="active"><a href="#">Planos</a></li>
                        <li><a href="./contato.php">Contato</a></li>
                        <li><a href="./contratar.php">Contratar</a></li>
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

        <main>
            <h2>Detalhes dos Planos Disponíveis</h2>

            <table id="faixas-planos">
                <caption>Descrição das Faixas</caption>
                <thead>
                    <tr>
                        <th>Faixa</th>
                        <th>Range Idade (Inicial-Final)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0 - 17</td>
                    <tr>
                    <tr>
                        <td>2</td>
                        <td>18 - 40</td>
                    <tr>
                    <tr>
                        <td>3</td>
                        <td> > 40</td>
                    <tr>
                </tbody>
            </table>

            <?php
                $sql = "SELECT cod_plano, registro, nome, descricao FROM planos ORDER By cod_plano";
                $resultado = $pdo->query($sql);
            ?>

            <table id="descricao-planos">
                <caption>Descrição Planos</caption>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Registro</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($resultado->rowCount() > 0){ // Houve registros retornados.

                            foreach($resultado->fetchAll() as $registro){
                                echo "<tr>";
                                    echo "<td class='td-info'>" . $registro['cod_plano'] . "</td>";
                                    echo "<td class='td-info'>" . $registro['registro'] . "</td>";
                                    echo "<td class='td-info'>" . $registro['nome'] . "</td>";
                                    echo "<td class='td-description'>" . $registro['descricao'] . "</td>";
                                echo "</tr>";
                                                     
                            }//endforeach;
                        }//endif;
                    ?>
                </tbody>
            </table>

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