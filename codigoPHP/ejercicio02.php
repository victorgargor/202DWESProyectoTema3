<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/ejercicios.css" type="text/css"> 
        <title>Víctor García Gordón</title> 
    </head>
    <body>
        <header>      
            <h1 id="inicio">Inicializar y mostrar una variable heredoc.</h1> 
        </header>
        <main>
            <section>
                <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 21/10/2024
                 */
                // Se declara una variable heredoc 
                $heredoc = <<< ABC
                    Con la sintaxis de heredoc
                    se puede escribir en varias líneas sin utilizar comillas simples
                    ni dobles.
                    ABC;

                // Muestra el contenido de la variable heredoc utilizando print_r
                echo "<div>";
                print_r($heredoc);
                echo "</div>";
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