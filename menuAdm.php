<?php session_start();
 include_once './autenticacao.php';
    //esse comando serve para verificar se o usuario esta ou nao logado evitando invasao
?>

<div class="container">
            <h1>Biblioteca da Cris</h1>
              <div class="well span10">  
            <ul class="nav nav-list">
      <li class="active"><a href="#"><i class="icon-home icon-white"></i> Menu</a></li>
      <li><a href="consultarLivro.php"><i class="icon-book"></i> Consultar Biblioteca</a></li>
      <li><a href="cadastrarlivro.php"><i class="icon-pencil"></i> Cadastrar Novo Livro</a></li>
      <li><a href="consultarUsuario.php"><i class ="icon-user"></i>Consultar Usuário</a></li>
      <li><a href="cadastrarUsuario.php"><i class ="icon-edit"></i>Cadastrar Usuário</a></li>
      <li><a href="alterarSenha.php"><i class ="icon-lock"></i>Alterar Senha</a></li>
      <li><a href="sair.php"><i class ="icon-off"></i>Sair</a></li>
            </ul>
        </div></div>



