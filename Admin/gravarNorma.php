<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css"/>
    </head>
    <body>
        <?php
        // gravação em banco de dados
        include_once __DIR__.'/../conexao.php';
        $filename = 'statics/'.strtoupper($_POST['tipo']).'-'.
            str_pad(ltrim($_POST['numero'], '0'), 3, '0', STR_PAD_LEFT).'-'.
            strtoupper($_POST['classe_cod']).'.pdf';
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $filename);
        
        $sql= "insert into arquivo (tipo, numero, classe_cod, descricao, atualizacao) 
                values (:tipo, :numero, :classe_cod, :descricao, :atualizacao)";
        
        //passo 04: enviar a linha de comando para o banco 
        $sth = $con->prepare($sql);
        $sth->execute([
            ':tipo' => strtoupper($_POST['tipo']),
            ':numero' => ltrim($_POST['numero'], '0'),
            ':classe_cod' => strtoupper($_POST['classe_cod']),
            ':descricao' => $_POST['descricao'],
            ':atualizacao' => time()
        ]);
        
        if ($sth->rowCount()) {
            ?>
        
       <div class="alert alert-success">
                    <?php
            $msg= "Dados gravado com sucesso.";
                    ?>
            
            </div>
        <?php
        }else{
            
            $msg= "Erro ao gravar.";
        }
        echo "<script> alert('".$msg."');
            location.href='/index.php'
            </script>";
        ?>
    </body>
</html>