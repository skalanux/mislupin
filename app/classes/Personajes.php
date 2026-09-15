<?php
include_once("funciones/conectar.php");

class Personajes{
    function getPersonajes(){

        $query = "SELECT * FROM personajes ORDER BY nombre;";
        $result = mysql_query($query) or die(mysql_error()); 
        $personajes = array();
       
        while($row = mysql_fetch_array($result)){
            $personajes[] = Array("id" => $row[0], "nombre" => $row[1], "descripcion" => $row[3], "autor" => $row[4]);
        }
        
    return $personajes;
    
    }       

}

?>
