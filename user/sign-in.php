<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>W2N-Register User</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no" />
		<!-- Icon W2N -->
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

		<!-- Styles -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/login.css" rel="stylesheet" type="text/css">
		<link href="../css/home.css" rel="stylesheet" type="text/css">
		<link href="../css/signin-user.css" rel="stylesheet" type="text/css">
		<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >

		<!-- JavaScript -->
		<script type="text/javascript" src="../js/fillDate.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/login-facebook.js"></script>
		<script type="text/javascript" src="../js/login.js"></script>
		<script type="text/javascript" src="../js/validateFormUser.js"></script>

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

	<body background="../images/party1.jpg">
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

			</script>
		</div>

		<script type="text/javascript" src="../js/registro.js"></script>

		<!-- NavbarHeader -->
		<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000" role="banner">
			<div class="container">
				<div class="navbar-header">
					<a href="/" class="navbar-brand"><img src="../images/mainlogo.png" alt="logoWhere2Night"</a>
					</div>

					<div id="bar">
					<a id="" href="/register.php"style="margin-left:60% ;font-size:12px; color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';"><span>Registrarse</span><img src="../images/logoarrow.png" alt=""></a>
					<div id="loginContainer">
					<a id="loginButton" href=""style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';"><span>Iniciar sesión</span><img src="../images/logoarrow.png" alt=""></a>

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
					<button type="button" class="btn" onclick="loginFiestero();" style="alignment-adjust:central">Entrar</button>
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
					data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin=loginFacebook();>
					</div>
					</div>
					</div>
					</td>
					</tr>
					</fieldset>
					</form>
				</div>
			</div>

		</div><!--/.navbar-collapse -->
		</div>
		</div>
		<!-- /NavbarHeader -->

		<form id="fPrueba">
			<table   class ="table table-hover tablaC banner1"  >

				<tr >
					<td >
					<input id="name"  type="text" class="form-control" placeholder="Nombre" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
					</td>
				</tr>

				<tr>
					<td>
					<input id="surname" type="text" size="100" class="form-control" placeholder="Apellidos" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
					</td>
				</tr>

				<tr>
					<td>
					<input id="email" type="email" size="100" class="form-control" placeholder="Correo electrónico" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
					</td>
				</tr>

				<tr>
					<td>
					<input id="confirmation_email" type="email" size="100" class="form-control" placeholder="Vuelve a escribir correo electrónico" required="true" onclick="cleanPopOvers();"oninput="cleanPopOvers();" />
					</td>
				</tr>

				<tr>
					<td>
					<input id="password" type="password" size="100" class="form-control" placeholder="Contraseña" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
					</td>
				</tr>

				<tr>
					<td>
					<input id="confirmation_password" type="password" size="100" class="form-control" placeholder="Repite contraseña" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
					</td>
				</tr>

				<tr>
					<td>
					<p class="navbar-text" >
						<b class="labelTextMain"> Sexo </b>
					</p>
					<p class="navbar-text" >
						<label class="radio-inline">
							<input name="radioGroup" id="male" value="male" type="radio" onChange="cleanPopOvers();" >
							<span class="labelText" >Hombre</span> </label>
						<label class="radio-inline">
							<input name="radioGroup" id="female" value="female" type="radio" onChange="cleanPopOvers();" >
							<span class="labelText">Mujer</span> </label>
						<div id="errorGender"></div>
					</p></td>
				</tr>

				<tr>
					<td>
					<br>
					<p class="navbar-text" >
						<b class="labelTextMain"> Fecha de nacimiento </b>
					</p>
					<p class="navbar-text " >
						<select class="banner1" id="day" onchange="cleanPopOvers();">
							<option  value="0" selected="1" required="true"   >Día</option>
							<script>
								SelectOptionRange(1, 32);
							</script>
						</select>

						<select class="banner1" id="month" onchange="cleanPopOvers();">
							<option value="0" selected="1" required="true"  >Mes</option>
							<script>
								SelectOptionRange(1, 13);
							</script>
						</select>

						<select class="banner1" id="year" onchange="cleanPopOvers();">
							<option value="0" selected="1" required="true"  >Año</option>
							<script>
								SelectOptionRange(1905, 1996);
							</script>
						</select>
					</p></td>
				</tr>

				<tr>
					<td>
					<div class="checkbox">
						<label>
							<p class="navbar-text">
								<input type="checkbox" value="" id="Terms_Conditions" required="true" onChange="cleanPopOvers();">
								<b class="labelTextMain">Acepto los términos y condiciones</b>
							</p> </label>
					</div></td>

				</tr>

				<tr align="center">
					<td>
					<input name="register"  class="btn btn-transparent btnRegistro" align="middle" type="button" value="¡Regístrate!" onmouseover="javascript:this.style.color='#000';" onmouseout="javascript:this.style.color='#fff';" onclick="validateForm();"/>
					</td>
				</tr>
			</table>
		</form>
		<!-- NavbarFooter -->
		<footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav" style="background-color:#000" role="banner">
			<div class="container">
				<div class="navbar-header">
					<!-- Login  -->
					<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="/register.php" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';"
								onmouseout="javascript:this.style.color='#F59236';">¿Quienes somos?</a>
							</li>
							<li>
								<a href="/register.php" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';"
								onmouseout="javascript:this.style.color='#F59236';">Contacto</a>
							</li>

							<li>
								<a href="/register.php" style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';"
								onmouseout=	"javascript:this.style.color='#F59236';">Privacidad y Condiciones</a>
							</li>
							<li>
								<a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';"
								onmouseout="javascript:this.style.color='#F59236';"><img src="../images/alogo.png" alt=""></a>
							</li>
						</ul>
					</nav>
					<!-- /Login  -->

				</div>
			</div>
		</footer>

	</body>
</html>
