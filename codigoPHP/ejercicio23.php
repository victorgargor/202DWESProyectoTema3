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
            <h1 id="inicio"> Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página 
                las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté 
                vacía o errónea volverá a salir el formulario con el mensaje correspondiente.
            </h1>
        </header>
        <main>
            <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 22/10/2024
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
                    'fechaActual' => '' 
                ]; 
                
                //Array donde recogeremos las respuestas correctas (si $entradaOK)
                $aRespuestas = [
                    'nombre' => '',
                    'fechaNacimiento' => '',
                    'fechaActual' => $oFechaActual 
                ];

                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, OBLIGATORIO);
                        $aErrores['fechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], date_format($oFechaActual, 'd-m-Y'), '01/01/1900', OPCIONAL);                    
                       
                        //Recorremos el array de errores
                        foreach ($aErrores as $clave => $valor) {
                                if ($valor != null) {
                                        $entradaOK = false;
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
                                'fechaActual' => $oFechaActual 
                        ];

                        //Mostramos las respuestas por pantalla
                        echo '<div class="respuestas-container">';
                        echo '<h2 class="respuestas-header">Respuestas:</h2>';
                        foreach ($aRespuestas as $key => $value) {
                            echo '<div class="respuesta-item">';
                            //Se hace una excepción para formatear la salida de los objetos de tipo fecha
                            echo ($value instanceof DateTime) ? "$key : " . $value->format('d-m-Y') . "<br>" : "$key : $value <br>";
                            echo '</div>';
                        }
                        echo '</div>'; 
                } else {
                        //Mostrar el formulario hasta que lo rellenemos correctamente
                ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                <div class="form-group">
                <label for="nombre">Nombre: 
                    <input type="text" id="nombre" name="nombre" required style="background-color: yellow" placeholder="Ej: Víctor García">
                </label>
                <?php if (!empty($aErrores["nombre"])) { ?>
                    <span style="color: red"><?php echo $aErrores["nombre"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="fechaNacimiento">Fecha de nacimiento: 
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" style="background-color: white">
                </label>
                <?php if (!empty($aErrores["fechaNacimiento"])) { ?>
                    <span style="color: red"><?php echo $aErrores["fechaNacimiento"]; ?></span>
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
