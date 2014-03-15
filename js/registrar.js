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

function redirectHomeFiestero(){
/////////////////////////////CAMBIAR
	alert("registro efectuado correctamente!!");
	window.location.href="http://www.where2night.es";		
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
						
						var bisiesto = (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? 1 : 0;

                          if (bisiesto) var FebruaryDay=29;
                            else var FebruaryDay=28;

                         if(((month==11 || month==4 || month==6 || month==9) && day>30)||(month==2 && day>FebruaryDay) || year=="Año" || day=="Día" || month=="Mes")
                            alert("Introduce una fecha de nacimiento correcta");
                         else{
                         		var name= document.getElementById("NameDJ").value;
								var surname= document.getElementById("SurnameDj").value;
								var coolname= document.getElementById("CoolnameDj").value;
					      
					         	if(name!="" && surname!="" && coolname!=""){
					

                                     var telephone=document.getElementById("telephoneDJ").value;
									  if(telephone!="")
										alert("registro correcto");
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


		var email= document.getElementById("emailLocal").value;
		var confirmationemail= document.getElementById("confirmationEmailLocal").value;
		
		
		if(email==confirmationemail && email!=""){
			
			               		var nameLocal= document.getElementById("localName").value;
								var nameCompany= document.getElementById("companyNameLocal").value;
								
					         	if(nameLocal!="" && nameCompany!=""){
		

								var cif= document.getElementById("cif").value;
								  if(cif=="")alert("introduce cif");
					              else{
					
                                     var telephone=document.getElementById("telephoneLocal").value;
									  if(telephone!=""){
									 
									  var poblacion= document.getElementById("poblationLocal").value;
									  var cp=document.getElementById("cpLocal").value;
											
											if(poblacion!="" && cp!=""){
									 
													var nombrecalle= document.getElementById("nombreCalleLocal").value;
													var numerocalle=document.getElementById("numeroCalleLocal").value;
											
											        if(nombrecalle!="" && numerocalle!="")
													  alert("registro correcto"); 
													else alert ("introduce dirección");
											
											
											
											}else alert("introduce poblacion y cp")
									  
									  
									  }else alert("Introduce telefono");
									  
									  }
								}else alert("Introduce nombre local y compañia");
							
							
		} else alert("Introduce el mismo email en los dos campos");
		



} else alert("No has aceptado los terminos y condiciones");







}


 