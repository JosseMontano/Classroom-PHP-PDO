<?php

class incriptionCourseController
{
    public $id_course;
    public $id_student;
    public $id_role;
    public $rows;
    public function saveInTablestudentscourses()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "insert into students_courses 
        (id_course, id_student) values(?,?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $this->id_course);
        $consulta->bindParam(2, $this->id_student);
        if (!$consulta) {
            $this->mensaje = $conexion->errorInfo();
        } else {
            $consulta->execute();
            $this->mensaje = "Datos guardados correctamente";
        }
    }

    public function getStudent()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "SELECT * FROM users 
        WHERE id_role = '$this->id_role'";
      $consulta = $conexion->prepare($sql);
      $consulta->execute();
      while ($filas = $consulta->fetch()) {
        $this->rows[] = $filas;
    }
    }
}
