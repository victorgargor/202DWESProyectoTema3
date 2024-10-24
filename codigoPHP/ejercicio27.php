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
                 * @version Fecha de última modificación 24/10/2024
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
                    'alfabeticoObligatorio' => '',
                    'fechaObligatorio' => '',
                    'radioButtonObligatorio' => '',
                    'enteroObligatorio' => '',
                    'listaObligatorio' => '',
                    'textAreaObligatorio' => '', 
                ]; 
                
                //Array donde recogeremos las respuestas correctas (si $entradaOK)
                $aRespuestas = [
                    'alfabeticoObligatorio' => '',
                    'fechaObligatorio' => '',
                    'radioButtonObligatorio' => null,
                    'enteroObligatorio' => 0,
                    'listaObligatorio' => null,
                    'textAreaObligatorio' => '', 
                ];

                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 1000, 1, OBLIGATORIO);         
                        $aErrores['fechaObligatorio'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'], date_format($oFechaActual, 'd-m-Y'), '01/01/1900', OBLIGATORIO);
                        $aErrores['enteroObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], 10, 0, OBLIGATORIO);
                        $aErrores['listaObligatorio'] = validacionFormularios::validarElementoEnLista($_REQUEST['listaObligatorio'], $aLista);
                        $aErrores['textAreaObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['textAreaObligatorio'], 1000, 1, OBLIGATORIO);
                        
                        //En los if se comprueba si se ha seleccionado algo sino se envia el mensaje de error. Es la manera de hacerlos obligatorios
                        if (!isset($_REQUEST['radioButtonObligatorio'])) {$aErrores['radioButtonObligatorio'] = "Debes escoger al menos 1 opción.";}

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
                        $oFechaNacimiento = DateTime::createFromFormat('Y-m-d', $_REQUEST['fechaObligatorio']);
                        $edadActual = date_diff($oFechaNacimiento, $oFechaActual)->y; // Obtiene los años de diferencia
                        //Almacenamos el valor en el array
                        $aRespuestas = [
                                'alfabeticoObligatorio' => $_REQUEST['alfabeticoObligatorio'],
                                'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                                'radioButtonObligatorio' => $_REQUEST['radioButtonObligatorio'],
                                'enteroObligatorio' => $_REQUEST['enteroObligatorio'],
                                'listaObligatorio' => $_REQUEST['listaObligatorio'],
                                'textAreaObligatorio' => $_REQUEST['textAreaObligatorio'], 
                        ];

                        //Mostramos las respuestas por pantalla
                        echo '<div class="respuestas-container">';
                        echo '<h2 class="respuestas-header">RESULTADOS DE LA ENCUESTA - INFORME DE SATISFACCIÓN PERSONAL:</h2>';
                        echo 'Hoy '.date_format($oFechaActual, 'd F').' a las '.date_format($oFechaActual, 'H:i').'.<br>';
                        echo 'D. '.$_REQUEST['alfabeticoObligatorio'].' nacido hace '.$edadActual.' años se siente '.$_REQUEST['radioButtonObligatorio'].'.<br>';
                        echo 'Valora su curso actual con '.$_REQUEST['enteroObligatorio'].' sobre 10.<br>';
                        echo 'Estas navidades las dedicará a '.$_REQUEST['listaObligatorio'].'.<br>';
                        echo 'Y, además, opina que: '.$_REQUEST['textAreaObligatorio'].'.<br>';
                        echo '</div>'; 
                } else {
                        //Mostrar el formulario hasta que lo rellenemos correctamente
                ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                <div class="form-group">
                <label for="alfabeticoObligatorio">Nombre y apellidos del alumno:</label>
                <input type="text" id="alfabeticoObligatorio" name="alfabeticoObligatorio" placeholder="Ej: Víctor García" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['alfabeticoObligatorio']) ? $_REQUEST['alfabeticoObligatorio'] : ''); ?>">
                <?php if (!empty($aErrores["alfabeticoObligatorio"])) { ?>
                    <span style="color: red"><?php echo $aErrores["alfabeticoObligatorio"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="fechaObligatorio">Fecha de nacimiento:</label>
                <input type="date" id="fechaObligatorio" name="fechaObligatorio" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : ''); ?>">  
                <?php if (!empty($aErrores["fechaObligatorio"])) { ?>
                    <span style="color: red"><?php echo $aErrores["fechaObligatorio"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="radioButtonObligatorio">¿Cómo te sientes hoy?</label>
                <input type="radio" id="muy_mal" name="radioButtonObligatorio" value="muy mal" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='muy mal'){ echo 'checked';}?>>
                <label for="radioButtonObligatorio">MUY MAL</label>
                <input type="radio" id="mal" name="radioButtonObligatorio" value="mal" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='mal'){ echo 'checked';}?>>
                <label for="radioButtonObligatorio">MAL</label>
                <input type="radio" id="regular" name="radioButtonObligatorio" value="regular" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='regular'){ echo 'checked';}?>>
                <label for="radioButtonObligatorio">REGULAR</label>
                <input type="radio" id="bien" name="radioButtonObligatorio" value="bien" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='bien'){ echo 'checked';}?>>
                <label for="radioButtonObligatorio">BIEN</label>
                <input type="radio" id="muy_bien" name="radioButtonObligatorio" value="muy bien" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='muy bien'){ echo 'checked';}?>>
                <label for="radioButtonObligatorio">MUY BIEN</label>
                <br>
                <?php if (!empty($aErrores['radioButtonObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['radioButtonObligatorio']; ?></span> <?php } ?>
                </div>
                <div class="form-group">
                <label for="enteroObligatorio">¿Cómo va el curso? [0-10]:</label>
                <input type="text" id="enteroObligatorio" name="enteroObligatorio" placeholder="Ej: 5" required style="background-color: yellow" value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : ''); ?>">                     
                <?php if (!empty($aErrores["enteroObligatorio"])) { ?>
                    <span style="color: red"><?php echo $aErrores["enteroObligatorio"]; ?></span>
                <?php } ?>
                </div>
                <div class="form-group">
                <label for="listaObligatorio">¿Cómo se presentan las vacaciones de navidad? 
                    <select id="listaObligatorio" name="listaObligatorio" required style="background-color: yellow">
                            <option value="<?php echo $aLista['opc1']?>"><?php echo $aLista['opc1']?></option>
                            <option value="<?php echo $aLista['opc2']?>"><?php echo $aLista['opc2']?></option>
                            <option value="<?php echo $aLista['opc3']?>"><?php echo $aLista['opc3']?></option>
                            <option value="<?php echo $aLista['opc4']?>"><?php echo $aLista['opc4']?></option>
                    </select>
                </label>
                <?php echo ($aErrores['listaObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'> ".$aErrores['listaObligatorio']." </span>" : ''); ?>
                </div>
                <div class="form-group">
                <label for="textAreaObligatorio">Describe brevemente tu estado de ánimo:</label>
                <textarea id="textAreaObligatorio" name="textAreaObligatorio" required style="background-color: yellow" rows="4" cols="50"><?php echo (isset($_REQUEST['textAreaObligatorio']) ? $_REQUEST['textAreaObligatorio'] : ''); ?></textarea>              
                <?php if (!empty($aErrores["textAreaObligatorio"])) { ?>
                <span style="color: red"><?php echo $aErrores["textAreaObligatorio"]; ?></span>
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
