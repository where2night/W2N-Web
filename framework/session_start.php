<?php
 session_start(); 
 
 // this sets variables in the session 
 $_SESSION['type_login']= $_POST['type_login'];
 $_SESSION['id_user']= $_POST['id_user'];
 $_SESSION['picture']= $_POST['picture'];
 $_SESSION['name']= $_POST['name'];
 $_SESSION['surnames']= $_POST['surnames'];
 $_SESSION['birthdate']= $_POST['birthdate']; 
 $_SESSION['gender']= $_POST['gender']; 
 $_SESSION['music']= $_POST['music'];
 $_SESSION['civil_state']= $_POST['civil_state'];
 $_SESSION['city']= $_POST['city'];
 $_SESSION['drink']= $_POST['drink']; 
 $_SESSION['about']= $_POST['about']; 
 
//session_write_close();

?>