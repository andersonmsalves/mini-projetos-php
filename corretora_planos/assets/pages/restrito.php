<?php
    session_start();

    require "./connectDatabase.php";
    require "./funcoes.php";

    if(!isset($_SESSION['id_vendedor'])){
        
        header("Location: ../../index.php");
    }

    if(isset($_SESSION['plano-registrado'])){
        $planoCadastrado = $_SESSION['plano-registrado'];
        $nomePlano = $planoCadastrado[1];
        echo "<script>alert('O plano:  " . $nomePlano . " foi cadastrado.')</script>" ;
        
        unset($_SESSION['plano-registrado']);
    }

    if(isset($_SESSION['vendedor-cadastrado'])){
        $nomeVendedor = $_SESSION['vendedor-cadastrado'][0];
        $emailVendedor = $_SESSION['vendedor-cadastrado'][1];

        echo "<script>alert('Vendedor: " . $nomeVendedor . " cadastrado com sucesso')</script>";

        unset($_SESSION['vendedor-cadastrado']);
    }

    if(isset($_SESSION['plano-invalido'])){

        echo "<script>alert('Selecione um plano valido')</script>";

        unset($_SESSION['plano-invalido']);
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
                        <li><a href="./contratar.php">Contratar</a></li>
                        <li class="active"><a href="#">Restrito</a></li>
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
            <h2>Cadastrar vendedor</h2>

            <form id="form-cadastrar-vendedor" method="post" action="./processarCadastroVendedor.php">
                <label for="nome-vendedor">Nome:</label>
                <input type="text" name="nome-vendedor" placeholder="Nome do vendedor" required/>

                <label for="email-vendedor">Email:</label>
                <input type="email" name="email-vendedor" placeholder="E-mail do vendedor" required/>

                <label for="password-vendedor">Senha:</label>
                <input type="password" name="password-vendedor" maxlength="20" placeholder="password" required/>

                <button type="submit" name="btn-cadastrar-vendedor">Cadastrar</button>
            </form>

            <h2>Cadastrar plano</h2>
            <form id="form-cadastrar-plano" action="./processarCadastroPlano.php" method="post">
                <label for="cod-plano">Código do plano</label>
                <input type="number" name="cod-plano" placeholder="0" min="1" required>

                <label for="registro-plano">Registro:</label>
                <input type="text" name="registro-plano" placeholder="Registro" required/>

                <label for="nome-plano">Nome:</label>
                <input type="text" name="nome-plano" placeholder="Nome do plano" required/>

                <label for="descricao-plano">Descrição:</label>
                <textarea name="descricao-plano" maxlength="1000"></textarea>

                <button type="submit" name="btn-cadastrar-plano">Cadastrar</button>
            </form>

            <?php
                $sql = "SELECT cod_plano, nome FROM planos ORDER BY cod_plano";
                $resultado = $pdo->query($sql);              
            ?>

            <h2>Cadastrar Preços</h2>
            <form id="form-cadastrar-precos" action="./processarCadastroPrecos.php" method="post">
                <label for="cod-plano-selecionado">Plano selecionado:</label>
                <select name="cod-plano-selecionado">
                    <option value="none">Selecione</option>
                    <?php
                        if($resultado->rowCount() > 0){ // Houve registros retornados.

                            foreach($resultado->fetchAll() as $registro){
        
                                echo "<option value='" . $registro['cod_plano'] . " '> " . $registro['nome'] . "</option>";                     
                            }//endforeach;
                        }//endif;
                    ?>                    
                </select>

                <label for="min-vidas">Número Mínimo de Vidas:</label>
                <input type="number" name="min-vidas" min="1" step="1" placeholder="0" required>

                <label for="faixa1">Faixa 1:</label>
                <input type="text" name="faixa1" placeholder="R$0,00" required>

                <label for="faixa2">Faixa 2:</label>
                <input type="text" name="faixa2" placeholder="R$0,00" required>

                <label for="faixa3">Faixa 3:</label>
                <input type="text" name="faixa3" placeholder="R$0,00" required>

                <button type="submit" name="btn-cadastrar-precos">Cadastrar</button>
            </form>
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