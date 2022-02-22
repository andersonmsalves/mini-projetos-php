<?php
    session_start();

    require "./assets/pages/connectDatabase.php";
    require "./assets/pages/funcoes.php";
    require "./assets/pages/login.php";

    if(!isset($_SESSION['start-site'])){
        $_SESSION['id_vendedor'] = 1234;
        $_SESSION['start-site'] = true;
    }

    if(isset($_SESSION['nome-contrato'])){

        $nomeContrato = $_SESSION['nome-contrato'];

        echo "<script>alert('Contrato: " . $nomeContrato . " foi registrado')</script>";
        
        unset($_SESSION['nome-contrato']);
    }
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Vendas de Planos</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/skeleton.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/media-queries.css"/>
</head>
<body>
    <div class="container">
        <header>
            <div class="img-header">
                <img src="./assets/resources/images/care.png" alt="logo-site"/>
            </div>

            <div class="header-content">
                <nav>
                    <ul>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="./assets/pages/sobre.php">Sobre</a></li>
                        <li><a href="./assets/pages/planos.php">Planos</a></li>
                        <li><a href="./assets/pages/contato.php">Contato</a></li>
                        <li><a href="./assets/pages/contratar.php">Contratar</a></li>
                        <li><a href="./assets/pages/restrito.php">Restrito</a></li>
                        <li><a href="./assets/pages/tutorial.php">Tutorial</a></li>
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
                        echo "<input type='email' name='email' placeholder='username'/>";
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
            <h2>Contratação de planos de saúde sem burocracia</h2>

            <p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque accusamus repudiandae facere sint ratione at maiores iure doloribus explicabo. Dolorum<strong>.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos rerum et sed blanditiis aperiam eum mollitia perspiciatis. Animi, dicta fugit officiis laboriosam ducimus, iure eligendi iste itaque reprehenderit aliquam repellat?</strong>.</p>
            
        </main>
        </div>

        <footer>
            <p>Desenvolvido por Anderson M. S. Alves</p>
        </footer>
    </div>
    
    <!--Scripts-->
    <script src="./assets/js/relogioDigital.js"></script>
    <script src="./assets/js/manipulacaoDOM.js"></script>
    
</body>
</html>