function validate() {

	var companyNameLocal = document.getElementById('companyNameLocal');
	var companyNameLocal_value = '#companyNameLocal';
	var companyNameLocal_valid = validField(companyNameLocal, companyNameLocal_value);
	if (companyNameLocal_valid) {
		var localName = document.getElementById('localName');
		var localName_value = '#localName';
		var localName_valid = validField(localName, localName_value);
		if (localName_valid) {
			var cif = document.getElementById('cif');
			var cif_value = '#cif';
			var cif_valid = validField(cif, cif_value);
			if (cif_valid) {
				var poblationLocal = document.getElementById('poblationLocal');
				var poblationLocal_value = '#poblationLocal';
				var poblationLocal_valid = validField(poblationLocal, poblationLocal_value);

				if (poblationLocal_valid) {
					var cpLocal = document.getElementById('cpLocal');
					var cpLocal_value = '#cpLocal';
					var cpLocal_valid = validField(cpLocal, cpLocal_value);

					if (cpLocal_valid && validate_length_cp(cpLocal, 5)) {
						var telephoneLocal = document.getElementById('telephoneLocal');
						var telephoneLocal_value = '#telephoneLocal';
						var telephoneLocal_valid = validField(telephoneLocal, telephoneLocal_value);

						if (telephoneLocal_valid && validate_length_telephone(telephoneLocal, 9)) {

							var email = document.getElementById('emailLocal');
							var email_value = '#emailLocal';
							var email_valid = validField(email, email_value);

							if (email_valid == true) {
								var confirmation_email = document.getElementById('confirmationEmailLocal');
								var confirmation_email_vaule = '#confirmationEmailLocal';
								var confirmation_email_valid = validField(confirmation_email, confirmation_email_vaule);

								if (confirmation_email_valid) {
									var emails_valid = validEmails(email.value, confirmation_email.value, confirmation_email_vaule);

									if (emails_valid) {
										var streetNameLocal = document.getElementById('streetNameLocal');
										var streetNameLocal_vaule = '#streetNameLocal';
										var streetNameLocal_valid = validField(streetNameLocal, streetNameLocal_vaule);

										if (streetNameLocal_valid) {
											var streetNumberLocal = document.getElementById('streetNumberLocal');
											var streetNumberLocalLocal_vaule = '#streetNumberLocal';
											var streetNumberLocal_valid = validField(streetNumberLocal, streetNumberLocalLocal_vaule);
											if (streetNumberLocal_valid && validate_number_street(streetNumberLocal)) {
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

	}
}

function validateForm() {

	var validateFields = validate();
	if (validateFields) {
		var validateTerms = validTerms();
		if (validateTerms) {
			var emailLocal = document.getElementById('emailLocal').value;
			var companyNameLocal = document.getElementById('companyNameLocal').value;
			var localName = document.getElementById('localName').value;
			var cif = document.getElementById('cif').value;
			var poblationLocal = document.getElementById('poblationLocal').value;
			var cpLocal = document.getElementById('cpLocal').value;
			var telephoneLocal = document.getElementById('telephoneLocal').value;
			var street = document.getElementById('street').value;
			var streetNameLocal = document.getElementById('streetNameLocal').value;
			var streetNumberLocal = document.getElementById('streetNumberLocal').value;
			//var street;
			/*if (street_option == 0) street = "Calle";
			 else if (street_option == 1) street = "Avd";
			 else if (street_option == 2) street = "Plaza";*/
			/*alert(emailLocal);
			 alert(companyNameLocal);
			 alert(localName);
			 alert(cif);
			 alert(poblationLocal);
			 alert(cpLocal);
			 alert(telephoneLocal);
			 alert(street);
			 alert(telephoneLocal);
			 alert(streetNameLocal);
			 alert(streetNumberLocal);
			 alert(street);*/
			$.ajax({
				url : "../develop/register/local.php",
				dataType : "json",
				type : "POST",
				data : {
					email : emailLocal,
					companyName : companyNameLocal,
					localName : localName,
					cif : cif,
					poblationLocal : poblationLocal,
					cpLocal : cpLocal,
					telephone : telephoneLocal,
					street : street,
					streetName : streetNameLocal,
					streetNumber : streetNumberLocal
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

function showValidMessage() {

	$().toastmessage('showToast', {
		text : 'Registro efectuado correctamente, en breves nos pondremos en contacto contigo y te enviaremos una contraseña para que puedas hacer uso de nuestra web. ',
		sticky : false,
		position : 'top-center',
		type : 'success',
		closeText : '',
		close : function() {
			redirectHomeLocal();
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

function validTerms() {

	var terms = document.getElementById("Terms_Conditions").checked
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

function cleanPopOvers() {
	var companyNameLocal = '#companyNameLocal';
	var localName = '#localName';
	var poblationLocal = '#poblationLocal';
	var cpLocal = '#cpLocal';
	var telephoneLocal = '#telephoneLocal';
	var email_vaule = '#emailLocal';
	var confirmation_email_vaule = '#confirmationEmailLocal';
	var streetNameLocal = '#streetNameLocal';
	var streetNumberLocal = '#streetNumberLocal';
	var cif_value = '#cif';
	var terms = '#Terms_Conditions';

	$(companyNameLocal).popover('destroy');
	$(localName).popover('destroy');
	$(poblationLocal).popover('destroy');
	$(cpLocal).popover('destroy');
	$(telephoneLocal).popover('destroy');
	$(email_vaule).popover('destroy');
	$(confirmation_email_vaule).popover('destroy');
	$(streetNameLocal).popover('destroy');
	$(streetNumberLocal).popover('destroy');
	$(cif_value).popover('destroy');
	$(terms).popover('destroy');

}

/*
 * You must get cif no spaces or dashes
 */
function validateCIF(cif) {
	//We remove the first character and the last digit
	var valueCif = cif.substr(1, cif.length - 2);

	var suma = 0;

	//We add even numbers in the string
	for ( i = 1; i < valueCif.length; i = i + 2) {
		suma = suma + parseInt(valueCif.substr(i, 1));
	}

	var suma2 = 0;

	//We add the odd numbers in the string
	for ( i = 0; i < valueCif.length; i = i + 2) {
		result = parseInt(valueCif.substr(i, 1)) * 2;
		if (String(result).length == 1) {
			//A single character
			suma2 = suma2 + parseInt(result);
		} else {

			suma2 = suma2 + parseInt(String(result).substr(0, 1)) + parseInt(String(result).substr(1, 1));
		}
	}

	// We add the two sums we have done
	suma = suma + suma2;

	var unidad = String(suma).substr(1, 1)
	unidad = 10 - parseInt(unidad);

	var primerCaracter = cif.substr(0, 1).toUpperCase();

	if (primerCaracter.match(/^[FJKNPQRSUVW]$/)) {
		if (String.fromCharCode(64 + unidad).toUpperCase() == cif.substr(cif.length - 1, 1).toUpperCase())
			return true;
	} else if (primerCaracter.match(/^[XYZ]$/)) {
		var newcif;
		if (primerCaracter == "X")
			newcif = cif.substr(1);
		else if (primerCaracter == "Y")
			newcif = "1" + cif.substr(1);
		else if (primerCaracter == "Z")
			newcif = "2" + cif.substr(1);
		return validateDNI(newcif);
	} else if (primerCaracter.match(/^[ABCDEFGHLM]$/)) {
		if (unidad == 10)
			unidad = 0;
		if (cif.substr(cif.length - 1, 1) == String(unidad))
			return true;
	} else {
		return validateDNI(cif);
	}
	return false;
}

/*
 *You must get dni no spaces or dashes. This function is called at validateCIF
 */
function validateDNI(dni) {
	var lockup = 'TRWAGMYFPDXBNJZSQVHLCKE';
	var valueDni = dni.substr(0, dni.length - 1);
	var letra = dni.substr(dni.length - 1, 1).toUpperCase();

	if (lockup.charAt(valueDni % 23) == letra)
		return true;
	return false;
}

function validate_length_cp(cp, field_length) {

	var cpValue = cp.value;
	var cpLength = cpValue.length;
	var cpVal = '#cpLocal';
	var isNumber = (isNaN(cpValue));

	if (isNumber || cpLength != field_length) {

		cleanPopOvers();
		$(cpVal).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> El CP debe contener 5 dígitos</label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(cpVal).popover('show');
		return false;

	} else {
		cleanPopOvers();
		return true;
	}

}

function validate_length_telephone(telephone, field_length) {

	var telephoneValue = telephone.value;
	var telephoneLength = telephoneValue.length;
	var telephoneVal = '#telephoneLocal';
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

function validate_number_street(number_street) {

	var number_streetValue = number_street.value;
	var number_streetLength = number_streetValue.length;
	var number_streetVal = '#streetNumberLocal';
	var isNumber = (isNaN(number_streetValue));

	if (isNumber) {

		cleanPopOvers();
		$(number_streetVal).popover({
			content : '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> El campo debe ser numérico</label>',
			html : true,
			placement : 'bottom',
			trigger : 'manual'
		});

		$(number_streetVal).popover('show');
		return false;

	} else {
		cleanPopOvers();
		return true;
	}

}

function redirectHomeLocal() {

	window.location.href = "../";
}

