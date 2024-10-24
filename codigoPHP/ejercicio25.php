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
            <h1 id="inicio">Plantilla para hacer formularios como churros</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 24/10/2024
                 */

                //Incluimos la libreria de validacion de formularios
                require_once('../core/231018libreriaValidacion.php');
                
                //Definición de constantes que utilizaremos en prácticamente todos los métodos de la librería
                define('OBLIGATORIO', 1);
                define('OPCIONAL', 0);
                //Definición de constantes para comprobarAlfabético
                define('T_MAX_ALFABETICO',1000);
                define('T_MIN_ALFABETICO',1);
                //Definición de constantes para comprobarAlfaNumérico
                define('T_MAX_ALFANUMERICO',1000);
                define('T_MIN_ALFANUMERICO',1);
                //Definición de constantes para validarFecha
                define('FECHA_MAX',date('d-m-Y'));
                define('FECHA_MIN',"01/01/1900");
                //Definición de constantes para validarPassword
                define('MAX_PASS',16);
                define('MIN_PASS',2);
                define('DEBIL',1);//La contraseña admite solo letras
                define('NORMAL',2);//La contraseña admite numeros y letras
                define('FUERTE',3);//La contraseña admite si contiene al menos una letra mayúscula y un número
                //Definición de constantes para comprobarAlfaNumérico pero para el textArea
                define('T_MAX_TEXTAREA',500);
                define('T_MIN_TEXTAREA',1);               
                //Declaración de un array con las opciones para listaObligatorio
                $aLista = [
                    'opc1' => 'elemento 1',
                    'opc2' => 'elemento 2',
                    'opc3' => 'elemento 3'
                ];
                //Declaración de un array con las extensiones para validarNombreArchivo
                $aExtensiones = [
                    'ext1' => 'php',
                    'ext2' => 'pdf',
                    'ext3' => 'txt'
                ];

                //Inicialización de las variables
                $entradaOK = true; //Variable que nos indica que todo va bien
                $oFechaActual = new DateTime("now"); //Variable que recoge la fecha actual
                
                //Array donde recogemos los mensajes de error
                $aErrores = [
                    'alfabeticoObligatorio' => '',
                    'alfabeticoOpcional' => '',
                    'alfanumericoObligatorio' => '',
                    'alfanumericoOpcional' => '',
                    'enteroObligatorio' => '',
                    'enteroOpcional' => '',
                    'floatObligatorio' => '',
                    'floatOpcional' => '',
                    'emailObligatorio' => '',
                    'emailOpcional' => '',
                    'urlObligatorio' => '',
                    'urlOpcional' => '', 
                    'fechaObligatorio' => '',
                    'fechaOpcional' => '',
                    'dniObligatorio' => '',
                    'dniOpcional' => '',
                    'cpObligatorio' => '',
                    'cpOpcional' => '',
                    'passwordObligatorio' => '',
                    'passwordOpcional' => '',
                    'listaObligatorio' => '',
                    'telefonoObligatorio' => '',
                    'telefonoOpcional' => '',
                    'textAreaObligatorio' => '',
                    'textAreaOpcional' => '',
                    'radioButtonObligatorio' => '',
                    'checkBoxObligatorio' => '',
                    'rangoObligatorio' => '',
                    'rangoOpcional' => '',
                    'colorOpcional' => ''
                ]; 
                
                //Array donde recogeremos las respuestas correctas (si $entradaOK)
                $aRespuestas = [
                    'alfabeticoObligatorio' => '',
                    'alfabeticoOpcional' => '',
                    'alfanumericoObligatorio' => '',
                    'alfanumericoOpcional' => '',
                    'enteroObligatorio' => '',
                    'enteroOpcional' => '',
                    'floatObligatorio' => '',
                    'floatOpcional' => '',
                    'emailObligatorio' => '',
                    'emailOpcional' => '',
                    'urlObligatorio' => '',
                    'urlOpcional' => '', 
                    'fechaObligatorio' => '',
                    'fechaOpcional' => '',
                    'dniObligatorio' => '',
                    'dniOpcional' => '',
                    'cpObligatorio' => '',
                    'cpOpcional' => '',
                    'passwordObligatorio' => '',
                    'passwordOpcional' => '',
                    'listaObligatorio' => '',
                    'telefonoObligatorio' => '',
                    'telefonoOpcional' => '',
                    'textAreaObligatorio' => '',
                    'textAreaOpcional' => '',
                    'radioButtonObligatorio' => '',
                    'checkBoxObligatorio' => '',
                    'rangoObligatorio' => '',
                    'rangoOpcional' => '',
                    'colorOpcional' => '' 
                ];

                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores = ['alfabeticoObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], T_MAX_ALFABETICO, T_MIN_ALFABETICO, OBLIGATORIO)];
                        $aErrores = ['alfabeticoOpcional' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], T_MAX_ALFABETICO, T_MIN_ALFABETICO, OPCIONAL)];

                        $aErrores = ['alfanumericoObligatorio' => validacionFormularios::comprobarAlfanumerico($_REQUEST['alfanumericoObligatorio'], T_MAX_ALFANUMERICO, T_MIN_ALFANUMERICO, OBLIGATORIO)];
                        $aErrores = ['alfanumericoOpcional' => validacionFormularios::comprobarAlfanumerico($_REQUEST['alfanumericoOpcional'], T_MAX_ALFANUMERICO, T_MIN_ALFANUMERICO, OPCIONAL)];

                        $aErrores = ['enteroObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO)];
                        $aErrores = ['enteroOpcional' => validacionFormularios::comprobarEntero($_REQUEST['enteroOpcional'], PHP_INT_MAX, PHP_INT_MIN, OPCIONAL)];

                        $aErrores = ['floatObligatorio' => validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, OBLIGATORIO)];
                        $aErrores = ['floatOpcional' => validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, OPCIONAL)];

                        $aErrores = ['emailObligatorio' => validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], OBLIGATORIO)];
                        $aErrores = ['emailOpcional' => validacionFormularios::validarEmail($_REQUEST['emailOpcional'], OPCIONAL)];

                        $aErrores = ['urlObligatorio' => validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OBLIGATORIO)];
                        $aErrores = ['urlOpcional' => validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OPCIONAL)];

                        $aErrores = ['fechaObligatorio' => validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'], FECHA_MAX, FECHA_MIN, OBLIGATORIO)];
                        $aErrores = ['fechaOpcional' => validacionFormularios::validarFecha($_REQUEST['fechaOpcional'],FECHA_MAX, FECHA_MIN, OPCIONAL)];

                        $aErrores = ['dniObligatorio' => validacionFormularios::validarDni($_REQUEST['dniObligatorio'], OBLIGATORIO)];
                        $aErrores = ['dniOpcional' => validacionFormularios::validarDni($_REQUEST['dniOpcional'], OPCIONAL)];

                        $aErrores = ['cpObligatorio' => validacionFormularios::validarCp($_REQUEST['cpObligatorio'], OBLIGATORIO)];
                        $aErrores = ['cpOpcional' => validacionFormularios::validarCp($_REQUEST['cpOpcional'], OPCIONAL)];

                        $aErrores = ['passwordObligatorio' => validacionFormularios::validarPassword($_REQUEST['passwordObligatorio'], MAX_PASS, MIN_PASS, DEBIL, OBLIGATORIO)];
                        $aErrores = ['passwordOpcional' => validacionFormularios::validarPassword($_REQUEST['passwordOpcional'],MAX_PASS, MIN_PASS, NORMAL, OPCIONAL)];
                        
                        $aErrores = ['listaObligatorio' => validacionFormularios::validarElementoEnLista($_REQUEST['listaObligatorio'], $aLista)];
                        
                        $aErrores = ['telefonoObligatorio' => validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO)];
                        $aErrores = ['telefonoOpcional' => validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional'], OPCIONAL)];                   
                        
                        $aErrores = ['textAreaObligatorio' => validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaObligatorio'], T_MAX_TEXTAREA, T_MIN_TEXTAREA, OBLIGATORIO)];
                        $aErrores = ['textAreaOpcional' => validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaOpcional'], T_MAX_TEXTAREA, T_MIN_TEXTAREA, OPCIONAL)];
                        
                        $aErrores = ['radioButtonObligatorio' => null];
                        
                        $aErrores = ['rangoObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['rangoObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO)];
                        $aErrores = ['rangoOpcional' => validacionFormularios::comprobarEntero($_REQUEST['rangoOpcional'],  PHP_INT_MAX, PHP_INT_MIN, OPCIONAL)];
                                                         
                        //En los if se comprueba si se ha seleccionado algo sino se envia el mensaje de error. Es la manera de hacerlos obligatorios
                        if (!isset($_REQUEST['radioButtonObligatorio'])) {$aErrores['radioButtonObligatorio'] = "Debes escoger al menos 1 opción.";}
                        if (!isset($_REQUEST['checkBoxObligatorio'])) {$aErrores['checkBoxObligatorio'] = "Debes escoger al menos 1 opción.";}
                        
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
                            'alfabeticoObligatorio' =>  $_REQUEST['alfabeticoObligatorio'],
                            'alfabeticoOpcional' => $_REQUEST['alfabeticoOpcional'],
                            'alfanumericoObligatorio' => $_REQUEST['alfanumericoObligatorio'],
                            'alfanumericoOpcional' => $_REQUEST['alfanumericoOpcional'],
                            'enteroObligatorio' => $_REQUEST['enteroObligatorio'],
                            'enteroOpcional' => $_REQUEST['enteroOpcional'],
                            'floatObligatorio' => $_REQUEST['floatObligatorio'],
                            'floatOpcional' => $_REQUEST['floatOpcional'],
                            'emailObligatorio' => $_REQUEST['emailObligatorio'],
                            'emailOpcional' => $_REQUEST['emailOpcional'],
                            'urlObligatorio' => $_REQUEST['urlObligatorio'],
                            'urlOpcional' => $_REQUEST['urlOpcional'], 
                            'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                            'fechaOpcional' => $_REQUEST['fechaOpcional'],
                            'dniObligatorio' => $_REQUEST['dniObligatorio'],
                            'dniOpcional' => $_REQUEST['dniOpcional'],
                            'cpObligatorio' => $_REQUEST['cpObligatorio'],
                            'cpOpcional' => $_REQUEST['cpOpcional'],
                            'passwordObligatorio' => $_REQUEST['passwordObligatorio'],
                            'passwordOpcional' => $_REQUEST['passwordOpcional'],
                            'listaObligatorio' => $_REQUEST['listaObligatorio'],
                            'telefonoObligatorio' => $_REQUEST['telefonoObligatorio'],
                            'telefonOpcional' => $_REQUEST['telefonoOpcional'],
                            'textAreaObligatorio' => $_REQUEST['textAreaObligatorio'],
                            'textAreaOpcional' => $_REQUEST['textAreaOpcional'],
                            'radioButtonObligatorio' => $_REQUEST['radioButtonObligatorio'],
                            'checkBoxObligatorio' => $_REQUEST['checkBoxObligatorio'],
                            'rangoObligatorio' => $_REQUEST['rangoObligatorio'],
                            'rangoOpcional' => $_REQUEST['rangoOpcional'],
                            'colorOpcional' => $_REQUEST['colorOpcional'] 
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
            <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" novalidate>
                <!-- Campo de texto alfabetico obligatorio -->
                <div class="form-group">
                    <label for="alfabeticoObligatorio">Alfabético Obligatorio: </label>
                    <input type="text" id="alfabeticoObligatorio" name="alfabeticoObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['alfabeticoObligatorio']) ? $_REQUEST['alfabeticoObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['alfabeticoObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['alfabeticoObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de texto alfabetico opcional -->
                <div class="form-group">
                    <label for="alfabeticoOpcional">Alfabético Opcional:</label>
                    <input type="text" id="alfabeticoOpcional" name="alfabeticoOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['alfabeticoOpcional']) ? $_REQUEST['alfabeticoOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['alfabeticoOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['alfabeticoOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo de texto alfanumérico obligatorio -->
                <div class="form-group">
                    <label for="alfanumericoObligatorio">Alfanumérico Obligatorio:</label>
                    <input type="text" id="alfanumericoObligatorio" name="alfanumericoObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['alfanumericoObligatorio']) ? $_REQUEST['alfanumericoObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['alfanumericoObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['alfanumericoObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de texto alfanumérico opcional -->
                <div class="form-group">
                    <label for="alfanumericoOpcional">Alfanumérico Opcional:</label>
                    <input type="text" id="alfanumericoOpcional" name="alfanumericoOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['alfanumericoOpcional']) ? $_REQUEST['alfanumericoOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['alfanumericoOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['alfanumericoOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo numérico entero obligatorio -->
                <div class="form-group">
                    <label for="enteroObligatorio">Entero Obligatorio:</label>
                    <input type="text" id="enteroObligatorio" name="enteroObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['enteroObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['enteroObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo numérico entero opcional -->
                <div class="form-group">
                    <label for="enteroOpcional">Entero Opcional:</label>
                    <input type="text" id="enteroOpcional" name="enteroOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['enteroOpcional']) ? $_REQUEST['enteroOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['enteroOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['enteroOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo numérico float obligatorio -->
                <div class="form-group">
                    <label for="floatObligatorio">Float Obligatorio:</label>
                    <input type="text" id="floatObligatorio" name="floatObligatorio" step="0.01" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['floatObligatorio']) ? $_REQUEST['floatObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['floatObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['floatObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo numérico float opcional -->
                <div class="form-group">
                    <label for="floatOpcional">Float Opcional:</label>
                    <input type="text" id="floatOpcional" name="floatOpcional" step="0.01" style="background-color: white" value="<?php echo (isset($_REQUEST['floatOpcional']) ? $_REQUEST['floatOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['floatOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['floatOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo de correo electrónico obligatorio -->
                <div class="form-group">
                    <label for="emailObligatorio">Email Obligatorio:</label>
                    <input type="email" id="emailObligatorio" name="emailObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['emailObligatorio']) ? $_REQUEST['emailObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['emailObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['emailObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de correo electrónico opcional -->
                <div class="form-group">
                    <label for="emailOpcional">Email Opcional:</label>
                    <input type="email" id="emailOpcional" name="emailOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['emailOpcional']) ? $_REQUEST['emailOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['emailOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['emailOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo URL obligatorio -->
                <div class="form-group">
                    <label for="urlObligatorio">URL Obligatorio:</label>
                    <input type="text" id="urlObligatorio" name="urlObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['urlObligatorio']) ? $_REQUEST['urlObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['urlObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['urlObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo URL opcional -->
                <div class="form-group">
                    <label for="urlOpcional">URL Opcional:</label>
                    <input type="text" id="urlOpcional" name="urlOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['urlOpcional']) ? $_REQUEST['urlOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['urlOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['urlOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo de fecha obligatorio -->
                <div class="form-group">
                    <label for="fechaObligatorio">Fecha Obligatorio:</label>
                    <input type="date" id="fechaObligatorio" name="fechaObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['fechaObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['fechaObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de fecha opcional -->
                <div class="form-group">
                    <label for="fechaOpcional">Fecha Opcional:</label>
                    <input type="date" id="fechaOpcional" name="fechaOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['fechaOpcional']) ? $_REQUEST['fechaOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['fechaOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['fechaOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo DNI obligatorio -->
                <div class="form-group">
                    <label for="dniObligatorio">DNI Obligatorio:</label>
                    <input type="text" id="dniObligatorio" name="dniObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['dniObligatorio']) ? $_REQUEST['dniObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['dniObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['dniObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo DNI opcional -->
                <div class="form-group">
                    <label for="dniOpcional">DNI Opcional:</label>
                    <input type="text" id="dniOpcional" name="dniOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['dniOpcional']) ? $_REQUEST['dniOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['dniOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['dniOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo código postal obligatorio -->
                <div class="form-group">
                    <label for="cpObligatorio">CP Obligatorio:</label>
                    <input type="text" id="cpObligatorio" name="cpObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['cpObligatorio']) ? $_REQUEST['cpObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['cpObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['cpObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo código postal opcional -->
                <div class="form-group">
                    <label for="cpOpcional">CP Opcional:</label>
                    <input type="text" id="cpOpcional" name="cpOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['cpOpcional']) ? $_REQUEST['cpOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['cpOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['cpOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo de contraseña obligatorio -->
                <div class="form-group">
                    <label for="passwordObligatorio">Password Obligatorio:</label>
                    <input type="password" id="passwordObligatorio" name="passwordObligatorio"  style="background-color: yellow" required value="<?php echo (isset($_REQUEST['passwordObligatorio']) ? $_REQUEST['passwordObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['passwordObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['passwordObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de contraseña opcional -->
                <div class="form-group">
                    <label for="passwordOpcional">Password Opcional:</label>
                    <input type="password" id="passwordOpcional" name="passwordOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['passwordOpcional']) ? $_REQUEST['passwordOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['passwordOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['passwordOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo lista de selección obligatorio -->
                <div class="form-group">
                    <label for="listaObligatorio">Lista Obligatorio:</label>
                    <select id="listaObligatorio" name="listaObligatorio" required style="background-color: yellow">
                        <option value="<?php echo $aLista['opc1']?>"><?php echo $aLista['opc1']?></option>
                        <option value="<?php echo $aLista['opc2']?>"><?php echo $aLista['opc2']?></option>
                        <option value="<?php echo $aLista['opc3']?>"><?php echo $aLista['opc3']?></option>
                    </select>
                    <?php if (!empty($aErrores['listaObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['listaObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de teléfono obligatorio -->
                <div class="form-group">
                    <label for="telefonoObligatorio">Teléfono Obligatorio:</label>
                    <input type="tel" id="telefonoObligatorio" name="telefonoObligatorio" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['telefonoObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['telefonoObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de teléfono opcional -->
                <div class="form-group">
                    <label for="telefonoOpcional">Teléfono Opcional:</label>
                    <input type="tel" id="telefonoOpcional" name="telefonoOpcional" style="background-color: white" value="<?php echo (isset($_REQUEST['telefonoOpcional']) ? $_REQUEST['telefonoOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['telefonoOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['telefonoOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Campo de área de texto obligatorio -->
                <div class="form-group">
                    <label for="textAreaObligatorio">TextArea Obligatorio:</label>
                    <textarea id="textAreaObligatorio" name="textAreaObligatorio" rows="4" cols="50"  style="background-color: yellow" required></textarea>
                    <?php if (!empty($aErrores['textAreaObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['textAreaObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Campo de área de texto opcional -->
                <div class="form-group">
                    <label for="textAreaOpcional">TextArea Opcional:</label>
                    <textarea id="textAreaOpcional" name="textAreaOpcional" rows="4" cols="50" style="background-color: white"></textarea>
                    <?php if (!empty($aErrores['textAreaOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['textAreaOpcional']; ?></span> <?php } ?>
                </div>

                <!-- Radio buttons obligatorio -->
                <div class="form-group">
                    <label for="radioButtonObligatorio">Radio Button Obligatorio:</label>
                    <input type="radio" id="radio1" name="radioButtonObligatorio" value="opcion1" required <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='opcion1'){ echo 'checked';}?>>
                    <label for="radioButtonObligatorio">Opción 1</label>
                    <input type="radio" id="radio2" name="radioButtonObligatorio" value="opcion2" required <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='opcion2'){ echo 'checked';}?>>
                    <label for="radioButtonObligatorio">Opción 2</label>
                    <?php if (!empty($aErrores['radioButtonObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['radioButtonObligatorio']; ?></span> <?php } ?>
                </div>

                <!-- Checkbox obligatorio -->
                <div class="form-group">
                    <label for="checkBoxObligatorio">CheckBox Obligatorio:</label>
                    <input type="checkbox" id="check1" name="checkBoxObligatorio[check1]" value="check1" required <?php if(isset($_REQUEST['checkBoxObligatorio']['check1'])){echo 'checked';}?>> 
                    <label for="check1">Opción A</label>
                    <input type="checkbox" id="check2" name="checkBoxObligatorio[check2]" value="check2" required <?php if(isset($_REQUEST['checkBoxObligatorio']['check2'])){echo 'checked';}?>> 
                    <label for="check2">Opción B</label>
                    <?php if (!empty($aErrores['checkBoxObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['checkBoxObligatorio']; ?></span> <?php } ?>
                </div>
                
                 <!-- Campo de rango obligatorio -->
                <div class="form-group">
                    <label for="rangoObligatorio">Rango Obligatorio:</label>
                    <input type="range" id="rangoObligatorio" name="rangoObligatorio" min="0" max="100" style="background-color: yellow" required value="<?php echo (isset($_REQUEST['rangoObligatorio']) ? $_REQUEST['rangoObligatorio'] : ''); ?>">
                    <?php if (!empty($aErrores['rangoObligatorio'])) { ?> <span style="color: red"><?php echo $aErrores['rangoObligatorio']; ?></span> <?php } ?>
                </div>
                 
                <!-- Campo de rango opcional -->
                <div class="form-group">
                    <label for="rangoOpcional">Rango Opcional:</label>
                    <input type="range" id="rangoOpcional" name="rangoOpcional" min="0" max="100" style="background-color: white" value="<?php echo (isset($_REQUEST['rangoOpcional']) ? $_REQUEST['rangoOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['rangoOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['rangoOpcional']; ?></span> <?php } ?>
                </div>
                  
                <!-- Campo de color opcional-->
                <div class="form-group">
                    <label for="colorOpcional">Color Opcional:</label>
                    <input type="color" id="colorOpcional" name="colorOpcional" value="<?php echo (isset($_REQUEST['colorOpcional']) ? $_REQUEST['colorOpcional'] : ''); ?>">
                    <?php if (!empty($aErrores['colorOpcional'])) { ?> <span style="color: red"><?php echo $aErrores['colorOpcional']; ?></span> <?php } ?>
                </div>
                                
                <!-- Botón de envío -->
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
