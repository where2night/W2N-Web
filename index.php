<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Where2Night</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="../css/carouselStyle.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
 
    
    <script type="text/javascript">  
	////////////////////////////////////////////////////
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
		appId      : '424508544315541',
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBML
		});


		};

		// Load the SDK asynchronously
		(function(d){
		var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/es_LA/all.js";
		ref.parentNode.insertBefore(js, ref);
		}(document));

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
			  <a href="/" class="navbar-brand"><img src="../images/mainlogo.png" alt="logoWhere2Night"</a>
			</div>
        
			<div id="bar">
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
									<label for="checkbox"><input type="checkbox" id="checkbox"/>Recordar mis datos</label>
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
	
	<!-- Carousel -->
	<div id="carousel-example-generic" class="carousel fade" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<img src="../images/party4.jpg" alt="" />
                <div class="container">
                <div class="subscribe " style="position:fixed">
				<!-- Labels -->
				<span id="dj" class=" styled-button-11 btn  " onclick="registerDj();"><strong>Registro DJ</strong></span>
				<span id="fiestero" class=" styled-button-11 btn " onclick="registerPartier();"><strong>Registro Fiestero</strong></span>
				<span id="local" class=" styled-button-11 btn" onclick="registerLocal();"><strong>Registro Local</strong></span>
				</div>	
				</div>
			</div>
			<div class="item">
				<img src="../images/party2.jpg" alt="" />
                <div class="container">
				<div class="subscribe ">
				
				<span id="dj" class=" styled-button-11 btn  " onclick="registerDj();"><strong>Registro DJ</strong></span>
				<span id="fiestero" class=" styled-button-11 btn " onclick="registerPartier();"><strong>Registro Fiestero</strong></span>
				<span id="local" class=" styled-button-11 btn" onclick="registerLocal();"><strong>Registro Local</strong></span>
				</div>	
				</div>
			</div>
            <div class="item">
				<img src="../images/party3.jpg" alt="" />
                <div class="container">
				<div class="subscribe">
				
				<span id="dj" class=" styled-button-11 btn  " onclick="registerDj();"><strong>Registro DJ</strong></span>
				<span id="partier" class=" styled-button-11 btn " onclick="registerPartier();"><strong>Registro Fiestero</strong></span>
				<span id="local" class=" styled-button-11 btn" onclick="registerLocal();"><strong>Registro Local</strong></span>
				</div>	
				</div>
			</div>
		</div> 
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">&lsaquo;</a>	
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">&rsaquo;</a>
		
	</div>
	<!-- Important that they are here -->
	<script src="../js/jquery-1.10.0.min.js"></script>
	<script src="../js/jquery.carousel.fullscreen.js"></script>
	<!-- /Important that they are here -->
	<!-- /Carousel-->
	
	<!-- NavbarFooter -->
	<footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav" style="background-color:#000;height:5%" role="banner">
		<div class="container">
			<div class="navbar-header">
				
				<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav navbar-left">
				 <li>
					<a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Ayuda</a>
				</li>
				 <li>
					<a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Condiciones</a>
				</li>
		
				<li>
					<a href="" style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';">Privacidad</a>
				</li>
			   <li>
					<a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';"><img src="../images/alogo.png" alt=""></a>
				</li>
				</ul>
				</nav> 
				 
			</div>
		</div>
	</footer>
	<!-- /NavbarFooter --> 
	
	<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/registro.js"></script>
    <script type="text/javascript" src="../js/login-fiestero.js"></script>
    <script type="text/javascript" src="../js/login-facebook.js"></script>
    <!--<script type="text/javascript" src="../js/connectFacebook.js"></script>-->
    <script type="text/javascript" src="../js/loginGoogle.js"></script>

</body>
</html>
