<?php

require '../../startup.php';
require 'registerController.php';

$datos = new registerController();

$roles;
$con = new startup();
$datos->SeeRoles();
$roles = $datos->roles;

//inicio
$mensaje = null;
$rol_capturado;
if (isset($_POST['guardar'])) {
    $roles = $_POST['roles'];
    if (isset($_POST['roles'])) {
        $roles = $_POST['roles'];
        foreach ($roles as $role) {
            $rol_capturado = $role;
        }
    }
    $datos->name_user = $_POST['name_user'];
    $datos->password_user = $_POST['password_user'];
    $datos->first_name_user = $_POST['first_name_user'];
    $datos->last_name_user = $_POST['last_name_user'];
    $datos->ci_user = $_POST['ci_user'];
    $datos->id_role = $rol_capturado;
    $datos->saveInTableUsers();
    $mensaje = $datos->mensaje;
    header("Location: registerView.php");
}
?>


<?php include("../includes/header.php") ?>
    <div class="container">
        <form action="registerView.php" method="post">
            <div class="imgcontainer">
                <img src="../../assets/photoLogin.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <label for="uname"><b>Usuario</b></label>
                <input type="text" placeholder="Usuario" name="name_user" required>

                <label for="psw"><b>Contraseña</b></label>
                <input type="password" placeholder="Contraseña" name="password_user" required>

                <label for="uname"><b>Nombre</b></label>
                <input type="text" placeholder="Nombre" name="first_name_user" required>

                <label for="psw"><b>Apellido</b></label>
                <input type="text" placeholder="Apellido" name="last_name_user" required>

                <label for="psw"><b>Ci</b></label>
                <input type="text" placeholder="Ci" name="ci_user" required>

                <select name="roles[]">
                    <?php foreach ($roles as $role) { ?>
                        <option value="<?php echo $role[0]; ?>">
                            <?php echo $role[1]; ?>
                        </option>
                    <?php } ?>
                </select>

                <button type="submit" name="guardar">Registrar</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <span class="psw">Ir a <a href="../welcome.php">incio</a></span>
            </div>
        </form>
    </div>

</body>
</html>