<?php

class contentPublicationController
{
    public $file_homework;
    public $id_student;
    public $id_publciation;
    public $mensaje;

    public function save()
    {	 	 	
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "insert into homeworks
        (file_homework, id_student, id_publciation) values(?,?,?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $this->file_homework);
        $consulta->bindParam(2, $this->id_student);
        $consulta->bindParam(3, $this->id_publciation);
        if (!$consulta) {
            $this->mensaje = $conexion->errorInfo();
        } else {
            $consulta->execute();
            $this->mensaje = "Datos guardados correctamente";
        }
    }
}

