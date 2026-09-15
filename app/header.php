<?php
include_once("funciones/helpers.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Mis Lupins</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">

<script type="text/javascript" src="prototype.js"></script>

<script type="text/javascript">
	function showField(field){
        Element.hide("planitos");
        Element.hide("historietas");
        //Element.hide("ejemplares");
        Element.show(field);
	}

function enviarForm(){
    document.getElementById("busqueda").submit();

}

</script>

</head>

<body>
<div id="doc2" class="yui-t7">
	<div id="hd">

	<img  alt="MisLupins" src="imagenes/logo2.png"> 
    <span>
    "el sitio para buscar e intercambiar tus revistuchas"<b>(BETA 2)</b>
    </span>
    <span>
    <?php
        echo "<img width='120px' height='82px' src='".getTapa(0)."'>";
    ?>
    </span>
    <?php
    include "menu.php";
    ?>
	</div>
