 function ButtonRegister()
{

var terms=document.getElementById("Terms & Conditions").checked;

if(terms){

	var man=document.getElementById("man").checked;
	var woman=document.getElementById("woman").checked;

	if(man && !woman || !man&&woman){

		var email= document.getElementById("email").value;
		var confirmationemail= document.getElementById("confirmation email").value;
		
		
		if(email==confirmationemail && email!=""){
		
		
			var password=document.getElementById("password").value;
			var confirmationpassword=document.getElementById("confirmation password").value;

				if(password==confirmationpassword && password!=""){
			
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
                         		var name= document.getElementById("name").value;
								var surname= document.getElementById("surname").value;
					      
					         	if(name!="" && surname!=""){
					
										//parent.location.href='mailto:'+"javieralejos89@gmail.com"+'?subject='+"prueba"+'';
										//document.write('<script type="text/javascript" src="2.js"></script>');

                                  		alert("registro correcto");
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


 