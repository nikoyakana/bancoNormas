<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   
        <!-- criando uma funÃ§Ã£o .  -->
    <script>
        function excluir(cod){
        if(confirm('Deseja realmente excluir o livro?')){
        location.href='excluirLivro.php?cod='+cod;
            }
        }
       </script>
    
    </head>
    <body>
        <div class="container"><h1>Biblioteca da Cris</h1> 
            <div class="well span10">
                <ul class="nav nav-list">
                <li class="active"><a href="#"><i class="icon-pencil icon-white"></i> Consulta de Livro</a></li>
                <li><a href="painel.php"><i class="icon-home"></i> Voltar</a></li>       
            </ul>
                
            <form action="consultarLivro.php" method="get" class="form-inline">
                <br>
                <label>
                   <p class="text-info"><i>Busque pelo Titulo ou pelo nome do Autor do Livro:</i></p>
                   <input type="text" name="valor">
                                  
                </label>
                <input type="submit" value="Buscar" class="btn btn-info">              
            </form>
                
            <?php
            //isset -> se existir
            //$_GET Ã© o resgate padrao do get da mesma forma que ocorre com o POST
                    if(isset($_GET["valor"])){
                        $valor=$_GET["valor"];//pega o que foi digitado no form
                        
        // consluta ao banco de dados 
// passo 01: montar a conexao com o banco
        require_once 'conexao.php';
        
// passo 02: montar a instrucao sql
        //$sql= "select*from clientes order by nome";
          $sql="select*from livros where titulo like :titulo or autor = :autor order by titulo";    
          
//passo 03:executar o codigo sql no banco
        $sth = $con->prepare($sql);
        $sth->execute([
            ':titulo' => '%'.$valor.'%',
            ':autor' => $valor
        ]);
        //echo var_dump($result); - serve para o programador ver os detalhes do banco 
        
//passo 04: verificar se o nÃºmero de linhas encontradas Ã© maior que zero
        $rows = $sth->fetchAll();
        if($rows){
            // echo "Achou";
                    ?>
                
          <table class="table table-condensed" style="text-align: center">
                        <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Editora</th>
                    <th>Avaliação</th>
                    <th>Cor da Capa</th>
                    <th>Localização</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    </tr>
       <!--passo 05: FAZER UMA ESTRUTURA QUE LEIA O COMANDO IMPRIMIR OS DADOS ATÃ‰ QUE O NUMERO DE LINHAS ENCONTRADO ACABE
           -->
            <?php
                        foreach ($rows as $row) {
                            ?>
            
            <tr>
            <td><?php echo $row["titulo"]?></td>
            <td><?php echo $row["autor"]?></td>
            <td><?php echo $row["ano"] ?></td>
            <td><?php echo $row["editora"]?></td>
            <td><?php echo $row["avaliacao"]?></td>
            <td><?php echo $row["corcapa"]?></td>
            <td><?php echo $row["localizacao"]?></td>
            <td><a href="editarLivro.php?cod=<?php echo $row["cod"]?>"><i class="icon-pencil table-bordered"></i></a></td>
            <td><a href="#" onclick="excluir(<?php echo $row["cod"]; ?>)"><i class="icon-trash table-bordered"></i></a></td>
           </tr>
           <!--//FIM DO LOOP-->
           <?php
                        }// fechamento do while. 
                        echo "</table>";
                        echo "Total de Livros cadastrados:".count($rows);
                    }// segundo if
                    else {
                                echo "Nenhum livro encontrado. ";
                
                          }
                                //fecha o banco de dados
                }// fechamento primeiro if  
                
                ?>        
            
        <br>
        </div>
 </div>
        </body>
</html>