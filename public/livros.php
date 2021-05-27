<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<html>

<body>
    <div class="">
        <nav class="navbar navbar-light bg-primary">
            <div class="container"> 
                <a class="navbar-brand text-white">Bibliófilo's</a>
            </div>
        </nav>

        <div class="container pt-2"> 
            <br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Livros</li>
                </ol>
            </nav>
            
            <br>
            <?php
            require 'mysql_server.php';

            $conexao = RetornaConexao();

            $titulo = 'nome';
            $autor = 'ID_autor';
            $classificacao = 'classificacao';
            $ano_publicacao = 'primeira_publicacao';
            
            /*TODO-1: Adicione uma variavel para cada coluna */


            $sql =
                'SELECT ' . $titulo .
                '     , ' . $autor .
                '     , ' . $classificacao .
                '     , ' . $ano_publicacao .
                '  FROM Livro';


            $resultado = mysqli_query($conexao, $sql);
            if (!$resultado) {
                echo mysqli_error($conexao);
            }

            $cabecalho =
                '<table class="table table-striped">' .
                '    <thead>' .
                '    <tr>' .
                '        <th>' . $titulo . '</th>' .
                '        <th>' . $autor . '</th>' .
                '        <th>' . $classificacao . '</th>' .
                '        <th>' . $ano_publicacao . '</th>' .
                '    </tr>';
                '    </thead>' .
                '    <tbody>';
                
                echo $cabecalho;
                
                if (mysqli_num_rows($resultado) > 0) {
                    
                    while ($registro = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>';
                        
                        echo '<td>' . $registro[$titulo] . '</td>' .
                        '<td>' . $registro[$autor] . '</td>' .
                        '<td>' . $registro[$classificacao] . ' </td>' .
                        '<td>' . $registro[$ano_publicacao] . ' </td>';
                        echo '</tr>';
                    }
                
                echo '    </tbody>';
                echo '</table>';
            } else {
                echo '';
            }
            FecharConexao($conexao);
            ?>

        </div>
    </div>
</body>

</html>