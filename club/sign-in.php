<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>W2N-Register Club</title>
		<meta name="description" content="Where2Night"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no" />
		<!-- Icon W2N -->
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
		<!-- Bootstrap Styles-->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/login.css" rel="stylesheet" type="text/css">
		<link href="../css/home.css" rel="stylesheet" type="text/css">
		<link href="../css/signin-club.css" rel="stylesheet" type="text/css">
		<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
		<!-- JavaScript -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/login-facebook.js"></script>
		<script type="text/javascript" src="../js/login.js"></script>
		<script type="text/javascript" src="../js/validateFormLocal.js"></script>
		<script type="text/javascript" src="../js/fillDate.js"></script>
		<script src="../js/jquery.toastmessage.js" type="text/javascript"></script>
		<link href="../css/jquery.toastmessage.css" rel="stylesheet" type="text/css" />

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

	<body>
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

		<!-- NavbarHeader -->
		<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000" role="banner">
			<div class="container">
				<div class="navbar-header">
					<a href="/" class="navbar-brand"><img src="../images/mainlogo.png" alt="logoWhere2Night"></a>
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
										<input type="checkbox" id="checkbox" name="checkbox"/>
										<label for="checkbox">No cerrar sesión</label>

									</fieldset>
									<button type="button" class="btn" onclick="w2n_login();" style="alignment-adjust:central">
										Entrar
									</button>
								</fieldset>
								<a href="#">¿Olvidó su contraseña?</a>
								<p style="color:#FFF">
									Iniciar sesión usando:
								</p>
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
													data-cookiepolicy="single_host_origin"></div>
												</div>
											</div>
										</div></td>

										<td height="30">
										<div style="width:300px; height:22px;">
											<div style=" position:relative;  width:100px; height:22px; margin: 0; padding: 0;">
												<div  class="fb-login-button"
												data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin=loginFacebook();></div>
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
		<!-- Log data -->
		<div align="center">
		<table   class ="table table-hover tablaC banner1"  >

			<tr >
				<td >
				<input id="companyNameLocal"  type="text" class="form-control" placeholder="Nombre de la empresa" required onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
				</td>
			</tr>

			<tr>
				<td>
				<input id="localName" type="text"  class="form-control" placeholder="Nombre del local" required onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
				</td>
			</tr>

			<tr>
				<td>
				<input id="cif" type="text"  class="form-control" placeholder="CIF" required onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
				</td>
			</tr>

			<tr>
				<td>
				<input id="poblationLocal" type="text" class="form-control" placeholder="Población" required onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
				</td>
			</tr>

			<tr>
				<td>
				<input id="cpLocal" type="text" class="form-control" placeholder="CP" required onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
				</td>
			</tr>

			<tr>
				<td>
				<input id="telephoneLocal" type="text" class="form-control" placeholder="Teléfono" required onclick="cleanPopOvers();" oninput="cleanPopOvers();"/>
				</td>
			</tr>

			<tr>
				<td>
				<input id="emailLocal" type="email" class="form-control" placeholder="Correo electrónico" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
				</td>
			</tr>

			<tr>
				<td>
				<input id="confirmationEmailLocal" type="email" size="100" class="form-control" placeholder="Confirmación correo electrónico" required="true" onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
				</td>
			</tr>

			<tr>
				<td>
				<p class="navbar-text">
					<b class="labelTextMain"> Dirección </b>
				</p>
				<p class="navbar-text">
					<select id="street" class="banner1" required onchange="cleanPopOvers();">
						<option class="banner1" value="0" selected="1">Calle</option>
						<option class="banner1" value="1" >Avd.</option>
						<option class="banner1" value="2" >Plaza</option>
					</select>
				<p class="navbar-text " style="width:250px;" >
					
					<input id="streetNameLocal"      type="text" class="form-control" placeholder="Nombre" required onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
					
				</p>
				<p class="navbar-text " style="width:80px;">
					<input id="streetNumberLocal"   type="text" class="form-control" placeholder="Número" required onclick="cleanPopOvers();" oninput="cleanPopOvers();" />
				</p>
				 </p> </td>

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
					<input name="registerDJ"  class="btn btn-transparent btnRegistro" type="button" value="Enviar solicitud" onmouseover="javascript:this.style.color='#000';" onmouseout="javascript:this.style.color='#fff';" onclick="validateForm()"/>
				</td>
			</tr>
		</table>
		</div>
		<!-- /Log data -->

		<!-- NavbarFooter -->
		<footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav" style="background-color:#000" role="banner">
			<div class="container">
				<div class="navbar-header">
					<!-- Iniciar sesión  -->
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
								<a href="https://play.google.com/store/apps/details?id=com.where2night" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';"><img src="../images/alogo.png" alt=""></a>
							</li>
							<li>
								<a href="https://docs.google.com/forms/d/1-Fnl2hJHkx_sGzmCJ0ZswYR0flyaOnS2dOS9RvvunzI/edit" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Encuesta</a>
							</li>
						</ul>
					</nav>

				</div>
			</div>
		</footer>

	</body>
</html>
