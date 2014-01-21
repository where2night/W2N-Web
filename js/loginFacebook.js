   
 var email2;
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '424508544315541', // Set YOUR APP ID
      //channelUrl : 'http://www.where2night.es', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true// parse XFBML
     
    });
 
    FB.Event.subscribe('auth.authResponseChange', function(response) 
    {
     if (response.status === 'connected') 
    {
        //document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
        //SUCCESS
		//testAPI();
 
    }    
    else if (response.status === 'not_authorized') 
    {
        //document.getElementById("message").innerHTML +=  "<br>Failed to Connect";
  		//FB.login();
        //FAILED
    } else 
    {
      //  document.getElementById("message").innerHTML +=  "<br>Logged Out";
 		//FB.login();
        //UNKNOWN ERROR
    }
    }); 
 
    };
 
    function loginFacebook()
    {
 		
         (FB.login(function(response) {
           if (response.authResponse) 
           {
               //getUserInfo();
				
				FB.api('/me', function(response) {
					email2 = response.email;
					//alert(email2);
					var firstName2 = response.first_name;
					//alert(firstName2);
					var last_name2 = response.last_name;
					//alert(last_name2);
					var gender2 = response.gender;
					//alert(sex2);
					var birthday_date2 = response.birthday;
					//alert(birthday_date2);
					$.ajax({
								url: "loginfb.php",
								dataType: "json",
								type: "POST",
								data: {
									name: firstName2,
									surnames: last_name2,
									gender: gender2,
									birthdate: birthday_date2,
									email:email2
									
								},
								complete: function(r){
									var json = JSON.parse(r.responseText);
									if (json.Token ==0){
											alert("error");
									} else {
											alert("Inicio de sesion correcto");
											redirectLoginFb();
										}
										
								},
								onerror: function(e,val){
									alert("Hay error");
								}
					});
			});
				

				
		 } else 
			{
			 alert("Ha cancelado el login con Facebook");
			 Logout();
			 console.log('User cancelled login or did not fully authorize.');
			}
         },{scope: 'email,user_photos,user_videos,user_birthday'}) );
		 
		 

 
    }
	
  function redirectLoginFb(){
	window.location.href="http://www.where2night.es/perfilFiestero.html";	
	//document.getElementById("logFb").innerHTML=email2;
  }
 
  function getUserInfo() {
	window.fbAsyncInit = function() {
		FB.init({
		  appId      : '424508544315541', // Set YOUR APP ID
		  //channelUrl : 'http://www.where2night.es', // Channel File
		  status     : true, // check login status
		  cookie     : true, // enable cookies to allow the server to access the session
		  xfbml      : true// parse XFBML
		 
		});
        FB.api('/me', function(response) {
 		  	var str="<b>Name</b> : "+response.first_name+"<br>";
		  
			 // str +="<b>Link: </b>"+response.link+"<br>";
			  //str +="<b>Username:</b> "+response.username+"<br>";
			  //str +="<b>id: </b>"+response.id+"<br>";
			  str +="<b>Email:</b> "+response.email+"<br>";
			  //str +="<input type='button' value='Get Photo' onclick='getPhoto();'/>";
			  //str +="<input type='button' value='Logout' onclick='Logout();'/>";
			  document.getElementById("status").innerHTML=str;
 
    	});
	};
  }
	
    function getPhoto()
    {
      FB.api('/me/picture?type=normal', function(response) {
 
          var str="<br/><b>Pic</b> : <img src='"+response.data.url+"'/>";
          document.getElementById("status").innerHTML+=str;
 
    });
 
    }
    function logOut()
    {
		
		FB.logout(function(){window.location.href="http://www.where2night.es";});

    }
	

 
  // Load the SDK asynchronously

(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));
  
