 function ButtonRegister()
{
var terms=document.getElementById("Terms & Conditions").checked;

if(terms){
	var man=document.getElementById("man").checked;
	var woman=document.getElementById("woman").checked;

	if(man && !woman || !man&&woman){

		var email2= document.getElementById("email").value;
		var confirmationemail= document.getElementById("confirmation email").value;
		
		if(email2==confirmationemail && email2!=""){
		
		
			var password2=document.getElementById("password").value; 
			
			var confirmationpassword=document.getElementById("confirmation password").value;

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
									url: "api/registerFiestero.php",
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


}



function ButtonRegisterDJ()
{

var terms=document.getElementById("Terms & Conditions").checked;

if(terms){

	var man=document.getElementById("man").checked;
	var woman=document.getElementById("woman").checked;

	if(man && !woman || !man&&woman){

		var email= document.getElementById("emailDJ").value;
		var confirmationemail= document.getElementById("confirmationEmailDJ").value;
		
		
		if(email==confirmationemail && email!=""){
			
						var list_day= document.getElementById("day");
						var day = list_day.options[list_day.selectedIndex].text;

						var list_month= document.getElementById("month");
						var month = list_month.options[list_month.selectedIndex].text;

						var list_year= document.getElementById("year");
						var year = list_year.options[list_year.selectedIndex].text;
						
						var leapYear = (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? 1 : 0;

                          if (leapYear) var FebruaryDay=29;
                            else var FebruaryDay=28;

                         if(((month==11 || month==4 || month==6 || month==9) && day>30)||(month==2 && day>FebruaryDay) || year=="Año" || day=="Día" || month=="Mes")
                            alert("Introduce una fecha de nacimiento correcta");
                         else{
                         		var name= document.getElementById("NameDJ").value;
								var surname= document.getElementById("SurnameDj").value;
								var coolname= document.getElementById("CoolnameDj").value;
					      
					         	if(name!="" && surname!="" && coolname!=""){
					

                                     var telephone=document.getElementById("telephoneDJ").value;
									  if(telephone!=""){
										var birthday_date = day+"/"+month+"/"+year;
										var gender;
										if(man)
											man2 = "male";
										else man2 = "female";
										alert("registro correcto");
										$.ajax({
												url: "registerDj.php",
												dataType: "json",
												type: "POST",
												data: {
													coolname: coolname,
													name: name,
													surname:surname,
													telephone: telephone,
													email: email,
													gender:gender,
													birthday_date:birthday_date
													
												},
												complete: function(r){
														var json = JSON.parse(r.responseText);
													
														if(json.Token!=0){
															redirectHomeDj();
														} else alert("Registro incorrecto");
												},
												onerror: function(e,val){
													alert("Hay error");
												}
										});
									  }
										
								      else alert("Introduce telefono");
									  
									  
								}else alert("Introduce nombre, apellidos y nombre artistico");
							} 
							
		} else alert("Introduce el mismo email en los dos campos");
		
	} else alert("Tienes que selecionar hombre o mujer");



} else alert("No has aceptado los terminos y condiciones");







}




function ButtonRegisterLocal()
{
 
 var terms=document.getElementById("Terms & Conditions").checked;

if(terms){


		var emailLocal= document.getElementById("emailLocal").value;
		var confirmationemail= document.getElementById("confirmationEmailLocal").value;
		
		if(emailLocal==confirmationemail && emailLocal!=""){
			
			               		var localName= document.getElementById("localName").value;
								var companyNameLocal= document.getElementById("companyNameLocal").value;
								
					         	if(localName!="" && companyNameLocal!=""){
		

								var cif= document.getElementById("cif").value;
								  if(cif=="")alert("introduce cif");
					              else{
					
                                     var telephoneLocal=document.getElementById("telephoneLocal").value;
									  if(telephoneLocal!=""){
									 
									  var poblationLocal= document.getElementById("poblationLocal").value;
									  var cpLocal=document.getElementById("cpLocal").value;
											
											if(poblationLocal!="" && cpLocal!=""){
									 
													var streetNameLocal = document.getElementById("streetNameLocal").value;
													var streetNumberLocal = document.getElementById("streetNumberLocal").value;
													var street = document.getElementById("street").value;
													
											        if(streetNameLocal!="" && streetNumberLocal!=""){
													  alert("registro correcto");
													  
													  alert(street);	  
													  $.ajax({
																	url: "registerFiestero.php",
																	dataType: "json",
																	type: "POST",
																	data: {
																		companyNameLocal: companyNameLocal,
																		localName: localName,
																		cif:cif,
																		poblationLocal: poblationLocal,
																		cpLocal: cpLocal,
																		telephoneLocal:telephoneLocal,
																		emailLocal: emailLocal,
																		street: street,
																		streetNameLocal: streetNameLocal,
																		streetNumberLocal: streetNumberLocal
																	},
																	complete: function(r){
																			var json = JSON.parse(r.responseText);
																		
																			if(json.Token!=0){
																				redirectLocal();
																			} else alert("Registro incorrecto");
																	},
																	onerror: function(e,val){
																		alert("Hay error");
																	}
																});
													 }
													else alert ("Introduce dirección");
											
											
											
											}else alert("Introduce población y cp")
									  
									  
									  }else alert("Introduce teléfono");
									  
									  }
								}else alert("Introduce nombre local y compañía");
							
							
		} else alert("Introduce el mismo email en los dos campos");
		



} else alert("No has aceptado los términos y condiciones");

}

function redirectHomeFiestero(){
/////////////////////////////CAMBIAR
	alert("registro efectuado correctamente!!");
	window.location.href="http://www.where2night.es";		
}

function redirectHomeLocal(){
/////////////////////////////CAMBIAR
	alert("registro efectuado correctamente!!");
	window.location.href="http://www.where2night.es";		
}
 
 function redirectHomeDj(){
/////////////////////////////CAMBIAR
	alert("registro efectuado correctamente!!");
	window.location.href="http://www.where2night.es";		
}
