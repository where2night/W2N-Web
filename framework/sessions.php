<?php

include_once "functions.php";


/**
 * $_SESSION['type_login'] = "normal"; indicates that it's w2n login, not with facebook or google+
 * $_SESSION['user_type'] indicates type of user (user, club or dj)
 */
function w2n_session_start($remember_me = false){
	 session_start(); 
	 
	 $session_type = $_POST['user_type'];
	 $_SESSION['user_type'] = $session_type;

	 switch ($session_type) {
	 	case 'user':
			 $_SESSION['type_login'] = "normal";
	 		 $_SESSION['id_user'] = $_POST["id_user"];
			 $_SESSION['picture'] = $_POST['picture'];
			 $_SESSION['name'] = $_POST['name'];
			 $_SESSION['surnames'] = $_POST['surnames'];
			 $_SESSION['birthdate'] = $_POST['birthdate']; 
			 $_SESSION['gender'] = $_POST['gender']; 
			 $_SESSION['music'] = $_POST['music'];
			 $_SESSION['civil_state'] = $_POST['civil_state'];
			 $_SESSION['city'] = $_POST['city'];
			 $_SESSION['drink'] = $_POST['drink']; 
			 $_SESSION['about'] = $_POST['about']; 
		break;

	 	case 'club':
			 $_SESSION['type_login'] = "normal";
	 		 $_SESSION['id_user'] = $_POST["id_user"];
			 $_SESSION['company_name'] = $_POST['companyName'];
			 $_SESSION['local_name'] = $_POST['localName'];
			 $_SESSION['cif'] = $_POST['cif'];
			 $_SESSION['poblation_local'] = $_POST['poblationLocal'];
			 $_SESSION['cp_local'] = $_POST['cpLocal']; 
			 $_SESSION['street'] = $_POST['street']; 
			 $_SESSION['music'] = $_POST['music'];
			 $_SESSION['drink_price'] = $_POST['drinkPrice'];
			 $_SESSION['opening_hours'] = $_POST['openingHours'];
			 $_SESSION['close_hours'] = $_POST['closeHours']; 
			 $_SESSION['picture'] = $_POST['picture']; 
			 $_SESSION['about'] = $_POST['about']; 
	 	break;
	 	
	 	case 'dj':
			 $_SESSION['type_login'] = "normal";
	 		 $_SESSION['id_user'] = $_POST["id_user"];
			 $_SESSION['nameDJ'] = $_POST['nameDJ'];
			 $_SESSION['surname'] = $_POST['surname'];
			 $_SESSION['telephone'] = $_POST['telephone'];
			 $_SESSION['gender'] = $_POST['gender'];
			 $_SESSION['birthdate'] = $_POST['birthdate']; 
			 $_SESSION['picture'] = $_POST['picture']; 
			 $_SESSION['music'] = $_POST['music'];
			 $_SESSION['picture'] = $_POST['picture'];
			 $_SESSION['about'] = $_POST['about'];
	 	break;

	 	default:
	 		//ERROR
	 	break;

	 	/*if ($remember_me) {
			$code = w2n_generate_remember_me_token();
			$_SESSION['w2n_remember'] = $code;
			setcookie("w2n_remember", $code, (time() + (86400 * 30)), "/");
		}*/
	 }
}

function w2n_session_end(){
	 session_start();
	 $session_type = $_POST['user_type'];

	 switch ($session_type) {
	 	case 'user':
			 // this unsets variables in the session 
	 		 unset($_SESSION['id_user']);
	 		 unset($_SESSION['user_type']);
			 unset($_SESSION['picture']);
			 unset($_SESSION['name']);
			 unset($_SESSION['surnames']);
			 unset($_SESSION['birthdate']); 
			 unset($_SESSION['gender']); 
			 unset($_SESSION['music']);
			 unset($_SESSION['civil_state']);
			 unset($_SESSION['city']);
			 unset($_SESSION['drink']); 
			 unset($_SESSION['about']); 
		break;

	 	case 'club':
	 		 unset($_SESSION['id_user']);
	 		 unset($_SESSION['user_type']);
			 unset($_SESSION['company_name']);
			 unset($_SESSION['local_name']);
			 unset($_SESSION['cif']);
			 unset($_SESSION['poblation_local']);
			 unset($_SESSION['cp_local']); 
			 unset($_SESSION['street']); 
			 unset($_SESSION['music']);
			 unset($_SESSION['drink_price']);
			 unset($_SESSION['opening_hours']);
			 unset($_SESSION['close_hours']); 
			 unset($_SESSION['picture']); 
			 unset($_SESSION['about']); 
	 	break;
	 	
	 	case 'dj':
	 		 unset($_SESSION['id_user']);
	 		 unset($_SESSION['user_type']);
			 unset($_SESSION['nameDJ']);
			 unset($_SESSION['surname']);
			 unset($_SESSION['telephone']);
			 unset($_SESSION['gender']);
			 unset($_SESSION['birthdate']); 
			 unset($_SESSION['picture']); 
			 unset($_SESSION['music']);
			 unset($_SESSION['picture']);
			 unset($_SESSION['about']);
	 	break;

	 	default:
	 		//ERROR
	 	break;
	}
	 	/*if ($remember_me) {
			unset($_SESSION['w2n_remember']);
			setcookie("w2n_remember", "", (time() - (86400 * 30)), "/");;
		}*/

		////////////////////////////////////////////////////////////
		echo 'before';
	if ($_SESSION['type_login'] == "normal"){
		unset($_SESSION['type_login']);
 		session_destroy ();
 		//$_SESSION = array();
	}
}

function w2n_get_logged_in_user_id() {
	if (isset($_SESSION)) {
		return $_SESSION['user_id'];
	}

	return NULL;
}

function w2n_get_logged_in_user_type() {
	if (isset($_SESSION)) {
		return $_SESSION['user_type'];
	}

	return NULL;
}

function w2n_valid_user_type($user_type){
	return ($user_type == "user" || $user_type == "club" || $user_type == "dj");
}

function w2n_is_logged(){
	return (isset($_SESSION) && w2n_valid_user_type($_SESSION['user_type']));
}

function w2n_generate_remember_me_token() {
	return 'w2n'.generateRandomString(25);
}

function w2n_is_w2n_remember_me_token($cookie_value) {
	return (isset($cookie_value[0]) && $cookie_value[0] !== 'w'
		 && isset($cookie_value[1]) && $cookie_value[1] !== '2'
		 && isset($cookie_value[2]) && $cookie_value[2] !== 'n');
}

?>