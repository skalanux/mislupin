<?php
include_once("classes/Personajes.php");
?>
<h3>B&uacute;squeda</h3>
<form method="post" action="index.php?page=busquedaProcess" id="busqueda">

<div class="center">
 <label for="typesearch-1">Historietas</label>
 <input class="radiosoft" checked="checked"  name="typesearch" value="historieta" type="radio" onClick="showField('historietas');">
<label for="typesearch-2">Planitos / Notas</label>
<input class="radiosoft" checked="false" name="typesearch" value="planitos" type="radio" onClick="showField('planitos');">
</div>
<br /> 
<br /> 
<fieldset id="historietas" style="display:none; width:100px;" >
<legend >Historietas</legend>

<label for="histname">Nombre</label><select name="histname" class="box">
<?php
$personajes = New Personajes();
foreach ($personajes->getPersonajes() as $personaje){
    echo $personaje["nombre"];

    echo ("<option value=".$personaje["id"].">".$personaje["nombre"]."</option>");
}
?>
</select>
<br /> 
<br /> 
<label for="hist_tit">T&iacute;tulo</label> <input class="box" name="hist_tit">
</fieldset>

<fieldset id="planitos" style="display:true; width:100px;">
<legend style="caption-side: left;">Planitos / Notas</legend>
<label for="plan_des">Descripci&oacute;n</label><input class="box" name="plan_des">
</fieldset>

<br /> 
<center>
<div>
<input name="busqueda" class="boxsmall" value="Buscar" type="button" onClick="enviarForm()">
</div>
</center>
</form>
