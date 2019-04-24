<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" charset="UTF-8">
		<title>Repositório Normas e Políticas</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/estilo.css" type="text/css">         
		
		<!-- ESTILO DO POP UP DE MENSAGEM -->
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
            <h1>Repositório de Normas e Políticas</h1>
               <div class="topo">
                    <!-- LOGO -->
					<div id="logo">
            		<a href="index.php"><img src="bootstrap/img/logo.png" alt="logo"></a>
					</div>
                    <!-- MENU -->
					<div id="menu" class="well span10">  
					<ul class="nav nav-list">
					<li class="active"><a href="#"><i class="icon-home icon-white"></i> Menu</a></li>
					<li><a href="consultarNorma.php"><i class="icon-book"></i> Consultar Norma</a></li>
					<li><a href="consultarPolitica.php"><i class="icon-book"></i> Consultar Política</a></li>   
					<li><a href="sair.php"><i class ="icon-eject"></i>Sair</a></li></ul>
					</div>
				</div>    
        	<!-- INICIO BUSCADOR  -->
        	<div id="conteudo">
        	<!-- CONEXÃO COM O BANCO -->
        	<?php
            $con=  new PDO('sqlite:data.sqlite');
            ?>
        		<h2>Normas</h2>
        		
            	<h2>Políticas</h2>
            	
        	</div>
        </div>
        <!-- RODAPE -->
        <div id="rodape">
        	Repositório de Normas e Políticas<?php include_once 'includs/rodape.php'; ?>
        </div>
    </body>
</html>


 
 