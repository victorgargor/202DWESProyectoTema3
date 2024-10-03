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
            <h1 id="inicio">Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la semana..</h1>
        </header>
        <main>
            <section id="ejercicio15">
                <?php
                    $aSueldoDiario = [
                        'Lunes' => 50.32, 
                        'Martes' => 20.54, 
                        'Miércoles' => 30.65, 
                        'Jueves' =>40.65, 
                        'Viernes' =>10.43, 
                        'Sabado' =>60.54, 
                        'Domingo' =>80.43
                        ];
                    foreach ($aSueldoDiario as $clave => $valor) {
                        echo "El sueldo del <b>".$clave."</b> es <b>: ".$valor." €</b><br>";
                    }
                    echo "<br><i>El sueldo semanal es: <b>". array_sum($aSueldoDiario)." €</i></b>";
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