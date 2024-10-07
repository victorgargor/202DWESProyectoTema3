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
                setlocale(LC_ALL, "es_ES");
                date_default_timezone_set("Europe/Madrid");
                $oFechaActual = new DateTime("now");
                $oFechaNacimiento = new DateTime('2005-09-01');
                $oFechaFutura = new DateTime('2050-01-01');
                echo 'Hola, hoy es <b>' . $oFechaActual->format('j') . ' de ' . $oFechaActual->format('F') . ' de ' . $oFechaActual->format('Y') . '</b> y son las <b>'
                . $oFechaActual->format('H') . ':' . $oFechaActual->format('i') . '</b> horas en Benavente, las <b>';
                setlocale(LC_ALL, "pt_PT");
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Lisbon"));
                echo $oFechaActual->format('H') . ':' . $oFechaActual->format('i') . '</b> horas en Oporto.</br>';
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Madrid"));
                echo 'Nací el <b>' . $oFechaNacimiento->format('d') . ' de ' . $oFechaNacimiento->format('F') . ' de '
                . $oFechaNacimiento->format('Y') . '</b>, y por tanto tengo <b>'
                . $oFechaActual->diff($oFechaNacimiento)->y . '</b> años que es lo mismo que <b>' . $oFechaActual->diff($oFechaNacimiento)->days 
                . '</b> días.<br> El 1 de enero de 2050 tendré <b>' . $edadFutura = $oFechaFutura->diff($oFechaNacimiento)->y . '</b> años.';
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
