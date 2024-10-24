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
            <h1 id="inicio">ENCUESTA INDIVIDUAL DE VALORACIÓN - EJERCICIO 27
            UTILIZANDO PLANTILLA DE DESARROLLO DE FORMULARIOS COMO CHURROS</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 23/10/2024
                 */

                //Incluimos la libreria de validacion de formularios
                require_once('../core/231018libreriaValidacion.php');
                
                //Definición de constantes
                define("OBLIGATORIO", 1);
                define("OPCIONAL", 0);

                //Inicialización de las variables
                $entradaOK = true; //Variable que nos indica que todo va bien
                $oFechaActual = new DateTime("now"); //Variable que recoge la fecha actual
                
                //Declaración de un array con las opciones para una lista
                $aLista = [
                    'opc1' => 'Ni idea',
                    'opc2' => 'Con la familia',
                    'opc3' => 'Trabajando',
                    'opc4' => 'Estudiando DWES'
                ];
                
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
                    'sentimientosHoy' => null,
                    'notaCurso' => 0,
                    'planesVacaciones' => null,
                    'estadoAnimo' => '', 
                ];

                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['nombreApellidos'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, OBLIGATORIO);         
                        $aErrores['fechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], date_format($oFechaActual, 'd-m-Y'), '01/01/1900', OBLIGATORIO);
                        $aErrores['notaCurso'] = validacionFormularios::comprobarEntero($_REQUEST['notaCurso'], 10, 0, OBLIGATORIO);
                        $aErrores['planesVacaciones'] = validacionFormularios::validarElementoEnLista($_REQUEST['planesVacaciones'], $aLista);
                        $aErrores['estadoAnimo'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['estadoAnimo'], 1000, 1, OBLIGATORIO);
                        
                        //En los if se comprueba si se ha seleccionado algo sino se envia el mensaje de error. Es la manera de hacerlos obligatorios
                        if (!isset($_REQUEST['sentimientosHoy'])) {$aErrores['sentimientosHoy'] = "Debes escoger al menos 1 opción.";}

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
                        //Variable que recoge la fecha de nacimiento y crea un objeto DateTime en el formato especificado
                        $oFechaNacimiento = DateTime::createFromFormat('Y-m-d', $_REQUEST['fechaNacimiento']);
                        $edadActual = date_diff($oFechaNacimiento, $oFechaActual)->y; // Obtiene los años de diferencia
                        //Almacenamos el valor en el array
                        $aRespuestas = [
                                'nombreApellidos' => $_REQUEST['nombreApellidos'],
                                'fechaNacimiento' => $_REQUEST['fechaNacimiento'],
                                'sentimientosHoy' => $_REQUEST['sentimientosHoy'],
                                'notaCurso' => $_REQUEST['notaCurso'],
                                'planesVacaciones' => $_REQUEST['planesVacaciones'],
                                'estadoAnimo' => $_REQUEST['estadoAnimo'], 
                        ];

                        //Mostramos las respuestas por pantalla
                        echo '<div class="respuestas-container">';
                        echo '<h2 class="respuestas-header">RESULTADOS DE LA ENCUESTA - INFORME DE SATISFACCIÓN PERSONAL:</h2>';
                        echo 'Hoy '.date_format($oFechaActual, 'd F').' a las '.date_format($oFechaActual, 'H:i').'.<br>';
                        echo 'D. '.$_REQUEST['nombreApellidos'].' nacido hace '.$edadActual.' años se siente '.$_REQUEST['sentimientosHoy'].'.<br>';
                        echo 'Valora su curso actual con '.$_REQUEST['notaCurso'].' sobre 10.<br>';
                        echo 'Estas navidades las dedicará a '.$_REQUEST['planesVacaciones'].'.<br>';
                        echo 'Y, además, opina que: '.$_REQUEST['estadoAnimo'].'.<br>';
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
                <label for="sentimientosHoy">¿Cómo te sientes hoy?</label>
                <br>
                <input type="radio" id="muy_mal" name="sentimientosHoy" value="muy mal" <?php if(is_null($aErrores['sentimientosHoy']) && isset($_REQUEST['sentimientosHoy']) && $_REQUEST['sentimientosHoy']=='muy mal'){ echo 'checked';}?>>
                <label for="sentimientosHoy">MUY MAL</label>
                <br>
                <input type="radio" id="mal" name="sentimientosHoy" value="mal" <?php if(is_null($aErrores['sentimientosHoy']) && isset($_REQUEST['sentimientosHoy']) && $_REQUEST['sentimientosHoy']=='mal'){ echo 'checked';}?>>
                <label for="sentimientosHoy">MAL</label>
                <br>
                <input type="radio" id="regular" name="sentimientosHoy" value="regular" <?php if(is_null($aErrores['sentimientosHoy']) && isset($_REQUEST['sentimientosHoy']) && $_REQUEST['sentimientosHoy']=='regular'){ echo 'checked';}?>>
                <label for="sentimientosHoy">REGULAR</label>
                <br>
                <input type="radio" id="bien" name="sentimientosHoy" value="bien" <?php if(is_null($aErrores['sentimientosHoy']) && isset($_REQUEST['sentimientosHoy']) && $_REQUEST['sentimientosHoy']=='bien'){ echo 'checked';}?>>
                <label for="sentimientosHoy">BIEN</label>
                <br>
                <input type="radio" id="muy_bien" name="sentimientosHoy" value="muy bien" <?php if(is_null($aErrores['sentimientosHoy']) && isset($_REQUEST['sentimientosHoy']) && $_REQUEST['radioButtonObligatorio']=='muy bien'){ echo 'checked';}?>>
                <label for="sentimientosHoy">MUY BIEN</label>
                <br>
                <?php if (!empty($aErrores['sentimientosHoy'])) { ?> <span style="color: red"><?php echo $aErrores['sentimientosHoy']; ?></span> <?php } ?>
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
                    <select id="planesVacaciones" name="planesVacaciones" required style="background-color: yellow">
                            <option value="<?php echo $aLista['opc1']?>"><?php echo $aLista['opc1']?></option>
                            <option value="<?php echo $aLista['opc2']?>"><?php echo $aLista['opc2']?></option>
                            <option value="<?php echo $aLista['opc3']?>"><?php echo $aLista['opc3']?></option>
                            <option value="<?php echo $aLista['opc4']?>"><?php echo $aLista['opc4']?></option>
                    </select>
                </label>
                <?php echo ($aErrores['planesVacaciones'] != '' ? "<span style='color:red; padding: 0; margin: 0;'> ".$aErrores['planesVacaciones']." </span>" : ''); ?>
                </div>
                <div class="form-group">
                <label for="estadoAnimo">Describe brevemente tu estado de ánimo:
                <textarea id="estadoAnimo" name="estadoAnimo" required style="background-color: yellow" rows="4" cols="50"></textarea>
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
