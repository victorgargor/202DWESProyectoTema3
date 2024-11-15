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
                /**
                * @author Víctor García Gordón
                * @version Fecha de última modificación 21/10/2024
                */
                // Configura el idioma de localización a portugués
                setlocale(LC_ALL, "pt_PT");
                // Crear un objeto DateTime con la fecha y hora actuales, estableciendo la zona horaria a Oporto (Europe/Lisbon)
                $oFechaActual = new DateTime("now", new DateTimeZone("Europe/Lisbon"));
                echo "<div>";
                // Mostrar la fecha y hora actual de Oporto en el formato 'día mes año hora:minutos'
                echo 'La fecha y hora actuales de Oporto son: <b>'.$oFechaActual->format('d M o G').':'.$oFechaActual->format('i').'</b>';
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
