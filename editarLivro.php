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
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <body>
        
                <!-- executando o seletc do banco -->
                        
                    <?php 
                     
                      if(isset($_GET["cod"])){
                      $cod = $_GET["cod"];
                      include_once './conexao.php';
                      $sql = "select * from livros where cod = :cod";
                     
                      $sth = $con->prepare($sql);
                      $sth->execute([
                          ':cod' => $cod,
                      ]);
                      
                      $row = $sth->fetch();
                        
                    ?>
                
                
        <div class="container">
            <div class="well span10">
                <ul class="nav nav-list">
                <li class="active"><a href="#"><i class="icon-pencil icon-white"></i> Editar Dados</a></li>
                   <li><a href="index.php"><i class="icon-home"></i> Voltar</a></li></ul>
                     
                   <form action="atualizarLivro.php" method="post">
                   <p class="text-info"><strong> Código:</strong></p>
                   <input type="number" name="cod" readonly value="<?php echo $row["cod"]?>"><br>
                    <label>
                       <p class="text-info"><strong> Titulo:</strong></p>
                        <input type="text" name="titulo" value="<?php echo $row["titulo"]?>"><br>                      
                    </label>
                    <label>
                       <p class="text-info"><strong> Autor:</strong></p>
                        <input type="text" name="autor" value="<?php echo $row["autor"]?>"><br>                      
                    </label>
                    <label>
                        <p class="text-info"><strong>Ano:</strong></p>
                        <input type="number" name="ano" value="<?php echo $row["ano"]?>"><br>                      
                    </label>
                    <label>
                        <p class="text-info"><strong>Editora:</strong></p>
                        <input type="text" name="editora" value="<?php echo $row["editora"]?>"><br>                      
                    </label>
                    <label>
                        <p class="text-info"><strong> Avaliação:<i class="icon-star"></i></strong></p>
                        <input type="number" name="avaliacao" value="<?php echo $row["avaliacao"]?>">
                                              
                </label>
                <label>
                        <p class="text-info"><strong>Cor predominante na Capa:</strong></p>
                        <input type="text" name="corcapa" value="<?php echo $row["corcapa"]?>"><br>                      
                    </label>
                     <label>
                    <p class="text-info"><strong>Localização:</strong></p>
                    <p class="text-info"><i>Coloque o comodo e informações de localização. Considere a contagem das estantes da esquerda para a direita e de cima para baixo.</i></p>
                    <input type="text" name="localizacao" value="<?php echo $row["localizacao"]?>"><br>
                </label>
                        
                        
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