<?php
include_once("classes/Coleccion.php");
include_once("classes/Coleccionista.php");

echo('<script language="javascript" type="text/javascript" src="micoleccion.js"></script>'); 


//Debo chequear varias cosas, primero si estoy pasando en la pagina algun usuario para ver su coleccion, si estoy pasando
//debo chequear si estoy logueado para dejar ver
//Si no estoy pasando usuario deberia chequear si estoy logueado, si no lo estoy no muestra nada

if ((isset($_GET["edit"])))
//if (!(isset($_GET["edit"])))
    $edit = 1;

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
    
    $COLORES = array("2"=>"state_existe", "1" => "state_faltante" , "3" => "state_repetida");
    $col = New Coleccion();
    $coleccionistaMgr = New Coleccionista();
    //Que devuelva que no existe si e asi, asi no se continua
   
    $coleccionista = $coleccionistaMgr->getColeccionistaById($colec_id);
    
    //Aca podria hacer tambien un coleccionosta.getColeccion
    $col->coleccionista_id = $colec_id;
    $numeros_estado = ($col->getColeccion());
   
    echo ("<h3>Colecci&oacute;n</h3>");
    include("colorreference.html"); 
    //Arma grilla con todas las revistas y colorea según tenencia.
    echo ("<div class='center'>"); 
    if ($colec_id==$_SESSION["s_userid"])
        echo ("Viendo mi colecci&oacute;n");
    else
        echo ("Viendo la colecci&oacute;n de ".$coleccionista["username"]." <a href='index.php?page=showCol&id_coleccionista=".$colec_id."'>Detalles</a> ")
;
    echo ("</div>");
   //Si el usuario logueado es el mismo de la coleccion que se esta viendo:
    echo ("<br/><br/>");
    if ($colec_id==$_SESSION["s_userid"])
        if (isset($edit))
            echo (" <a href='#' onclick='saveColec(".$colec_id.")' style='{color:#ffcccc;}'> guardar</a> |");
        else
            echo (" <a href='index.php?page=coleccion&s_userid=$colec_id&edit=1'> editar</a> |");
 
    if (!(isset($edit))){
    
        echo (" <a href='javascript:alert(\"No implementado aun\");'>exportar</a> ");

        echo ("| <a href='javascript:alert(\"No implementado aun\");'>imprimir</a> ");
    }
    else{
        echo (" <a href='index.php?page=coleccion&s_userid=$colec_id'>volver</a>");
    }
    //Armo a manopla la primera fila
    echo ("<table><tr valign='top'><td><table class='box' border='0'>");
    echo ("<tr >");
    echo ("<td >A&ntilde;o</td>");
    echo ("<td class='sbox' colspan='2'>Ene</td>");
    echo ("<td class='sbox' colspan='2'>Feb</td>");
    echo ("<td class='sbox' colspan='2'>Mar</td>");
    echo ("<td class='sbox' colspan='2'>Abr</td>");
    echo ("<td class='sbox' colspan='2'>May</td>");
    echo ("<td class='sbox' colspan='2'>Jun</td>");
    echo ("<td class='sbox' colspan='2'>Jul</td>");
    echo ("<td class='sbox' colspan='2'>Ago</td>");
    echo ("<td class='sbox' colspan='2'>Sep</td>");
    echo ("<td class='sbox' colspan='2'>Oct</td>");
    echo ("<td class='sbox' colspan='2'>Nov</td>");
    echo ("<td class='sbox' colspan='2'>Dic</td>");
    echo("</tr>");
    echo ("<tr id='tr_1966'>");
    
        //Empiezo a crear la grilla
        for ($j=0; $j<16; $j++){
            $numero =$i+$j;
            $detalle = $numeros_estado[$numero]["detalle"];
            $color = $COLORES[$numeros_estado[$numero]["estado"]];
            //Si es la primera columna escribo el año
            if ($j==0)
                    echo ("<td id='rid_1966' class='boxanio' title='".$detalle."' >1966</td>");
            
            if ($numero <= 8 && $numero>1){
                    $numero2=$numero + 1;
                    $color2 = $COLORES[$numeros_estado[$numero2]["estado"]];
                    $detalle2 = $numeros_estado[$numero2]["detalle"];
                    echo ("<td id='id_$numero' class='".$color."' title='".$detalle."' ><a class='linkejemplar' href='index.php?page=coleccion&num=".$numero."'>".$numero."</td>");
                    echo ("<td id='id_$numero2' class='".$color2."' title='".$detalle2."' ><a class='linkejemplar' href='index.php?page=coleccion&num=".$numero."'>".$numero2."</td>");
                    $j++;
        
            }
            else
                if ($numero!=0)
                    echo ("<td id='id_$numero' colspan='2' class='".$color."' title='".$detalle."' ><a class='linkejemplar' href='index.php?page=coleccion&num=".$numero."'>".$numero."</td>");
                else    
                    echo ("<td colspan='2' class='#ffffff'>&nbsp;</td>");
        }
    
    echo ("</tr>");
    
    
    for ($i=16; $i<=499; $i+=12){
        $anio_pub = floor($i/12 + 1966);
        echo ("<tr id='tr_$anio_pub'>");
        for ($j=0; $j<12; $j++){
            
            //Si es la primer columna imprimo el año
            if ($j==0){
                echo ("<td id='rid_$anio_pub' class='boxanio' title='".$detalle."' >".$anio_pub."</td>");
            }
    
            $numero = $i+$j;
            $detalle = $numeros_estado[$numero]["detalle"];
            $color = $COLORES[$numeros_estado[$numero]["estado"]];
            if ($numero > 499) 
                break;

            echo ("\n<td id='id_$numero' colspan='2' class='$color' title='$detalle' >");
            echo ("<a class='linkejemplar' href='index.php?page=coleccion&num=".$numero."'>".$numero."</a></td>");


            }   
        echo ("\n</tr>");
    
    } 
    
    echo ("</table></td><td>");
   
    if (!(isset($edit))) 
        if (isset($_GET["num"]))
            include("showNumero.php");
        else{
            include("coleccionhelp.html");
			echo ("</br>");
            include("estadisticas.php");
		}


    if (isset($edit))  
            include("editHelp.php");
   
    echo("</td></tr></table>");

    if (isset($edit)){
        echo('<script language="javascript" type="text/javascript" src="makeEditable.js"></script>'); 

    }


}
?>
