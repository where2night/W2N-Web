<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-Terms & Conditions</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Styles -->
      <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="css/carouselStyle.css" rel="stylesheet">
	<link href="css/jquery.carousel.fullscreen.css" rel="stylesheet" >
	<link href="css/register.css" rel="stylesheet">
	
	
	<!-- JavaScript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/login-facebook.js"></script>
	<script type="text/javascript" src="js/login-google.js"></script>
 
 
<?php

	include_once "framework/sessions.php";

	if (w2n_session_saved()){
?>

	<script type="text/javascript"> 
		set_session_info('<?php echo $_COOKIE['w2n_id'];?>', '<?php echo $_COOKIE['w2n_token'];?>', '<?php echo $_COOKIE['w2n_type'];?>');
	</script>

<?php	

	}else{

?>


    <script type="text/javascript">  

	$(document).ready(function(){ 
		  
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
			if(!($(login.target).parent('#loginButton').length > 0)) {
				button.removeClass('active');
				box.hide();
			}
		});
			
	});//end $(document).ready(function()
		
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
	 navbar-fixed-top{
			z-index:1030;
		  }
		@media (max-width: 979px){
			body{
				padding:0px;
			}
			.navbar-fixed-top {
				margin-bottom: 0px;
			}
			.navbar-fixed-top, .navbar-fixed-bottom {
				position: fixed;
			}	
			.navbar .container {
				width: auto;
				padding: 0px 20px;
			}
			.container{
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
							<fieldset>
								<p style="color:#FFF"> Iniciar sesión usando: </p>
                               <img src="images/facebook.jpe" style="cursor:pointer;" onclick="loginFacebook();"/>
                               <img src="images/g2.png" onclick="loginGmail();">
					</fieldset>					
						</form>
					</div>
				</div>
		   
			</div><!--/.navbar-collapse -->
      </div>
    </div>
	<!-- /NavbarHeader -->
	
	<div style="background-image:url(images/CollageNeon.jpg);margin-bottom:-4%">
   <div id="middle" class="container"style="margin-left:6%" >
			<div class="white"style="margin-bottom:0%">

				<header class="page-header"style="background-color:#000; border-color:#ff6b24;color:#ff6b24;margin-bottom:0%">
					<h1 style="margin-left:2%">Términos y Condiciones</h1>
				</header>
				<div style="background-color:#1B1E24;">
				<h3 style="margin-left:2%;color:#ff6b24">Privacidad</h3>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Tu privacidad es muy importante para nosotros.Recibimos diferentes tipos de información sobre ti cuando te registras en Where2Night. Te pedimos que introduzcas ciertos datos como, por ejemplo, tu nombre, dirección de correo electrónico, fecha de nacimiento y sexo. En algunos casos, es posible que puedas registrarte utilizando otro tipo de información, como dirección del los locales, C.I.F y número de teléfono.</p>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Tu información también incluye todo aquello que compartes en Where2Night, como tus actualizaciones de estado, las fotos, los eventos y listas. Podemos obtener información de tu GPS u otro tipo de información de ubicación que nos permite comunicarte si algun local está cerca de ti. </p>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Decidir hacer pública tu información significa que esta información:</p>
				<ul>
					<li style="margin-left:2%;margin-right:2%;color:#707070">puede asociarse contigo (es decir, tu nombre, fotos del perfil, fotos de portada, biografía, etc.).</li>
					<li style="margin-left:2%;margin-right:2%;color:#707070">puede mostrarse cuando alguien hace una búsqueda en Where2Night.</li>
				</ul>	
				<hr style="border-color:#ff6b24"/><!-- separator -->

				<h3 style="margin-left:2%;color:#ff6b24">Compartir el contenido y la información</h3>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Eres el propietario de todo el contenido y la información que publicas en Where2Night, y puedes controlar cómo se comparte a través de la configuración de la privacidad.</p>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Para el contenido protegido por derechos de propiedad intelectual, como fotografías y vídeos nos concedes específicamente el permiso  para utilizar cualquier contenido que publiques en Where2Night.</p>

				<hr style="border-color:#ff6b24"/><!-- separator -->

				<h3 style="margin-left:2%;color:#ff6b24">Seguridad</h3>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Hacemos todo lo posible para hacer que Where2Night sea un sitio seguro, pero no podemos garantizarlo. Necesitamos tu ayuda para que así sea, lo que implica los siguientes compromisos de tu parte:</p>
				<ul>
					<li style="margin-left:2%;margin-right:2%;color:#707070">No publicarás comunicaciones comerciales no autorizadas.</li>
					<li style="margin-left:2%;margin-right:2%;color:#707070">No recopilarás información o contenido de otros usuarios.</li>
					<li style="margin-left:2%;margin-right:2%;color:#707070">No subirás virus ni código malintencionado de ningún tipo.</li>
					<li style="margin-left:2%;margin-right:2%;color:#707070">No solicitarás información de inicio de sesión ni accederás a una cuenta perteneciente a otro usuario.</li>
					<li style="margin-left:2%;margin-right:2%;color:#707070">No publicarás contenido que contenga lenguaje ofensivo, resulte intimidatorio o pornográfico, que incite a la violencia o que contenga desnudos o violencia gráfica o injustificada.</li>
					<li style="margin-left:2%;margin-right:2%;color:#707070">No utilizarás Where2Night para actos ilícitos, engañosos, malintencionados o discriminatorios.</li>
				</ul>

				<hr style="border-color:#ff6b24"/><!-- separator -->

				<h3 style="margin-left:2%;color:#ff6b24">Seguridad de la cuenta y registro</h3>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Los usuarios de Where2Night proporcionan sus nombres e información reales y necesitamos tu colaboración para que siga siendo así. Estos son algunos de los compromisos que aceptas en relación con el registro y mantenimiento de la seguridad de tu cuenta:</p>
				<ul><li style="margin-left:2%;margin-right:2%;color:#707070">No proporcionarás información personal falsa en Where2Night, ni crearás una cuenta para otras personas sin su autorización.</li>
				<li style="margin-left:2%;margin-right:2%;color:#707070">No utilizarás Where2Night si eres menor de 18 años.</li>
				<li style="margin-left:2%;margin-right:2%;color:#707070">Si seleccionas un nombre de usuario o identificador similar para tu cuenta o página, nos reservamos el derecho a eliminarlo o reclamarlo si lo consideramos oportuno.</li>
				</ul>
				<hr style="border-color:#ff6b24"/><!-- separator -->

				<h3 style="margin-left:2%;color:#ff6b24">Protección de los derechos de otras personas</h3>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Respetamos los derechos de otras personas y esperamos que tú hagas lo mismo.</p>
				<ul><li style="margin-left:2%;margin-right:2%;color:#707070">No publicarás contenido ni realizarás ninguna acción en Where2Night que infrinja o viole los derechos de otros o que viole la ley de algún modo.</li>
				<li style="margin-left:2%;margin-right:2%;color:#707070">Podemos retirar cualquier contenido o información que publiques en Where2Night si consideramos que infringe esta Declaración o nuestras políticas.</li>
				<li style="margin-left:2%;margin-right:2%;color:#707070">Si retiramos tu contenido debido a una infracción de los derechos de autor de otra persona y consideras que ha sido un error, tendrás la posibilidad de apelar.</li>
				<li style="margin-left:2%;margin-right:2%;color:#707070">Si infringes repetidamente los derechos de propiedad intelectual de otras personas, desactivaremos tu cuenta cuando lo estimemos oportuno.</li>
				</ul>
				<hr style="border-color:#ff6b24"/><!-- separator -->

				<h3 style="margin-left:2%;color:#ff6b24">Dispositivos móviles</h3>
				<p style="margin-left:2%;margin-right:2%;color:#707070">Actualmente ofrecemos nuestro servicio de móviles de forma gratuita. Proporcionas tu consentimiento y todos los derechos necesarios para permitir que los usuarios sincronicen sus dispositivos con cualquier información que puedan ver en la página web where2night.es .</p>

				<hr style="border-color:#ff6b24"/><!-- separator -->

			

				</div>

			</div>
		</div>


</div>

   
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/login-facebook.js"></script>
    <!--<script type="text/javascript" src="js/connectFacebook.js"></script>-->
    <script type="text/javascript" src="js/loginGoogle.js"></script>
	
	<?php
	}//end else (session not saved)
	?>

</body>
</html>
