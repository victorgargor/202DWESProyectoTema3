<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="#" type="text/css">
        <title>Víctor García Gordón</title>
    </head>
    <body>
        <header>      
            <h1 id="inicio"> Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
                las preguntas y las respuestas recogidas.
            </h1>
        </header>
        <main>
            <?php
            /**
             * @author Víctor García Gordón
             * @version Fecha de última modificación 09/10/2024
             */
            // Muestra el nombre ingresado por el usuario
            echo "Nombre: <b>" . $_REQUEST["nombre"] . "</b><br>";
            // Muestra el primer apellido ingresado por el usuario
            echo "Apellido: <b>" . $_REQUEST["primerApellido"];
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


