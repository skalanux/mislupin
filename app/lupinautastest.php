<?php
include_once("classes/ColeccionistasMgr.php");
?>
<h3>Otras colecciones</h3>

<?php
$lupinautas = New ColeccionistasMgr();
echo ("<table class='center' ><tr valign='top'><td>Nombre</td><td>N&uacute;meros repetidos que vos no ten&eacute;s</td><td>N&uacute;meros que le pod&eacute;s ofrecer</td><td>Correo</td>");
foreach ($lupinautas->getAll() as $lupinauta){
    echo "<tr><td width='150px'><a href='index.php?page=coleccion&id_coleccionista=".$lupinauta["id"]."'>".$lupinauta["user_name"]."</a></td>";
	echo "<td width='150px'>2</td>";
	echo "<td width='150px'>2</td>";
	echo "<td>".$lupinauta["email"]."</td></tr>";
}
echo ("</table>");
?>
