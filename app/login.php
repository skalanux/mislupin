<?php
include("funciones/conectar.php");


if ($_POST['username']) {
    //Comprobacion del envio del nombre de usuario y password
    $username=$_POST['username'];
    $password=$_POST['password'];

    if ($password==NULL) {
        echo "La password no fue enviada";
        //header("Location: index.php");
    }
    else{
        $query = mysql_query("SELECT user_name,password FROM coleccionistas WHERE user_name = '$username'") or die(mysql_error());
        $data = mysql_fetch_array($query);
    
        if($data['password'] != $password) {
            //header("Location: index.php");
            echo "Login incorrecto";
        }
        else{
            $query = mysql_query("SELECT id, user_name,password FROM coleccionistas WHERE user_name = '$username'") or die(mysql_error());
            $row = mysql_fetch_array($query);
            //Creo la sesion

            session_start();
            //session_destroy();
            $_SESSION["s_name"] =  $row['user_name'];
            $_SESSION["s_userid"] = $row['id'];

            //session_destroy();
            //echo "Has sido logueado correctamente ".$_SESSION['s_username']." y puedes acceder al index.php.";    
            header("Location: index.php");
        }   
    }
}


?>
