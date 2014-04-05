function validate() {

	var name = document.getElementById('name');
	var name_value = '#name';
	var name_valid = validField(name, name_value);
	if (name_valid == true) {

		var surname = document.getElementById('surname');
		var surname_value = '#surname';
		var surname_valid = validField(surname, surname_value);
		if (surname_valid == true) {
			var email = document.getElementById('email');
			var email_value = '#email';
			var email_valid = validField(email, email_value);

			if (email_valid == true) {
				var confirmation_email = document.getElementById('confirmation_email');
				var confirmation_email_vaule = '#confirmation_email';
				var confirmation_email_valid = validField(confirmation_email, confirmation_email_vaule);

				if (confirmation_email_valid == true) {
					var emails_valid = validEmails(email.value, confirmation_email.value, confirmation_email_vaule);

					if (emails_valid == true) {
						var password = document.getElementById('password');
						var password_value = '#password';
						var password_valid = validField(password, password_value);
						var pass_length = validate_length(password, 5);

						if (password_valid && pass_length) {
							var confirmation_password = document.getElementById('confirmation_password');
							var confirmation_password_value = '#confirmation_password';
							var confirmation_password_valid = validField(confirmation_password, confirmation_password_value);

							if (confirmation_password_valid == true) {
								var passwords_valid = validPasswords(password.value, confirmation_password.value, confirmation_password_value);
								if (passwords_valid == true) {
									var man = document.getElementById('male').checked;
									var women = document.getElementById('female').checked;
									var gender_valid = validGender(man, women);

									if (gender_valid) {
										return true;
									} else
										return false;

								}
							}
						}
					}
				}
			}

		}

	}

}

function validateForm() {

	var validateFields = validate();
	if (validateFields) {
		var validateDate = validDate();
		if (validateDate) {
			var validateTerms = validTerms();
			if (validateTerms) {
				var name = document.getElementById('name').value;
				var surname = document.getElementById('surname').value;
				var email = document.getElementById('email').value;
				var password = document.getElementById('password').value;
				var man = document.getElementById('male').checked;
				var women = document.getElementById('female').checked;
				var gender;

				if (man)
					gender = "male";
				else
					gender = "female";

				var list_day = document.getElementById("day");
				var day = list_day.options[list_day.selectedIndex].text;

				var list_month = document.getElementById("month");
				var month = list_month.options[list_month.selectedIndex].text;

				var list_year = document.getElementById("year");
				var year = list_year.options[list_year.selectedIndex].text;

				var birthday_date = day + "/" + month + "/" + year;

				$.ajax({
					url : "../develop/register/user.php",
					dataType : "json",
					type : "POST",
					data : {
						name : name,
						surnames : surname,
						pass : password,
						gender : gender,
						birthdate : birthday_date,
						email : email
					},
					complete : function(r) {
						var json = JSON.parse(r.responseText);

						if (json.Token != 0) {
							var id = json.id;
							var token = json.Token;
							var user_type = json.type;
							var login_type = 'normal';
							
							set_session_info(id, token, user_type, login_type);
						} else
							console.log("error registro");
					},
					onerror : function(e, val) {
						alert("Hay error");
					}
				});

			}
		}
	}

}

function validField(field, fieldValue) {

	if (field.validity) {
		if (field.value == "") {

			cleanPopOvers();
			$(fieldValue).popover({
				content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Campo requerido </label>',
				html : true,
				placement : 'bottom',
				trigger : 'manual'
			});

			$(fieldValue).popover('show');
			return false;
		} else if (field.value != "") {
			cleanPopOvers();
			if (field.validity.valid == false) {
				$(fieldValue).popover({
					content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Valor incorrecto </label>',
					html : true,
					placement : 'bottom',
					trigger : 'manual'
				});

				$(fieldValue).popover('show');
				return false;
			} else {
				cleanPopOvers();
				return true;
			}
		}

	}
}

function validEmails(email, confirmation_email, confirmation_email_vaule) {

	if (email == confirmation_email) {
		cleanPopOvers();
		return true;
	} else {
		
		cleanPopOvers();
		$(confirmation_email_vaule).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Introduce el mismo email en los dos campos </label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(confirmation_email_vaule).popover('show');
		return false;
	}
}

function validate_length(pass, field_length) {

	var passValue = pass.value;
	var passLength = passValue.length;
	var passVal = '#password';
	if (passLength > field_length) {
		cleanPopOvers();
		return true;
	} else {
		
		cleanPopOvers();
		$(passVal).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error">La contraseña debe contener al menos 6 caracteres </label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(passVal).popover('show');
		return false;
	}

}

function validPasswords(password, confirmation_password, confirmation_password_value) {

	if (password == confirmation_password) {
		
		cleanPopOvers();
		return true;
	} else {
		cleanPopOvers();
		$(confirmation_password_value).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Introduce la misma contraseña en los dos campos </label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(confirmation_password_value).popover('show');
		return false;
	}
}

function validGender(man, woman) {
	var gender = '#female';
	if (man || woman) {
		cleanPopOvers();
		return true;
	} else {
		cleanPopOvers();
		$(gender).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Selecciona hombre o mujer </label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(gender).popover('show');
		return false;
	}
}

function validDate() {
	var list_day = document.getElementById("day");
	var day = list_day.options[list_day.selectedIndex].text;

	var list_month = document.getElementById("month");
	var month = list_month.options[list_month.selectedIndex].text;

	var list_year = document.getElementById("year");
	var year = list_year.options[list_year.selectedIndex].text;

	var dateError = '#month';
	var bisiesto = (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? 1 : 0;

	if (bisiesto)
		var FebruaryDay = 29;
	else
		var FebruaryDay = 28;

	if (((month == 11 || month == 4 || month == 6 || month == 9) && day > 30) || (month == 2 && day > FebruaryDay) || year == "Año" || day == "Día" || month == "Mes") {
		
		cleanPopOvers();
		$(dateError).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Introduce una fecha de nacimiento válida </label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(dateError).popover('show');
		return false;
	} else {
		cleanPopOvers();
		return true;
	}

}

function validTerms() {

	var terms = document.getElementById("Terms_Conditions").checked;
	var terms_value = '#Terms_Conditions';

	if (terms) {

		$(terms_value).popover('destroy');
		return true;
	} else {
		cleanPopOvers();
		$(terms_value).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> No has aceptado los términos y condiciones </label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(terms_value).popover('show');
		return false;
	}

}


function cleanPopOvers() {
	var name_value = '#name';
	var surname_value = '#surname';
	var email_vaule = '#email';
	var confirmation_email_vaule = '#confirmation_email';
	var password_value = '#password';
	var confirmation_password_value = '#confirmation_password';
	var gender = '#female';
	var dateError = '#month';
	var terms_value = '#Terms_Conditions';

	$(name_value).popover('destroy');
	$(surname_value).popover('destroy');
	$(email_vaule).popover('destroy');
	$(confirmation_email_vaule).popover('destroy');
	$(password_value).popover('destroy');
	$(confirmation_password_value).popover('destroy');
	$(gender).popover('destroy');
	$(dateError).popover('destroy');
	$(terms_value).popover('destroy');

}

function showValidMessage() {

	$().toastmessage('showToast', {
		text : 'Registro correcto. ',
		sticky : false,
		position : 'top-center',
		type : 'success',
		closeText : '',
		close : function() {
			redirectHomeUser();
			console.log("toast is closed ...");
		}
	});

}

function showInvalidMessage() {
	$().toastmessage('showToast', {
		text : 'El registro no ha sido llevado a cabo',
		sticky : true,
		position : 'top-center',
		type : 'success',
		closeText : '',
		close : function() {
			redirectHomeLocal();
			console.log("toast is closed ...");
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

function redirectHomeUser() {
	window.location.href = "../";
}


