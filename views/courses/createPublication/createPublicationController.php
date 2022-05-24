<?php

class createCourseController
{
    public $title_publication;
    public $description_publication;
    public $deliver_date_publication;
    public $doc_publication;
    public $id_course;
    public $mensaje;

    public function save()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "insert into publciations
        (title_publication, description_publication, deliver_date_publication,
        doc_publication, id_course) values(?,?,?,?,?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $this->title_publication);
        $consulta->bindParam(2, $this->description_publication);
        $consulta->bindParam(3, $this->deliver_date_publication);
        $consulta->bindParam(4, $this->doc_publication);
        $consulta->bindParam(5, $this->id_course);
        if (!$consulta) {
            $this->mensaje = $conexion->errorInfo();
        } else {
            $consulta->execute();
            $this->mensaje = "Datos guardados correctamente";
        }
    }
}

