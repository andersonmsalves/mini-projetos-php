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
                        <li class="active"><a href="#">Contato</a></li>
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
                        /*echo "<input type='text' name='username' placeholder='username' disabled/>";
                        echo "<input type='password' name='password' placeholder='password' disabled/>";*/

                        echo "<button type='submit' name='btn-login' disabled>Logado</button>";
                        echo "<button name='btn-logout' id='btn-logout'>Sair</button>";
                    }
                    
                ?>          
            </form>

        </aside>

        <main>
            <h2>Formulário de Contato</h2>

            <form method="post" id="form-contato">

                <label for="nome-contato">Nome:</label>
                <input type="text" name="nome-contato" placeholder="Seu primeiro nome" required/>

                <label for="email-contato">E-mail:</label>
                <input type="email" name="email-contato" placeholder="Seu melhor e-mail" required/>

                <label for="motivo-contato">Motivo do contato:</label>
                <select name="motivo-contato">
                    <option value="none" selected>Selecione</option>
                    <option value="duvida">Dúvida</option>
                    <option value="sugestao">Sugestão</option>
                    <option value="elogio">Elogio</option>
                    <option value="reclamacao">Reclamação</option>
                    <option value="outros">Outros</option>
                </select>

                <label for="mensagem-contato">Mensagem</label>
                <textarea name="mensagem-contato" maxlength="500"></textarea>

                <button type="submit" name="btn-form-contato">Enviar</button>
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