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
                Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas
            </h1>
        </header>
        <main>
            <?php
                /**
                 * Autor: Víctor García Gordón
                 * Fecha de última modificación: 21/10/2024
                 */

                // Verifica si el formulario ha sido enviado con el botón "enviar"
                if (isset($_REQUEST['enviar'])) {
            ?>
                <!-- Contenedor que mostrará las respuestas del formulario si este ha sido enviado -->
                <div class="respuestas-container">
                    <div class="respuestas-header">Respuestas del formulario</div>                  
                    <!-- Mostrar el nombre ingresado -->
                    <div class="respuesta-item">
                        <label>Nombre:</label>
                        <span><?php echo $_REQUEST["nombre"]; ?></span>
                    </div>                
                    <!-- Mostrar el primer apellido ingresado -->
                    <div class="respuesta-item">
                        <label>Apellido:</label>
                        <span><?php echo $_REQUEST["primerApellido"]; ?></span>
                    </div>                   
                    <!-- Mostrar la edad ingresada -->
                    <div class="respuesta-item">
                        <label>Edad:</label>
                        <span><?php echo $_REQUEST["edad"]; ?></span>
                    </div>                  
                    <!-- Mostrar el correo electrónico ingresado -->
                    <div class="respuesta-item">
                        <label>Correo electrónico:</label>
                        <span><?php echo $_REQUEST["correo"]; ?></span>
                    </div>                 
                    <!-- Mostrar el género seleccionado -->
                    <div class="respuesta-item">
                        <label>Género:</label>
                        <span><?php echo $_REQUEST["genero"]; ?></span>
                    </div>
                </div>
            <?php
                } else {
            ?>
                <!-- Formulario para recoger información personal si no ha sido enviado -->
                <form name="ejercicio22" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                    <!-- Campo para el nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <!-- Campo para el primer apellido -->
                    <div class="form-group">
                        <label for="primerApellido">Primer Apellido:</label>
                        <input type="text" id="primerApellido" name="primerApellido" required>
                    </div>
                    <!-- Campo para la edad (tipo numérico) -->
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" id="edad" name="edad" min="0" required>
                    </div>
                    <!-- Campo para el correo electrónico -->
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <!-- Campo para seleccionar el género -->
                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <select id="genero" name="genero" required>
                            <option value="">Seleccione</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <div class="form-group">
                        <input type="submit" name="enviar" value="Enviar">
                    </div>
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
