<?php
class startup
{
    public function conectarPDO()
    {
        $ruta='mysql:host=localhost;dbname=classroom_web';
        $user='root';
        $pwd='';
        try{
            $pdo=new PDO($ruta,$user,$pwd);
            return $pdo;
        }
        catch(PDOException $e)
        {
            print"Error!:".$e->getMessage()."<br/>";
            die();
        }
    }
}
?>