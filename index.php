<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>W2N-Where2Night</title>
		<meta name="description" content="Where2Night"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no" />

		<!-- Icon W2N -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">

		<!-- Styles -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/login.css" rel="stylesheet" type="text/css">
		<link href="css/home.css" rel="stylesheet" type="text/css">
		<link href="css/bootstrap-combined.min.css" rel="stylesheet">
		<link href="css/carouselStyle.css" rel="stylesheet">
		<link href="css/jquery.carousel.fullscreen.css" rel="stylesheet" >

		<!-- JavaScript -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/registro.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/login-facebook.js"></script>
		<script type="text/javascript" src="js/loginGoogle.js"></script>

		<?php

		include_once "framework/sessions.php";

		if (w2n_session_saved()){
		?>

		<script type="text/javascript">
set_session_info('<?php echo $_COOKIE['w2n_id']; ?>', '<?php echo $_COOKIE['w2n_token']; ?>', '<?php echo $_COOKIE['w2n_type']; ?>
			');
		</script>

		<?php }else{ ?>

		<script type="text/javascript">
			$(document).ready(function() {

				var button = $('#loginButton');
				var box = $('#loginBox');
				var form = $('#loginForm');
				button.removeAttr('href');
				button.mouseup(function(login) {
					box.toggle();
					button.toggleClass('active');
				});
				form.mouseup(function() {
					return false;
				});
				$(this).mouseup(function(login) {
					if (!($(login.target).parent('#loginButton').length > 0)) {
						button.removeClass('active');
						box.hide();
					}
				});

			});
			//end $(document).ready(function()

		</script>

	</head>

	<body background="#000">
		<div class="face">
			<div id="fb-root"></div>

			<script>
				window.fbAsyncInit = function() {
					FB.init({
						appId : '424508544315541',
						status : true, // check login status
						cookie : true, // enable cookies to allow the server to access the session
						xfbml : true // parse XFBML
					});

					// Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
					// for any authentication related change, such as login, logout or session refresh. This means that
					// whenever someone who was previously logged out tries to log in again, the correct case below
					// will be handled.
					FB.Event.subscribe('auth.authResponseChange', function(response) {
						// Here we specify what we do with the response anytime this event occurs.
						if (response.status === 'connected') {
							// The response object is returned with a status field that lets the app know the current
							// login status of the person. In this case, we're handling the situation where they
							// have logged in to the app.
							testAPI();
						} else if (response.status === 'not_authorized') {
							// In this case, the person is logged into Facebook, but not into the app, so we call
							// FB.login() to prompt them to do so.
							// In real-life usage, you wouldn't want to immediately prompt someone to login
							// like this, for two reasons:
							// (1) JavaScript created popup windows are blocked by most browsers unless they
							// result from direct interaction from people using the app (such as a mouse click)
							// (2) it is a bad experience to be continually prompted to login upon page load.
							FB.login();
						} else {
							// In this case, the person is not logged into Facebook, so we call the login()
							// function to prompt them to do so. Note that at this stage there is no indication
							// of whether they are logged into the app. If they aren't then they'll see the Login
							// dialog right after they log in to Facebook.
							// The same caveats as above apply to the FB.login() call here.
							FB.login();
						}
					});
				};

				// Load the SDK asynchronously
				( function(d) {
						var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
						if (d.getElementById(id)) {
							return;
						}
						js = d.createElement('script');
						js.id = id;
						js.async = true;
						js.src = "//connect.facebook.net/es_LA/all.js";
						ref.parentNode.insertBefore(js, ref);
					}(document));

				// Here we run a very simple test of the Graph API after login is successful.
				// This testAPI() function is only called in those cases.
				function loginFacebook() {(FB.login(function(response) {
							if (response.authResponse) {
								//getUserInfo();

								FB.api('/me', function(response) {
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
											email : email2

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
								});

							} else {
								alert("Ha cancelado el login con Facebook");
								//logout();
								console.log('User cancelled login or did not fully authorize.');
							}
						}, {
							scope : 'email,user_photos,user_videos,user_birthday'
						}) );

				}

				function testAPI() {
					console.log('Welcome!  Fetching your information.... ');

				}

				function logOut() {

					FB.logout(function() {
						window.location.href = "http://www.where2night.es";
					});

				}

				
			</script>
		</div>
		<style>
			navbar-fixed-top {
				z-index:1030;
			}
			@media(max-width:979px) {
				body {
					padding:0px;
				}
				.navbar-fixed-top {
					margin-bottom:0px;
				}
				.navbar-fixed-top, .navbar-fixed-bottom {
					position:fixed;
				}
				.navbar .container {
					width:auto;
					padding:0px 20px;
				}
				.container {
					padding:0px 20px;
				}
			}
		</style>
		<!-- NavbarHeader -->
		<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000" role="banner">
			<div class="container">
				<div class="navbar-header">
					<a href="/" class="navbar-brand"><img src="images/mainlogo.png" alt="logoWhere2Night"</a>
					</div>

					<div id="bar">
					<a id="" href="/register.php"style="margin-left:60% ;font-size:12px; color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';"><span>Registrarse</span><img src="images/logoarrow.png" alt=""></a>
					<div id="loginContainer">

					<a id="loginButton" href=""style="font-size:12px;color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';"><span>Iniciar sesión</span><img src="images/logoarrow.png" alt=""></a>

					<div style="clear:both"></div>
					<div id="loginBox" style="border-bottom-color:#D41F00">
					<form id="loginForm">
					<fieldset id="body">
					<fieldset>
					<input type="email"  class="form-control" id="inputEmail3" placeholder="Correo electrónico" required="required">
					</fieldset>
					<fieldset>
					<input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
					</fieldset>
					<fieldset style="text-align:left">
					<input type="checkbox" id="checkbox" name="checkbox"/><label for="checkbox">No cerrar sesión</label>
					</fieldset>
					<button type="button" class="btn" onclick="w2n_login();" style="alignment-adjust:central">Entrar</button>
					</fieldset>
					<a href="#">¿Olvidó su contraseña?</a>
					<p style="color:#FFF"> Iniciar sesión usando: </p>
					<fieldset>
					<tr align="center" valign="top">
					<td height="30">
					<div style="width:300px; height:22px;">
					<div style=" position:relative; width:100px; height:22px; margin-left:48px; padding: 0;">
					<div id="signin-button" class="show">
					<div class="g-signin"
					data-callback="loginFinishedCallback"
					data-requestvisibleactions="http://schemas.google.com/AddActivity"
					data-approvalprompt="force"
					data-clientid="570715546992-af7dmspmi7unpj293p9ueumeej0bn088.apps.googleusercontent.com"
					data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/plus.me "
					data-height="short"
					data-cookiepolicy="single_host_origin">
				</div>
			</div>
		</div>
		</div>
		</td>

		<td height="30">
		<div style="width:300px; height:22px;">
			<div style=" position:relative;  width:100px; height:22px; margin: 0; padding: 0;">
				<div  class="fb-login-button"
				data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin=loginFacebook(); ></div>
			</div>
		</div></td>
		</tr>
		</fieldset>
		</form>
		</div>
		</div>

		</div><!--/.navbar-collapse -->
		</div>
		</div>
		<!-- /NavbarHeader -->

		<!-- Carousel -->
		<div id="carousel-example-generic" class="carousel fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<img src="images/party4.jpg"  alt="" />
				</div>
				<div class="item">
					<img src="images/party2.jpg" alt="" />
				</div>
				<div class="item">
					<img src="images/party3.jpg" alt="" />
				</div>
			</div>

		</div>
		<!-- Important that they are here -->
		<script src="js/jquery-1.10.0.min.js"></script>
		<script src="js/jquery.carousel.fullscreen.js"></script>
		<!-- /Important that they are here -->
		<!-- /Carousel-->

		<!-- NavbarFooter -->
		<footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav" style="background-color:#000;height:5%" role="banner">
			<div class="container">
				<div class="navbar-header">

					<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="/register.php" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">¿Quienes somos?</a>
							</li>
							<li>
								<a href="/register.php" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Contacto</a>
							</li>

							<li>
								<a href="/register.php" style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Privacidad y Condiciones</a>
							</li>
							<li>
								<a href="https://play.google.com/store/apps/details?id=com.where2night" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';"><img src="images/alogo.png" alt=""></a>
							</li>
							<li>
								<a href="https://docs.google.com/forms/d/1-Fnl2hJHkx_sGzmCJ0ZswYR0flyaOnS2dOS9RvvunzI/edit" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Encuesta</a>
							</li>
						</ul>
					</nav>

				</div>
			</div>
		</footer>
		<!-- /NavbarFooter -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<?php
		}//end else (session not saved)
		?>

	</body>
</html>
