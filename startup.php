<?php

class startup
{

    public function conectarPDO()
    {
        $ruta='mysql:host=sql302.epizy.com;dbname=epiz_31973149_classroom';
        $user='epiz_31973149';
        $pwd='JgppuTpiJPX3kf';
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
/*
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
*/
?>
