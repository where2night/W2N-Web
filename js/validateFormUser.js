function validate() {
	   
	   var name = document.getElementById('name'); 
	   var name_value = '#name';
	   var name_valid = validField(name,name_value);
	   if (name_valid == true){
		   var surname = document.getElementById('surname');
		   var surname_value = '#surname';
		   var surname_valid = validField(surname,surname_value);
		   if (surname_valid == true){
			   var email = document.getElementById('email');
			   var email_value = '#email';   
			   var email_valid = validField(email,email_value);
			   
			   if (email_valid == true ){
					var confirmation_email = document.getElementById('confirmation_email'); 
					var confirmation_email_vaule = '#confirmation_email';
					var confirmation_email_valid = validField(confirmation_email,confirmation_email_vaule);
					
					if (confirmation_email_valid == true){
						var emails_valid = validEmails(email.value,confirmation_email.value,confirmation_email_vaule);
						
						if (emails_valid == true){
							var password = document.getElementById('password');
							var password_value = '#password';
							var password_valid = validField(password,password_value);
							var pass_length = validLengthPass(password);
							
							if (password_valid && pass_length ){
								var confirmation_password = document.getElementById('confirmation_password');
								var confirmation_password_value = '#confirmation_password';
								var confirmation_password_valid = validField(confirmation_password,confirmation_password_value);
								
								if (confirmation_password_valid == true){
									var passwords_valid = validPasswords(password.value,confirmation_password.value,confirmation_password_value);
									if (passwords_valid == true){
										var man = document.getElementById('male').checked;
										var women = document.getElementById('female').checked;
										var gender_valid = validGender(man,women);
										
										if (gender_valid){
											return true;
										}else return false;
													
									}
								}
							}
						}
					}
			   }
			   
		   }
		   
	   }
	      

}

function validateForm(){

	var validateFields = validate();
	if(validateFields){
		var validateDate = validDate();
		if (validateDate){
			var validateTerms = validTerms();
			if (validateTerms) {
				var name = document.getElementById('name').value;
				var surname = document.getElementById('surname').value;
				var email = document.getElementById('email').value;
				var password = document.getElementById('password').value;
				var man = document.getElementById('male').checked;
				var women = document.getElementById('female').checked;
				var gender;
				
				if (man) gender="male";
				else gender="female";
				
				var list_day= document.getElementById("day");
				var day = list_day.options[list_day.selectedIndex].text;

				var list_month= document.getElementById("month");
				var month = list_month.options[list_month.selectedIndex].text;

				var list_year= document.getElementById("year");
				var year = list_year.options[list_year.selectedIndex].text;
				
				var birthday_date = day+"/"+month+"/"+year;
				
				
				$.ajax({
									url: "../develop/register/user.php",
									dataType: "json",
									type: "POST",
									data: {
										name: name,
										surnames: surname,
										pass:password,
										gender: gender,
										birthdate: birthday_date,
										email:email
									},
									complete: function(r){
											var json = JSON.parse(r.responseText);
										
											if(json.Token!=0){
												redirectHomeFiestero();
											} else alert("Registro incorrecto");
									},
									onerror: function(e,val){
										alert("Hay error");
									}
							});
			
			
			}
		}
	}


}

/*function validateForm()
{
var validateFields = validate();
	if(validateFields){
	alert("validado");
var terms=document.getElementById("Terms_Conditions").checked;

if(terms){
	var man=document.getElementById("male").checked;
	var woman=document.getElementById("female").checked;

	if(man && !woman || !man&&woman){

		var email2= document.getElementById("email").value;
		var confirmationemail= document.getElementById("confirmation_email").value;
		
		if(email2==confirmationemail && email2!=""){
		
		
			var password2=document.getElementById("password").value; 
			
			var confirmationpassword=document.getElementById("confirmation_password").value;

				if(password2==confirmationpassword && password2!=""){
			
					var list_day= document.getElementById("day");
					var day = list_day.options[list_day.selectedIndex].text;

					var list_month= document.getElementById("month");
					var month = list_month.options[list_month.selectedIndex].text;

					var list_year= document.getElementById("year");
					var year = list_year.options[list_year.selectedIndex].text;
					
					var bisiesto = (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? 1 : 0;

					  if (bisiesto) var FebruaryDay=29;
					  else var FebruaryDay=28;

					 if(((month==11 || month==4 || month==6 || month==9) && day>30)||(month==2 && day>FebruaryDay)
					 	 || year=="Año" || day=="Día" || month=="Mes")
						alert("Introduce una fecha de nacimiento correcta");
					 else{
						var name2= document.getElementById("name").value;
						var surname2= document.getElementById("surname").value;
						
						var birthday_date2 = day+"/"+month+"/"+year;
				  
						if(name2!="" && surname2!=""){
							var man2;
							if(man)
								man2 = "male";
							else man2 = "female";
							$.ajax({
									url: "../develop/register/user.php",
									dataType: "json",
									type: "POST",
									data: {
										name: name2,
										surnames: surname2,
										pass:password2,
										gender: man2,
										birthdate: birthday_date2,
										email:email2
									},
									complete: function(r){
											var json = JSON.parse(r.responseText);
										
											if(json.Token!=0){
												redirectHomeFiestero();
											} else alert("Registro incorrecto");
									},
									onerror: function(e,val){
										alert("Hay error");
									}
							});
								
								//alert("Se ha enviado un correo electrónico de verificación de la cuenta creada") ;
						
						}else alert("Introduce nombre y apellidos");
						} 
							
			}else alert("Introduce la misma contraseña en los dos campos");
		} else alert("Introduce el mismo email en los dos campos");
		
	} else alert("Tienes que selecionar hombre o mujer");

} else alert("No has aceptado los terminos y condiciones");
}else alert("no valiudo");


}*/

function validField(field,fieldValue){
	
	if (field.validity) {
					if (field.value == ""){
						//$(fieldValue).popover('destroy');
						cleanPopOvers();
						$(fieldValue).popover({
									content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Campo requerido </label>',
									html: true,
									placement: 'bottom',
									trigger: 'manual'
						});
						
						$(fieldValue).popover('show');
						return false;
					} else if (field.value != "") {
							//$(fieldValue).popover('destroy');
							cleanPopOvers();
							if (field.validity.valid == false) {	
								$(fieldValue).popover({
									content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Valor incorrecto </label>',
									html: true,
									placement: 'bottom',
									trigger: 'manual'
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

function validEmails(email,confirmation_email,confirmation_email_vaule){
	
	if (email == confirmation_email){
		//$(confirmation_email_vaule).popover('destroy');
		cleanPopOvers();
		return true;
	}else{
		//$(confirmation_email_vaule).popover('destroy');
		cleanPopOvers();
		$(confirmation_email_vaule).popover({
					content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Introduce el mismo email en los dos campos </label>',
					html: true,
					placement: 'bottom',
					trigger: 'manual'
		});
		
		$(confirmation_email_vaule).popover('show');
		return false;
	}
}

function validLengthPass(pass){
	
	var passValue = pass.value;
	var passLength = passValue.length;
	var passVal = '#password';
	if (passLength > 5 ){
		alert("mayor");
		cleanPopOvers();
		return true;
	}else{
		//$(confirmation_email_vaule).popover('destroy');
		cleanPopOvers();
		$(passVal).popover({
					content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error">La contraseña debe contener al menos 6 caracteres </label>',
					html: true,
					placement: 'bottom',
					trigger: 'manual'
		});
		
		$(passVal).popover('show');
		return false;
	}
	
}

function  validPasswords(password,confirmation_password,confirmation_password_value){
	
	if (password == confirmation_password){
		//$(confirmation_password_value).popover('destroy');
		cleanPopOvers();
		return true;
	}else{
		//$(confirmation_password_value).popover('destroy');
		cleanPopOvers();
		$(confirmation_password_value).popover({
					content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Introduce la misma contraseña en los dos campos </label>',
					html: true,
					placement: 'bottom',
					trigger: 'manual'
		});
		
		$(confirmation_password_value).popover('show');
		return false;
	}
}

function validGender(man,woman){
	var gender = '#male';
	if (man || woman){
		//$(gender).popover('destroy');
		cleanPopOvers();
		return true;
	}else{
		//$(gender).popover('destroy');
		cleanPopOvers();
		$(gender).popover({
					content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Selecciona masculino o femenino </label>',
					html: true,
					placement: 'bottom',
					trigger: 'manual'
		});
		
		$(gender).popover('show');
		return false;
	}
}


function validDate(){
	var list_day= document.getElementById("day");
	var day = list_day.options[list_day.selectedIndex].text;

	var list_month= document.getElementById("month");
	var month = list_month.options[list_month.selectedIndex].text;

	var list_year= document.getElementById("year");
	var year = list_year.options[list_year.selectedIndex].text;
	
	var dateError = '#month';
	var bisiesto = (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? 1 : 0;

	if (bisiesto) var FebruaryDay=29;
	else var FebruaryDay=28;

	if(((month==11 || month==4 || month==6 || month==9) && day>30)||(month==2 && day>FebruaryDay)
		|| year=="Año" || day=="Día" || month=="Mes"){
			//Error date
			//$(dateError).popover('destroy');
			cleanPopOvers();
			$(dateError).popover({
					content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> Introduce una fecha de nacimiento válida </label>',
					html: true,
					placement: 'bottom',
					trigger: 'manual'
			});
		
			$(dateError).popover('show');
			return false;
	}else{
		//$(dateError).popover('destroy');
		cleanPopOvers();
		return true;
	}
		
	
}

function validTerms(){
	
	var terms=document.getElementById("Terms_Conditions").checked
	var terms_value = '#Terms_Conditions';
	
	if (terms) {
		
		$(terms_value).popover('destroy');
		return true;
	}else{
		//$(terms_value).popover('destroy');
		cleanPopOvers();
		$(terms_value).popover({
					content: '<label style="font-family:Adobe Hebrew; font-size:13px;"><img src="../images/error.jpe" alt="error"> No has aceptado los términos y condiciones </label>',
					html: true,
					placement: 'bottom',
					trigger: 'manual'
		});
		
		$(terms_value).popover('show');
		return false;
	}

}

function cleanPopOvers(){
	var name_value = '#name';
	var surname_value = '#surname';
	var email_vaule = '#email';
	var confirmation_email_vaule = '#confirmation_email';
	var password_value = '#password';
	var confirmation_password_value = '#confirmation_password';
	var gender = '#male';
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

function redirectHomeFiestero(){
	alert("registro efectuado correctamente!!");
	window.location.href="http://www.where2night.es";		
}

function redirectHomeLocal(){
	alert("registro efectuado correctamente, en breves nos pondremos en contacto contigo y te enviaremos una contraseña para que puedas hacer uso de nuestra web !!");
	window.location.href="http://www.where2night.es";		
}
 
 function redirectHomeDj(){
	alert("registro efectuado correctamente!!");
	window.location.href="http://www.where2night.es";		
}