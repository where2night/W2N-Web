<?php

include_once "functions.php";

/**
 * $_SESSION['w2n_type_login'] = "normal"; indicates that it's w2n login, not with facebook or google+
 * $_SESSION['user_type'] indicates type of user (user, club or dj)
 */
function w2n_session_start($remember_me = false){
	 session_start(); 
	 
	 $_SESSION['visiting_id'] = 0;

	 $session_type = $_POST['user_type'];
	 $_SESSION['user_type'] = $session_type;
	 $_SESSION['id_user'] = $_POST["id_user"];
	 $_SESSION['token'] = $_POST["token"];

	 switch ($session_type) {
	 	case 'user':
			 $_SESSION['w2n_type_login'] = "normal";
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
			 $_SESSION['w2n_type_login'] = "normal";
			 $_SESSION['company_name'] = $_POST['companyName'];
			 $_SESSION['local_name'] = $_POST['localName'];
			 $_SESSION['cif'] = $_POST['cif'];
			 $_SESSION['poblation_local'] = $_POST['poblationLocal'];
			 $_SESSION['cp_local'] = $_POST['cpLocal']; 
			 $_SESSION['telephone'] = $_POST['telephoneLocal']; 
			 $_SESSION['street'] = $_POST['street']; 
			 $_SESSION['street_name'] = $_POST['streetName']; 
			 $_SESSION['street_number'] = $_POST['streetNumber']; 
			 $_SESSION['music'] = $_POST['music'];
			 $_SESSION['entry_price'] = $_POST['entryPrice'];
			 $_SESSION['drink_price'] = $_POST['drinkPrice'];
			 $_SESSION['opening_hours'] = $_POST['openingHours'];
			 $_SESSION['close_hours'] = $_POST['closeHours']; 
			 $_SESSION['picture'] = $_POST['picture']; 
			 $_SESSION['about'] = $_POST['about']; 
			 $_SESSION['latitude'] = $_POST['latitude']; 
			 $_SESSION['longitude'] = $_POST['longitude']; 
	 	break;
	 	
	 	case 'dj':
			 $_SESSION['w2n_type_login'] = "normal";
			 $_SESSION['nameDJ'] = $_POST['nameDJ'];
			 $_SESSION['name'] = $_POST['name'];
			 $_SESSION['surname'] = $_POST['surname'];
			 $_SESSION['telephone'] = $_POST['telephone'];
			 $_SESSION['gender'] = $_POST['gender'];
			 $_SESSION['birthdate'] = $_POST['birthdate']; 
			 $_SESSION['picture'] = $_POST['picture']; 
			 $_SESSION['music'] = $_POST['music'];
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

/**
 * Destroys w2n session
 */
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
			 unset($_SESSION['telephone']);
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
	if ($_SESSION['w2n_type_login'] == "normal"){
		unset($_SESSION['w2n_type_login']);
 		session_destroy ();
	}

	if (w2n_session_saved()){
		unset($_COOKIE['w2n_id']);
		setcookie('w2n_id', '', time() - 3600);

		unset($_COOKIE['w2n_token']);
		setcookie('w2n_token', '', time() - 3600);

		unset($_COOKIE['w2n_type']);
		setcookie('w2n_type', '', time() - 3600);
	}
}

/**
 * Check if there's a session started in where2night
 * If it isn't, redirect to index
 */
function w2n_session_check(){
	session_start();

	if(!isset($_SESSION['w2n_type_login']) 
		|| !($_SESSION['w2n_type_login']) == "normal" 
		|| !($_SESSION['w2n_type_login']) == "facebook"
		|| !($_SESSION['w2n_type_login']) == "googleplus"){

		 header("Location: ../");
	}
}

function w2n_session_saved(){
	return (isset($_COOKIE['w2n_id']) && isset($_COOKIE['w2n_token']) && isset($_COOKIE['w2n_type'])
		&& ($_COOKIE['w2n_id'] != "") && ($_COOKIE['w2n_token'] != "") && ($_COOKIE['w2n_type'] != ""));
}

function w2n_session_type_login(){
	session_start();

	if(isset($_SESSION['w2n_type_login'])){
		return $_SESSION['w2n_type_login'];
	}else return NULL;
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

function w2n_generate_encoded_id($id_user){
	$id_encoded = generateRandomString(4);
	$id_encoded .= encrypt($id_user);
	return $id_encoded;
}

function w2n_generate_decoded_id($id_user_encoded){
	$id_decoded = substr($id_user_encoded, 3, strlen($id_user_encoded)- 4);
	$id_decoded = decrypt($id_decoded);
	return $id_decoded;
}

?>