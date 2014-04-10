

function loginGmail() 
{
  var myParams = {
    'clientid' : '570715546992-af7dmspmi7unpj293p9ueumeej0bn088.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'loginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}
     
function loginCallback(result)
{
    if(result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (resp)
        {
			var name = resp['name']['givenName'];
			var surname = resp['name']['familyName'];
			var email = resp['emails'].filter(function(v) {
						return v.type === 'account'; // Filter out the primary email
						})[0].value;
            var gender = resp['gender'];
			var birthday = resp['birthday'];
			var image = resp.image.url;
			$.ajax({
		url : "../develop/login/logingp.php",
		dataType : "json",
		type : "POST",
		data : {
			name : name,
			surnames : surname,
			gender : gender,
			birthdate : birthday,
			email : email,
			picture : image

		},
		complete : function(r) {
			var json = JSON.parse(r.responseText);
			if (json.Token == 0) {
				alert("error");
			} else {
				var id = json.id;
				var token = json.Token;
				var user_type = json.type;
				var login_type = 'googleplus';

				set_session_info(id, token, user_type, login_type);
			}

		},
		onerror : function(e, val) {
			alert("Hay error");
		}
	});
        });
 
    }
 
}
function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyCaooUIWILBXp7Jv759XNdPrie-6iJVhOg');
    gapi.client.load('plus', 'v1',function(){});
}




 (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
 })();
