<script src="../library/sweetalert2/sweetalert2@11.js"></script>

<?php
session_start();
$user = $_SESSION['name_user'];
$id_user = $_SESSION['id_user'];
$id_role = $_SESSION['id_role'];
if ($id_role == 1) {
    //profesor
    include('dashboard/dashboardProfessor.php');
} else if ($id_role == 2) {
    //estudiante
    include('dashboard/dashboardStudent.php');
} else if ($id_role == 3) {
    //administrador
    include('dashboard/dashboardAdmi.php');
}

?>

<script>
    Swal.fire(
        'Bienvenido de nuevo!',
        'Comenzemos!',
        'success'
    )
</script>