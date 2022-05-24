<?php

ob_start();

error_reporting(E_ERROR | E_PARSE);
require '../../../startup.php';

$con = new startup();
$conexion = $con->conectarPDO();
$sql = "select * from users where id_role=1";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$rows;
while ($filas = $consulta->fetch()) {
    $rows[] = $filas;
}

$results = $rows;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hospital web</title>
    <style>
        /* ================================= Tablas =================================*/
table {
    width: 100%;
    border-collapse: collapse;
}

.header_fixed {
    max-height: 100vh;
    width: 100%;
    overflow: auto;
    border: 1px solid #dddddd;
}

.header_fixed thead th {
    position: sticky;
    top: 0;
    background-color: rgb(0, 81, 125);
    color: #e6e7e8;
    font-size: 15px;
}



th, td {
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    font-size: 14px;
}

td img {
    height: 60px;
    width: 60px;
    border-radius: 100%;
    border: 5px solid #e6e7e8;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

tr:nth-child(odd) {
    background-color: #edeef1;
}

tr:hover td {
    color: #44b478;
    cursor: pointer;
    background-color: #ffffff;
}

h3{
    text-align: center;
}


    </style>
</head>

<body>
<h3>Datos del profesor</h3>

<table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ci</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result) {  ?>
                <tr>
                    <td><?php echo $result[1] ?></td>
                    <td><?php echo $result[3] ?></td>
                    <td><?php echo $result[4] ?></td>
                    <td><?php echo $result[5] ?></td>
             
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>

<?php 
$html=ob_get_clean();

require_once "../../../library/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("profesor.pdf", array("Attachment"=>false));

?>