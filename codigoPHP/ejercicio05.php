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
            <h1 id="inicio">Inicializar y mostrar una variable que tiene una marca de tiempo.</h1>
        </header>
        <main>
            <section>
                <?php
                    $timestamp = time();
                    echo "La fecha y hora actuales son: <b>" . date("Y-m-d H:i:s", $timestamp)."</b> y los segundos que han pasado desde las 00:00 del 1 de Enero de 1970 son: <b>".$timestamp."</b>";
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