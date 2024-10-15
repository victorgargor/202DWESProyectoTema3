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
            <h1 id="inicio"> Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página 
                las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente
            </h1>
        </header>
        <main>
            <?php
                /**
                 * @author Víctor García Gordón
                 * @version Fecha de última modificación 14/10/2024
                 */

                //Incluimos la libreria de validacion de formularios
                require_once('../core/231018libreriaValidacion.php');

                //Inicializacion de las variables
                $entradaOK = true; //Variable que nos indica que todo va bienç
                $aErrores = []; //Array donde recogemos los mensajes de error
                $aRespuestas = []; //Array donde recogeremos la respuestas correctas (si $entradaOK)


                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores = [
                                'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 50, 3, 1),
                                'edad' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['edad'], 2, 1, 1),
                        ];

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
                        echo "<h1>Respuestas:</h1>";
                        foreach ($aRespuestas as $key => $value) {
                                echo "$key : $value <br>";
                        }
                } else {
                        //Mostrar el formulario hasta que lo rellenemos correctamente
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="nombre">Nombre:</label><br>
                        <input type="text" id="nombre" name="nombre"><br>
                        <?php if (!empty($aErrores["nombre"])) { ?>
                                <span><?php echo $aErrores["nombre"]; ?></span>
                        <?php } ?>
                        <br>
                        <label for="edad">Edad:</label><br>
                        <input type="text" id="edad" name="edad"><br>
                        <?php if (!empty($aErrores["edad"])) { ?>
                                <span><?php echo $aErrores["edad"]; ?></span>
                        <?php } ?>
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

