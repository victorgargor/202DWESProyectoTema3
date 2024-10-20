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
        <h1 id="inicio">Hola mundo y phpinfo()</h1>
    </header>
    <main>
        <section>
            <?php
            /**
             * @author Víctor García Gordón
             * @version Fecha de última modificación 09/10/2024
             */
            // Muestra un mensaje en pantalla con el texto "Hola mundo"
            echo "Hola mundo";
            
            // Llama a la función phpinfo() que genera una página con la información del entorno PHP
            phpinfo();
            ?>
        </section>
    </main>
    <footer>
        <div>
            <p><a href="/index.html">Víctor García Gordón</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
        </div>
    </footer>
</body>
</html>

