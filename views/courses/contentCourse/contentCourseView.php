<?php
require '../../../startup.php';

$con = new startup();
$conexion = $con->conectarPDO();
session_start();
$user = $_SESSION['name_user'];
$sql = "SELECT * from users where name_user='$user'";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$users = $consulta->fetchAll(PDO::FETCH_OBJ);
$id_rol;
foreach ($users as $user) {
  $id_rol = $user->id_role;
}
$id_course = $_GET['id_course'];
$consulta = $conexion->prepare("select * from publciations where id_course=$id_course");
$consulta->execute();
$publications = $consulta->fetchAll(PDO::FETCH_OBJ);

//role 2 = student



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="curso.css">
  <title>Document</title>
  <link rel="stylesheet" href="../../../public/css/contentCourse.css">
</head>

<body>

  <br />
  <div class="container">
    <?php
    if ($id_rol == 1) { ?>
      <div class="create_publication">
        <a href="../inscriptionCourse/inscriptionCourseView.php?id_course=<?php echo $_GET['id_course']; ?>">Añadir estudiantes</a>
      </div>
      <div class="create_publication">
        <a href="../createPublication/createPublicationView.php?id_course=<?php echo $_GET['id_course']; ?>">Crear publicacion</a>
      </div>
    <?php }
    ?>
    <div class="create_publication">
      <?php
      foreach ($publications as $publi) { ?>
        <div class="create_publication_content">
          <div class="soon">
            <h1><?php echo $publi->title_publication ?></h1>
            <p><?php echo $publi->description_publication ?></p>
            <a href="../contentCourse/contentPublication/contentPublicationView.php?id_publication=<?php echo $publi->id_publication ?>">Mas detalles</a>
            <a href="../contentCourse/contentPublication/downloadFile.php?file=../../createPublication/files/<?php echo $publi->doc_publication ?>">Ver doc</a>
            <a href="../contentCourse/comments/commentsView.php?id_publication=<?php echo $publi->id_publication ?>">Comentarios</a>
         <?php if ($id_rol == 1) { ?> <a href="contentPublication/qualification/qualificationView.php?id_publication=<?php echo $publi->id_publication ?>">Calificar</a>  <?php } ?>
          </div>
        </div>


      <?php  } ?>


    </div>

  </div>
</body>

</html>