<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"> <!-- Establece el conjunto de caracteres a UTF-8 para soportar caracteres especiales -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la escala del viewport para dispositivos móviles -->
        <link rel="stylesheet" href="../webroot/css/index.css" type="text/css"> <!-- Vincula la hoja de estilos CSS para el diseño -->
        <title>Víctor García Gordón</title> <!-- Título de la página que se muestra en la pestaña del navegador -->
    </head>
    <body>
        <header>      
            <h1 id="inicio">Inicializar y mostrar una variable heredoc.</h1> <!-- Título principal de la página -->
        </header>
        <main>
            <section>
                <?php
                /**
                 * @author Víctor García Gordón
                 * @version 1.0
                 * @since 07/10/2024
                 */
                // Se declara una variable heredoc 
                $heredoc = <<< ABC
                    Con la sintaxis de heredoc
                    se puede escribir en varias líneas sin utilizar comillas simples
                    ni dobles.
                    ABC;

                // Muestra el contenido de la variable heredoc utilizando print_r
                print_r($heredoc);
                ?>   
            </section>
        </main>
        <footer>
            <div>
                <!-- Enlaces a otras páginas -->
                <a href="/index.html">Víctor García Gordón</a> <!-- Enlace a la página principal -->
                <a href="../indexProyectoTema3.php">Tema 3</a> <!-- Enlace al Tema 3 -->
            </div>
        </footer>
    </body>
</html>