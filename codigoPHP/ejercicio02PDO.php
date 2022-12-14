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
                3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores(PDO).
            </h2>
        </div>
        <div class="codigophp" style="margin: 2em; position: relative">
            <?php
            require_once '../core/221024ValidacionFormularios.php';
            require_once '../conf/confDB.php';
            $entradaOk = true;
            //Array de errores para validacion de entrada del formulario.
            $aErrores = [
                'codigo' => '',
                'descripcion' => '',
                'volumenNegocio' => null
            ];
            //Array de respuestas para guardar las respuestas del formulario.
            $aRespuestas = [
                'codigo' => null,
                'descripcion' => null,
                'volumenNegocio' => null
            ];
            $sqlMostrarPorCodigo = <<< sql1
                SELECT * FROM T02_Departamento where T02_CodDepartamento='$_REQUEST[codigo]';
            sql1;
            $sqlInsertar = <<< sql2
                INSERT INTO T02_Departamento VALUES (:codigo,:descripcion,now(),:volumenNegocio,null);
            sql2;
            //Comprobar si se ha pulsado el boton de Insertar.
            if (isset($_REQUEST['Insertar'])) {
                $aErrores['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'], 3, 3, 1);
                if ($aErrores['codigo'] == null) {
                    try {
                        $miDB = new PDO(DSN, USER, PASSWORD);
                        $consultaDepartamentosPorCodigo = $miDB->prepare($sqlMostrarPorCodigo);
                        $consultaDepartamentosPorCodigo->execute();
                        if ($consultaDepartamentosPorCodigo->rowCount() > 0) {
                            $aErrores['codigo'] = "El codigo de departamento ya existe...";
                        }
                    } catch (PDOException $miExcepcionPDO) {
                        echo $miExcepcionPDO->getMessage();
                    } finally {
                        unset($miDB);
                    }
                }
                $aErrores['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 255, 0, 1); //Validar la descripcion que se ha insertado en el formulario.
                $aErrores['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1); //Validar el volumen de negocio que se ha insertado en el formulario.
                //Recorrer el array de errores comprobando cada uno de los campos del formulario, asignándole false a la variable booleana si uno de los campos no es correcto.
                foreach ($aErrores as $claveError => $mensajeError) {
                    if ($mensajeError != null) {
                        $entradaOk = false;
                        $_REQUEST[$claveError] = ''; //Borrar los campos malos.
                    }
                };
            } else {
                $entradaOk = false;
            }
            if ($entradaOk) {
                $aRespuestas['codigo'] = $_REQUEST['codigo'];
                $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
                $aRespuestas['volumenNegocio'] = $_REQUEST['volumenNegocio'];
                try {
                    $miDB = new PDO(DSN, USER, PASSWORD);
                    echo "<h2>Conexión establecida</h2>";
                    $insert = $miDB->prepare($sqlInsertar);
                    $insert->bindParam(":codigo", $aRespuestas['codigo']);
                    $insert->bindParam(":descripcion", $aRespuestas['descripcion']);
                    $insert->bindParam(":volumenNegocio", $aRespuestas['volumenNegocio']);
                    $insert->execute();
                    $resultadoDepartamentos = $miDB->prepare("select * from T02_Departamento where T02_CodDepartamento=?;");
                    $resultadoDepartamentos->bindParam(1, $aRespuestas['codigo']);
                    $resultadoDepartamentos->execute();
                    printf("<h5>Número de registros: %s</h5><br>", $resultadoDepartamentos->rowCount());
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
                    echo 'Error: ' . $excepcion->getMessage() . "<br>";
                    echo 'Código de error: ' . $excepcion->getCode() . "<br>";
                } finally {
                    unset($miDB);
                }
                //si la entrada no es correcta o no hay entradas previas muestra el formulario
            } else {
                ?>
                <form name="ejercicio21" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="text-align: left;top: 38%;position: fixed;">
                    <label for="codigo">Insertar código[A-Z]{3}:
                        <!--Mostrar los errores.-->
                        <input style="margin-bottom: 1rem;" type="text" name="codigo" class="entradadatos" value="<?php echo $_REQUEST['codigo'] ?? ''; ?>"/>  
                        <?php echo '<span style="color: red;">' . $aErrores['codigo'] . '</span>'; ?>
                    </label>
                    <br>
                    <label for="descripcion">Insertar descripción:
                        <!--Mostrar los errores.-->
                        <input style="margin-bottom: 1rem;" type="text" name="descripcion" class="entradadatos" value="<?php echo $_REQUEST['descripcion'] ?? ''; ?>"/>  
                        <?php echo '<span style="color: red;">' . $aErrores['descripcion'] . '</span>'; ?>
                    </label>
                    <br>
                    <label for="volumenNegocio">Insertar volumen de negocio:
                        <!--Mostrar los errores.-->
                        <input style="margin-bottom: 1rem;" type="text" name="volumenNegocio" class="entradadatos" value="<?php echo $_REQUEST['volumenNegocio'] ?? ''; ?>"/>  
                        <?php echo '<span style="color: red;">' . $aErrores['volumenNegocio'] . '</span>'; ?>
                    </label>
                    <br>
                    <input style="position: fixed; top: 52%; left: 52%;" type="submit" name="Insertar" value="Insertar"/>
                </form>
            <?php }
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

