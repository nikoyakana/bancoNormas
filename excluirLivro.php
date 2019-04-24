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
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    </head>
    <body>
        <?php
        $cod=$_GET["cod"];
        include_once './conexao.php';
        $sql="delete from livros where cod= :cod";
        
        $sth = $con->prepare($sql);
        $sth->execute([
            ':cod' => $cod,
        ]);
        
        if ($sth->rowCount()){
            ?>
        <div class="alert alert-sucess"><?php
        $msg= "Excluido com sucesso.";
        ?>
          </div>
        <?php
        }else{
            $msg= "Erro ao Excluir.";
        }
        echo "<script> alert('".$msg."');
            location.href='index.php'
            </script>";
        ?>
    </body>
</html>
