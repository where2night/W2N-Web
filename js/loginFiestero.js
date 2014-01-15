function loginFiestero(){
	var userName = document.getElementById('inputEmail');
	var userPassword = document.getElementById('inputPassword');
	if (userName == ""){
		alert("Se debe introcucir un nombre de usuario");
	}else if ( userPassWord == ""){
		alert("Se debe introducir una contraseña");
	}else login();
}

function login(){
	$.ajax({
			url: "http://where2night.es/login.php",
			dataType: "json",
			type: POST,
			data: {
				userName: $('#inputEmail'),
				userPassword: $('#userPassWord')
			},
			success:  function(e,val){
				document.URL = "www.google.com";
			},
			onerror: function(e,val){
				alert("Hay error");
			}
	});
}
