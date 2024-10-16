<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/css/index.css" type="text/css">
    <title>Víctor García Gordón</title>
<body>
    <header>
        <h1 id="inicio">Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r, var_dump).</h1>
    </header>
    <main>
        <section>
            <?php
            /**
             * @author Víctor García Gordón
             * @version Fecha de última modificación 09/10/2024
             */
            // Inicializa las variables
            $cadena = "Víctor";
            $entero = 8;
            $decimal = 8.8;
            $boolean = true;

            echo '<h2>Utilizando echo</h2>';
            echo 'La variable <b>$cadena</b> es de tipo <b>' . gettype($cadena) . '</b> y tiene el valor <b>' . $cadena . '</b><br>';
            echo 'La variable <b>$entero</b> es de tipo <b>' . gettype($entero) . '</b> y tiene el valor <b>' . $entero . '</b><br>';
            echo 'La variable <b>$decimal</b> es de tipo <b>' . gettype($decimal) . '</b> y tiene el valor <b>' . $decimal . '</b><br>';
            echo 'La variable <b>$boolean</b> es de tipo <b>' . gettype($boolean) . '</b> y tiene el valor <b>' . ($boolean ? 'true' : 'false') . '</b><br>';

            // Actualiza las variables
            $cadena = "Marcos";
            $entero = 9;
            $decimal = 9.9;
            $boolean = false;

            echo '<h2>Utilizando print</h2>';
            print 'La variable <b>$cadena</b> es de tipo ' . gettype($cadena) . ' y tiene el valor <b>' . $cadena . '</b><br>';
            print 'La variable <b>$entero</b> es de tipo ' . gettype($entero) . ' y tiene el valor <b>' . $entero . '</b><br>';
            print 'La variable <b>$decimal</b> es de tipo ' . gettype($decimal) . ' y tiene el valor <b>' . $decimal . '</b><br>';
            print 'La variable <b>$boolean</b> es de tipo ' . gettype($boolean) . ' y tiene el valor <b>' . ($boolean ? 'true' : 'false') . '</b><br>';

            echo '<h2>Utilizando printf</h2>';
            $formato = 'La variable <b>$decimal</b> es de tipo <b>' . gettype($decimal) . '</b> y tiene el valor <b>%g</b><br>';
            printf($formato, $decimal);

            echo '<h2>Utilizando print_r</h2>';
            print_r($cadena); echo '<br>';
            print_r($entero); echo '<br>';
            print_r($decimal); echo '<br>';
            print_r($boolean ? 'true' : 'false'); echo '<br>';

            echo '<h2>Utilizando var_dump</h2>';
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

