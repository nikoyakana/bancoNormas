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
                      $sql = "select * from usuario where id =:cod";
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
                     
                   <form action="atualizarUsuario.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $row["id"]?>"><br>
                    <label>
                       <p class="text-info"><strong> Nome:</strong></p>
                        <input type="text" name="nome" value="<?php echo $row["nome"]?>"><br>                      
                    </label>
                   <label>
                       <p class="text-info"><strong> E-mail:</strong></p>
                        <input type="text" name="email" value="<?php echo $row["email"]?>"><br>                      
                    </label>
                    <label>
                       <p class="text-info"><strong> Login:</strong></p>
                        <input type="text" name="login" value="<?php echo $row["login"]?>"><br>                      
                    </label>
                    <label>
                        <p class="text-info"><strong>Senha:</strong></p>
                        <input type="password" name="senha" value=""><br>                      
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