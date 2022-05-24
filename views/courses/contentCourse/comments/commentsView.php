<?php
require '../../../../startup.php';
require 'commentsController.php';
error_reporting(E_ERROR | E_PARSE);
$con = new startup();
$conexion = $con->conectarPDO();
session_start();
$id_publication = $_GET['id_publication'];
$user = $_SESSION['id_user'];
//$sql = "SELECT * from users where name_user='$user'";
$sql = "SELECT * from comments where id_publication='$id_publication'";
$sql = "SELECT c.title_comment, c.description_comment, u.name_user FROM comments c, users u where c.id_student=u.id_user and c.id_publication='$id_publication'";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$publications = $consulta->fetchAll(PDO::FETCH_OBJ);

/* Sve comments*/
if (isset($_POST['guardar'])) {
    $datos = new commentsController();
    $datos->title_comment = $_POST['title_comment'];
    $datos->description_comment = $_POST['description_comment'];
    $datos->id_student = $_POST['id_student'];
    $datos->id_publication = $_POST['id_publication'];
    $datos->store();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="curso.css">
  <title>Document</title>
  <link rel="stylesheet" href="../../../../public/css/contentCourse.css">
</head>

<body>

<div class="bodyDetailsPubli">
  <div class="detailsPublication">
  <div class="create_publication_content">
    <?php
    foreach ($publications as $publication) { ?>

        <div class="soon">
          <h1>Usuario: <?php echo $publication->name_user?></h1>
          <h1>Titulo: <?php echo $publication->title_comment?></h1>
          <p><?php echo $publication->description_comment?></p>
        </div>
<hr />
      

    <?php  } ?>
    </div>
    <div class="uploadFile">
    <h2>Publica comentario</h2>
    <form action='commentsView.php' method="post" class="comments">
        <input type="hidden" value="<?php echo $user ?>" name="id_student">
        <input type="hidden" value="<?php echo $id_publication ?>" name="id_publication">
       <input name="title_comment" type="text" placeholder="Titulo">
       <br/>
       <br/>
      <textarea name="description_comment" placeholder="Descripcion"></textarea>
      <br/>
      <br/>
      <button name="guardar">Enviar</button><br/>
      </div>
    </form>

    </div>
  </div>
</body>

</html>