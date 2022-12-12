<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 21-11-2022.
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
                2. Mostrar el contenido de la tabla Departamento y el número de registros(MySQLi).
            </h2>
        </div>
        <div class="codigophp" style="margin: 0 15px; position: static">
            <?php
            define("HOST", '192.168.20.19');
            define("USER", 'User204DWESEncuestaTema4');
            define("PASSWORD", 'paso');
            define("DBNAME", 'DB204DWESEncuestaTema4');
            try {
                $miDB = new mysqli();
                $miDB->connect(HOST, USER, PASSWORD, DBNAME);
                $resultadoDepartamentos = $miDB->query("select * from T02_Departamento;");
                //Imprimir por pantalla el número de registros afectados por la consulta.
                printf("<h5>Número de registros: %s</h5><br>", $resultadoDepartamentos->num_rows);
                //Cargamos los resultados en un fetchobject().
                $mostrarDepartamento = $resultadoDepartamentos->fetch_object();
                //Creamos una tabla en la que imprimiremos el nombre del atributo y el valor del mismo.
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
                    $mostrarDepartamento = $resultadoDepartamentos->fetch_object();
                }
                echo "</tbody></table>";
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

