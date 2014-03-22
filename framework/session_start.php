<?php

include_once "sessions.php";

//Check if user wants to remember the session
if isset($_POST['remember_me']){
	$remember = $_POST['remember_me'];
}else $remember = false;

 w2n_session_start($remember); 
?>