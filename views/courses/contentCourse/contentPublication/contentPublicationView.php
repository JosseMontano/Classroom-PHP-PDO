<?php
require '../../../../startup.php';

$con = new startup();
$conexion = $con->conectarPDO();
session_start();
$id_publication = $_GET['id_publication'];
$user = $_SESSION['name_user'];
$id_user = $_SESSION['id_user'];
$id_rol = $_SESSION['id_role'];

$sql = "SELECT * from publciations where id_publication='$id_publication'";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$publications = $consulta->fetchAll(PDO::FETCH_OBJ);


$sqlPubli = "SELECT * from homeworks where id_publciation='$id_publication' and id_student='$id_user'";
$consultaPubli = $conexion->prepare($sqlPubli);
$consultaPubli->execute();
$homeowkrs = $consultaPubli->fetchAll(PDO::FETCH_OBJ);
$contador = count($homeowkrs);

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
      <?php
      //get the publication
      foreach ($publications as $publication) { ?>
        <div class="create_publication_content">
          <div class="soon">
            <h1><?php echo $publication->title_publication ?></h1>
            <p><?php echo $publication->description_publication  ?></p>
            <p><?php echo $publication->deliver_date_publication ?></p>
            <a target="_blank" href="../../contentCourse/contentPublication/downloadFile.php?file=../../createPublication/files/<?php echo $publication->doc_publication ?>">Ver doc</a>
          </div>
        </div>
        <?php  }
      if ($homeowkrs) {
        foreach ($homeowkrs as $homeowkr) { ?>

          <div class="uploadFile">
            <a target="_blank" href="../contentPublication/downloadFile.php?file=../contentPublication/files/<?php echo $homeowkr->file_homework ?>">ver doc</a>
            <br />
            <input type="text" name="qualification_homework" value="<?php echo $homeowkr->qualification_homework  ?>" placeholder="calificacion"> <br />
            <textarea name="feedback_homework"><?php echo $homeowkr->feedback_homework ?></textarea>
          </div>

        <?php  }
      } else { ?>

        <div class="uploadFile">
          <h2>Subir tarea</h2>
          <form action="uploadHomework.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_publication" value="<?php echo $publication->id_publication  ?>">
            <input type="hidden" name="id_student" value="<?php echo $id_user  ?>">
            <input type="file" accept="*" name="txtFile" required>
            <br /> <br />
            <button type="submit" name="uploadHomework">Subir tarea</button>
          </form>
        </div>



      <?php } ?>








    </div>
  </div>
</body>

</html>