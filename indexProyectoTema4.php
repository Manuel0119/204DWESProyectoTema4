<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <link rel="icon" type="image/ico" sizes="32x32" href="webroot/favicon.ico">
        <style>
            .container{
                margin: 2em 2em;
            }
            .volver {
                margin-top: -12px;
                margin-bottom: 19px;
            }
            .container table:nth-of-type(1) td {
                padding: 4px;
            }
        </style>
    </head>
    <body>
        <div class="encabezado">
            <h1 class="cabecera">TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP</h1>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th colspan="4" style="width: 50%;">Scripts</th>
                </tr>
                <tr>
                    <th>Intrucciones</th>
                    <th>SQLEntornoDesarrollo</th>
                    <th>SQLExplotación</th>
                    <th>SQLCasa</th>
                </tr>
                <tr style="text-align: center;">

                    <td style="font-size: 1.2em">CreaBDepartamentos</td>
                    <td style="text-align: center"><a href="mostrarcodigo/CreaDAW204DBDepartamentos.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestrarestaurarDB.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/CreaDAW204DBDepartamentos.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
                <tr style="text-align: center;">
                    <td style="font-size: 1.2em">CargaInicialBDepartamentos</td>
                    <td style="text-align: center"><a href="mostrarcodigo/CargaInicialDAW204DBDepartamentos.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestracargaInicialDB.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/CargaInicialDAW204DBDepartamentos.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
                <tr style="text-align: center;">
                    <td style="font-size: 1.2em">BorraBDepartamentos</td>
                    <td style="text-align: center"><a href="mostrarcodigo/BorraDAW204DBDepartamentos.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraborrarDB.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/BorraDAW204DBDepartamentos.php"><img src="webroot/mostrarsql.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
                <tr>
                    <th colspan="4" >Configuraciones y libreria</th>
                </tr>
                <tr style="text-align: center;">
                    <td style="font-size: 1.2em">Configuración Conexión</td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraconfDBPDODesarrollo.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraconfDBPDOExplotacion.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraconfDBPDOCasa.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
                <tr style="text-align: center;">
                    <td style="font-size: 1.2em">LibreriaValidacion</td>
                    <td colspan="3" style="text-align: center"><a href="mostrarcodigo/muestraLibreriaValidacion.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="width: 70%;">Enunciado</th>
                    <th colspan="2">PDO</th>
                    <th colspan="2">MySQLi</th>
                </tr>                
                <tr>
                    <td>1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio00PDO.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio00PDO.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio00MySQLi.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio00MySQLi.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
                <tr>
                    <td>2. Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio01PDO.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio01PDO.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio01MySQLi.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio01MySQLi.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                </tr>
                <tr>
                    <td>3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio02PDO.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio02PDO.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><!--<a href="codigoPHP/ejercicio00MySQLi.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a>--></td>
                    <td style="text-align: center"><!--<a href="mostrarcodigo/muestraEjercicio00MySQLi.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a>--></td>
                </tr>
                <tr>
                    <td>4. Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio03PDO.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio03PDO.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><!--<a href="codigoPHP/ejercicio00MySQLi.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a>--></td>
                    <td style="text-align: center"><!--<a href="mostrarcodigo/muestraEjercicio00MySQLi.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a>--></td>
                </tr>
                <tr>
                    <td>5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio04PDO.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio04PDO.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><!--<a href="codigoPHP/ejercicio00MySQLi.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a>--></td>
                    <td style="text-align: center"><!--<a href="mostrarcodigo/muestraEjercicio00MySQLi.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a>--></td>
                </tr>
                <tr>
                    <td>6. Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.</td>
                    <td style="text-align: center"><a href="codigoPHP/ejercicio05PDO.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><a href="mostrarcodigo/muestraEjercicio05PDO.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a></td>
                    <td style="text-align: center"><!--<a href="codigoPHP/ejercicio00MySQLi.php"><img src="webroot/ejecutar.png" alt="ejecutar" class="imagen2"/></a>--></td>
                    <td style="text-align: center"><!--<a href="mostrarcodigo/muestraEjercicio00MySQLi.php"><img src="webroot/mostrarcodigo.png" alt="ejecutar" class="imagen2"/></a>--></td>
                </tr>
            </table>
            <a href="../204DWESProyectoDWES/indexProyectoDWES.php"><img src="webroot/volver.png" alt="volver" class="volver"/></a>
        </div>
        <footer>
            <div><a href="../index.html"><img src="webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>
