<?php

	require_once ("../db.inc");
	require_once ("../utils.inc");

	if (isset($_SERVER['REQUEST_METHOD'])){
		$method = $_SERVER['REQUEST_METHOD'];
		switch ($method) {
		  case 'POST':
		  	var_dump($_POST);
			if (isset($_POST["email"]) && $_POST["email"] != ""){ 
				$email = $_POST["email"]; 

				if((isset($_POST["mobile"]) && $_POST["mobile"] == "1")){$mobile=true;}
					else {$mobile=false;}
			
				$newuser= false;
				$arr = _loginFB($email,$mobile); 
				
				
				if($arr['id'] == '0'){
					$picture = $_POST['picture'];
					$name = $_POST["name"]; 
					$surname = $_POST["surnames"]; 
					$birthdate = $_POST["birthdate"]; 
					$birthdate=_formato_fechasFB($birthdate);
					
					$gender = $_POST["gender"]; 
					$genderbool=false;
					if($gender == 'male')$genderbool= true;
					$newuser = true;
					$arr = _insertUserFB($picture,$email,$name,$surname,$birthdate,$genderbool,$mobile);
			}
			$arr['New'] = $newuser;
			echo json_encode($arr);
			
			} else echo ("falta email");
			break;		
		  default:
		//	rest_error($request);  
			break;
		}
	}

?>