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
            <h1 id="inicio">Mostrar en tu página index la fecha y hora actual formateada en castellano.</h1>
        </header>
        <main>
            <section>
                <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 21/10/2024
                 */             
                // Configura el idioma de localización a español y establece la zona horaria a Europa/Madrid
                setlocale(LC_ALL, "es_ES");
                date_default_timezone_set("Europe/Madrid");
                // Crear objeto DateTime con la fecha y hora actual
                $oFechaActual = new DateTime("now");
                // Crear objeto DateTime con una fecha de nacimiento
                $oFechaNacimiento = new DateTime('2005-09-01');
                // Crear objeto DateTime con una fecha futura (1 de enero de 2050)
                $oFechaFutura = new DateTime('2050-01-01');
                // Mostrar la fecha actual formateada en español
                echo "<div>";
                echo 'Hola, hoy es <b>' . $oFechaActual->format('j') . ' de ' . $oFechaActual->format('F') . ' de ' . $oFechaActual->format('Y') . '</b> y son las <b>'
                . $oFechaActual->format('H') . ':' . $oFechaActual->format('i') . '</b> horas en Benavente, las <b>';
                // Cambiar el idioma de localización a portugués y la zona horaria a Europa/Lisboa
                setlocale(LC_ALL, "pt_PT");
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Lisbon"));
                echo $oFechaActual->format('H') . ':' . $oFechaActual->format('i') . '</b> horas en Oporto.</br>';
                // Volver a establecer la zona horaria a Europa/Madrid
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Madrid"));
                // Mostrar la fecha de nacimiento y calcular la edad actual
                echo 'Nací el <b>' . $oFechaNacimiento->format('d') . ' de ' . $oFechaNacimiento->format('F') . ' de ' . $oFechaNacimiento->format('Y') . '</b>, y por tanto tengo <b>'
                . $oFechaActual->diff($oFechaNacimiento)->y . '</b> años que es lo mismo que <b>' . $oFechaActual->diff($oFechaNacimiento)->days . '</b> días.<br>';
                // Calcular la edad en la fecha futura (1 de enero de 2050)
                echo 'El 1 de enero de 2050 tendré <b>' . $edadFutura = $oFechaFutura->diff($oFechaNacimiento)->y . '</b> años.';
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
