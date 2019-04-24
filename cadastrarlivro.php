<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Livro</title>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Biblioteca da Cris</h1>
            <div class="well span10">          
            <ul class="nav nav-list">
                  <li class="active"><a href="#"><i class="icon-pencil icon-white"></i> Cadastro de Livro</a></li>
                   <li><a href="painel.php"><i class="icon-home"></i> Voltar</a></li>
            </ul>
            <br>
            <form action="gravarlivro.php" method="post">
                <label>
                    <p class="text-info"><strong>Título:</strong></p>
                    <input type="text" name="titulo" required>
                </label>
                <label>
                    <p class="text-info"><strong>Autor:</strong></p>
                    <input type="text" name="autor" required>
                </label>
                <label>
                    <p class="text-info"><strong>Ano:</strong></p>
                    <input type="number" name="ano" required>
                </label>
                <label>
                    <p class="text-info"><strong>Editora:</strong></p>
                    <input type="text" name="editora" required>
                </label>
                    <p class="text-info"><strong>Avaliação:</strong></p>
                    <label><input type="radio" name="avaliacao" value="1" checked><i class="icon-star"></i>
                </label>
                    <label><input type="radio" name="avaliacao" value="2"><i class="icon-star"></i><i class="icon-star"></i>
                </label>
                    <label><input type="radio" name="avaliacao" value="3"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
                </label>
                <label><input type="radio" name="avaliacao" value="4"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
                </label>
                    <label><input type="radio" name="avaliacao" value="5"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
                </label>
                <label>
                    <p class="text-info"><strong>Cor predominante na Capa:</strong></p>
                    <input type="text" name="corcapa">
                </label>
                    <label>
                    <p class="text-info"><strong>Localização:</strong></p>
                    <p class="text-info"><i>Coloque o comodo e informações de localização. Considere a contagem das estantes da esquerda para a direita e de cima para baixo.</i></p>
                    <input type="text" name="localizacao" required>
                </label>
                
                <input type="submit" value="Cadastrar" class="btn btn-info">
            </form>
            </div>
        </div>
         
    </body>
</html>


