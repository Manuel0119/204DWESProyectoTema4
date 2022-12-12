<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 13-11-2022.
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
                1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores(PDO).
            </h2>
        </div>
        <div class="codigophp" style="margin: 0 15px; position: static">
            <?php
                try {
                    require_once '../conf/confDB.php';
                    //Creamos e inicializamos un array que contiene los atributos.
                    $aAtributos = [
                                'AUTOCOMMIT',
                                'CASE',
                                'CLIENT_VERSION',
                                "CONNECTION_STATUS",
                                "DRIVER_NAME",
                                "ERRMODE",
                                "ORACLE_NULLS",
                                "PERSISTENT",
                                //"PREFETCH",
                                "SERVER_INFO",
                                "SERVER_VERSION",
                                //"TIMEOUT"
                    ];
                    //Crear un objeto PDO pasándole las constantes definidas como parametros.
                    echo '<h2>Conexion correcta</h2>';
                    $miDB = new PDO(DSN,USER,PASSWORD);
                    echo "<h3>Conexión establecida</h3>";
                    //$miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
                    //Creamos una tabla en la que imprimiremos el nombre del atributo y el valor del mismo.
                    print '<table>';
                    foreach ($aAtributos as $valorAtributo){
                        print "<tr>";
                        print "<td>".$valorAtributo."</td>";
                        print "<td>".$miDB->getAttribute(constant("PDO::ATTR_$valorAtributo"))."</td>";
                        print "</tr>";
                    }
                    print '</table>';
                    echo '<h2>Conexion incorrecta</h2><br>';
                    $miDB = new PDO(DSN,USER,'pass');
                } catch (PDOException $excepcion) {
                    echo 'Error: ' . $excepcion->getMessage()."<br>";
                    echo 'Código de error: ' . $excepcion->getCode()."<br>";
                } finally {
                    unset($miDB);
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

