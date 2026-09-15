<?
$host = getenv("DB_HOST") ?: "db";
$user = getenv("DB_USER") ?: "mislupins";
$passwd = getenv("DB_PASS") ?: "mislupins";
$db = getenv("DB_NAME") ?: "mislupins";

// Emulacion de la extension mysql (eliminada en PHP 7) sobre mysqli.
// El codigo original llama a mysql_* sin pasar la conexion, por eso el
// shim guarda el handle en $GLOBALS y el resto de las funciones lo usan.
// Con PHP 5.x estas funciones ya existen y el bloque no entra.
if (!function_exists('mysql_connect')) {
    function mysql_pconnect($host, $user, $passwd) {
        $GLOBALS['__mysqli_link'] = @mysqli_connect($host, $user, $passwd);
        $GLOBALS['__mysqli_error'] = mysqli_connect_error();
        return $GLOBALS['__mysqli_link'];
    }
    function mysql_select_db($dbname, $link = null) {
        $link = $link ?: $GLOBALS['__mysqli_link'];
        return mysqli_select_db($link, $dbname);
    }
    function mysql_query($query) {
        return mysqli_query($GLOBALS['__mysqli_link'], $query);
    }
    function mysql_fetch_array($result, $type = MYSQLI_BOTH) {
        return mysqli_fetch_array($result, $type);
    }
    function mysql_fetch_row($result) {
        return mysqli_fetch_row($result);
    }
    function mysql_num_rows($result) {
        return mysqli_num_rows($result);
    }
    function mysql_error() {
        return $GLOBALS['__mysqli_error'] ? $GLOBALS['__mysqli_error'] : mysqli_error($GLOBALS['__mysqli_link']);
    }
}
$link = mysql_pconnect($host, $user, $passwd) or die(mysql_error());
mysql_select_db($db, $link) or die(mysql_error());
?>