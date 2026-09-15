<?php
include_once("funciones/conectar.php");
?>
<br />

<?php

if ($_POST["typesearch"] == "historieta"){
    //Saco el nombre de la historieta.
    
    $query_pers_name="SELECT personajes.nombre 
                      FROM personajes 
                      WHERE personajes.id =".$_POST['histname'].";"; 
    
    $result_pers = mysql_query($query_pers_name) or die(mysql_error());  
    $row_pers = mysql_fetch_array($result_pers);
    
    
    echo ("<h4>Resultados de la b&uacute;squeda de historietas de ".$row_pers[0]."</h4>");
    echo ("<h4>con titulo parecido a: \" ".$_POST["hist_tit"]." \"</h4>");
    
    
        $query="SELECT ej.numero, his.titulo, his.descripcion 
            FROM historietas his 
            JOIN ejemplares ej ON his.id_ejemplar=ej.id WHERE his.id_personaje=".$_POST["histname"]." and his.titulo like '%".$_POST["hist_tit"]."%'";


    $result = mysql_query($query) or die(mysql_error());  
    
    $cantidad_resultados = mysql_num_rows($result);
    
    if ($cantidad_resultados == 0)
        echo ("<div class='center'>No se encontraron coincidencias, intente cambiando par&aacute;metros de b&uacute;squeda.</div>");
    else if ($cantidad_resultados == 1)
        echo ("<div class='center'>Se encontro ".$cantidad_resultados." coincidencia</div>");
    else
        echo ("<div class='center'>Se encontraron ".$cantidad_resultados." coincidencias</div>");

    echo("<br />");

    while($row = mysql_fetch_array($result)){
        $numero = $row["numero"];
        echo "<div class='histitulo'>".$row['titulo']. "</div><a class='lupinresult' href='index.php?page=showNum&num=".$numero."'> Lupin # ".$numero."</a>";
        echo("<br />");
        echo "<br />";
    }

}
elseif ($_POST["typesearch"] == "planitos"){
    include_once("classes/Planitos.php");
    $planitosMgr = New Planitos();

    echo ("<h4>B&uacute;squeda de planitos o notas sobre: \" ".$_POST["plan_des"]." \"</h4>");

    $planitos = $planitosMgr->getPlanitos($_POST["plan_des"]);
    
    
    $cantidad_resultados = count($planitos);
    
    if ($cantidad_resultados == 0)
        echo ("<div class='center'>No se encontraron coincidencias, intente cambiando par&aacute;metros de b&uacute;squeda.</div>");
    else if ($cantidad_resultados == 1)
        echo ("<div class='center'>Se encontro ".$cantidad_resultados." coincidencia</div>");
    else
        echo ("<div class='center'>Se encontraron ".$cantidad_resultados." coincidencias</div>");

    echo("<br />");

    foreach ( $planitos as $planito ){ 
        $numero = $planito["numero"];
        echo "<div class='histitulo'>".$planito['descripcion']. "</div><a class='lupinresult' href='index.php?page=showNum&num=".$numero."'> Lupin # ".$numero."</a>";
        echo "<br /><br />";
    }

}


?>
