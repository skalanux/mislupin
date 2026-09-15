<?php
include_once("classes/ColeccionistasMgr.php");
include_once("classes/Coleccion.php");
include_once("classes/Coleccionista.php");
?>
<h3>Otras colecciones</h3>

<?php

if (isset($_GET["id_coleccionista"]))
    if (isset($_SESSION["s_userid"]))
        $colec_id = $_GET["id_coleccionista"];
    else
        
        echo "<h3>Debe estar logueado para ver otras colecciones, como prueba puede usar usuario: colec1 password: test</h3>";
else
    if (isset($_SESSION["s_userid"]))
        $colec_id = $_SESSION["s_userid"];
    else
        echo "<h3>Debe estar logueado para ver otras colecciones, como prueba puede usar usuario: colec1 password: test</h3>";

if (isset($colec_id)){
    $col = New Coleccion();
    $coleccionistaMgr = New Coleccionista();
    $coleccionista = $coleccionistaMgr->getColeccionistaById($colec_id);
    $col->coleccionista_id = $colec_id;
	$lupinautas = New ColeccionistasMgr();
	echo ("<table class='center' ><tr valign='top'><td>Nombre</td>
        <td valign='top'>N&uacute;meros repetidos que vos no ten&eacute;s</td>
        <td valign='top'>N&uacute;meros que le pod&eacute;s ofrecer</td><td>Correo</td>");
	foreach ($lupinautas->getAll() as $lupinauta){
		$listaBusco = $col->getPosibleCanje($lupinauta["id"],"busco");
		$listaTengoRep = $col->getPosibleCanje($lupinauta["id"],"piden");
		echo "<tr><td width='150px'><a href='index.php?page=coleccion&id_coleccionista=".$lupinauta["id"]."'>".$lupinauta["user_name"]."</a></td>";
		echo "<td>".formatArrayAsList($listaBusco)."</td>";
		echo "<td width='50px' heigth='90px'>".formatArrayAsList($listaTengoRep)."</td>";
		echo "<td>".$lupinauta["email"]."</td></tr>";
	}
echo ("</table>");
}
?>
