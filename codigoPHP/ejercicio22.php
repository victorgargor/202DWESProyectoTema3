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
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 09/10/2024
                 */
                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                    // Muestra el nombre ingresado por el usuario
                    echo "Nombre: <b>" . $_REQUEST["nombre"] . "</b><br>";
                    // Muestra el primer apellido ingresado por el usuario
                    echo "Apellido: <b>" . $_REQUEST["primerApellido"] . "</b><br>";
                    // Muestra la edad ingresada por el usuario
                    echo "Edad: <b>" . $_REQUEST["edad"] . "</b><br>";
                    // Muestra el correo electrónico ingresado por el usuario
                    echo "Correo electrónico: <b>" . $_REQUEST["correo"] . "</b><br>";
                    // Muestra el género seleccionado por el usuario
                    echo "Género: <b>" . $_REQUEST["genero"] . "</b><br>";
                } 
                // Muestra el formulario sino ha sido enviado
                else {
            ?>
                <!-- Formulario para recoger información personal -->
                <form name="ejercicio22" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">
                    <br>              
                    <label for="primerApellido">Primer Apellido:</label>
                    <input type="text" id="primerApellido" name="primerApellido">
                    <br>             
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" min="0">
                    <br>                   
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" id="correo" name="correo">
                    <br>                 
                    <label for="genero">Género:</label>
                    <select id="genero" name="genero">
                        <option value="">Seleccione</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                    <br>
                    <input type="submit" name="enviar" value="enviar">
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
