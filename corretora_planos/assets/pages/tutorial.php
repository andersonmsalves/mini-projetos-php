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
                        <li><a href="./planos.php">Planos</a></li>
                        <li><a href="./contato.php">Contato</a></li>
                        <li><a href="./contratar.php">Contratar</a></li>
                        <li><a href="./restrito.php">Restrito</a></li>
                        <li class="active"><a href="#">Tutorial</a></li>
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
                        /*echo "<input type='text' name='username' placeholder='username' disabled/>";
                        echo "<input type='password' name='password' placeholder='password' disabled/>";*/

                        echo "<button type='submit' name='btn-login' disabled>Logado</button>";
                        echo "<button name='btn-logout' id='btn-logout'>Sair</button>";
                    }
                    
                ?>    
            </form>

        </aside>

        <main>
            <h2>Tutorial de Uso do Sistema</h2>

            <h3>Descrição</h3>
            <p>
                Este é um prototipo de sistema web baseado puramente em HTML, CSS, Javascript e PHP que simula sistemas de contratação de planos de saude de forma online. Neste sistema é possivel cadastrar vendedores, planos e faixas de preço. As informações são armazenas ao mesmo tempo em um arquivo JSON e no banco de dados.
            </p>

            <h3>Como testar e usar</h3>
            <p>
                Primeiramente cadastre os planos na aba restrita. Em seguida cadastre as faixas de preço para o plano criado previamente. A partir dessas informações é possivel visualizar as informações na aba planos e contratar os planos na aba contratar.
            </p>

            <h3>Melhorias futuras</h3>
            <p>
                As abas contratar e restrita só ficaram acessiveis quando um vendedor cadastrado estiver logado.
            </p>
            <p>
                Outra implementação importante é o menus de navegação dropdown de forma responsivo.
            </p>
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