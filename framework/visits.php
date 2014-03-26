<?php

include_once "functions.php";

/* Declare variables to save visiting info */
$visiting_id = 0; // For case of visiting one user, sets wich one.
$users_info; // Matrix with id and each camp from this user.
//$visiting_info; //Array with information of one user (the user with id= $visiting_id);

function w2n_add_user_info(){
	global $users_info;

	 $user_type = $_POST['user_type'];
	 $id_user = $_POST["id_user"];

	 switch ($user_type) {
	 	case 'user':
			$users_info[$id_user]['name'] = $_POST['name'];
			$users_info[$id_user]['surnames'] = $_POST['surnames'];
			$users_info[$id_user]['birthdate'] = $_POST['birthdate']; 
			$users_info[$id_user]['gender'] = $_POST['gender']; 
			$users_info[$id_user]['music'] = $_POST['music'];
			$users_info[$id_user]['civil_state'] = $_POST['civil_state'];
			$users_info[$id_user]['city'] = $_POST['city'];
			$users_info[$id_user]['drink'] = $_POST['drink']; 
			$users_info[$id_user]['about'] = $_POST['about']; 
			$users_info[$id_user]['picture'] = $_POST['picture'];
		break;

	 	case 'club':
			$users_info[$id_user]['company_name'] = $_POST['companyName'];
			$users_info[$id_user]['local_name'] = $_POST['localName'];
			$users_info[$id_user]['cif'] = $_POST['cif'];
			$users_info[$id_user]['poblation_local'] = $_POST['poblationLocal'];
			$users_info[$id_user]['cp_local'] = $_POST['cpLocal']; 
			$users_info[$id_user]['telephone'] = $_POST['telephoneLocal']; 
			$users_info[$id_user]['street'] = $_POST['street']; 
			$users_info[$id_user]['street_name'] = $_POST['streetName']; 
			$users_info[$id_user]['street_number'] = $_POST['streetNumber']; 
			$users_info[$id_user]['music'] = $_POST['music'];
			$users_info[$id_user]['entry_price'] = $_POST['entryPrice'];
			$users_info[$id_user]['drink_price'] = $_POST['drinkPrice'];
			$users_info[$id_user]['opening_hours'] = $_POST['openingHours'];
			$users_info[$id_user]['close_hours'] = $_POST['closeHours']; 
			$users_info[$id_user]['picture'] = $_POST['picture']; 
			$users_info[$id_user]['about'] = $_POST['about'];
			$users_info[$id_user]['latitude'] = $_POST['latitude']; 
			$users_info[$id_user]['longitude'] = $_POST['longitude']; 
	 	break;
	 	
	 	case 'dj':
			$users_info[$id_user]['nameDJ'] = $_POST['nameDJ'];
			$users_info[$id_user]['name'] = $_POST['name'];
			$users_info[$id_user]['surname'] = $_POST['surname'];
			$users_info[$id_user]['telephone'] = $_POST['telephone'];
			$users_info[$id_user]['gender'] = $_POST['gender'];
			$users_info[$id_user]['birthdate'] = $_POST['birthdate']; 
			$users_info[$id_user]['picture'] = $_POST['picture']; 
			$users_info[$id_user]['music'] = $_POST['music'];
			$users_info[$id_user]['about'] = $_POST['about'];
	 	break;

	 	default:
	 		//ERROR
	 	break;
	 }

}


//Get user data

function get_name_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['name'];
	}else return $_SESSION['name'];
}

function get_surname_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['surnames'];
	}else return $_SESSION['surnames'];
}

function get_birthdate_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['birthdate'];
	}else return $_SESSION['birthdate'];
}

function get_gender_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['gender'];
	}else return $_SESSION['gender'];
}

function get_music_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['music'];
	}else return $_SESSION['music'];
}

function get_civil_state_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['civil_state'];
	}else return $_SESSION['civil_state'];
}

function get_city_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['city'];
	}else return $_SESSION['city'];
}

function get_drink_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['drink'];
	}else return $_SESSION['drink'];
}

function get_about_user(){
	if($visiting_id != 0){
		return $users_info[$id_user]['about'];
	}else return $_SESSION['about'];
}


//Get club data

function get_company_name_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['company_name'];
	}else return $_SESSION['company_name'];
}

function get_local_name_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['local_name'];
	}else return $_SESSION['local_name'];
}

function get_cif_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['cif'];
	}else return $_SESSION['cif'];
}

function get_poblation_local_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['poblation_local'];
	}else return $_SESSION['poblation_local'];
}

function get_cp_local_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['cp_local'];
	}else return $_SESSION['cp_local'];
}

function get_telephone_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['telephone'];
	}else return $_SESSION['telephone'];
}

function get_street_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['street'];
	}else return $_SESSION['street'];
}

function get_street_name_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['street_name'];
	}else return $_SESSION['street_name'];
}

function get_street_number_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['street_number'];
	}else return $_SESSION['street_number'];
}

function get_music_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['music'];
	}else return $_SESSION['music'];
}

function get_entry_price_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['entry_price'];
	}else return $_SESSION['entry_price'];
}

function get_drink_price_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['drink_price'];
	}else return $_SESSION['drink_price'];
}

function get_opening_hours_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['opening_hours'];
	}else return $_SESSION['opening_hours'];
}

function get_close_hours_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['close_hours'];
	}else return $_SESSION['close_hours'];
}

function get_picture_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['picture'];
	}else return $_SESSION['picture'];
}

function get_about_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['about'];
	}else return $_SESSION['about'];
}

function get_latitude_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['latitude'];
	}else return $_SESSION['latitude'];
}

function get_longitude_club(){
	if($visiting_id != 0){
		return $users_info[$id_user]['longitude'];
	}else return $_SESSION['longitude'];
}


//Get DJ data

function get_nameDJ_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['nameDJ'];
	}else return $_SESSION['nameDJ'];
}

function get_name_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['name'];
	}else return $_SESSION['name'];
}

function get_surname_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['surname'];
	}else return $_SESSION['surname'];
}
function get_telephone_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['telephone'];
	}else return $_SESSION['telephone'];
}

function get_gender_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['gender'];
	}else return $_SESSION['gender'];
}

function get_birthdate_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['birthdate'];
	}else return $_SESSION['birthdate'];
}

function get_picture_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['picture'];
	}else return $_SESSION['picture'];
}

function get_music_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['music'];
	}else return $_SESSION['music'];
}

function get_about_dj(){
	if($visiting_id != 0){
		return $users_info[$id_user]['about'];
	}else return $_SESSION['about'];
}

?>