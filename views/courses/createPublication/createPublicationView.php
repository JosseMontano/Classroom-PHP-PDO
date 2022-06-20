<?php

require '../../../startup.php';
require 'createPublicationController.php';

error_reporting(E_ERROR | E_PARSE);
//get the id user
session_start();
$user = $_SESSION['name_user'];
$con = new startup();
$conexion = $con->conectarPDO();
$id_user = $_SESSION['id_user'];

//create a new course
$datos = new createCourseController();
$mensaje = null;
$txtFoto;
$id_course = $_GET['id_course'];
if (isset($_POST['guardar'])) {
    $txtFile = $_FILES['txtFile'];
    $fecha = new DateTime();
    $nombreArchivo = ($txtFile != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtFile"]["name"] : "imagen.jpg";
    $tmpFoto = $_FILES["txtFile"]["tmp_name"];
    if ($tmpFoto != "") {
        move_uploaded_file($tmpFoto, "files/" . $nombreArchivo);
    }
    $datos->title_publication = $_POST['title_publication'];
    $datos->description_publication = $_POST['description_publication'];
    $datos->deliver_date_publication = $_POST['deliver_date_publication'];
    $datos->doc_publication = $nombreArchivo;
    $datos->id_course = $_POST['id_course'];
    $datos->save();
    $mensaje = $datos->mensaje;
}
?>

<?php include("../../includes/header.php") ?>
    <div class="container">
        <div class="imgcontainer">
            <img width="450px" src="../../../assets/createCourse.jpg" alt="Avatar" class="avatar">
        </div>
        <div class="content">
            <form action="createPublicationView.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_course" value="<?php echo $id_course ?>">
                 <input type="text" name="title_publication" placeholder="titulo de la publicacion" required>
                <br />
                <textarea name="description_publication" placeholder="descripcion"></textarea>
                <br />
                <input type="file" accept="*" name="txtFile" required>
                <br />
                <input type="date" name="deliver_date_publication" required>
                <br />
                <button type="submit" name="guardar">Registrar</button>
                <span class="psw">Volver a <a target="_blank" href="../../welcome.php">inicio</a></span>
            </form>
        </div>
    </div>
</body>
</html>