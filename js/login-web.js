function setCookie(cname,value){
	if(value != ""){ 
		var today = new Date();
		var the_date = new Date("December 31, 2023");
		var the_cookie_date = the_date.toGMTString();
		var the_cookie = cname+"="+ value;
		var the_cookie = the_cookie + ";expires=" + the_cookie_date;
		document.cookie=the_cookie;
	}
}

function loginFiestero(){
	var email = document.getElementById('inputEmail3').value;
	var password = document.getElementById('inputPassword3').value;
	if (email == ""){
		
		alert("Se debe introcucir un nombre de usuario");
	}else if ( password == ""){
		alert("Se debe introducir una contraseña");
	}else login(email,password);
}

function login(email2,password2){
	
		$.ajax({
			url: "../api/login.php",
			dataType: "json",
			type: "POST",
			data: {
				email:email2,
				password: password2
			},
			complete: function(r){
					var json = JSON.parse(r.responseText);
					if(json.Token!=0){
						//setCookie('email_log',email2);
			 			$.ajax({
								url: "../api/editprofile.php",
								dataType: "json",
								type: "POST",
								timeout: 5000,
								data: {
									email: email2
								},
								complete: function(r2){
									var json = JSON.parse(r2.responseText);
									var id = json.idProfile;
									var picture = json.picture;
									var name = json.name;
									var surnames = json.surnames;
									var birthdate = json.birthdate;
									var gender = json.gender;
									var music = json.music;
									var civil_state = json.civil_state;
									var city = json.city;
									var drink = json.drink;
									var about = json.about;
									//setCookie('w2n_name',name);
									//setCookie('w2n_surn',surnames);
									$.post("../framework/session_start.php",
									  {
									    type_login: 'normal',
									    id_user: id,
										picture: picture,
										name: name,
										surnames: surnames,
										birthdate: birthdate,
										gender: gender,
										music: music,
										civil_state: civil_state,
										city: city,
										drink: drink,
										about: about
									  },
									  function(data,status){
									/*	alert("Data: " + data + "\nStatus: " + status);*/
										redirectLoginFiestero();
									  });
					    		},
								onerror: function(e,val){
									alert("Contraseña y/o usuario incorrectos");
								}
						});
					} else //loginDj(email2,password2); 
						alert("Contraseña y/o usuario incorrectos");
    		},
			onerror: function(e,val){
				alert("Contraseña y/o usuario incorrectos");
			}
	});
}

/*function loginDj(email2,password2){

	$.ajax({
			url: "api/loginDJ.php",
			dataType: "json",
			type: "POST",
			data: {
				email:email2,
				password: password2
			},
			complete: function(r){
					var json = JSON.parse(r.responseText);
					if(json.Token!=0){
						//setCookie('email_log',email2);
			 			/*$.ajax({
								url: "api/editprofile.php",
								dataType: "json",
								type: "POST",
								timeout: 5000,
								data: {
									email: email2
								},
								complete: function(r2){
									var json = JSON.parse(r2.responseText);
									var id = json.idProfile;
									var picture = json.picture;
									var name = json.name;
									var surnames = json.surnames;
									var birthdate = json.birthdate;
									var gender = json.gender;
									var music = json.music;
									var civil_state = json.civil_state;
									var city = json.city;
									var drink = json.drink;
									var about = json.about;
									//setCookie('w2n_name',name);
									//setCookie('w2n_surn',surnames);
									$.post("framework/session_start.php",
									  {
									    type_login: 'normal',
									    id_user: id,
										picture: picture,
										name: name,
										surnames: surnames,
										birthdate: birthdate,
										gender: gender,
										music: music,
										civil_state: civil_state,
										city: city,
										drink: drink,
										about: about
									  },
									  function(data,status){
									/*	alert("Data: " + data + "\nStatus: " + status);*/
				//						redirectLoginDj();
									 /* });
					    		},
								onerror: function(e,val){
									alert("Contraseña y/o usuario incorrectos");
								}
						});*/
					/*} else loginLocal(email2,password2);
    		},
			onerror: function(e,val){
				alert("Contraseña y/o usuario incorrectos");
			}
	});



}*/

/*function loginLocal(email2,password2){

$.ajax({
			url: "api/loginClub.php",
			dataType: "json",
			type: "POST",
			data: {
				email:email2,
				password: password2
			},
			complete: function(r){
					var json = JSON.parse(r.responseText);
					if(json.Token!=0){
						//setCookie('email_log',email2);
			 			/*$.ajax({
								url: "api/editprofile.php",
								dataType: "json",
								type: "POST",
								timeout: 5000,
								data: {
									email: email2
								},
								complete: function(r2){
									var json = JSON.parse(r2.responseText);
									var id = json.idProfile;
									var picture = json.picture;
									var name = json.name;
									var surnames = json.surnames;
									var birthdate = json.birthdate;
									var gender = json.gender;
									var music = json.music;
									var civil_state = json.civil_state;
									var city = json.city;
									var drink = json.drink;
									var about = json.about;
									//setCookie('w2n_name',name);
									//setCookie('w2n_surn',surnames);
									$.post("framework/session_start.php",
									  {
									    type_login: 'normal',
									    id_user: id,
										picture: picture,
										name: name,
										surnames: surnames,
										birthdate: birthdate,
										gender: gender,
										music: music,
										civil_state: civil_state,
										city: city,
										drink: drink,
										about: about
									  },
									  function(data,status){
									/*	alert("Data: " + data + "\nStatus: " + status);*/
							//			redirectLoginClub();
									 /* });
					    		},
								onerror: function(e,val){
									alert("Contraseña y/o usuario incorrectos");
								}
						});*/
	/*				} else alert("Contraseña y/o usuario incorrectos");
    		},
			onerror: function(e,val){
				alert("Contraseña y/o usuario incorrectos");
			}
	});




}*/

function redirectLoginFiestero(){
	window.location.href="http://www.where2night.es/user/profile.php";		
}
/*
function redirectLoginDj(){
	window.location.href="http://www.where2night.es/dj/profile.php";		
}

function redirectLoginClub(){
	window.location.href="http://www.where2night.es/club/profile.php";		
}
*/