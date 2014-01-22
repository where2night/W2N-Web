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

function loginFiestero(){
	var email = document.getElementById('inputEmail3').value;
	var password = document.getElementById('inputPassword3').value;
	if (email == ""){
		
		alert("Se debe introcucir un nombre de usuario");
	}else if ( password == ""){
		alert("Se debe introducir una contraseña");
	}else login(email,password);
}

function login(email2,password2){
	
	 console.log($.ajax({
			url: "login.php",
			dataType: "json",
			type: "POST",
			data: {
				email:email2,
				password: password2
			},
			complete: function(r){
					var json = JSON.parse(r.responseText);
					if(json.Token!=0){
						setCookie('email_log',email2);
			 			$.ajax({
								url: "editprofile.php",
								dataType: "json",
								type: "POST",
								timeout: 5000,
								data: {
									email: email2
								},
								complete: function(r2){
									var json = JSON.parse(r2.responseText);
									var name = json.name;
									var surnames = json.surnames;
									setCookie('w2n_name',name);
									setCookie('w2n_surn',surnames);
					    		},
								onerror: function(e,val){
									alert("Hay error");
								}
						});
						redirectLoginFiestero();
					} else alert("Login no efectuado correctamente");
    		},
			onerror: function(e,val){
				alert("Hay error");
			}
	}));
}
function redirectLoginFiestero(){
	window.location.href="http://www.where2night.es/homeFiestero.html";		
}
