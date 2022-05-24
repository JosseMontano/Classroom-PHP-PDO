<?php

class registerController
{
    public $name_user;
    public $password_user;
    public $first_name_user;
    public $last_name_user;
    public $ci_user;
    public $id_role;
    public $mensaje;
    public $roles;

    public function SeeRoles()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "select * from roles";
        $query = $conexion->prepare($sql);
        $query->execute();
        while ($rows = $query->fetch()) {
            $this->roles[] = $rows;
        }
    }


    public function saveInTableUsers()
    {
        $con = new startup();
        $conexion = $con->conectarPDO();
        $sql = "insert into users 
        (name_user, password_user, 
        first_name_user,last_name_user, 
        ci_user, id_role) values(?,?,?,?,?,?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $this->name_user);
        $consulta->bindParam(2, $this->password_user);
        $consulta->bindParam(3, $this->first_name_user);
        $consulta->bindParam(4, $this->last_name_user);
        $consulta->bindParam(5, $this->ci_user);
        $consulta->bindParam(6, $this->id_role);
        if (!$consulta) {
            $this->mensaje = $conexion->errorInfo();
        } else {
            $consulta->execute();
            $this->mensaje = "Datos guardados correctamente";
        }
    }
}
