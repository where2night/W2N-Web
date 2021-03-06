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

function w2n_login(){
	var email = document.getElementById('inputEmail3').value;
	var password = document.getElementById('inputPassword3').value;
	var remember = document.getElementById('checkbox').checked;
	if (email == ""){
		alert("Se debe introcucir un nombre de usuario");
	}else if ( password == ""){
		alert("Se debe introducir una contraseña");
	}else login_connect(email, password, remember);
}



function login_connect(email2, password2, remember){
		$.ajax({
			url: "../develop/login/login.php",
			dataType: "json",
			type: "POST",
			data: {
				email:email2,
				password: password2
			},
			complete: function(r){
					var json = JSON.parse(r.responseText);
					if(json.Token!=0){
						var id = json.id;
						var token = json.Token;
						var user_type = json.type;
						var login_type = 'normal';

						//Use cookies if user wants to remember his session
						if(remember){
							setCookie('w2n_id',id);
							setCookie('w2n_token',token);
							setCookie('w2n_type',type);
						}
						
						restartPlayListLogin(id,token);
						set_session_info(id, token, user_type, login_type);
						
						
			 			
					} else  
						alert("Contraseña y/o usuario incorrectos");
    		},
			onerror: function(e,val){
				alert("Contraseña y/o usuario incorrectos");
			}
	});
}

function set_session_info(id, token, user_type, login_type){
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + id;
	
	switch(user_type){
		case '0'://User
		  url1 += "user.php";
		  url1 += params;
		  $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
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
				$.post("../framework/session_start.php",
				  {
				  	user_type: 'user',
				    type_login: login_type,
				    id_user: id,
				    token: token,
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
					//alert("Data: " + data + "\nStatus: " + status);
					window.location.href = "../user/home.php";										  
				  });
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});
		break;
		case '1'://Club
		  url1 += "local.php";
		  url1 += params;
		  $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				var companyName = json.companyName;
				var localName = json.localName;
				var cif = json.cif;
				var poblationLocal = json.poblationLocal;
				var cpLocal = json.cpLocal;
				var telephoneLocal = json.telephoneLocal;
				var street = json.street;
				var streetName = json.streetNameLocal;
				var streetNumber = json.streetNumberLocal;
				var music = json.music;
				var entryPrice = json.entryPrice;
				var drinkPrice = json.drinkPrice;
				var openingHours = json.openingHours;
				var closeHours = json.closeHours;
				var picture = json.picture;
				var about = json.about;
				var latitude = json.latitude;
				var longitude = json.longitude;
				$.post("../framework/session_start.php",
				  {
				  	user_type: 'club',
				    type_login: 'normal',
				    id_user: id,
				    token: token,
					companyName: companyName,
					localName: localName,
					cif: cif,
					poblationLocal: poblationLocal,
					cpLocal: cpLocal,
					telephoneLocal: telephoneLocal,
					street: street,
					streetName: streetName,
					streetNumber: streetNumber,
					music: music,
					entryPrice: entryPrice,
					drinkPrice: drinkPrice,
					openingHours: openingHours,
					closeHours: closeHours,
					picture: picture,
					about: about,
					latitude: latitude,
					longitude: longitude
				  },
				  function(data,status){
					//alert("Data: " + data + "\nStatus: " + status);
					window.location.href = "../club/home.php";										  
				  });
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});
		break;
		case '-1'://DJ
		  url1 += "dj.php";
		  url1 += params;
		  $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				var nameDJ = json.nameDJ;
				var name = json.name;
				var surname = json.surname;
				var telephone = json.telephoneDJ;
				var gender = json.gender;
				var birthdate = json.birthdate;
				var picture = json.picture;
				var music = json.music;
				var about = json.about;
				$.post("../framework/session_start.php",
				  {
				  	user_type: 'dj',
				    type_login: 'normal',
				    id_user: id,
				    token: token,
					nameDJ: nameDJ,
					name: name,
					surname: surname,
					telephone: telephone,
					gender: gender,
					birthdate: birthdate,
					picture: picture,
					music: music,
					about: about
				  },
				  function(data,status){
					//alert("Data: " + data + "\nStatus: " + status);
					window.location.href = "../dj/home.php";										  ;
				  });
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});
		break;
		default:
		 //ERROR
		 alert('Login error');
		break;
	}
}
