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
            <h1 id="inicio">Mostrar en tu página index la fecha y hora actual formateada en castellano.</h1>
        </header>
        <main>
            <section>
                <?php
                $oFechaActual = new DateTime("now", new DateTimeZone("Europe/Madrid"));
                $oFechaNacimiento = new DateTime('2005-09-01', new DateTimeZone("Europe/Madrid"));
                $oFechaFutura = new DateTime('2050-01-01', new DateTimeZone("Europe/Madrid"));
                $edadActual = $oFechaActual->diff($oFechaNacimiento)->y;
                $diasActuales = $oFechaActual->diff($oFechaNacimiento)->days;
                $edadFutura = $oFechaFutura->diff($oFechaNacimiento)->y;
                echo 'Hola, hoy es <b>' . $oFechaActual->format('j') . ' de ' . $oFechaActual->format('F') . ' de ' . $oFechaActual->format('Y') . '</b> y son las <b>'
                . $oFechaActual->format('H') . ':' . $oFechaActual->format('i') . '</b> horas en Benavente, las <b>';
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Lisbon"));
                echo $oFechaActual->format('H') . ':' . $oFechaActual->format('i') . '</b> horas en Oporto. Nací el <b>' . $oFechaNacimiento->format('d') . ' de ' . $oFechaNacimiento->format('F') . ' de '
                . $oFechaNacimiento->format('Y') . '</b>, y por tanto tengo <b>'
                . $edadActual . '</b> años que es lo mismo que <b>' . $diasActuales . '</b> días. El 1 de enero de 2050 tendré <b>' . $edadFutura . '</b> años.';
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
