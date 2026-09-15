<div id="navbar">
<ul>
<li><a href="index.php?page=home">Inicio</a></li>
<li><a href="index.php?page=busqueda">B&uacute;squeda</a></li>
<li><a href="index.php?page=coleccion">Mi
colecci&oacute;n</a></li>
<li><a href="index.php?page=lupinautas">Otras colecciones</a></li>
<li><a href="index.php?page=paginasamigas">P&aacute;ginas Amigas</a></li>
<li><a href="index.php?page=tutoriales">Tutoriales</a></li>



</ul>
</div>
<div class="loginbar" >
<?php
if (isset($_SESSION["s_name"]))
    echo ("Bienvenido ".$_SESSION["s_name"]." | <a href='logout.php'>Logout</a>");
else
    include("loginform.php");
?>
</div>
