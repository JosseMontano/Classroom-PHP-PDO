<script src="../../library/sweetalert2/sweetalert2@11.js"></script>

<?php 
error_reporting(E_ERROR | E_PARSE);
$email = $_POST['username'];
$psw = $_POST['psw'];

include '../../startup.php';

$con = new startup();
$conexion = $con->conectarPDO();
//obtener roles para el select
$sql = "SELECT * FROM users 
WHERE name_user = '$email' AND password_user = '$psw';";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$results = $consulta->fetchAll(PDO::FETCH_OBJ);
$user;
$id_user;
$id_role;
foreach ($results as $result) { 
    $user =$result->name_user;
	$id_user =$result->id_user;
	$id_role =$result->id_role;
 } 

if ($id_user != '') {
	session_start();
	$_SESSION['name_user'] = $user;
	$_SESSION['id_user'] = $id_user;
	$_SESSION['id_role'] = $id_role;

    $correct = '../welcome.php';
	header("location:" . $correct);
}
else{
echo "<p></p>";
	?>
	<script>
		Swal.fire({
  icon: 'error',
  title: 'Datos erroneos',
  text: 'Tus datos no existen en la base de datos!',
  footer: '<a href="loginView.php">Volver a probar</a>'
});
	</script>
	<?php
 

}
?>

