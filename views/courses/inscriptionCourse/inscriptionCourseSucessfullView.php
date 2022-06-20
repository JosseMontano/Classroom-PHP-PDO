<script src="../../../library/sweetalert2/sweetalert2@11.js"></script>

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
<p></p>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registro exitoso',
        text: 'Se registro al estudiante de forma correcta',
        footer: '<a href="inscriptionCourseView.php?id_course=<?php echo $get_id_course;?>">Volver al formulario</a>'
    })
</script>