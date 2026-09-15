<?php
include_once("funciones/conectar.php");
class Coleccionista{
    function getColeccionistaById($id){

        $query = "SELECT id, user_name, email, show_colec FROM coleccionistas WHERE id = ".$id.";";
        $result = mysql_query($query) or die(mysql_error()); 
        $coleccionista = array();
        $row = mysql_fetch_array($result);
        $coleccionista = Array("id" => $row["id"], "username" => $row["user_name"], "email" => $row["email"] , "showcolec" => $row["show_colec"]);
        
    //Para no tener que insertar todos los numeros y poner solo los que tiene, creo una funcion complete array que pone en faltantes los que no
    //Tiene
    return ($coleccionista);
    
    }       


}

?>
