<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css"/>
    </head>
    <body>
        
                <!-- executando o seletc do banco -->
                        
                    <?php 
                      if(isset($_GET["cod"])){
                      $cod = $_GET["cod"];
                      include_once '../conexao.php';
                      $sql = "select * from arquivo where cod =:cod";
                      $sth = $con->prepare($sql);
                      $sth->execute([
                          ':cod' => $cod,
                      ]);
                      $row = $sth->fetch();
                    ?>
                
                
        <div class="container">
            <div class="well span10">
                <ul class="nav nav-list">
                <li class="active"><a href="#"><i class="icon-user icon-white"></i> Editar Usuário</a></li>
                   <li><a href="/"><i class="icon-home"></i> Voltar</a></li></ul>
                     
                   <form action="atualizarNorma.php" method="post">
                   <input type="hidden" name="cod" value="<?php echo $row['cod'];?>">
                <label>
                    <p class="text-info"><strong>Tipo:</strong></p>
                    <label><input type="radio" name="tipo" value="NA"<?php if($row['tipo'] == 'NA') echo ' checked';?>>NA
                    <label><input type="radio" name="tipo" value="PL"<?php if($row['tipo'] == 'PL') echo ' checked';?>>PL
                </label>
                <label>
                    <p class="text-info"><strong>Número:</strong></p>
                    <input type="text" name="numero" value="<?php echo $row['numero'];?>" required>
                </label>
                <label>
                    <p class="text-info"><strong>Classe:</strong></p>
                    <input type="text" name="classe_cod" value="<?php echo $row['classe_cod'];?>" required>
                </label>
                <label>
                    <p class="text-info"><strong>Descrição:</strong></p>
                    <textarea name="descricao"><?php echo $row['descricao'];?></textarea>
                </label>
                    <p class="text-info"><strong>Arquivo:</strong></p>
                    <input type="file" name="arquivo" />
                  <input type="submit" value="Atualizar" class="btn btn-primary">
                    
                </form>
                          </div>
        </div>
                
                      <?php }// fechamento if. 
                      else {
                          echo "Nenhum dado encontrado. ";
                      }?>
               
        
        
    </body>
</html>