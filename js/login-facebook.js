// Here we run a very simple test of the Graph API after login is successful.
// This testAPI() function is only called in those cases.
var photo;
function loginFacebook() {
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me/picture?type=normal', function(response) {

		photo = response.data.url;

	}); (FB.api('/me', function(response) {
			email2 = response.email;
			var firstName2 = response.first_name;
			var last_name2 = response.last_name;
			var gender2 = response.gender;
			var birthday_date2 = response.birthday;

			$.ajax({
				url : "../develop/login/loginfb.php",
				dataType : "json",
				type : "POST",
				data : {
					name : firstName2,
					surnames : last_name2,
					gender : gender2,
					birthdate : birthday_date2,
					email : email2,
					picture : photo

				},
				complete : function(r) {

					var json = JSON.parse(r.responseText);

					if (json.Token == 0) {
						alert("error");
					} else {
						var id = json.id;
						var token = json.Token;
						var user_type = json.type;
						var login_type = 'facebook';

						set_session_info(id, token, user_type, login_type);
					}

				},
				onerror : function(e, val) {
					alert("Hay error");
				}
			});
		}, {
			scope : 'email,user_photos,user_videos,user_birthday'
		}) );
}

function logOut() {

	FB.logout(function() {
		window.location.href = "http://www.where2night.es";
	});

}