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
			timeout: 5000,
			data: {
				email:email2,
				password: password2
			},
			complete: function(r){
					var json = JSON.parse(r.responseText);
       				console.log(json.Token);
					if(json.Token!=0){
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
