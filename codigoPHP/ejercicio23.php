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
             * @version Fecha de última modificación 09/10/2024
             */
            //Incluimos la libreria de validación de formularios
            require_once '../core/231018libreriaValidacion.php';
            //Variable que nos indica que todo va bien
            $entradaOK = true;
            //Array donde recogemos los mensajes de error
            $aErrores = [
                'nombre' => '',
                'edad' => ''
            ];
            //Array donde recogeremos la respuestas correctas (si $entradaOK)
            $aRespuestas = [
                'nombre' => '',
                'edad' => ''
            ];
            if (isset($_REQUEST['enviar'])){
                
            }
            else {
                $entradaOK = false;
            }
            
            if ($entradaOK){
                $aRespuestas;
            }
            else{
            ?>
            <form name="ejercicio23" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" novalidate>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">
                    <br>                                       
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad">
                    <br>                   
                    <input type="submit" name="enviar" value="enviar">
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

