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
            <h1 id="inicio">Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</h1>
        </header>
        <main>
            <section>
                <?php
                //$_SERVER
                echo '<h2>Contenido de $_SERVER con print_r</h2>';
                echo '<pre>';
                print_r($_SERVER);
                echo '</pre>';

                //$_GET
                echo '<h2>Contenido de $_GET con print_r</h2>';
                echo '<pre>';
                print_r($_GET);
                echo '</pre>';

                //$_POST
                echo '<h2>Contenido de $_POST con print_r</h2>';
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';

                //$_FILES
                echo '<h2>Contenido de $_FILES con print_r</h2>';
                echo '<pre>';
                print_r($_FILES);
                echo '</pre>';

                //$_COOKIE
                echo '<h2>Contenido de $_COOKIE con print_r</h2>';
                echo '<pre>';
                print_r($_COOKIE);
                echo '</pre>';

                //$_SESSION
                session_start();
                echo '<h2>Contenido de $_SESSION con print_r</h2>';
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';

                //$_ENV
                echo '<h2>Contenido de $_ENV con print_r</h2>';
                echo '<pre>';
                print_r($_ENV);
                echo '</pre>';

                //$_REQUEST
                echo '<h2>Contenido de $_REQUEST con print_r</h2>';
                echo '<pre>';
                print_r($_REQUEST);
                echo '</pre>';

                //$GLOBALS
                echo '<h2>Contenido de $GLOBALS con print_r</h2>';
                echo '<pre>';
                print_r($GLOBALS);
                echo '</pre>';
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