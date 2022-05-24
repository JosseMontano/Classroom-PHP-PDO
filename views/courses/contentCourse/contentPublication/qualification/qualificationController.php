<?php

class qualificationController
{
    public $qualification_homework;
    public $feedback_homework;
    public $id_homework;
    public $mensaje;

    public function Actualizar()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sentencia = $conexion->prepare("UPDATE homeworks SET qualification_homework = ?, feedback_homework = ? WHERE id_homework = ?;");
        $resultado = $sentencia->execute([$this->qualification_homework, $this->feedback_homework,  $this->id_homework]); 
    }
}

