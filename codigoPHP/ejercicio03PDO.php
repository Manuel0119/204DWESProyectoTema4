<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 16-11-2022.
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
                4. Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)(PDO).
            </h2>
        </div>
        <div class="codigophp" style="margin: 3em;left: 0; position: initial">
            <?php
            require_once '../core/221024ValidacionFormularios.php';
            require_once '../conf/confDB.php';
            //declaracion del array de errores
            $aErrores = [
                'descripcion' => null
            ];
            //declaracion del array de respuestas
            $aRespuestas = [
                'descripcion' => null
            ];
            //Comprobar si se ha enviado el formulario.
            if (isset($_REQUEST['Buscar'])) {
                $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 0, 0);
                //Recorrer el array de errores comprobando cada uno de los campos del formulario, asignándole false a la variable booleana si uno de los campos no es correcto.
                foreach ($aErrores as $claveError => $mensajeError) {
                    if ($mensajeError != null) {
                        $_REQUEST[$claveError] = ''; //Borrar los campos malos.
                    }
                    else{
                        $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
                    }
                };
            } else {
                
            }?>
            <form name="ejercicio21" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display: flex;flex-wrap: nowrap;align-items: flex-start;justify-content: flex-start;">
                <label for="descripcion">Buscar descripción:
                    <!--Mostrar los errores.-->
                    <input style="margin-bottom: 1rem;" type="text" name="descripcion" class="entradadatos" value="<?php echo $_REQUEST['descripcion'] ?? ''; ?>"/>  
                    <?php echo '<span style="color: red;">' . $aErrores['descripcion'] . '</span>'; ?>
                </label>
                <br>
                <input style="" type="submit" name="Buscar" value="Buscar"/>
            </form>
            <?php
                try {
                    $miDB = new PDO(DSN, USER, PASSWORD);
                    $buscarDepartamento = $miDB->query("select * from T02_Departamento where T02_DescDepartamento like'%$aRespuestas[descripcion]%';");
                    printf("<h5>Número de registros: %s</h5>", $buscarDepartamento->rowCount());
                    if ($buscarDepartamento->rowCount()==0) {
                        print "No existen departamentos con esa descripción...";
                    }
                    $mostrarDepartamento = $buscarDepartamento->fetchObject();
                    echo "<table><thead><tr><th>CodigoDepartamento</th><th>DescripcionDepartamento</th><th>FechaCreacionDepartamento</th><th>VolumenDeNegocio</th><th>FechaBajaDepartamento</th></tr></thead><tbody>";
                    while ($mostrarDepartamento != null) {
                        echo "<tr>";
                        //Recorrido de la fila cargada
                        echo "<td style='text-align: center;'>$mostrarDepartamento->T02_CodDepartamento</td>";//Obtener los códigos de los departamentos.
                        echo "<td style='text-align: center;'>$mostrarDepartamento->T02_DescDepartamento</td>";//Obtener las descripciones de los departamentos.
                        echo "<td style='text-align: center;'>$mostrarDepartamento->T02_FechaCreacionDepartamento</td>";//Obtener la fecha de creacion de los departamentos.
                        echo "<td style='text-align: center;'>$mostrarDepartamento->T02_VolumenDeNegocio</td>";//Obtener el volumen de negocio de los departamentos. 
                        echo "<td style='text-align: center;'>$mostrarDepartamento->T02_FechaBajaDepartamento</td>";//Obtener la fecha de baja de los departamentos.
                        echo "</tr>";
                        $mostrarDepartamento=$buscarDepartamento->fetchObject();
                    }
                    echo "</tbody></table>";
                } catch (PDOException $excepcion) {
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

