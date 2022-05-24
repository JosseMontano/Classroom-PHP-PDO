<?php

require '../../../startup.php';
require 'inscriptionCourseController.php';


session_start();
$user = $_SESSION['name_user'];
$con = new startup();
$conexion = $con->conectarPDO();
//get id of user
$datos = new incriptionCourseController();
$datos->id_role=2;
$datos->getStudent();
$results = $datos->rows;


$id_course = $_GET['id_course'];
?>

<?php include('../../includes/header.php')?>
   <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ci</th>
                <th>Añadir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result) {  ?>
                <tr>
                    <td><?php echo $result[3] ?></td>
                    <td><?php echo $result[4] ?></td>
                    <td><?php echo $result[5] ?></td>
                    <td>
                        <a href="inscriptionCourseSucessfullView.php?id_course=<?php echo $id_course;?>&id_student=<?php echo $result[0]?>"> 
                        ✔
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>