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
        <?php
        if(isset($_FILES['arquivo']['tmp_name'])) {
            $filename = 'statics/'.strtoupper($_POST['tipo']).'-'.
                str_pad(ltrim($_POST['numero'], '0'), 3, '0', STR_PAD_LEFT).'-'.
                strtoupper($_POST['classe_cod']).'.pdf';
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $filename);
        }
        include_once '../conexao.php';
        $sql = "UPDATE arquivo SET tipo = :tipo,
        numero = :numero, classe_cod = :classe_cod,
        descricao = :descricao, atualizacao = :atualizacao WHERE cod = :cod";
        $sth = $con->prepare($sql);
        $sth->execute([
            ':tipo'=>$_POST['tipo'],
            ':numero'=>$_POST['numero'],
            ':classe_cod'=>$_POST['classe_cod'],
            ':descricao'=>$_POST['descricao'],
            ':atualizacao'=>time(),
            ':cod'=>$_POST['cod'],
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
            location.href='/index.php'
            </script>";
        ?>
    </body>
</html>