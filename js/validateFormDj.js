function validate() {

	var coolnameDj = document.getElementById('coolnameDj');
	var coolnameDj_value = '#coolnameDj';
	var coolnameDj_valid = validField(coolnameDj, coolnameDj_value);

	if (coolnameDj_valid) {
		var nameDJ = document.getElementById('nameDJ');
		var nameDJ_value = '#nameDJ';
		var nameDJ_valid = validField(nameDJ, nameDJ_value);

		if (nameDJ_valid) {
			var surnameDj = document.getElementById('surnameDj');
			var surnameDj_value = '#surnameDj';
			var surnameDj_valid = validField(surnameDj, surnameDj_value);
			if (surnameDj_valid) {

				var telephoneDJ = document.getElementById('telephoneDJ');
				var telephoneDJ_value = '#telephoneDJ';
				var telephoneDJ_valid = validField(telephoneDJ, telephoneDJ_value);

				if (telephoneDJ_valid && validate_length_telephone(telephoneDJ, 9)) {

					var emailDJ = document.getElementById('emailDJ');
					var emailDJ_value = '#emailDJ';
					var emailDJ_valid = validField(emailDJ, emailDJ_value);

					if (emailDJ_valid) {
						var confirmationEmailDJ = document.getElementById('confirmationEmailDJ');
						var confirmationEmailDJ_value = '#confirmationEmailDJ';
						var confirmationEmailDJ_valid = validField(confirmationEmailDJ, confirmationEmailDJ);

						if (confirmationEmailDJ_valid == true) {
							var emails_valid = validEmails(emailDJ.value, confirmationEmailDJ.value, confirmationEmailDJ_value);

							if (emails_valid == true) {

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

function validateForm() {

	var validateFields = validate();
	if (validateFields) {
		var validateDate = validDate();
		if (validateDate) {
			var validateTerms = validTerms();
			if (validateTerms) {
				var coolnameDj = document.getElementById('coolnameDj').value;
				var nameDJ = document.getElementById('nameDJ').value;
				var surnameDj = document.getElementById('surnameDj').value;
				var telephoneDJ = document.getElementById('telephoneDJ').value;
				var emailDJ = document.getElementById('emailDJ').value;

				var man = document.getElementById('male').checked;
				var woman = document.getElementById('female').checked;
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
					url : "../develop/register/dj.php",
					dataType : "json",
					type : "POST",
					data : {
						email : emailDJ,
						nameDJ : coolnameDj,
						name : nameDJ,
						surname : surnameDj,
						telephone : telephoneDJ,
						birthdate : birthday_date,
						gender : gender

					},
					complete : function(r) {
						var json = JSON.parse(r.responseText);

						if (json.Token != 0) {
							showValidMessage();

						} else
							showInvalidMessage();
					},
					onerror : function(e, val) {
						showInvalidMessage();
					}
				});

			}
		}
	}

}

function showValidMessage() {

	$().toastmessage('showToast', {
		text : 'Registro efectuado correctamente, en breves nos pondremos en contacto contigo y te enviaremos una contraseña para que puedas hacer uso de nuestra web. ',
		sticky : false,
		position : 'top-center',
		type : 'success',
		closeText : '',
		close : function() {
			redirectHomeDj();
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
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Selecciona masculino o femenino </label>',
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

	var terms = document.getElementById("Terms_Conditions").checked
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
	var coolnameDj_vaule = '#coolnameDj';
	var nameDJ_vaule = '#nameDJ';
	var surnameDj_vaule = '#surnameDj';
	var telephoneDJ_vaule = '#telephoneDJ';
	var email_vaule = '#emailDJ';
	var confirmationEmailDJ_vaule = '#confirmationEmailDJ';
	var gender = '#female';
	var dateError = '#month';
	var terms_value = '#Terms_Conditions';

	$(coolnameDj_vaule).popover('destroy');
	$(nameDJ_vaule).popover('destroy');
	$(surnameDj_vaule).popover('destroy');
	$(telephoneDJ_vaule).popover('destroy');
	$(email_vaule).popover('destroy');
	$(confirmationEmailDJ_vaule).popover('destroy');
	$(gender).popover('destroy');
	$(dateError).popover('destroy');
	$(terms_value).popover('destroy');

}

function validate_length_telephone(telephone, field_length) {

	var telephoneValue = telephone.value;
	var telephoneLength = telephoneValue.length;
	var telephoneVal = '#telephoneDJ';
	var isNumber = (isNaN(telephoneValue));

	if (isNumber || telephoneLength != field_length) {

		cleanPopOvers();
		$(telephoneVal).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> El Teléfono debe contener 9 dígitos</label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(telephoneVal).popover('show');
		return false;

	} else {
		cleanPopOvers();
		return true;
	}

}

function redirectHomeDj() {
	window.location.href = "../";
}
