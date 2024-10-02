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
            <h1 id="inicio">Mostrar la dirección IP del equipo desde el que estás accediendo.</h1>
        </header>
        <main>
            <section>
                <?php
                    echo '<La dirección IP del equipo desde el que estás accediendo es: <b>'.$_SERVER['REMOTE_ADDR'].'</b>';
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