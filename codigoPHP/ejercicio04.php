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
            <h1 id="inicio">Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.</h1>
        </header>
        <main>
            <section>
                <?php
                    $oFechaActual = new DateTime("now", new DateTimeZone("Europe/Lisbon"));
                    echo 'La fecha y hora actuales de Oporto son: <b>'.$oFechaActual->format('d M o G').':'.$oFechaActual->format('i').'</b>';
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