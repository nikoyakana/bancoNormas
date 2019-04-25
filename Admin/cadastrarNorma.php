<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar</title>
         <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Reposit&oacute;rio de Normas e Pol&iacute;ticas</h1>
            <div class="well span10">          
            <ul class="nav nav-list">
                  <li class="active"><a href="#"><i class="icon-pencil icon-white"></i> Cadastro de Normas e Pol&iacute;ticas</a></li>
                   <li><a href="/"><i class="icon-home"></i> Voltar</a></li>
            </ul>
            <br>
            <form action="gravarNorma.php" method="post" enctype="multipart/form-data">
                <label>
                    <p class="text-info"><strong>Tipo:</strong></p>
                    <label><input type="radio" name="tipo" value="NA" checked>NA
                    <label><input type="radio" name="tipo" value="PL">PL
                </label>
                <label>
                    <p class="text-info"><strong>Numero:</strong></p>
                    <input type="text" name="numero" required>
                </label>
                <label>
                    <p class="text-info"><strong>Classe:</strong></p>
                    <input type="text" name="classe_cod" required>
                </label>
                <label>
                    <p class="text-info"><strong>Descrição:</strong></p>
                    <textarea name="descricao"></textarea>
                </label>
                    <p class="text-info"><strong>Arquivo:</strong></p>
                    <input type="file" name="arquivo" />
                <input type="submit" value="Cadastrar" class="btn btn-info">
            </form>
            </div>
        </div>
         
    </body>
</html>


