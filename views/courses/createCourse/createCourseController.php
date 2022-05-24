<?php

class createCourseController
{
    public $title_course;
    public $description_course;
    public $img_course;
    public $id_professor;
    public $mensaje;

    public function saveInTableCourses()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "insert into courses 
        (title_course, description_course, 
        img_course, id_professor) values(?,?,?,?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $this->title_course);
        $consulta->bindParam(2, $this->description_course);
        $consulta->bindParam(3, $this->img_course);
        $consulta->bindParam(4, $this->id_professor);
        if (!$consulta) {
            $this->mensaje = $conexion->errorInfo();
        } else {
            $consulta->execute();
            $this->mensaje = "Datos guardados correctamente";
        }
    }
}

