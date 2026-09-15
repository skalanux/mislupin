<?php
include_once("classes/Coleccion.php");
include_once("classes/Coleccionista.php");

    $col = New Coleccion();
    $col->coleccionista_id = $colec_id;
    $numeros_posee = ($col->getNumerosEnPosesion());
    $numeros_faltantes = ($col->getNumerosFaltantes());
    $porcentaje_completitud = ceil($col->getPorcentajeCompletitud());
echo ("<div class='center'>Estad&iacute;sticas</div>");
echo ("Numeros que posee: $numeros_posee <br />");
echo ("Numeros faltantes: $numeros_faltantes <br />");
echo ("Porcentaje Completado: $porcentaje_completitud %");
