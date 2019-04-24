<?php
    session_start();
$login=$_POST["login"];
$senha= md5 ($_POST["senha"]);

include_once '../conexao.php';

$sql="select*from usuarios where login=:login and senha =:senha";


$sth = $con->prepare($sql);
$sth->execute([
    ':login' => $login,
    ':senha' => $senha
]);

//TESTE DE LOGIN
$row = $sth->fetch();
if($row){
    $_SESSION["id"]=$row["id"];
    $_SESSION["nome"]=$row["nome"];
    $_SESSION["login"]=$row["login"];
    header("location:painel.php");
}else{
    $msg= "Login/Senha invalido(s)!";
    header("location:../index.php?erro=".$msg);
}
?>