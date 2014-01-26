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
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/login.css" rel="stylesheet" type="text/css">
      <link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="css/carouselStyle.css" rel="stylesheet">
	<link  href="css/jquery.carousel.fullscreen.css" rel="stylesheet" >
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
 
    
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
        <!--<div class="navbar-collapse collapse" id="bs-navbar-collapse-top">-->
        <div id="bar">
            <div id="loginContainer">
              <a id="loginButton" href=""style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';"><span>Iniciar sesión</span><img src="images/logoarrow.png" alt=""></a>
                
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
                        <fieldset>
                        	<p style="color:#FFF"> Iniciar sesión usando: </p>
                               <img src="images/facebook.jpe" style="cursor:pointer;" onclick="loginFacebook();"/>
                               <img src="images/g2.png" style="cursor:pointer;" onclick="loginGoogle();" />
                              
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
				<img src="images/party4.jpg" alt="" />
                <div class="container">
                <div class="subscribe " style="position:fixed">
				<!-- Labels -->
				<span id="dj" class=" styled-button-11 btn  " onclick="registroDj();"><strong>Registro DJ</strong></span>
				<span id="fiestero" class=" styled-button-11 btn " onclick="registroFiestero();"><strong>Registro Fiestero</strong></span>
				<span id="local" class=" styled-button-11 btn" onclick="registroLocal();"><strong>Registro Local</strong></span>
				</div>	
				</div>
			</div>
			<div class="item">
				<img src="images/party2.jpg" alt="" />
                <div class="container">
				<div class="subscribe ">
				
				<span id="dj" class=" styled-button-11 btn  " onclick="registroDj();"><strong>Registro DJ</strong></span>
				<span id="fiestero" class=" styled-button-11 btn " onclick="registroFiestero();"><strong>Registro Fiestero</strong></span>
				<span id="local" class=" styled-button-11 btn" onclick="registroLocal();"><strong>Registro Local</strong></span>
				</div>	
				</div>
			</div>
            <div class="item">
				<img src="images/party3.jpg" alt="" />
                <div class="container">
				<div class="subscribe">
				
				<span id="dj" class=" styled-button-11 btn  " onclick="registroDj();"><strong>Registro DJ</strong></span>
				<span id="fiestero" class=" styled-button-11 btn " onclick="registroFiestero();"><strong>Registro Fiestero</strong></span>
				<span id="local" class=" styled-button-11 btn" onclick="registroLocal();"><strong>Registro Local</strong></span>
				</div>	
				</div>
			</div>
		</div> 
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">&lsaquo;</a>	
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">&rsaquo;</a>
		
	</div>
<!-- Importante que esten aqui-->
<script src="js/jquery-1.10.0.min.js"></script>
<script src="js/jquery.carousel.fullscreen.js"></script>
<!-- /Carousel-->
<!-- NavbarFooter -->
<footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav" style="background-color:#000;height:5%" role="banner">
	<div class="container">
    	<div class="navbar-header">
        	<!-- Iniciar sesión  -->
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
            	<a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout=		"javascript:this.style.color='#F59236';"><img src="images/alogo.png" alt=""></a>
            </li>
      		</ul>
        	</nav> 
        	<!-- /Iniciar sesión  -->
             
	 	</div>
	</div>
</footer>
<!-- /NavbarFooter --> 
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro.js"></script>
    <script type="text/javascript" src="js/loginFiestero.js"></script>
    <script type="text/javascript" src="js/loginFacebook.js"></script>
    <script type="text/javascript" src="js/connectFacebook.js"></script>
    <script type="text/javascript" src="js/loginGoogle.js"></script>
 

</body>
</html>
