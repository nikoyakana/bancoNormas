<?php
session_start();
?>
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
          <h1>Repositpório de Normas e Políticas</h1><?php
            if(isset($_SESSION["id"])) {
                ?>
                    <h3>Painel de Controle</h3>
                    <div class="well span10">  
                    <ul class="nav nav-list">
                      <li class="active"><a href="#"><i class="icon-home icon-white"></i> Menu</a></li>
                      <li><a href="Admin/cadastrarNorma.php"><i class="icon-pencil"></i> Cadastrar Nova Norma</a></li>
                      <li><a href="Admin/consultarNorma.php"><i class ="icon-user"></i>Consultar Norma</a></li>
                      <li><a href="Admin/consultarUsuario.php"><i class ="icon-user"></i>Consultar Usuário</a></li>
                      <li><a href="Admin/cadastrarUsuario.php"><i class ="icon-edit"></i>Cadastrar Usuário</a></li>
                      <li><a href="Admin/alterarSenha.php"><i class ="icon-lock"></i>Alterar Senha</a></li>
                      <li><a href="sair.php"><i class ="icon-off"></i>Sair</a></li>
                    </ul>
                  </div>
                <?php
            } else {?>
               <div class="topo">
                    <!-- LOGO -->
					<div id="logo">
            		  <a href="index.php"><img src="bootstrap/img/logo.png" alt="logo"></a>
					</div>
                    <!-- MENU -->
					<div id="menu" class="well span10">  
					<ul class="nav nav-list">
					<li class="active"><a href="#"><i class="icon-home icon-white"></i> Menu</a></li>
					<li><a href="#"><i class="icon-book"></i>Consultar</a></li>
                    <li><a href="Admin/AdmLogin.php"><i class="icon-book"></i>Inserir</a></li>
                    </ul>
					</div>
				</div>
            <?php
            }?>
        	<!-- INICIO BUSCADOR  -->
        	<div id="conteudo">
        	<!-- CONEX�O COM O BANCO -->
        	<?php
            $con=  new PDO('sqlite:data.sqlite');
            $tipos = [
                'NA' => 'Normas',
                'PL' => 'Políticas'
            ];
            foreach ($tipos as $tipo  => $nome) {
            ?>
                <form>
        		<h2><?php echo $nome; ?></h2>
        		<?php
        		$sth = $con->prepare('SELECT * FROM classe WHERE tipo = :tipo');
        		$sth->execute([
        		    ':tipo' => $tipo,
        		]);
        		while($item = $sth->fetch()) {
        		    ?>
                    <button type="submit" name="classeTipo" value="<?php echo $item['cod'].'|'.$item['tipo'];?>">
                        <?php echo $item['nome'];?>
                    </button><?php
        		}
        		?>
        		<input type="text" name="q">
                <button type="submit" name="tipo" value="<?php echo $tipo;?>">
                    <?php echo $nome;?>
                </button>
                </form><?php
            }?>
            <?php
            if(!empty($_GET['q']) || !empty($_GET['classeTipo'])) {
                if(!empty($_GET['q'])) {
                    list($classe, $tipo) = explode('|', $_GET['classeTipo']);
                    $sth = $con->prepare('
                        SELECT *
                          FROM arquivo
                         WHERE (descricao LIKE :descricao OR numero = :numero) AND tipo = :tipo');
                    $sth->execute([
                        ':descricao' => '%'.$_GET['q'].'%',
                        ':numero' => ltrim($_GET['q'], '0'),
                        ':tipo' => $_GET['tipo']
                    ]);
                } elseif(!empty($_GET['classeTipo'])) {
                    list($classe, $tipo) = explode('|', $_GET['classeTipo']);
                    $sth = $con->prepare('
                        SELECT *
                          FROM arquivo
                         WHERE tipo = :tipo AND classe_cod = :classe');
                    $sth->execute([
                        ':tipo' => $tipo,
                        ':classe' => $classe
                    ]);
                }
                ?><table>
                <?php
                while($item = $sth->fetch()) {
                    $nome_arquivo = $item['tipo'].'-'.str_pad($item['numero'], 3, '0', STR_PAD_LEFT).'-'.$item['classe_cod'];
                    ?><tr>
                      <td><a href="download.php?name=<?php echo $nome_arquivo;?>"><?php echo $nome_arquivo; ?></a></td>
                      <td><?php echo $item['descricao'];?></td>
                      <td><?php echo date('Y-m-d H:i:s', $item['atualizacao']);?></td>
                    </tr><?php
                }
                ?></table><?php
            }
            ?>
        	</div>
        </div>
        <!-- RODAPE -->
        <div id="rodape">
        	Repositório de Normas e Políticas<?php include_once 'includs/rodape.php'; ?>
        </div>
    </body>
</html>


 
 