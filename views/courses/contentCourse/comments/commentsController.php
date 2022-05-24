<?php

class commentsController
{
    public $title_comment;
    public $description_comment;
    public $id_student;
    public $id_publication;
    public function store()
    { 	 		
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "insert into comments
        (title_comment, description_comment, id_student,
        id_publication) values(?,?,?,?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $this->title_comment);
        $consulta->bindParam(2, $this->description_comment);
        $consulta->bindParam(3, $this->id_student);
        $consulta->bindParam(4, $this->id_publication);
        if ($consulta) {
            $consulta->execute();
        }
    }
}

