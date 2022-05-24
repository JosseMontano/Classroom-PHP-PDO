<?php

require '../../../../../startup.php';
require 'qualificationController.php';

//get the id user
session_start();
$con = new startup();
$conexion = $con->conectarPDO();

//create a new course
$datos = new qualificationController();
$mensaje = null;
$txtFoto;


if (isset($_POST['cualificationHomework'])) {

    $datos->qualification_homework = $_POST['qualification_homework'];
    $datos->feedback_homework = $_POST['feedback_homework'];
    $datos->id_homework = $_POST['id_homework'];
    $datos->Actualizar();
    $mensaje = $datos->mensaje;
}

echo "se califico de forma correcta";
?>
