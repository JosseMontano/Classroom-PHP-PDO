<?php

require '../../../startup.php';
require 'createCourseController.php';

//get the id user
session_start();
$user = $_SESSION['name_user'];
$id_user= $_SESSION['id_user'];
$con = new startup();
//create a new course
$datos = new createCourseController();
$mensaje = null;
$txtFoto;
if (isset($_POST['guardar'])) {
    $txtFoto = $_FILES['txtFoto'];
    $fecha = new DateTime();
    $nombreArchivo = ($txtFoto != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtFoto"]["name"] : "imagen.jpg";
    $tmpFoto = $_FILES["txtFoto"]["tmp_name"];
    if($tmpFoto!=""){
        move_uploaded_file($tmpFoto, "fotos/".$nombreArchivo);
    }
    $datos->title_course = $_POST['title_course'];
    $datos->description_course = $_POST['description_course'];
    $datos->img_course = $nombreArchivo;
    $datos->id_professor = $id_user;
    $datos->saveInTableCourses();
    $mensaje = $datos->mensaje;
}
?>

<?php include("../../includes/header.php") ?>
    <div class="container">
        <div class="imgcontainer">
            <img width="450px" src="../../../assets/createCourse.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="content">
            <form action="createCourseView.php" method="post" enctype="multipart/form-data">

                <input type="text" name="title_course" placeholder="titulo del curso" required>
                <br />
                <textarea name="description_course" placeholder="descripcion"></textarea>
                <br />
                <input type="file" accept="image/*" name="txtFoto" required>
                <br />
                <button type="submit" name="guardar">Registrar</button>
                <span class="psw">Ir a <a href="../../welcome.php">incio</a></span>
            </form>
        </div>
    </div>

</body>

</html>