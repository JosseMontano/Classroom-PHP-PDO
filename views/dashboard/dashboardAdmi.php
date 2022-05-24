<?php 
require '../startup.php';
require 'dashboardController.php';
$user = $_SESSION['name_user'];
$id_user = $_SESSION['id_user'];
$con = new startup();
$conexion = $con->conectarPDO();
$datos = new dashController();
$datos->id_user = $id_user;
$datos->getCoursestoAdmi();
$courses = $datos->rows;
?>
<?php include("includes/navbar.php") ?>
<div class="topnav">
<a href="#news">ITECBO</a>
  <a href="#news"><?php echo $user?></a>
  <div class="dropdown">
    <button class="dropbtn">Reportes
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="reports/Professors/viewProfessor.php">Reporte Profesor</a>
      <a href="reports/Students/viewStudent.php">Reporte Estudiantes</a>
    </div>
  </div> 
  <label id="switch">
            <input type="checkbox" onclick="resetStyle('Idhtml', 'img', 'video', 'iframe');";>
            <span class="slider round"></span>
          </label>
  <a href="register/registerView.php">Registrar usuarios</a>
  <a href="login/loginView.php">Cerrar sesion</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div class="container">
<div class="main">
  <h1>Todos los cursos</h1>
  <div class="cards">
  <?php foreach ($courses as $curso){ ?>
      <div class="cards_item">
      <div class="card">
        <div class="card_image"><img src="courses/createCourse/fotos/<?php echo $curso[3]?>"></div>
        <div class="card_content">
          <h2 class="card_title"><?php echo $curso[1]?></h2>
          <p class="card_text"><?php echo $curso[2]?></p>
          <a class="btn card_btn" href="courses/contentCourse/contentCourseView.php?id_course=<?php echo $curso[0]?>">Ingresar</a>
        </div>
      </div>
    </div>
<?php
    }
   ?>

  
  </div>
</div>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

      function resetStyle(elemId, elemhtml, video, iframe) {
        elem = document.getElementById(elemId);
        elemeht = document.querySelector(elemhtml);
        elementvideo = document.querySelector(video);
        elementiframe = document.querySelector(iframe);

        elem.classList.toggle("black");
        elemeht.classList.toggle("black");
        elementvideo.classList.toggle("black");
        elementiframe.classList.toggle("black");
      }

</script>

    </script>
</body>
</html>