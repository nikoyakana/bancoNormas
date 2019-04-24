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
        <?php
        $idusuario=$_POST["idusuario"];
        $nome= $_POST["nome"];
        $email = $_POST["email"];
        $login =  $_POST["login"];
        $senha = $_POST["senha"];
        $perfil =$_POST["perfil"];
                
        include_once './conexao.php';
        $sql = "update usuarios set nome = :nome,
         email= :email, login= :login, senha = :senha, perfil= :perfil where id= :id";
        $sth = $con->prepare($sql);
        $sth->execute([
            ':id'=>$id,
            ':nome'=>$nome,
            ':email'=>$email,
            ':login'=>$login,
            ':senha'=>$senha,
            ':perfil'=>$perfil,
        ]);
        if($sth->rowCount()){
                    ?>
        <div class="alert alert-success">
                    <?php
           $msg= "Atualizado com sucesso.";
                    ?>
            </div>
           <?php
        }else{
            $msg= "Erro ao Atualizar.";
        }
        echo "<script> alert('".$msg."');
            location.href='index.php'
            </script>";
        ?>
    </body>
</html>
