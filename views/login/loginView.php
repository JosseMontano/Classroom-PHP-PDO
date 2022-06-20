<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../public/css/sesiones.css">
</head>
<body>
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
<script src="../../library/sweetalert2/sweetalert2@11.js"></script>
</body>
</html>
