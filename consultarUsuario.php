<?php session_start();
 include_once './autenticacao.php';
    //esse comando serve para verificar se o usuario esta ou nao logado evitando invasao

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container">
            <h1>Biblioteca da Cris</h1>
            <div class="well span10">          
            <ul class="nav nav-list">
                  <li class="active"><a href="#"><i class="icon-user icon-white"></i> COnsultar Usuário</a></li>
                  <li><a href="painel.php"><i class="icon-home"></i> Voltar</a></li>
            </ul>
            <br>
            <form action="consultarUsuario.php" method="get" class="form-inline">
                <br>
                <label>
                   <p class="text-info"><i>Busque pelo Nome:</i></p>
                   <input type="text" name="valoruser">
                                  
                </label>
                <input type="submit" value="Buscar" class="btn btn-info">              
            </form>
                
            <?php
            //isset -> se existir
            //$_GET é o resgate padrao do get da mesma forma que ocorre com o POST
                    if(isset($_GET["valoruser"])){
                        $valoruser=$_GET["valoruser"];//pega o que foi digitado no form
                        
        // consluta ao banco de dados 
// passo 01: montar a conexao com o banco
                        include_once './conexao.php';
        
// passo 02: montar a instrucao sql
        //$sql= "select*from clientes order by nome";
          $sql="select*from usuarios where nome like :nome order by nome";    
          
//passo 03:executar o codigo sql no banco

        //echo var_dump($result); - serve para o programador ver os detalhes do banco 
        $sth = $con->prepare($sql);
       $total= $sth->execute([
            ':nome' => '%'.$valoruser.'%',
        ]);
//passo 04: verificar se o número de linhas encontradas é maior que zero
        if ($total){
            // echo "Achou";
                    ?>
                
          <table class="table table-condensed" style="text-align: center">
                        <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Perfil</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    </tr>
       <!--passo 05: FAZER UMA ESTRUTURA QUE LEIA O COMANDO IMPRIMIR OS DADOS ATÉ QUE O NUMERO DE LINHAS ENCONTRADO ACABE-->
            
            <?php
                        while ($row =$sth->fetch()) {
                            ?>
            
            <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["nome"]?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["login"]?></td>
            <td><?php echo $row["senha"]?></td>
            <td><?php echo $row["perfil"]?></td>
            <td><a href="editarUsuario.php?cod=<?php echo $row["id"]?>"><i class="icon-pencil table-bordered"></i></a></td>
            <td><a href="#" onclick="excluirUsuario(<?php echo $row["id"]; ?>)"><i class="icon-trash table-bordered"></i></a></td>
           </tr>
           <!--//FIM DO LOOP-->
           <?php
                        }// fechamento do while. 
                        echo "</table>";
                        echo "Total de Usuários cadastrados:".$total;
                    }// segundo if
                    else {
                                echo "Nenhum Usuário encontrado. ";
                
                          }
                                //fecha o banco de dados
                }// fechamento primeiro if  
                
                ?>        
            
        <br>
        </div>
 </div>
    </body>
</html>
