<?php 

session_start();

if (isset($_SESSION['name_user'])) {
} else {
?>
	<script type="text/javascript">
    alert('no esta logeado');
		//window.location = "./";
	</script>
<?php
}

$user = $_SESSION['name_user'];
$id_user = $_SESSION['id_user'];
$id_role = $_SESSION['id_role'];
/*
include '../startup.php';
$con = new startup();
$conexion = $con->conectarPDO();

$user = $_SESSION['name_user'];
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM users 
WHERE name_user = '$user' AND id_user= '$id_user';";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$results = $consulta->fetchAll(PDO::FETCH_OBJ);
$id_role = 0;
foreach ($results as $result) { 
    $id_role = $result->$id_role;
 } 

*/
if($id_role == 1){
    //profesor
    include ('dashboard/dashboardProfessor.php');
}
else if($id_role == 2){
    //estudiante
    include ('dashboard/dashboardStudent.php');
}
else if($id_role == 3){
    //administrador
    include ('dashboard/dashboardAdmi.php');
}
?>