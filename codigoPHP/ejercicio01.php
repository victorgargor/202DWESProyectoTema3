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
                echo '<h2>Utilizando echo</h2> <br>';
                echo'La variable <b>$cadena</b> es de tipo <b>'.gettype($cadena).'</b> y tiene el valor <b>'.$cadena.'</b><br>';
                echo 'La variable <b>$entero</b> es de tipo <b>'.gettype($entero).'</b> y tiene el valor <b>'.$entero.'</b><br>';
                echo 'La variable <b>$decimal</b> es de tipo <b>'.gettype($decimal).'</b> y tiene el valor <b>'.$decimal.'</b><br>';
                echo 'La variable <b>$boolean</b> es de tipo <b>'.gettype($boolean).'</b> y tiene el valor <b>'.$boolean.'</b><br>';
                $cadena = "Marcos"; 
                $entero = 9; 
                $decimal = 9.9; 
                $boolean = false;
                echo '<br> <h2>Utilizando print</h2> <br>';
                print'La variable <b>$cadena</b> es de tipo '.gettype($cadena).'</b> y tiene el valor <b>'.$cadena.'</b><br>';
                print 'La variable <b>$entero</b> es de tipo '.gettype($entero).'</b> y tiene el valor <b>'.$entero.'</b><br>';
                print 'La variable <b>$decimal</b> es de tipo '.gettype($decimal).'</b> y tiene el valor <b>'.$decimal.'</b><br>';
                print 'La variable <b>$boolean</b> es de tipo '.gettype($boolean).'</b> y tiene el valor <b>'.'"'.$boolean.'"'.'</b><br>';
                $formato = 'La variable <b>$decimal</b> es de tipo <b>'.gettype($decimal).'</b> y tiene el valor <b>%g</b>';
                $devolverBoolean = 'La variable <b>$boolean</b> es de tipo <b>'.gettype($boolean).'</b> y tiene el valor <b>'.'"'.$boolean.'"'.'</b><br>';
                echo '<br> <h2>Utilizando printf</h2> <br>';              
                echo printf($formato, $decimal).'<br>';             
                echo '<br> <h2>Utilizando print_r</h2> <br>';
                print_r($devolverBoolean);
                echo '<br> <h2>Utilizando var_dump</h2> <br>';
                var_dump($cadena);
                var_dump($entero);
                var_dump($decimal);
                var_dump($boolean);
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
