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
            <h1 id="inicio"> Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas 
                y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, 
                pero las respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
            </h1>
        </header>
        <main>
            <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 21/10/2024
                 */

                //Incluimos la libreria de validacion de formularios
                require_once('../core/231018libreriaValidacion.php');
                
                //Definición de constantes
                define("OBLIGATORIO", 1);
                define("OPCIONAL", 0);

                //Inicialización de las variables
                $entradaOK = true; //Variable que nos indica que todo va bien
                $oFechaActual = new DateTime("now"); //Variable que recoge la fecha actual
                
                //Array donde recogemos los mensajes de error
                $aErrores = [
                    'nombre' => '',
                    'fechaNacimiento' => '',
                    'edad' => '',
                    'email' => '',
                    'telefono' => '',
                    'altura' => '', 
                    'aceptaCondiciones' => '',
                    'fechaActual' => '' 
                ]; 
                
                //Array donde recogeremos las respuestas correctas (si $entradaOK)
                $aRespuestas = [
                    'nombre' => '',
                    'fechaNacimiento' => '',
                    'edad' => '',
                    'email' => '',
                    'telefono' => '',
                    'altura' => '',
                    'aceptaCondiciones' => '', 
                    'fechaActual' => '' 
                ];

                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, OBLIGATORIO);
                        $aErrores['edad'] = validacionFormularios::comprobarEntero($_REQUEST['edad'], 200, 1, OPCIONAL);
                        $aErrores['fechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], date_format($oFechaActual, 'd-m-Y'), '01/01/1900', OBLIGATORIO);                    
                        $aErrores['email'] = validacionFormularios::validarEmail($_REQUEST['email'], OBLIGATORIO);
                        $aErrores['telefono'] = validacionFormularios::validarTelefono($_REQUEST['telefono'], OBLIGATORIO);
                        $aErrores['altura'] = validacionFormularios::comprobarFloat($_REQUEST['altura'], PHP_FLOAT_MAX, 0, OPCIONAL); 
                        if (!isset($_REQUEST['aceptaCondiciones'])) {
                            $aErrores['aceptaCondiciones'] = "Debe aceptar los términos y condiciones.";
                        }

                        //Recorremos el array de errores
                        foreach ($aErrores as $clave => $valor) {
                                if ($valor != null) {
                                        $entradaOK = false;
                                        //Limpiamos el campo si hay un error
                                        $_REQUEST[$clave] = '';
                                }
                        }
                } else {
                        //El formulario no se ha rellenado nunca
                        $entradaOK = false;
                }

                //Tratamiento del formulario
                if ($entradaOK) {
                        //Almacenamos el valor en el array
                        $aRespuestas = [
                                'nombre' => $_REQUEST['nombre'],
                                'fechaNacimiento' => $_REQUEST['fechaNacimiento'],
                                'edad' => $_REQUEST['edad'],
                                'email' => $_REQUEST['email'],
                                'telefono' => $_REQUEST['telefono'], 
                                'altura' => $_REQUEST['altura'],
                                'aceptaCondiciones' => (isset($_REQUEST['aceptaCondiciones']) ? 'Sí' : 'No'),
                                'fechaActual' => $oFechaActual 
                        ];

                        //Mostramos las respuestas por pantalla
                        echo '<div class="respuestas-container">';
                        echo '<h2 class="respuestas-header">Respuestas:</h2>';
                        foreach ($aRespuestas as $key => $value) {
                            echo '<div class="respuesta-item">';
                            if ($key == 'fechaActual') {
                                // Formateamos la fecha cuando la mostramos
                                echo "$key : " . $value->format('d-m-Y') . "<br>";
                            } else {
                                echo "$key : $value <br>";
                            }
                            echo '</div>';
                        }
                        echo '</div>'; 
                } else {
                        //Mostrar el formulario hasta que lo rellenemos correctamente
                ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                <div class="form-group">
                <label for="nombre">Nombre: 
                    <input type="text" id="nombre" name="nombre" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''); ?>" placeholder="Ej: Víctor García">
                </label>
                <?php if (!empty($aErrores["nombre"])) { ?>
                    <span style="color: red"><?php echo $aErrores["nombre"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="fechaNacimiento">Fecha de nacimiento: 
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['fechaNacimiento']) ? $_REQUEST['fechaNacimiento'] : ''); ?>">
                </label>
                <?php if (!empty($aErrores["fechaNacimiento"])) { ?>
                    <span style="color: red"><?php echo $aErrores["fechaNacimiento"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="edad">Edad:
                    <input type="text" id="edad" name="edad" style="background-color: white" value="<?php echo (isset($_REQUEST['edad']) ? $_REQUEST['edad'] : ''); ?>" placeholder="Ej: 30">
                </label>
                <?php if (!empty($aErrores["edad"])) { ?>
                    <span style="color: red"><?php echo $aErrores["edad"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="email">Correo electrónico:
                    <input type="email" id="email" name="email" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['email']) ? $_REQUEST['email'] : ''); ?>" placeholder="Ej: victor@dominio.com">
                </label>
                <?php if (!empty($aErrores["email"])) { ?>
                    <span style="color: red"><?php echo $aErrores["email"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="telefono">Teléfono:
                    <input type="tel" id="telefono" name="telefono" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : ''); ?>" placeholder="654321987">
                </label>
                <?php if (!empty($aErrores["telefono"])) { ?>
                    <span style="color: red"><?php echo $aErrores["telefono"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="altura">Altura (m):
                    <input type="text" id="altura" name="altura" style="background-color: white" value="<?php echo (isset($_REQUEST['altura']) ? $_REQUEST['altura'] : ''); ?>" placeholder="Ej: 1.75">
                </label>
                <?php if (!empty($aErrores["altura"])) { ?>
                    <span style="color: red"><?php echo $aErrores["altura"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="aceptaCondiciones">
                    <input type="checkbox" id="aceptaCondiciones" name="aceptaCondiciones" value="1" <?php echo (isset($_REQUEST['aceptaCondiciones']) ? 'checked' : ''); ?>> Acepto los términos y condiciones
                </label>
                <?php if (!empty($aErrores["aceptaCondiciones"])) { ?>
                    <span style="color: red"><?php echo $aErrores["aceptaCondiciones"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="fechaActual">Fecha Actual:
                    <input type="text" id="fechaActual" name="fechaActual" value="<?php echo date_format($oFechaActual, 'd-m-Y') ?>" style="background-color: lightgray" disabled>
                </label>
                </div>
                <div class="form-group">
                <input name="enviar" type="submit" value="Enviar">
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
