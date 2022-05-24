<?php

class dashController
{
    public $id_user;
    public $rows;


    public function getCoursestoProfessors()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();

        $sql = "SELECT * FROM courses WHERE id_professor = '$this->id_user';";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        while ($filas = $consulta->fetch()) {
            $this->rows[] = $filas;
        }
    }

    public function getCoursestoStudents()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();

        $sql = "SELECT c.id_course, c.title_course, c.description_course, c.img_course, c.id_professor
        FROM students_courses sc, courses c, users u where id_student='$this->id_user' and sc.id_course = c.id_course and sc.id_student = u.id_user";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        while ($filas = $consulta->fetch()) {
            $this->rows[] = $filas;
        }
    }

    public function getCoursestoAdmi()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();

        $sql = "SELECT * FROM courses";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        while ($filas = $consulta->fetch()) {
            $this->rows[] = $filas;
        }
    }
   
}

/* 


$datos = new Crud();
$datos->ver();
$filas = $datos->rows;
*/