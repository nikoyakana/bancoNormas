<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <body>
    <!-- GRAVAÇÃO NO BANCO -->
        <?php
        //RESGATA OS DADOS DO FORMULARIO
        $nome= $_POST["nome"];
        $email = $_POST["email"];
        $login =  $_POST["login"];
        $senha = $_POST["senha"];
        $perfil =$_POST["perfil"];
           
        //TRATAMENTO DOS DADOS     
        $nome=strtolower($nome);
        $nome=  \ucwords($nome);
        $email=strtolower($email);
        $login= strtolower($login);    
        
        //CONEXÃO DO BANCO DE DADOS (host, usuario, senha, base)
        include_once '../conexao.php';
        
        //INSTRUÇÃO DE GRAVAÇÃO
        $sql= "insert into usuarios values (null, :nome, :email, :login, :senha,:perfil)";
        $sth = $con->prepare($sql);
        $sth->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':login' => $login,
            ':senha' => $senha,
            ':perfil' => $perfil,
            ]);
       
        //MENSAGEM DE ALERTA
        if ($sth->rowCount()){
        ?>     
       <div class="alert alert-success">
        	<?php
            $msg= "Dados gravado com sucesso.";
            ?>
       </div>
        <?php
        }else{
            $msg= "Erro ao gravar.";}
        echo "<script> alert('".$msg."');
            location.href='index.php'
            </script>";
        ?>                      
    </body>
</html>
