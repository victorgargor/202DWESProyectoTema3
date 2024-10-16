<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/index.css" type="text/css">
        <title>Víctor García Gordón</title>
    </head>
    <body>
        <header>      
            <h1 id="inicio"> Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página 
                las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente
            </h1>
        </header>
        <main>
            <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 15/10/2024
                 */

                //Incluimos la libreria de validacion de formularios
                require_once('../core/231018libreriaValidacion.php');

                //Inicializacion de las variables
                $entradaOK = true; //Variable que nos indica que todo va bien
                $oFechaActual = new DateTime("now"); //Variable que recoge la fecha actual
                //Array donde recogemos los mensajes de error
                $aErrores = ['nombre' => '',
                    'edad' => '',
                    'fecha' => $oFechaActual
                ]; 
                //Array donde recogeremos la respuestas correctas (si $entradaOK)
                $aRespuestas = ['nombre' => '',
                    'edad' => '',
                    'fecha' => $oFechaActual
                ];


                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1);
                        $aErrores['edad'] = validacionFormularios::comprobarEntero($_REQUEST['edad'], 200, 1, 0);

                        //Recorremos el array de errores
                        foreach ($aErrores as $clave => $valor) {
                                if ($valor == !null) {
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
                                'edad' => $_REQUEST['edad'],
                        ];

                        //Mostramos las respuestas por pantalla
                        echo "<h2>Respuestas:</h2>";
                        foreach ($aRespuestas as $key => $value) {
                                echo "$key : $value <br>";
                        }
                } else {
                        //Mostrar el formulario hasta que lo rellenemos correctamente
                ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <label for="nombre">Nombre: 
                        <input type="text" id="nombre" name="nombre" required style="background-color: yellow">
                        </label>
                        <?php if (!empty($aErrores["nombre"])) { ?>
                                <span style="color: red"><?php echo $aErrores["nombre"]; ?></span>
                        <?php } ?>                
                        <br>
                        <label for="edad">Edad:
                            <input type="number" id="edad" name="edad" value="1" style="background-color: white">
                        </label>
                        <?php if (!empty($aErrores["edad"])) { ?>
                        <span style="color: red"><?php echo $aErrores["edad"]; ?></span>
                        <?php } ?>             
                        <br>
                        <label for="fecha">Fecha Actual:
                            <input type="text" id="fecha" name="fecha" value="<?php echo date_format($oFechaActual, 'd-m-Y')?>" style="background-color: lightgray" disabled>
                        </label>
                        <br>
                        <input name="enviar" type="submit" value="Enviar">
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

