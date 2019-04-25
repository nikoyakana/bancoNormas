<?php session_start();
 include_once './autenticacao.php';
    //esse comando serve para verificar se o usuario esta ou nao logado evitando invasao

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css"/>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container">
            <h1>Reposit&oacute;rio de Normas e Pol&iacute;ticas</h1>
            <div class="well span10">          
            <ul class="nav nav-list">
                  <li class="active"><a href="#"><i class="icon-user icon-white"></i> Consultar Norma ou Pol&iacute;tica</a></li>
                  <li><a href="/"><i class="icon-home"></i> Voltar</a></li>
            </ul>
            <br>
            <form class="form-inline">
                <br>
                <label>
                   <p class="text-info"><i>Busque por n&uacute;mero ou assunto:</i></p>
                   <input type="text" name="q">
                                  
                </label>
                <input type="submit" value="Buscar" class="btn btn-info">              
            </form>
                
            <?php
                        if(isset($_GET["q"])){
                        $q=$_GET["q"];//pega o que foi digitado no form
                        
                        include_once '../conexao.php';
        
//executar o codigo sql no banco

          $sth = $con->prepare('
                        SELECT *
                          FROM arquivo
                         WHERE (descricao LIKE :descricao OR numero = :numero)');
          $ok = $sth->execute([
              ':descricao' => '%'.$_GET['q'].'%',
              ':numero' => ltrim($_GET['q'], '0')
          ]);
        if ($ok){
                    ?>
                
          <table class="table table-condensed" style="text-align: center">
                        <tr>
                    <th>Tipo</th>
                    <th>N&uacute;mero</th>
                    <th>Classe</th>
                    <th>Descri&ccedil;&atilde;o</th>
                    <th>Atualiza&ccedil;&atilde;o</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    </tr>
                   
            <?php
            $total=0;
                        while ($row =$sth->fetch()) {
                            $total++;
                            ?>
            
            <tr>
            <td><?php echo $row["tipo"]?></td>
            <td><?php echo $row["numero"] ?></td>
            <td><?php echo $row["classe_cod"]?></td>
            <td><?php echo $row["descricao"]?></td>
            <td><a href="editarNorma.php?cod=<?php echo $row["cod"]?>"><i class="icon-pencil table-bordered"></i></a></td>
            <td><a href="#" onclick="excluirNorma(<?php echo $row["id"]; ?>)"><i class="icon-trash table-bordered"></i></a></td>
           </tr>
           <!--//FIM DO LOOP-->
           <?php
                        }// fechamento do while. 
                        echo "</table>";
                        echo "Total de Normas e Pol&iacute;ticas cadastradas:".$total;
                    }// segundo if
                    else {
                                echo "Nenhum dado encontrado. ";
                
                          }
                                
                }// fechamento primeiro if  
                
                ?>        
            
        </div>
 </div>
    </body>
</html>
