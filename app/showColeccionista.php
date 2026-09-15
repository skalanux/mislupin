<?php
include_once("funciones/conectar.php");
include_once("funciones/helpers.php");
include_once("classes/Coleccionista.php");
//Pasar archivos de classes a minuscula

$id_colec = $_REQUEST["id_coleccionista"];


$colec = New Coleccionista();
$datos_colec = $colec->getColeccionistaById($id_colec);

?>
<h3>Datos</h3>
<table>
<tr>
<td>
nick:
</td>
<td>
<?php
echo $datos_colec["username"];
?>
</td>
</tr>
<tr>
<td>
email:
</td>
<td>
<?php
echo $datos_colec["email"];
?>
</td>
</tr>
</table>
