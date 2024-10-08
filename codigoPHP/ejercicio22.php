<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="" type="text/css">
        <title>Víctor García Gordón</title>
    </head>
    <body>
        <header>      
            <h1 id="inicio"> Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas
            </h1>
        </header>
        <main>
            <?php
                if (isset($_REQUEST['enviar'])) {
                    echo "Nombre: <b>" . $_REQUEST["nombre"] . "</b><br>";
                    echo "Apellido: <b>" . $_REQUEST["primerApellido"];
                } else {
            ?>
                <form name = "ejercicio22" action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
                    <label for = "nombre">Nombre:</label>
                    <input type = "text" id = "nombre" name = "nombre">
                    <br>
                    <label for = "primerApellido">Primer Apellido:</label>
                    <input type = "text" id = "primerApellido" name = "primerApellido">
                    <br>
                    <input type = "submit" name= "enviar" value = "enviar">
                </form>
            <?php
            }
            ?>
        </main>
        <footer>
            <div>
                <a href="/index.html">Víctor García Gordón</a>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>
