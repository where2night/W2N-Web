
  /**
   * Global variables to hold the profile and email data.
   */
   var profile, name2,surname2, gender2, birthday2, email2,image2;

  /*
   * Triggered when the user accepts the sign in, cancels, or closes the
   * authorization dialog.
   */
  function loginFinishedCallback(authResult) {
    if (authResult) {
      if (authResult['error'] == undefined){
        //toggleElement('signin-button'); // Hide the sign-in button after successfully signing in the user.
		//window.location.href="http://www.where2night.es/perfil-fiestero.php";
        gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
      } else {
        console.log('An error occurred');
      }
    } else {
      console.log('Empty authResult');  // Something went wrong
    }
  }

  /**
   * Uses the JavaScript API to request the user's profile, which includes
   * their basic information. When the plus.profile.emails.read scope is
   * requested, the response will also include the user's primary email address
   * and any other email addresses that the user made public.
   */
  function loadProfile(){
    var request = gapi.client.plus.people.get( {'userId' : 'me'} );
    request.execute(loadProfileCallback);
  }

  /**
   * Callback for the asynchronous request to the people.get method. The profile
   * and email are set to global variables. Triggers the user's basic profile
   * to display when called.
   */
  function loadProfileCallback(obj) {
    profile = obj;
	//Get profile
	name2 = profile['name']['givenName'];
	surname2 = profile['name']['familyName'];
    email2 = obj['emails'].filter(function(v) {
        return v.type === 'account'; // Filter out the primary email
    })[0].value; // get the email from the filtered results, should always be defined.
   // displayProfile(profile);
	gender2 = profile['gender'];
	birthday2 = profile['birthday'];
	alert("email");
	alert(email2);
	image2 = profile.image.url;
		$.ajax({
								url: "api/logingp.php",
								dataType: "json",
								type: "POST",
								data: {
									name: name2,
									surnames: surname2,
									gender: gender2,
									birthdate: birthday2,
									email:email2,
									picture: image2
									
								},
								complete: function(r){
									var json = JSON.parse(r.responseText);
									if (json.Token ==0){
										alert("error");
									} else {
											redirectLoginGp();
										}
										
								},
								onerror: function(e,val){
									alert("Hay error");
								}
		});
  }
  
  function redirectLoginGp(){
	alert("Login correcto con gmail");
	window.location.href="http://www.where2night.es/perfil-fiestero.php";	
  }
  /**
   * Display the user's basic profile information from the profile object.
   */
  function displayProfile(profile){
    /*document.getElementById('name').innerHTML = profile['displayName'];
    document.getElementById('pic').innerHTML = '<img src="' + profile['image']['url'] + '" />';
    document.getElementById('email').innerHTML = email;
    toggleElement('profile');*/
	
	
	
  }

  /**
   * Utility function to show or hide elements by their IDs.
   */
  function toggleElement(id) {
    var el = document.getElementById(id);
    if (el.getAttribute('class') == 'hide') {
      el.setAttribute('class', 'show');
    } else {
      el.setAttribute('class', 'hide');
    }
  }
  
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();