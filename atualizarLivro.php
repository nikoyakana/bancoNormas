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
        $cod=$_POST["cod"];
        $titulo= $_POST["titulo"];
        $autor = $_POST["autor"];
        $ano =  $_POST["ano"];
        $editora = $_POST["editora"];
        $avaliacao =$_POST["avaliacao"];
        $corcapa =$_POST["corcapa"];
        $localizacao =$_POST["localizacao"];
        
        include_once './conexao.php';
        $sql = "update livros set titulo = :titulo,
         autor = :autor,ano = :ano, editora =:editora, avaliacao=:avaliacao,corcapa=:corcapa,localizacao=:localizacao where cod= :cod";
        $sth = $con->prepare($sql);
        $sth->execute([
            ':cod'=>$cod,
            ':titulo'=>$titulo,
            ':autor'=>$autor,
            ':ano'=>$ano,
            ':editora'=>$editora,
            ':avaliacao'=>$avaliacao,
            ':corcapa'=>$corcapa,
            ':localizacao'=>$localizacao,
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