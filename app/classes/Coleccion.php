<?php
ini_set("include_path", ".:../:./include:../include");
include_once("./funciones/conectar.php");

class Coleccion{
    function getColeccion(){
        $id = $this->coleccionista_id;
        $query = "SELECT * FROM coleccionista_ejemplares WHERE id_coleccionista =".$id.";";
        $result = mysql_query($query) or die(mysql_error()); 
        while($row = mysql_fetch_array($result))
            $this->set_state($row[1], $row[2], $row[3]);

        //Para no tener que insertar todos los numeros y poner solo los que tiene, creo una funcion complete array que pone en faltantes los que no
        //Tiene

        $this->coleccion_numbers = $this->__complete_array__();

        return $this->coleccion_numbers;
    
    }       
	function getNumerosEnPosesion(){
        $id = $this->coleccionista_id;
        $query = "SELECT count(*) FROM coleccionista_ejemplares where (id_coleccionista=".$id.") and (id_estado=2 or id_estado=3)";
        $result = mysql_query($query) or die(mysql_error()); 
		$row = mysql_fetch_row($result);
		return $row[0];
	}
	function getPorcentajeCompletitud(){
		return (($this->getNumerosEnPosesion()*100)/499)."%";
	}

	function getNumerosFaltantes(){
		return (499-$this->getNumerosEnPosesion());
	}

	function getListaFaltantes(){
	
		echo "No implementado aun";

	}

	function getListaRepetidos(){

		echo "No implementado aun";

	}
	
	function getPosibleCanje($idOtroColec, $tipo){
		//tipo=busco estoy buscando revistas
		//tipo=piden estan buscandon revistas que tengo repetidas
	
		if ($tipo=="busco"){
			$colec1=$idOtroColec;
			$colec2=$this->coleccionista_id;
		}
		elseif ($tipo=="piden"){
			$colec1=$this->coleccionista_id;
			$colec2=$idOtroColec;
		}

	        $query = "select id_ejemplar, id_estado from coleccionista_ejemplares where id_coleccionista=$colec1 and id_estado=3 $mi_id and id_ejemplar  in (select id from ejemplares where id not in (select id_ejemplar from coleccionista_ejemplares where id_coleccionista=$colec2));";
		//echo "<pre>$query</pre>";
        	$result = mysql_query($query) or die(mysql_error()); 
		$row = mysql_fetch_row($result);
		
	        $listaRepetidos = array();
       
        	while($row = mysql_fetch_array($result))
            		$listaRepetidos[] = $row[0];
 			
		return $listaRepetidos;
	
	}
	
    function setColeccionNumbers($arrayColec, $jsontype){

	//Si json type == 1 convertir a array normal
	//$arraynormal = '[{"numero": 1, "estado": 1, "detalle": ""}, {"numero": 2, "estado": 2, "detalle": ""}, {"numero": 3, "estado": 3, "detalle": ""}, {"numero": 4, "estado": 1, "detalle": ""}]';
	//$arrayjsonphp4 = '[{"numero": 1, "estado": 1, "detalle": ""}, {"numero": 2, "estado": 2, "detalle": ""}, {"numero": 3, "estado": 3, "detalle": ""}, {"numero": 4, "estado": 1, "detalle": ""}]';

	if ($jsontype==1){
		$coleccion2=array();
		foreach ($arrayColec as $ejemplar){
			$coleccion2[]=array("numero"=>$ejemplar->numero, "estado"=>$ejemplar->estado, "detalles"=>$ejemplar->detalles);
			
		}
		$arrayColec = $coleccion2;
	}
	
        //Si el array empieza en 0 lo hace que empiece en uno:
        if (in_array(0, array_keys($arrayColec))){
            array_unshift ($arrayColec, "a");
            $arrayColec=array_slice($arrayColec,1,499,1);
        }
 
        $this->coleccion_numbers = $arrayColec;

        return $this->coleccion_numbers;

    }

    function __complete_array__(){
       //Este metodo se encarga de buscar indices que no existan en el array y los llena con 1,
        // asi lo que recibe la coleccion esta completo 
 
        $estan = array_keys($this->coleccion_numbers);

        for ($i=1; $i<500; $i++)
            if (!(array_key_exists($i, $this->coleccion_numbers)))
                $this->coleccion_numbers[$i] = Array("numero" => $i, "estado" => 1, "detalle" => "");

        return $this->coleccion_numbers; 


    }

    function set_state($numero, $estado, $detalle){

      $this->coleccion_numbers[$numero] = Array("numero" => $numero, "estado" => $estado, "detalle" => $detalle);


    }

    function printColeccion(){
        $this->__complete_array__();
        return(print_r($this->coleccion_numbers, 1));        

    }

    function save(){
        $qrys[]= "DELETE FROM coleccionista_ejemplares WHERE id_coleccionista = ".$this->coleccionista_id.";"; 
        foreach ($this->coleccion_numbers as $ejemplar ){
            if ($ejemplar["estado"] != 1)
                $qrys[] ='INSERT into coleccionista_ejemplares VALUES('.$this->coleccionista_id.','.$ejemplar["numero"].','.$ejemplar["estado"].',"'.$ejemplar["detalle"].'");';  
            }
        
        foreach ($qrys as $qry)
            mysql_query($qry) or die(mysql_error()); 
        

       //test
        /*
        $r=$qry;
        $e=fopen("/var/www/mislupins/hola.txt", "w");
        fwrite($e , $r);
        fclose($e);
        */
       //fintest 
    }


}

?>
