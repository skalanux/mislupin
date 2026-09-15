<?
class Ejemplar{
	
	function Ejemplar(){
		$this->numero=34;
		$this->estado=2;
		$this->detalles=23;
	}

}

$ejemplar = New Ejemplar();


$coleccion2=Array();

$coleccion2[]=array("numero"=>$ejemplar->numero, "estado"=>$ejemplar->estado, "detalles"=>$ejemplar->detalles);
$coleccion2[]=array("numero"=>$ejemplar->numero, "estado"=>$ejemplar->estado, "detalles"=>$ejemplar->detalles);


print_r($coleccion2);




?>
