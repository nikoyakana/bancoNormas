<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Área Administrativa</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<style>
        .erro{
        border:solid 2px red;
        padding:5px;}
        .logout{
        border:solid 2px green;
        padding:5px;}
        </style>
	</head>

	<body>
		<div class="container">
			<h1>Painel de Controle</h1>
			<form action="verificarLogin.php" method="post">
			<label>Login:<br><input type="text" name="login" required></label>
			<label>Senha:<br><input type="password" name="senha" required></label>
			<input type="submit" value="Entrar" class="btn btn-primary"></form>
			</div>

            <!-- MENSAGEM DE ERRO -->
        	<div class="msg">
        	<?php
            if(isset($_GET["erro"])){
            echo "<div class='erro'>".$_GET["erro"]."</div>";
            }elseif(isset($_GET["sair"])){
            echo "<div class='logout'>".$_GET["sair"]."</div>";
            }elseif(isset($_GET["msg"])){
            echo "<div class='invasor'>".$_GET["msg"]."</div>";}
            ?>
        	</div>
        </body>
</html>    