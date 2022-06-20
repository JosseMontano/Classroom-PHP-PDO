<script src="../../../../../library/sweetalert2/sweetalert2@11.js"></script>
<p></p>

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

?>
<p></p>
<script>
Swal.fire({
  icon: 'success',
  title: 'Calificacion exitosa',
  text: 'Se califico de forma correcta',
  footer: '<a href="qualificationView.php?id_publication=<?php echo $_GET['id_publication']; ?>">Volver al formulario</a>'
})
</script>