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
            <h1 id="inicio">Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</h1>
        </header>
        <main>
            <section>
                <?php
                    $fechaActual = date("Y-m-d");
                    $fecha60Dias = date("Y-m-d", strtotime("+60 days"));
                    $diaSemana = date("l", strtotime("+60 days"));
                    echo 'Fecha actual: '.$fechaActual.'<br>';
                    echo 'Fecha dentro de 60 días: '.$fecha60Dias.'<br>';
                    echo 'Dia semana: '.$diaSemana;                
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