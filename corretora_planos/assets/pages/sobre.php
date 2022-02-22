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
                        <li  class="active"><a href="#">Sobre</a></li>
                        <li><a href="./planos.php">Planos</a></li>
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
            <h2>Sobre a Planium</h2>

            <div class="box">
                <div class="box-image">
                    <img src="../resources/images/contrato_03.jpg">
                </div>

                <div class="box-content">
                
                    Nesciunt laboriosam doloribus consequatur. Sunt, veniam maxime incidunt sit facere dolore explicabo commodi temporibus! Nesciunt voluptas reprehenderit deleniti, nam corrupti asperiores laboriosam ratione maiores, consequuntur ea aspernatur! Totam quod in impedit ratione, doloribus officiis tempore accusamus inventore assumenda laudantium corporis aliquid quos eligendi odio ad expedita culpa ipsam alias natus.

                </div>
                
            </div>

            <div class="box">
                <div class="box-content">
                Voluptatum ducimus corporis, ullam, libero ipsa odit impedit alias voluptatem consequuntur laboriosam, commodi quia eaque reiciendis quam eveniet molestias fuga quo similique nihil numquam omnis nam esse quas? Pariatur nihil quas ipsa? Unde eum assumenda facere doloremque magnam quo tenetur obcaecati est labore nam natus adipisci distinctio, sint ab quibusdam?

                </div>

                <div class="box-image small-img">
                    <img src="../resources/images/medica_cuidando_planeta.jpg">
                </div>
            </div>

            <div class="box">
                <div class="box-content middle-content">
                Sapiente velit quidem sequi est voluptatem labore voluptas, ipsam, deleniti ratione illo nobis odit voluptates quo ducimus fugit pariatur eveniet nostrum amet obcaecati inventore soluta sed! Voluptates dolor inventore nesciunt numquam unde neque assumenda fugit quasi minus molestias excepturi labore incidunt magnam, animi voluptas perferendis obcaecati adipisci quod in sed.

                </div>
            </div>

            <div class="box">
                <div class="box-image">
                    <img src="../resources/images/alimentacao_saudavel_vo_neta.jpg">
                </div>
                <div class="box-image">
                    <img src="../resources/images/casal_curtindo_viagem_deserto.jpg">
                </div>
            </div>
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