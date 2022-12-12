<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir una pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                  utilizando una consulta preparada.
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
                6. Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                utilizando una consulta preparada.
            </h2>
        </div>
        <div class="codigophp" style="margin: 3em;left: 0; position: initial">
            <?php
            require_once '../core/221024ValidacionFormularios.php';
            require_once '../conf/confDB.php';
            $aDepartamentosNuevos = [
                ["T02_CodDepartamento" => "MAR",
                 "T02_DescDepartamento" => "Departamento de Marketing",
                 "T02_VolumenDeNegocio" => 23.51],
                ["T02_CodDepartamento" => "REH",
                 "T02_DescDepartamento" => "Departamento de Recursos Humanos",
                 "T02_VolumenDeNegocio" => 213.12],
                ["T02_CodDepartamento" => "COM",
                 "T02_DescDepartamento" => "Departamento de Compras",
                 "T02_VolumenDeNegocio" => 12.27]
            ];
            try {
                //Creamos la conexión
                $miDB = new PDO(DSN, USER, PASSWORD);
                //Realizamos el insert
                $sqlInsercion = <<<sql1
                    INSERT INTO T02_Departamento
                    VALUES(:codDepartamento,:descDepartamento,now(),:volumenNegocio,null);
                sql1;
                foreach ($aDepartamentosNuevos as $valoresDepartamento) {
                    $parametrosDepartamento=[
                        ":codDepartamento"=>$valoresDepartamento['T02_CodDepartamento'],
                        ":descDepartamento"=>$valoresDepartamento['T02_DescDepartamento'],
                        ":volumenNegocio"=>$valoresDepartamento['T02_VolumenDeNegocio']
                    ];
                    $insert = $miDB->prepare($sqlInsercion);
                    $insert->execute($parametrosDepartamento); 
                }
                //Mostramos todos los registros
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

