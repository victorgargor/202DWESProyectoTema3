<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/formularios.css" type="text/css">
        <title>Víctor García Gordón</title>
    </head>
    <body>
        <header>
            <h1 id="inicio">
                Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre las preguntas y las respuestas recogidas.
            </h1>
        </header>
        <main>
             <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 21/10/2024
                 */
             ?>
            <!-- Contenedor para mostrar las respuestas -->
            <div class="respuestas-container">
                <div class="respuestas-header">Respuestas del formulario</div>
                <!-- Mostrar el nombre ingresado por el usuario -->
                <div class="respuesta-item">
                    <label>Nombre:</label>
                    <span><?php echo htmlspecialchars($_REQUEST["nombre"]); ?></span>
                </div>
                <!-- Mostrar el primer apellido ingresado por el usuario -->
                <div class="respuesta-item">
                    <label>Apellido:</label>
                    <span><?php echo htmlspecialchars($_REQUEST["primerApellido"]); ?></span>
                </div>
            </div>
        </main>
        <footer>
            <div>
                <a href="/index.html">Víctor García Gordón</a>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>


