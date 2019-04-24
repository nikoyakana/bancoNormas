<?php session_start();
 include_once './autenticacao.php';
    //esse comando serve para verificar se o usuario esta ou nao logado evitando invasao

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>o</title>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Biblioteca da Cris</h1>
            <div class="well span10">          
            <ul class="nav nav-list">
                  <li class="active"><a href="#"><i class="icon-user icon-white"></i> Cadastro de Usuário</a></li>
                   <li><a href="painel.php"><i class="icon-home"></i> Voltar</a></li>
            </ul>
            <br>
            <form action="gravarusuario.php" method="post">
                <label>
                    <p class="text-info"><strong>Nome:</strong></p>
                    <input type="text" name="nome" required>
                </label>
                <label>
                    <p class="text-info"><strong>E-mail::</strong></p>
                    <input type="text" name="email" required>
                </label>
                <label>
                    <p class="text-info"><strong>Login:</strong></p>
                    <input type="number" name="login" required>
                </label>
                <label>
                    <p class="text-info"><strong>Senha:</strong></p>
                    <input type="password" name="senha" required>
                </label>
                    <p class="text-info"><strong>Perfil:</strong></p>
                    <label><input type="radio" name="perfil" value="admin" checked> <i class="icon-flag">Administrador</i>
                </label>
                    <label><input type="radio" name="perfil" value="user"><i class="icon-leaf">Usuário</i>
                </label>                    
                             
                <input type="submit" value="Cadastrar" class="btn btn-info">
            </form>
            </div>
        </div>
         
    </body>
</html>