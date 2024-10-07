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
            <h1 id="inicio">Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r, var_dump).</h1>
        </header>
        <main>
            <section>
                <?php
                /**
                 * @author Víctor García Gordón
                 * @version 1.0
                 * @since 07/10/2024
                 */
                // Inicializa una variable de tipo cadena (string) con el nombre "Víctor"
                $cadena = "Víctor";

                // Inicializa una variable de tipo entero (int) con el valor 8
                $entero = 8;

                // Inicializa una variable de tipo decimal (float) con el valor 8.8
                $decimal = 8.8;

                // Inicializa una variable de tipo booleano (bool) con el valor true
                $boolean = true;

                echo '<h2>Utilizando echo</h2> <br>';

                // Muestra información sobre la variable $cadena
                echo 'La variable <b>$cadena</b> es de tipo <b>' . gettype($cadena) . '</b> y tiene el valor <b>' . $cadena . '</b><br>';

                // Muestra información sobre la variable $entero
                echo 'La variable <b>$entero</b> es de tipo <b>' . gettype($entero) . '</b> y tiene el valor <b>' . $entero . '</b><br>';

                // Muestra información sobre la variable $decimal
                echo 'La variable <b>$decimal</b> es de tipo <b>' . gettype($decimal) . '</b> y tiene el valor <b>' . $decimal . '</b><br>';

                // Muestra información sobre la variable $boolean
                echo 'La variable <b>$boolean</b> es de tipo <b>' . gettype($boolean) . '</b> y tiene el valor <b>' . $boolean . '</b><br>';

                // Actualiza las variables con nuevos valores
                $cadena = "Marcos"; // Cambia el valor de $cadena a "Marcos"
                $entero = 9;        // Cambia el valor de $entero a 9
                $decimal = 9.9;     // Cambia el valor de $decimal a 9.9
                $boolean = false;   // Cambia el valor de $boolean a false

                echo '<br> <h2>Utilizando print</h2> <br>';

                print 'La variable <b>$cadena</b> es de tipo ' . gettype($cadena) . '</b> y tiene el valor <b>' . $cadena . '</b><br>';

                print 'La variable <b>$entero</b> es de tipo ' . gettype($entero) . '</b> y tiene el valor <b>' . $entero . '</b><br>';

                print 'La variable <b>$decimal</b> es de tipo ' . gettype($decimal) . '</b> y tiene el valor <b>' . $decimal . '</b><br>';

                print 'La variable <b>$boolean</b> es de tipo ' . gettype($boolean) . '</b> y tiene el valor <b>' . '"' . $boolean . '"' . '</b><br>';

                // Crea un formato para mostrar la variable $decimal usando printf
                $formato = 'La variable <b>$decimal</b> es de tipo <b>' . gettype($decimal) . '</b> y tiene el valor <b>%g</b>';

                // Crea cadenas para devolver información sobre las variables
                $devolverCadena = 'La variable <b>$cadena</b> es de tipo <b>' . gettype($cadena) . '</b> y tiene el valor <b>' . $cadena . '</b><br>';
                $devolverEntero = 'La variable <b>$entero</b> es de tipo <b>' . gettype($entero) . '</b> y tiene el valor <b>' . $entero . '</b><br>';
                $devolverDecimal = 'La variable <b>$decimal</b> es de tipo <b>' . gettype($decimal) . '</b> y tiene el valor <b>' . $decimal . '</b><br>';
                $devolverBoolean = 'La variable <b>$boolean</b> es de tipo <b>' . gettype($boolean) . '</b> y tiene el valor <b>' . '"' . $boolean . '"' . '</b><br>';

                echo '<br> <h2>Utilizando printf</h2> <br>';

                // Muestra información sobre la variable $decimal utilizando printf
                echo printf($formato, $decimal) . '<br>';

                echo '<br> <h2>Utilizando print_r</h2> <br>';

                // Muestra información sobre las variables utilizando print_r
                print_r($devolverCadena);
                print_r($devolverEntero);
                print_r($devolverDecimal);
                print_r($devolverBoolean);

                echo '<br> <h2>Utilizando var_dump</h2> <br>';

                // Muestra información detallada sobre las variables utilizando var_dump
                echo 'La variable <b>$cadena</b> es de tipo <b>' . gettype($cadena) . '</b> y tiene el valor <b>';
                var_dump($cadena);
                echo '</b><br>';

                echo 'La variable <b>$entero</b> es de tipo <b>' . gettype($entero) . '</b> y tiene el valor <b>';
                var_dump($entero);
                echo '</b><br>';

                echo 'La variable <b>$decimal</b> es de tipo <b>' . gettype($decimal) . '</b> y tiene el valor <b>';
                var_dump($decimal);
                echo '</b><br>';

                echo 'La variable <b>$boolean</b> es de tipo <b>' . gettype($boolean) . '</b> y tiene el valor <b>';
                var_dump($boolean);
                echo '</b><br>';
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
