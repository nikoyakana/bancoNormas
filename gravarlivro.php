<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <body>
        <?php
        // gravação em banco de dados
        //passo 01: resgatar os dados do form
        
        $titulo= $_POST["titulo"];
        $autor = $_POST["autor"];
        $ano =  $_POST["ano"];
        $editora = $_POST["editora"];
        $avaliacao =$_POST["avaliacao"];
        $corcapa =$_POST["corcapa"];
        $localizacao =$_POST["localizacao"];
        
        
        
        $titulo=strtolower($titulo);//converte tudo para minusculo
        $titulo=  \ucwords($titulo);//converte a primeira letra de cada palavra para maiúsculo
        
        $autor=strtolower($autor);//converte tudo para minusculo
        $autor=  \ucwords($autor);//converte a primeira letra de cada palavra para maiúsculo
        
        $editora= strtolower($editora);
        $editora= \ucwords($editora);
        
        $corcapa= strtoupper($corcapa);
        
        $localizacao=strtolower($localizacao);
        $localizacao= \ucwords($localizacao);
        
        // passo 02: montar a conexão com o banco (host, usuario, senha, base)
        include_once './conexao.php';
        
        //passo 03: montar a instrução sql de gravacao
        //insert into clientes values(null, 'variavel nome',variavel email, 'variavel sexo');
        // o mesmo ocorre para imprimir com o comando echo "idade:'".$idade."'anos";//Idade:'20'anos
        
        $sql= "insert into livros values (null,:titulo,:autor,:ano,:editora,:avaliacao,:corcapa,:localizacao)";
        
        //passo 04: enviar a linha de comando para o banco 
        $sth = $con->prepare($sql);
        $sth->execute([
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano' => $ano,
            ':editora' => $editora,
            ':avaliacao' => $avaliacao,
            ':corcapa' => $corcapa,
            ':localizacao' => $localizacao
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
            location.href='index.php'
            </script>";
        
        //passo 05: fechar a conexão 
        
        ?>                        
    </body>
</html>


