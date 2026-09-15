<?php
include_once("funciones/conectar.php");

class ColeccionistasMgr{
    function getAll(){

        $query = "SELECT id, user_name, email FROM coleccionistas ORDER BY user_name;";
        $result = mysql_query($query) or die(mysql_error()); 
        $coleccionistas = array();
       
        while($row = mysql_fetch_array($result)){
            $coleccionistas[] = Array("id" => $row[0], "user_name" => $row[1], "email" => $row[2]);
        }
        
    return $coleccionistas;
    
    }       

}

?>
