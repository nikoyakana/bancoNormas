<?php session_start();
 include_once 'autenticacao.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $novasenha=md5($_POST["novasenha"]);
        $login=$_SESSION["login"];
        include_once '../conexao.php';
        
        $sql="update usuarios set senha=:senha where login=:login";
        $sth = $con->prepare($sql);
        $sth->execute([
            ':login' => $login,
            ':senha' => $novasenha
        ]);
        
            echo "Senha atualizada com sucesso";
        ?>
        <br>
        <a href="painel.php">Voltar</a>
    </body>
</html>
