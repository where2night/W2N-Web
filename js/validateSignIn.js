
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
										/*alert("pasa x registro ");
										alert(email);
										alert(coolname);
										alert(name);
										alert(surname);
										alert(telephone);
										alert(birthday_date);
										alert(man2);
										alert("AJAX");*/
										$.ajax({
												url: "../develop/register/dj.php",
												dataType: "json",
												type: "POST",
												data: {
													email: email,
													nameDJ: coolname,
													name: name,
													surname:surname,
													telephone: telephone,
													birthdate:birthday_date,
													gender:man2
													
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
								/*alert(emailLocal);
								alert(companyNameLocal);
								alert(localName);
								alert(cif);
								alert(poblationLocal);
								alert(cpLocal);
								alert(telephoneLocal);
								alert(street);
								alert(streetNameLocal);
								alert(streetNumberLocal);*/
							  $.ajax({
											url: "../develop/register/local.php",
											dataType: "json",
											type: "POST",
											data: {
												email: emailLocal,
												companyName: companyNameLocal,
												localName: localName,
												cif:cif,
												poblationLocal: poblationLocal,
												cpLocal: cpLocal,
												telephone:telephoneLocal,
												street: street,
												streetName: streetNameLocal,
												streetNumber: streetNumberLocal
											},
											complete: function(r){
													var json = JSON.parse(r.responseText);
													
													if(json.Token!=0){
														redirectHomeLocal();
													} else alert("Registro incorrecto");
											},
											onerror: function(e,val){
												alert("Hay error");
											}
										});
							 }else alert ("Introduce dirección");					
						}else alert("Introduce población y cp")		  
				  }else alert("Introduce teléfono");
				  
				  }
			}else alert("Introduce nombre local y compañía");
		} else alert("Introduce el mismo email en los dos campos");	
	} else alert("No has aceptado los términos y condiciones");					
	
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

/*
 * You must get cif no spaces or dashes
 */
function validateCIF(cif)
{
	//We remove the first character and the last digit
	var valueCif=cif.substr(1,cif.length-2);

	var suma=0;

	//We add even numbers in the string
	for(i=1;i<valueCif.length;i=i+2)
	{
		suma=suma+parseInt(valueCif.substr(i,1));
	}

	var suma2=0;

	//We add the odd numbers in the string
	for(i=0;i<valueCif.length;i=i+2)
	{
		result=parseInt(valueCif.substr(i,1))*2;
		if(String(result).length==1)
		{
			//A single character
			suma2=suma2+parseInt(result);
		}else{
			
			suma2=suma2+parseInt(String(result).substr(0,1))+parseInt(String(result).substr(1,1));
		}
	}

	// We add the two sums we have done
	suma=suma+suma2;

	var unidad=String(suma).substr(1,1)
	unidad=10-parseInt(unidad);

	var primerCaracter=cif.substr(0,1).toUpperCase();

	if(primerCaracter.match(/^[FJKNPQRSUVW]$/))
	{
		if(String.fromCharCode(64+unidad).toUpperCase()==cif.substr(cif.length-1,1).toUpperCase())
			return true;
	}else if(primerCaracter.match(/^[XYZ]$/)){
		var newcif;
		if(primerCaracter=="X")
			newcif=cif.substr(1);
		else if(primerCaracter=="Y")
			newcif="1"+cif.substr(1);
		else if(primerCaracter=="Z")
			newcif="2"+cif.substr(1);
		return validateDNI(newcif);
	}else if(primerCaracter.match(/^[ABCDEFGHLM]$/)){
		if(unidad==10)
			unidad=0;
		if(cif.substr(cif.length-1,1)==String(unidad))
			return true;
	}else{
		return validateDNI(cif);
	}
	return false;
}

/*
 *You must get dni no spaces or dashes. This function is called at validateCIF
 */
function validateDNI(dni)
{
	var lockup = 'TRWAGMYFPDXBNJZSQVHLCKE';
	var valueDni=dni.substr(0,dni.length-1);
	var letra=dni.substr(dni.length-1,1).toUpperCase();

	if(lockup.charAt(valueDni % 23)==letra)
		return true;
	return false;
}

