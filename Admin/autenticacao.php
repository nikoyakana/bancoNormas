<?php
if(!isset($_SESSION["nome"])){
    session_destroy();
    $msg="ERRO: Tentativa de invasão frustrada! (hahah sou melhor que você!)!";
    header("location:index.php?msg=".$msg);
}
?>
