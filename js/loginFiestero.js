function loginFiestero(){
	var email = document.getElementById('inputEmail').value;
	var password = document.getElementById('inputPassword').value;
	if (email == ""){
		alert("Se debe introcucir un nombre de usuario");
	}else if ( password == ""){
		alert("Se debe introducir una contraseña");
	}else login(email,password);
}

function login(email2,password2){
	console.log("login");
	$.ajax({
			url: "login.php",
			dataType: "json",
			type: "POST",
			timeout: 5000,
			data: {
				email:email2,
				password: password2
			},
			
			success: redirect,
			onerror: function(e,val){
				alert("Hay error");
			}
	});
}

function redirect(){
	console.log("LOGIN");
	window.location.href="http://www.google.es";
	
}
