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
							redirectHomeFiestero();
						} else
							alert("Registro incorrecto");
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
			//$(fieldValue).popover('destroy');

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
			//$(fieldValue).popover('destroy');
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
				//$(fieldValue).popover('destroy');
				cleanPopOvers();
				return true;
			}
		}

	}
}

function validEmails(email, confirmation_email, confirmation_email_vaule) {

	if (email == confirmation_email) {
		//$(confirmation_email_vaule).popover('destroy');
		cleanPopOvers();
		return true;
	} else {
		//$(confirmation_email_vaule).popover('destroy');
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
		//$(confirmation_email_vaule).popover('destroy');
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
		//$(confirmation_password_value).popover('destroy');
		cleanPopOvers();
		return true;
	} else {
		//$(confirmation_password_value).popover('destroy');
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
		//$(gender).popover('destroy');
		cleanPopOvers();
		return true;
	} else {
		//$(gender).popover('destroy');
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
		//Error date
		//$(dateError).popover('destroy');
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
		//$(dateError).popover('destroy');
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
		//$(terms_value).popover('destroy');
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

/*function validateName(){
 var name = document.getElementById('name');
 if (name!=""){
 cleanPopOvers();
 }
 }

 function validateSurname(){
 var surname = document.getElementById('surname');
 if (surname!=""){
 cleanPopOvers();
 }
 }

 function validateEmail(){
 var email = document.getElementById('email');
 if (email!=""){
 cleanPopOvers();
 }
 }

 function validateEmailConfirm(){
 var confirmation_email = document.getElementById('confirmation_email');
 if (confirmation_email!=""){
 cleanPopOvers();
 }
 }

 function validatePassword(){
 var password = document.getElementById('password');
 if (password!=""){
 cleanPopOvers();
 }
 }

 function validatePassword(){
 var password = document.getElementById('password');
 if (password!=""){
 cleanPopOvers();
 }
 }*/

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

function redirectHomeFiestero() {
	alert("registro efectuado correctamente!!");
	window.location.href = "../";
}

