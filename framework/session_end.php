<?php

if ($_SESSION['type_login'] == "normal"){
 session_destroy ();
}

echo  "no deberia salir nada aqu�: ".$_SESSION['name'];
?>