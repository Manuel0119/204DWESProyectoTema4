<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 14-12-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <link rel="icon" type="image/ico" sizes="32x32" href="../webroot/favicon.ico">
    </head>
    <body>
        <div class="encabezado">
            <h2>
                1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores(MySQLi).
            </h2>
        </div>
        <div class="codigophp">
            <?php
            //Declaración de tres constantes que almacenan los valores de la conexión.
            require_once '../conf/confDB.php';
            try {
                //Conexion correcta
                echo '<h2>Conexion 1</h2>';
                $miDB = new mysqli();
                $miDB->connect(HOST, USER, PASSWORD, DBNAME);
                echo "<h3>Conexión establecida</h3>";
                //Conexion incorrecta
                echo '<h2>Conexion2</h2>';
                $miDB2 = new mysqli(HOST, USER, 'hola', DBNAME);
                $error = $miDB2->connect_errno;
                print 'Error: ' . $error . '<br>';
                print 'Conexión no establecida';
            } catch (mysqli_sql_exception $mse) {
                echo $mse->getMessage();
            } finally {
                $miDB->close();
            }
            ?>
        </div>
        <a href="../indexProyectoTema4.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../index.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

