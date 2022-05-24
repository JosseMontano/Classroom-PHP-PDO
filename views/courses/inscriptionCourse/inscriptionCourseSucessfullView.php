<?php

require '../../../startup.php';
require 'inscriptionCourseController.php';


$get_id_course = $_GET['id_course'];
$datos = new incriptionCourseController();
$datos->id_course = $get_id_course;
$datos->id_student = $_GET['id_student'];
$datos->saveInTablestudentscourses();
$mensaje = $datos->mensaje;



?>

<script>
    alert('se registro correctamente');
</script>

    
  
