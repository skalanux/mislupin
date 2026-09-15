<?php
include_once("funciones/conectar.php");
include_once("funciones/helpers.php");
include_once("classes/Ejemplares.php");
//Pasar archivos de classes a minuscula

$numero = $_REQUEST["num"];
/*
$query = "SELECT *  
        FROM ejemplares
        WHERE numero=".$numero;
*/
echo ("<br /><div class='resultbusqueda'>Detalles del n&uacute;mero ".$numero."</div>");

$query_latienen = "SELECT id_coleccionista, user_name 
                    FROM coleccionista_ejemplares ce, coleccionistas co 
                    WHERE id_estado=3 and id_ejemplar=".$numero." and ce.id_coleccionista=co.id";




$query_nolatienen = "SELECT id, user_name
                     FROM coleccionistas 
                     WHERE id NOT IN 
                    (SELECT id_coleccionista 
                    FROM coleccionista_ejemplares ce, coleccionistas co 
                    WHERE (id_estado=2 or id_estado=3) 
                    and id_ejemplar=".$numero." and ce.id_coleccionista=co.id)";


$result = mysql_query($query_latienen) or die(mysql_error());  

while($row = mysql_fetch_array($result)){
    $latienen .= "<a href=index.php?page=coleccion&id_coleccionista=".$row['id_coleccionista'].">".$row['user_name']."</a>,";
}
$result = mysql_query($query_nolatienen) or die(mysql_error());  

while($row = mysql_fetch_array($result)){
    $nolatienen .= "<a href=index.php?page=coleccion&id_coleccionista=".$row['id'].">".$row['user_name']."</a>,";

}

?>

<table style="text-align: left; width: 100%;" border="0"
 cellpadding="2" cellspacing="2">
<tbody>
<tr><td>
<?php
echo "<img width='120px' src='".getTapa($numero)."'>";
?>
<td>Fecha de publicacion:<br>
CD:</td>
</tr>
<tr>
<td colspan=2>
<?php

$eje = New Ejemplares($numero);
echo $eje->getContenido();

?>
</td>

</tr>
<tr>
<td colspan="2" rowspan="1" class="box">Esta lupin la tiene repetida:<br />
<?php
echo $latienen;
?>
</td>
</tr>
<tr>
<td colspan="2" rowspan="1" class="box" >Esta lupin le falta a:<br />
<?php
echo $nolatienen;
?>
</td>
</tr>
</tbody>
</table>


<table>
<tr>
<td>
