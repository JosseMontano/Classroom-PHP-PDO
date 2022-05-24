
<?php include("../includes/header.php") ?>

<div class="container">
<h2 class="title">Iniciar sesion</h2>
<form action="loginController.php" method="post">
  <div class="imgcontainer">
    <img src="../../assets/photoLogin.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="uname"><b>Usuario</b></label>
    <input type="text" placeholder="Ingrese usuario" name="username" required>
    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="Ingrese contra" name="psw" required>
    <button type="submit">Login</button>
  </div>
</form>
</div>

</body>
</html>
