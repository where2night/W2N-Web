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

function login(){
	var email = document.getElementById('inputEmail3').value;
	var password = document.getElementById('inputPassword3').value;
	if (email == ""){
		alert("Se debe introcucir un nombre de usuario");
	}else if ( password == ""){
		alert("Se debe introducir una contraseña");
	}else login_connect(email,password,'user');
}

function login_connect(email2,password2){
	
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
					alert(json);
					var url1 = "../develop/update/";
					if(json.Token!=0){
						var params = "/" + json.id + "/" + json.Token + "/" + json.id;
						switch(json.type){
							case 0://User
							  url1 += "user.php";
							  $.ajax({
								url: url1,
								dataType: "json",
								type: "GET",
								timeout: 5000,
								data: params,
								complete: function(r2){
									alert('user complete 2');
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
									  	user_type: 'user',
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
										alert("Data: " + data + "\nStatus: " + status);
										window.location.href = "../user/home.php";										  
									  });
						    		},
									onerror: function(e,val){
										alert("Contraseña y/o usuario incorrectos");
									}
						});
							break;
							case 1://Club
							  url1 += "club.php";
							  $.ajax({
								url: url1,
								dataType: "json",
								type: "GET",
								timeout: 5000,
								data: params,
								complete: function(r2){
									alert('club complete 2');
									var json = JSON.parse(r2.responseText);
									var id = json.idProfile;
									var companyName = json.companyName;
									var localName = json.localName;
									var cif = json.cif;
									var poblationLocal = json.poblationLocal;
									var cpLocal = json.cpLocal;
									var telephoneLocal = json.telephoneLocal;
									var street = json.street;
									var streetName = json.streetName;
									var streetNumber = json.streetNumber;
									var music = json.music;
									var entryPrice = json.entryPrice;
									var drinkPrice = json.drinkPrice;
									var openingHours = json.openingHours;
									var closeHours = json.closeHours;
									var picture = json.picture;
									var about = json.about;
									//setCookie('w2n_name',name);
									//setCookie('w2n_surn',surnames);
									$.post("../framework/session_start.php",
									  {
									  	user_type: 'club',
									    type_login: 'normal',
									    id_user: id,
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
										about: about
									  },
									  function(data,status){
										alert("Data: " + data + "\nStatus: " + status);
										window.location.href = "../club/home.php";										  
									  });
						    		},
									onerror: function(e,val){
										alert("Contraseña y/o usuario incorrectos");
									}
						});
							break;
							case -1://DJ
							  url1 += "dj.php";
							  $.ajax({
								url: url1,
								dataType: "json",
								type: "GET",
								timeout: 5000,
								data: params,
								complete: function(r2){
									alert('DJ complete 2');
									var json = JSON.parse(r2.responseText);
									var id = json.idProfile;
									var nameDJ = json.nameDJ;
									var name = json.name;
									var surname = json.surname;
									var telephone = json.telephone;
									var gender = json.gender;
									var birthdate = json.birthdate;
									var picture = json.picture;
									var music = json.music;
									var about = json.about;
									//setCookie('w2n_name',name);
									//setCookie('w2n_surn',surnames);
									$.post("../framework/session_start.php",
									  {
									  	user_type: 'dj',
									    type_login: 'normal',
									    id_user: id,
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
										alert("Data: " + data + "\nStatus: " + status);
										window.location.href = "../dj/home.php";										  
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
						}
						//setCookie('email_log',email2);
			 			
					} else  
						alert("Contraseña y/o usuario incorrectos");
    		},
			onerror: function(e,val){
				alert("Contraseña y/o usuario incorrectos");
			}
	});
}


*/