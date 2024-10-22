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
            <h1 id="inicio">ENCUESTA INDIVIDUAL DE VALORACIÓN - EJERCICIO 27
            UTILIZANDO PLANTILLA DE DESARROLLO DE FORMULARIOS COMO CHURROS</h1>
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
                    'nombreApellidos' => '',
                    'fechaNacimiento' => '',
                    'sentimientosHoy' => '',
                    'notaCurso' => '',
                    'planesVacaciones' => '',
                    'estadoAnimo' => '', 
                ]; 
                
                //Array donde recogeremos las respuestas correctas (si $entradaOK)
                $aRespuestas = [
                    'nombreApellidos' => '',
                    'fechaNacimiento' => '',
                    'sentimientosHoy' => '',
                    'notaCurso' => '',
                    'planesVacaciones' => '',
                    'estadoAnimo' => '', 
                ];

                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['nombreApellidos'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, OBLIGATORIO);         
                        $aErrores['fechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], date_format($oFechaActual, 'd-m-Y'), '01/01/1900', OBLIGATORIO);
                        $aErrores['notaCurso'] = validacionFormularios::comprobarEntero($_REQUEST['notaCurso'], 10, 0, OBLIGATORIO);
                        $aErrores['estadoAnimo'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['estadoAnimo'], 1000, 1, OBLIGATORIO);

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
                                'nombreApellidos' => $_REQUEST['nombreApellidos'],
                                'fechaNacimiento' => $_REQUEST['fechaNacimiento'],
                                'sentimientosHoy' => $_REQUEST['notaCurso'],
                                'notaCurso' => '',
                                'planesVacaciones' => '',
                                'estadoAnimo' => $_REQUEST['estadoAnimo'], 
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
                <label for="nombreApellidos">Nombre y apellidos del alumno: 
                    <input type="text" id="nombreApellidos" name="nombreApellidos" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['nombreApellidos']) ? $_REQUEST['nombreApellidos'] : ''); ?>">
                </label>
                <?php if (!empty($aErrores["nombreApellidos"])) { ?>
                    <span style="color: red"><?php echo $aErrores["nombreApellidos"]; ?></span>
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
                <label for="sentimientosHoy">¿Cómo te sientes hoy?
                    
                </label>
                </div>
                <div class="form-group">
                <label for="notaCurso">¿Cómo va el curso? [0-10]: 
                    <input type="text" id="notaCurso" name="notaCurso" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['notaCurso']) ? $_REQUEST['notaCurso'] : ''); ?>">
                </label>
                <?php if (!empty($aErrores["notaCurso"])) { ?>
                    <span style="color: red"><?php echo $aErrores["notaCurso"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="planesVacaciones">¿Cómo se presentan las vacaciones de navidad? 
                    
                </label>         
                </div>
                <div class="form-group">
                <label for="estadoAnimo">Describe brevemente tu estado de ánimo: 
                <textarea id="estadoAnimo" name="estadoAnimo" style="background-color: yellow" rows="4" cols="50"></textarea>
                </label>
                <?php if (!empty($aErrores["estadoAnimo"])) { ?>
                <span style="color: red"><?php echo $aErrores["estadoAnimo"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <input id="enviar" name="enviar" type="submit" value="Enviar">
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
