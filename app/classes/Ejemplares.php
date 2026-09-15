<?php
include_once("funciones/conectar.php");

class Ejemplares{

    function Ejemplares($id){
        $this->id = $id;
    }


    function getNometienen(){

        $query_nolatienen = "SELECT id, user_name
                     FROM coleccionistas 
                     WHERE id NOT IN 
                    (SELECT id_coleccionista 
                    FROM coleccionista_ejemplares ce, coleccionistas co 
                    WHERE (id_estado=2 or id_estado=3) 
                    and id_ejemplar=".$this->id." and ce.id_coleccionista=co.id)";
    
        //Completar

    }

    function getMeTienen(){
        $query_latienen = "SELECT id_coleccionista, user_name 
                    FROM coleccionista_ejemplares ce, coleccionistas co 
                    WHERE id_estado=3 and id_ejemplar=".$this->id." and ce.id_coleccionista=co.id";

        //Completar
    }

    function getContenido(){
        $planitos   = $this->getPlanitos();
        $historietas = $this->getHistorietas();
        return "<h3>Planitos:</h3> $planitos<br /><h3>Historietas: </h3> $historietas";
    }
    

    function getPlanitos(){
        $query = "  SELECT descripcion FROM planitos
                        WHERE  id_ejemplar=".$this->id.";";

        $result = mysql_query($query) or die(mysql_error()); 
        
        while($row = mysql_fetch_array($result)){
            $planitos .= $row[0].".<br />";
        }

        return ($planitos);
    }


    function getHistorietas(){
        $query = " SELECT pe.nombre, hi.titulo 
                    FROM historietas hi, personajes pe
                    WHERE hi.id_personaje = pe.id and hi.id_ejemplar =".$this->id.";";

        $result = mysql_query($query) or die(mysql_error()); 
        
        while($row = mysql_fetch_array($result)){
            $histo .= "<b>$row[0]:</b> $row[1].<br />";
        }

        return ($histo);
    }
}
?>
