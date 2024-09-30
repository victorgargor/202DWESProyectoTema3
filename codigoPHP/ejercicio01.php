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
            <h1 id="inicio">Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,
                var_dump).
            </h1>
        </header>
        <main>
            <section>
                <?php
                $cadena = "Víctor";
                $entero = 8;
                $decimal = 8.8;
                $boolean = true;
                $formato = "La variable \$decimal es de tipo ".gettype($decimal)." y tiene el valor %g"."\n";
                $devolverBoolean = "La variable \$boolean es de tipo ".gettype($boolean)." y tiene el valor $boolean"."\n";
                echo "La variable \$cadena es de tipo ".gettype($cadena)." y tiene el valor $cadena."."\n";
                print "La variable \$entero es de tipo ".gettype($entero)." y tiene el valor $entero."."\n";
                echo printf($formato, $decimal)."\n";
                print_r($devolverBoolean)."\n";
                var_dump($entero, $boolean)."\n";
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
