<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/index.css" type="text/css">
        <title>Víctor García Gordón</title>
    </head>
    <body>
        <header>      
            <h1 id="inicio">Inicializar y mostrar una variable heredoc.</h1>
        </header>
        <main>
            <section>
                <?php
                    $heredoc = <<< ABC
                    Con la sintaxis de heredoc
                    se puede escribir en varias líneas sin utilizar comillas simples
                    ni dobles.
                    ABC;
                    print_r($heredoc);
                ?>   
            </section>
        </main>
        <footer>
            <div>
                <a href="/index.html">Víctor García Gordón</a>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>
