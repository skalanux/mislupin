<?php
ini_set("include_path", ".:../:./include:../include");

include_once("./classes/Coleccion.php");
include_once("./classes/json.php");


$colec_id = $_REQUEST["id_colecconista"];
echo($colec_id);

//$colec_id = 2;

//$data = '[{"numero": 1, "estado": 1, "detalle": ""}, {"numero": 2, "estado": 2, "detalle": ""}, {"numero": 3, "estado": 3, "detalle": ""}, {"numero": 4, "estado": 1, "detalle": ""}]';

$data = stripslashes($_POST['data']);

/* Para php 5.2 y mayor
//$myjson = json_decode($data, 1);//El uno significa que es un array si es 0 devuelve un objeto
*/

//Esto es porque es una version vieja de php
$json = new Services_JSON();
$myjson = $json->decode($data);






//Tengo que correr al array una posicion para guardar los numeros



$col = New Coleccion();
$col->coleccionista_id = $colec_id;

//1 significa que es php viejo
$col->setColeccionNumbers($myjson, 1);

$col->save();

$e=fopen("/var/www/mislupins/hola.txt", "w");
$r = $col->printColeccion();
fwrite($e , $colec_id);
//fclose($e);

?>
