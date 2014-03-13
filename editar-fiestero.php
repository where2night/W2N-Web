<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Inicio Fiestero</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="css/custom.css" rel="stylesheet" media="screen">
  	<link href="css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="css/inicio-fiestero.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="css/responsive.css" type="text/css" /><!-- Responsive -->	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

	<script type="text/javascript">  
    $(document).ready(function(){ 
      
      $("#close_session").on("click", function (event) {
        $.post("framework/session_end.php",
          {},
          function(data,status){
          var url = "http://www.where2night.es";
          $(location).attr('href',url);
          });
      });
            
      $("#change-data").on("click", function (event) {
        
          //var email = $.cookie("email_log");
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var name = $('#name').val();
            var surnames = $('#surname').val();
            var day = $('#day').val();
            if (day.length < 2){
              day = "0"+day;
            } 
            var month = $('#month').val();
            if (month.length < 2){
              month = "0"+day;
            }
            var year = $('#year').val();
            var birthdate = day+"/"+month+"/"+year;
            var gender = $("input[type='radio']:checked").val();
            var music = $('#favourite-music').val();
            var civil_state = $('#marital-status').val();
            var city = $('#city').val();
            var drink = $('#favourite-drink').val();
            var about = $('#about-you').val();
        
         console.log($.ajax({
            url: "editprofile.php",
            dataType: "json",
            type: "POST",
            timeout: 5000,
            data: {
              idProfile:idProfile,
              name:name,
              surnames: surnames,
              birthdate: birthdate,
              gender: gender,
              music: music,
              civil_state: civil_state,
              city: city,
              drink: drink,
              about: about
            },
            complete: function(r){
              $.post("framework/session_start.php",
                    {
                      type_login: 'normal',
                      id_user: idProfile,
                    name: name,
                    surnames: surnames,
                    birthdate: birthdate,
                    gender: gender,
                    music: music,
                    civil_state: civil_state,
                    city: city,
                    drink: drink,
                    about: about
                    },
                    function(data,status){
                      window.location.href="http://www.where2night.es/inicio-fiestero.php";
                    });
                
              },
            onerror: function(e,val){
              alert("Hay error");
            }
        }));
      });
      
    });//end $(document).ready(function()
    
    
    </script>

</head>

<body>
	<style>  
		body{
			  background-color: #000;
		}
		navbar-fixed-top{
				z-index:1030;
		}
		@media (max-width: 979px){

				.navbar-fixed-top {
					margin-bottom: 0px;
				}
				.navbar-fixed-top, .navbar-fixed-bottom {
					position: fixed;
				}	
				.navbar .container {
					width: auto;
					padding: 0px 20px;
					color:#000;
				}
				.container{
					padding:0px 20px;
				}
		}		
    </style>
	<!-- NavbarHeader -->
	<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000;height:5%" role="banner">
		<div class="container">
			<div class="navbar-header">
				<a href="/" class="navbar-brand"><img src="images/mainlogo.png" alt="logoWhere2Night"</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
					<span class="sr-only">Toggle Side Navigation</span>
					<i class="icon-th-list"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
					<span class="sr-only">Toggle Top Navigation</span>
					<i class="icon-align-justify"></i>
				</button>
			</div>  
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-collapse-top">
				<div class="navbar-right">
					<ul class="nav navbar-nav navbar-left">
						<a href="http://www.where2night.es/inicio-fiestero.php" style="font-size:12px ;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';"><strong>Inicio</strong>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-home" style="color:#FF6B24; margin-top:15px"></i></a>
						<li>
							<a href= class="dropdown-toggle" data-toggle="dropdown"></a>	
						</li>
					</ul>
			
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
						  <input type="text" class="search-query animated" placeholder="Buscar" style="margin-top:-1px" >
						<i class="glyphicon glyphicon-search" style="color:#FF6B24; margin-top:0px"></i>
						</div>
					</form>

					<ul class="nav navbar-nav navbar-left">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle dropdown-avatar" data-toggle="dropdown">
								<span>
									<img class="menu-avatar" src="images/profile.jpg" /> <span onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';">
									<?php 
										echo $_SESSION['name']." ".$_SESSION['surnames'];
									?>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-cog"style="color:#FF6B24"></i></span>
								</span>
							</a>
							<ul class="dropdown-menu">


								<li class="with-image">
								  <div class="avatar">
									<img src="images/profile.jpg" />
								  </div>
								  <span>
									 <?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
								  </span>
								</li>

								<li class="divider"></li>

								<li><a href="http://www.where2night.es/perfil-fiestero.php" ><i class="glyphicon glyphicon-user"style="color:#FF6B24"></i> <span>Perfil</span></a></li>
								<li><a href="http://www.where2night.es/editar-fiestero.php"><i class="glyphicon glyphicon-edit"style="color:#FF6B24"></i> <span>Editar Perfil</span></a></li>
								<li><a href="#"><i class="glyphicon glyphicon-wrench"style="color:#FF6B24"></i> <span>Configuración</span></a></li>
								<!-- <li><a href="#" onclick="logOut();"><i class="glyphicon glyphicon-off"></i> <span>Cerrar Sesión</span></a></li>-->
								<li id="close_session"><i class="glyphicon glyphicon-off"></i> <span>Cerrar Sesión</span></li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-collapse -->
		</div>
	</div>
	<!-- /NavbarHeader -->
	
	<!-- SideBar -->
	<div class="sidebar-background">
	  <div class="primary-sidebar-background"></div>
	</div>
	<div class="primary-sidebar">
		<ul class="nav navbar-collapse collapse navbar-collapse-primary">	   
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="images/profile.jpg" /></i>
					<span>Mi Perfil</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="images/party3.jpg" /></i>
					<span>Eventos</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="images/party2.jpg" /></i>
					<span>Fotos</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="images/party4.jpg" /></i>
					<span>Amigos</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="images/party2.jpg" /></i>
					<span>Locales</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="images/party3.jpg" /></i>
					<span>DJ's</span>
				</a>
			</li> 
			<li class="">
				<span class="glow"></span>
				<a class="accordion-toggle collapsed " data-toggle="collapse" href="#tnnmk7rjLZ">
					<i class=""><img class="menu-avatar" src="images/party2.jpg" /></i>
					<span>
						Configuración&nbsp;&nbsp;&nbsp;
						<i class="glyphicon glyphicon-circle-arrow-down"></i>
					</span>
				</a>
				<ul id="tnnmk7rjLZ" class="collapse "> 
					<a href="" style="font-size:12px ;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';" >
						<i class="glyphicon glyphicon-edit" style="color:#FF6B24"></i> Editar Perfil
					</a>
					<br>
					<a href="" style="font-size:12px ;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';">
						<i class="glyphicon glyphicon-lock"style="color:#FF6B24"></i> Privacidad
					</a>	
				</ul>
			</li>
			<img src="images/logo3_opt.png" />
	</div>
	<!-- /SideBar -->
	
	<!-- My Profile -->
	<div class="main-content" style="background-image:url(images/wall.jpg); max-height:2000px; margin-bottom:-50px;" > 
		<div class="wrapper">
			<div class="container">
				<div align= "center">
					<form class="form-horizontal" role="form" id="edit-profile">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" >
							</div>
						</div>
					  
						<div class="form-group">
							<label for="surname" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Apellidos: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="surname" value="<?php echo $_SESSION['surnames']; ?>">
							</div>
						</div>

						<?php
						 $birth_array = explode ('/',$_SESSION['birthdate']);
						 $day = $birth_array[0];
						 $month = $birth_array[1];
						 $year = $birth_array[2];
						?>
				  
						<div class="form-group">
							<label class="col-sm-2 control-label" style="color: #FFFFCC"><b>Fecha de nacimiento: </b></label>
							<div class="col-sm-2">
							  <select id="day" class="form-control">
								  <option value="0">Día</option>
								  <?php 
									for ($i=1; $i<32; $i++){
									  if ($i == $day) {
										echo "<option value=".$i." selected=\"selected\">".$i."</option>";
									  }else{
										echo "<option value=".$i.">".$i."</option>";
									  }
									} 
								  ?>  
								</select>
							</div>
							  
							<div class="col-sm-2">
								<select id="month" class="form-control">
								  <option value="0">Mes</option>
									<?php  
									for ($i=1; $i<13; $i++){
									  if ($i == $month) {
										echo "<option value=".$i." selected=\"selected\">".$i."</option>";
									  }else{
										echo "<option value=".$i.">".$i."</option>";
									  }
									} 
								  ?>
								  </select>
							</div>
							  
							<div class="col-sm-2">
								<select id="year" class="form-control">
								  <option value="0">Año</option>
									<?php 
									for ($i=1905; $i<2013; $i++){
									  if ($i == $day) {
										echo "<option value=".$i." selected=\"selected\">".$i."</option>";
									  }else{
										echo "<option value=".$i.">".$i."</option>";
									  }
									} 
								  ?>    
								</select>
							</div>
						</div>
				  
						<div class="form-group">
							<label  class="col-sm-2 control-label" style="color: #FFFFCC"><b>Sexo: </b></label>
							<div class="col-sm-8">
								<label class="radio-inline">
								  <input name="radioGroup" id="radio1" value="male" type="radio" <?php if ($_SESSION['gender']=="male") echo "selected=selected" ?>><span style="color: #FFFFCC">Hombre</span>
								</label>
								<label class="radio-inline">
								  <input name="radioGroup" id="radio2" value="female" type="radio" <?php if ($_SESSION['gender']=="female") echo "selected=selected" ?>><span style="color: #FFFFCC">Mujer</span>
								</label>
							</div>
						</div>
				  
						<div class="form-group">
							<label for="favourite-music" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Música favorita: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="favourite-music" name="favourite-music" value="<?php echo $_SESSION['music']; ?>">
							</div>
						</div>
				  
						<div class="form-group">
							<label for="favourite-drink" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Bebida favorita: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="favourite-drink" name="favourite-drink" value="<?php echo $_SESSION['drink']; ?>">
							</div>
						</div>
				  
						<div class="form-group">
							<label for="marital-status" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Estado civil: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="marital-status" value="<?php echo $_SESSION['civil_state']; ?>">
							</div>
						</div>
						  
						<div class="form-group">
							<label for="city" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Ciudad actual: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="city" name="city" value="<?php echo $_SESSION['city']; ?>">
							</div>
						</div>
						  
						<div class="form-group">
							<label for="about-you" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Acerca de ti: </b></label>
							<div class="col-sm-8">
							  <textarea id="about-you" class="form-control" rows="3"><?php echo $_SESSION['about']; ?></textarea>
							</div>
						</div>
				  
						<button type="button" class="btn btn-default" id="change-data">Editar perfil</button>
				  
					</form>
				</div> <!-- align center-->  
			</div><!-- Container -->
		</div><!-- Wrapper -->

	</div>
	<!-- /My Profile --> 



	<!-- script -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/registro.js"></script>
	<script type="text/javascript" src="js/login-fiestero.js"></script>
	<script type="text/javascript" src="js/login-facebook.js"></script>
	<script type="text/javascript" src="js/connectFacebook.js"></script>
	<!-- /script -->

</body>
</html>
