<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <?php
        include_once 'buscadorsqlite.php';
        ?>
    </head>
    
    <body>
        <div class="container"><h1>Repositório</h1> 
            <div class="well span10">
                <ul class="nav nav-list">
                <li><a href="index.php"><i class="icon-home"></i> Voltar</a></li>       
            	</ul>   
            <form action="consultarNorma.php" method="get" class="form-inline">
            <br>
            <label><a href="#">FAQ</a><a href="#">Glossário</a>
           <input type="text" name="descricao"></label>
            <input type="submit" value="Pesquisar" class="btn btn-info">              
            </form>
            
            <!--CONSULTA AO BANCO-->    
            <?php
                  if(!empty($_GET["descricao"])){
                        $valor=$_GET["valor"]
                        $tipo =$_GET["tipo"];
                        
        // MONTA A CONEXÃO COM O BANCO
        require_once 'conexao.php';
        
        //INSTRUÇÃO SQLite
        $sql="select*from data.sqlite where valor like tipo= :tipo, titulo = :titulo order by :titulo";    
          
//passo 03:executar o codigo sql no banco
        $sth = $con->prepare($sql);
        $sth->execute([
            
            ':tipo' => $tipo,
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
                </div>
                </div>   
        </body>
</html>