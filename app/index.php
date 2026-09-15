<?php
session_start();
ini_set("include_path", ".:../:./include:../include");
include_once("login.php");
header('Content-Type: text/html; charset=UTF-8');
include "header.php";
?>
	<div id="bd">
		<div id="yui-main">
			<div class="yui-b">
	<?php
    switch ($_REQUEST["page"]){

    case ("busqueda"):
        include("busqueda.php");
    break;    

    case ("showNum"):
        include("showNumero.php");
    break;

    case ("coleccion"):
         include("micoleccion.php");
    break;
  
    case ("showCol"):
        include("showColeccionista.php");
    break;

 
    case ("busquedaProcess"):
        include("busquedaProcess.php");
    break;
    
    case ("home"):
        include("home.php");
    break;

    case ("tutoriales"):
        include("underconstruction.php");
    break;

    case ("paginasamigas"):
        include("paginasamigas.php");
    break;

	case ("lupinautas"):
        include("lupinautas.php");
    break;

    default:
        include("home.php");
    break;
}
?>
			<!-- PUT MAIN COLUMN CODE HERE -->
			</div>
		</div>
		<div class="yui-b">
			<!-- PUT SECONDARY COLUMN CODE HERE -->
		</div>
	</div>
<?




include "footer.php";

?>
