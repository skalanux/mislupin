<?php
include_once("funciones/conectar.php");

class Planitos{
    function getPlanitos($descripcion){

        $query = "SELECT id, id_ejemplar, descripcion FROM planitos where descripcion like '%".$descripcion."%'";
        $result = mysql_query($query) or die(mysql_error()); 
        $planitos = array();
       
        while($row = mysql_fetch_array($result)){
            $planitos[] = Array("numero" => $row[1], "descripcion" => $row[2]);
        }
        
    return $planitos;
    
    }       

}

?>
