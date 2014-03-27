<?php

include_once "functions.php";

 //$_SESSION['visiting_id']: For case of visiting one user, sets wich one.
//$_SESSION['users_info']: Matrix with id and each camp from this user.

function w2n_add_user_info(){
	$_SESSION['users_info'];

	 $user_type = $_POST['user_type'];
	 $id_user = $_POST["id_user"];
	 switch ($user_type) {
	 	case 'user':
			if (isset($_POST['name'])) $_SESSION['users_info'][$id_user]['name'] = $_POST['name'];
			if (isset($_POST['surnames'])) $_SESSION['users_info'][$id_user]['surnames'] = $_POST['surnames'];
			if (isset($_POST['birthdate'])) $_SESSION['users_info'][$id_user]['birthdate'] = $_POST['birthdate']; 
			if (isset($_POST['gender'])) $_SESSION['users_info'][$id_user]['gender'] = $_POST['gender']; 
			if (isset($_POST['music'])) $_SESSION['users_info'][$id_user]['music'] = $_POST['music'];
			if (isset($_POST['civil_state'])) $_SESSION['users_info'][$id_user]['civil_state'] = $_POST['civil_state'];
			if (isset($_POST['city'])) $_SESSION['users_info'][$id_user]['city'] = $_POST['city'];
			if (isset($_POST['drink'])) $_SESSION['users_info'][$id_user]['drink'] = $_POST['drink']; 
			if (isset($_POST['about'])) $_SESSION['users_info'][$id_user]['about'] = $_POST['about']; 
			if (isset($_POST['picture'])) $_SESSION['users_info'][$id_user]['picture'] = $_POST['picture'];
		break;

	 	case 'club':
			if (isset($_POST['companyName'])) $_SESSION['users_info'][$id_user]['company_name'] = $_POST['companyName'];
			if (isset($_POST['localName'])) $_SESSION['users_info'][$id_user]['local_name'] = $_POST['localName'];
			if (isset($_POST['cif'])) $_SESSION['users_info'][$id_user]['cif'] = $_POST['cif'];
			if (isset($_POST['poblationLocal'])) $_SESSION['users_info'][$id_user]['poblation_local'] = $_POST['poblationLocal'];
			if (isset($_POST['cpLocal'])) $_SESSION['users_info'][$id_user]['cp_local'] = $_POST['cpLocal']; 
			if (isset($_POST['telephoneLocal'])) $_SESSION['users_info'][$id_user]['telephone'] = $_POST['telephoneLocal']; 
			if (isset($_POST['street'])) $_SESSION['users_info'][$id_user]['street'] = $_POST['street']; 
			if (isset($_POST['streetName'])) $_SESSION['users_info'][$id_user]['street_name'] = $_POST['streetName']; 
			if (isset($_POST['streetNumber'])) $_SESSION['users_info'][$id_user]['street_number'] = $_POST['streetNumber']; 
			if (isset($_POST['music'])) $_SESSION['users_info'][$id_user]['music'] = $_POST['music'];
			if (isset($_POST['entryPrice'])) $_SESSION['users_info'][$id_user]['entry_price'] = $_POST['entryPrice'];
			if (isset($_POST['drinkPrice'])) $_SESSION['users_info'][$id_user]['drink_price'] = $_POST['drinkPrice'];
			if (isset($_POST['openingHours'])) $_SESSION['users_info'][$id_user]['opening_hours'] = $_POST['openingHours'];
			if (isset($_POST['closeHours'])) $_SESSION['users_info'][$id_user]['close_hours'] = $_POST['closeHours']; 
			if (isset($_POST['picture'])) $_SESSION['users_info'][$id_user]['picture'] = $_POST['picture']; 
			if (isset($_POST['about'])) $_SESSION['users_info'][$id_user]['about'] = $_POST['about'];
			if (isset($_POST['latitude'])) $_SESSION['users_info'][$id_user]['latitude'] = $_POST['latitude']; 
			if (isset($_POST['longitude'])) $_SESSION['users_info'][$id_user]['longitude'] = $_POST['longitude']; 
	 	break;
	 	
	 	case 'dj':
			if (isset($_POST['nameDJ'])) $_SESSION['users_info'][$id_user]['nameDJ'] = $_POST['nameDJ'];
			if (isset($_POST['name'])) $_SESSION['users_info'][$id_user]['name'] = $_POST['name'];
			if (isset($_POST['surname'])) $_SESSION['users_info'][$id_user]['surname'] = $_POST['surname'];
			if (isset($_POST['telephone'])) $_SESSION['users_info'][$id_user]['telephone'] = $_POST['telephone'];
			if (isset($_POST['gender'])) $_SESSION['users_info'][$id_user]['gender'] = $_POST['gender'];
			if (isset($_POST['birthdate'])) $_SESSION['users_info'][$id_user]['birthdate'] = $_POST['birthdate']; 
			if (isset($_POST['picture'])) $_SESSION['users_info'][$id_user]['picture'] = $_POST['picture']; 
			if (isset($_POST['music'])) $_SESSION['users_info'][$id_user]['music'] = $_POST['music'];
			if (isset($_POST['about'])) $_SESSION['users_info'][$id_user]['about'] = $_POST['about'];
	 	break;

	 	default:
	 		//ERROR
	 	break;
	 }

}


//Get user data

function get_name_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['name'];
	}else return $_SESSION['name'];
}

function get_surname_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['surnames'];
	}else return $_SESSION['surnames'];
}

function get_birthdate_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['birthdate'];
	}else return $_SESSION['birthdate'];
}

function get_gender_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['gender'];
	}else return $_SESSION['gender'];
}

function get_music_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['music'];
	}else return $_SESSION['music'];
}

function get_civil_state_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['civil_state'];
	}else return $_SESSION['civil_state'];
}

function get_city_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['city'];
	}else return $_SESSION['city'];
}

function get_drink_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['drink'];
	}else return $_SESSION['drink'];
}

function get_about_user(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['about'];
	}else return $_SESSION['about'];
}


//Get club data

function get_company_name_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['company_name'];
	}else return $_SESSION['company_name'];
}

function get_local_name_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['local_name'];
	}else return $_SESSION['local_name'];
}

function get_cif_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['cif'];
	}else return $_SESSION['cif'];
}

function get_poblation_local_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['poblation_local'];
	}else return $_SESSION['poblation_local'];
}

function get_cp_local_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['cp_local'];
	}else return $_SESSION['cp_local'];
}

function get_telephone_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['telephone'];
	}else return $_SESSION['telephone'];
}

function get_street_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['street'];
	}else return $_SESSION['street'];
}

function get_street_name_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['street_name'];
	}else return $_SESSION['street_name'];
}

function get_street_number_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['street_number'];
	}else return $_SESSION['street_number'];
}

function get_music_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['music'];
	}else return $_SESSION['music'];
}

function get_entry_price_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['entry_price'];
	}else return $_SESSION['entry_price'];
}

function get_drink_price_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['drink_price'];
	}else return $_SESSION['drink_price'];
}

function get_opening_hours_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['opening_hours'];
	}else return $_SESSION['opening_hours'];
}

function get_close_hours_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['close_hours'];
	}else return $_SESSION['close_hours'];
}

function get_picture_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['picture'];
	}else return $_SESSION['picture'];
}

function get_about_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['about'];
	}else return $_SESSION['about'];
}

function get_latitude_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['latitude'];
	}else return $_SESSION['latitude'];
}

function get_longitude_club(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['longitude'];
	}else return $_SESSION['longitude'];
}


//Get DJ data

function get_nameDJ_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['nameDJ'];
	}else return $_SESSION['nameDJ'];
}

function get_name_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['name'];
	}else return $_SESSION['name'];
}

function get_surname_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['surname'];
	}else return $_SESSION['surname'];
}
function get_telephone_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['telephone'];
	}else return $_SESSION['telephone'];
}

function get_gender_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['gender'];
	}else return $_SESSION['gender'];
}

function get_birthdate_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['birthdate'];
	}else return $_SESSION['birthdate'];
}

function get_picture_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['picture'];
	}else return $_SESSION['picture'];
}

function get_music_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['music'];
	}else return $_SESSION['music'];
}

function get_about_dj(){
	if($_SESSION['visiting_id'] != 0){
		return $_SESSION['users_info'][$_SESSION['visiting_id']]['about'];
	}else return $_SESSION['about'];
}

///////////

function check_visit(){
	$visiting_id = $_POST['visiting_id'];
	if (isset($visiting_id)){
		$_SESSION['visiting_id'] = $visiting_id;
	}
}

?>