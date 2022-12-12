<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 25-11-2022.
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
                5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno(PDO).
            </h2>
        </div>
        <div class="codigophp" style="margin: 3em;left: 0; position: initial">
            <?php
            require_once '../conf/confDB.php';
            //Comprobar si se ha enviado el formulario.
            try {
                $miDB = new PDO(DSN, USER, PASSWORD);
                $miDB->beginTransaction();
                $primerInsert = $miDB->exec("insert into T02_Departamento values('DCO','Departamento de Comunicaciones',now(),2500.864123,null)");
                $segundoInsert = $miDB->exec("insert into T02_Departamento values('CAU','Centro de Atención al Usuario',now(),602.25,null)");
                $tercerInsert = $miDB->exec("insert into T02_Departamento values('CDR','Control de Riesgos',now(),854.63,null)");
                $miDB->commit();
                $resultadoDepartamentos = $miDB->query("select * from T02_Departamento");
                printf("<h5>Número de registros: %s</h5>", $resultadoDepartamentos->rowCount());
                $mostrarDepartamento = $resultadoDepartamentos->fetchObject();
                echo "<table><thead><tr><th>CodigoDepartamento</th><th>DescripcionDepartamento</th><th>FechaCreacionDepartamento</th><th>VolumenDeNegocio</th><th>FechaBajaDepartamento</th></tr></thead><tbody>";
                while ($mostrarDepartamento != null) {
                    echo "<tr>";
                    //Recorrido de la fila cargada
                    echo "<td style='text-align: center;'>$mostrarDepartamento->T02_CodDepartamento</td>"; //Obtener los códigos de los departamentos.
                    echo "<td style='text-align: center;'>$mostrarDepartamento->T02_DescDepartamento</td>"; //Obtener las descripciones de los departamentos.
                    echo "<td style='text-align: center;'>$mostrarDepartamento->T02_FechaCreacionDepartamento</td>"; //Obtener la fecha de creacion de los departamentos.
                    echo "<td style='text-align: center;'>$mostrarDepartamento->T02_VolumenDeNegocio</td>"; //Obtener el volumen de negocio de los departamentos. 
                    echo "<td style='text-align: center;'>$mostrarDepartamento->T02_FechaBajaDepartamento</td>"; //Obtener la fecha de baja de los departamentos.
                    echo "</tr>";
                    $mostrarDepartamento = $resultadoDepartamentos->fetchObject();
                }
                echo "</tbody></table>";
            } catch (PDOException $excepcion) {
                $miDB->rollBack();
                echo 'Error: ' . $excepcion->getMessage() . "<br>";
                echo 'Código de error: ' . $excepcion->getCode() . "<br>";
            } finally {
                unset($miDB);
            }
            ?>
        </div>
        <a href="../indexProyectoTema4.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../indexProyectoTema4.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

