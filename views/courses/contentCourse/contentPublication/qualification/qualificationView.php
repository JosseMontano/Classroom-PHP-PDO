<?php
require '../../../../../startup.php';
$con = new startup();
$conexion = $con->conectarPDO();
session_start();
$user = $_SESSION['name_user'];
$id_publication = $_GET['id_publication'];
$sql = "SELECT * from homeworks where id_publciation='$id_publication'";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$homeowkrs = $consulta->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../public/css/contentCourse.css">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="create_publication">

            <?php foreach ($homeowkrs as $homeowkr) { ?>
                <div class="create_publication_content">
                    <div class="soon">
                        <?php
                        $sql = "SELECT * from users where id_user='$homeowkr->id_student'";
                        $consulta = $conexion->prepare($sql);
                        $consulta->execute();
                        $users = $consulta->fetchAll(PDO::FETCH_OBJ);
                        foreach ($users as $user) {
                        ?>
                            <p><?php echo $user->first_name_user . " " . $user->last_name_user ?></p>
                        <?php } ?>
                        <a target="_blank" href="../downloadFile.php?file=../contentPublication/files/<?php echo $homeowkr->file_homework ?>">ver doc</a>
                        <br />
                        <br /> 
                      <form action="qualifiedView.php?id_publication=<?php echo $id_publication ?>" method="POST">
                    <input type="hidden" name="id_homework" value="<?php echo $homeowkr->id_homework ?>">
                      <input type="text" name="qualification_homework" placeholder="calificacion"> <br />
                        <textarea name="feedback_homework"></textarea>
                        <br /> <br />
                        <button type="submit" name="cualificationHomework">Calificar</button>
                      </form>
                    </div>
                </div>


            <?php  } ?>

        </div>
<a href="../../../../welcome.php">Inicio</a>
    </div>
</body>

</html>