<?php session_start();
 include_once 'autenticacao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel de Controle</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
		<div class="container">
			<h1>Repositório de Normas e Políticas</h1>
			<p>Seja bem vindo(a) ao</p>
            <h3>Painel de Controle</h3>
            <div class="well span10">  
            <ul class="nav nav-list">
      		<li class="active"><a href="#"><i class="icon-home icon-white"></i> Menu</a></li>
      		<li><a href="consultarNorma.php"><i class="icon-book"></i> Consultar Norma</a></li>
			<li><a href="cadastrarNorma.php"><i class="icon-pencil"></i> Cadastrar Nova Norma</a></li>
			<li><a href="consultarUsuario.php"><i class ="icon-user"></i>Consultar UsuÃ¡rio</a></li>
			<li><a href="cadastrarUsuario.php"><i class ="icon-edit"></i>Cadastrar UsuÃ¡rio</a></li>
			<li><a href="Admin/alterarSenha.php"><i class ="icon-lock"></i>Alterar Senha</a></li>
			<li><a href="sair.php"><i class ="icon-off"></i>Sair</a></li>
            </ul>
        	</div>
        </div>
    </body>
</html>
