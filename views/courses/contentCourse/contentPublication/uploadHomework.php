<script src="../../../../library/sweetalert2/sweetalert2@11.js"></script>
<?php 
require '../../../../startup.php';
require 'contentPublicationController.php';
$con = new startup();
$conexion = $con->conectarPDO();
$datos = new contentPublicationController();
if (isset($_POST['uploadHomework'])) {
    $txtFile = $_FILES['txtFile'];
    $fecha = new DateTime();
    $nombreArchivo = ($txtFile != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtFile"]["name"] : "imagen.jpg";
    $tmpFoto = $_FILES["txtFile"]["tmp_name"];
    if ($tmpFoto != "") {
        move_uploaded_file($tmpFoto, "files/" . $nombreArchivo);
    }
    $datos->file_homework = $nombreArchivo;
    $datos->id_student = $_POST['id_student'];
    $datos->id_publciation = $_POST['id_publication'];
    $datos->save();
    $mensaje = $datos->mensaje;
  }
?>

<script>
      Swal.fire({
  icon: 'success',
  title: 'Creacion exitosa',
  text: 'Se creo el curso de forma correcta',
  footer: '<a href="contentPublicationView.php?id_publication=<?php echo $_GET['id_publication']; ?>">Volver al formulario</a>'
})
</script>