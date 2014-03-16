<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Editar Datos</title>
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
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/inicio-fiestero.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

	<script type="text/javascript">  
    $(document).ready(function(){ 
      
      $("#close_session").on("click", function (event) {
        $.post("../framework/session_end.php",
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
            url: "../api/editprofile.php",
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
              $.post("../framework/session_start.php",
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
                      window.location.href="home.php";
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
				<a href="/" class="navbar-brand"><img src="../images/mainlogo.png" alt="logoWhere2Night"</a>
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
						<a href="home.php" style="font-size:12px;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';"><strong>Inicio</strong>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-home" style="color:#FF6B24; margin-top:15px"></i></a>
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
									<img class="menu-avatar" src="../images/profile.jpg" /> <span onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';">
									<?php 
										//echo $_SESSION['name']." ".$_SESSION['surnames'];
									?>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-cog"style="color:#FF6B24"></i></span>
								</span>
							</a>
							<ul class="dropdown-menu">


								<li class="with-image">
								  <div class="avatar">
									<img src="../images/profile.jpg" />
								  </div>
								  <span>
									 <?php //echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
								  </span>
								</li>

								<li class="divider"></li>

								<li><a href="profile.php" ><i class="glyphicon glyphicon-user"style="color:#FF6B24"></i> <span>Perfil</span></a></li>
								<li><a href="edit.php"><i class="glyphicon glyphicon-edit"style="color:#FF6B24"></i> <span>Editar Perfil</span></a></li>
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
				<a href="profile.php">
					<i class=""><img class="menu-avatar" src="../images/profile.jpg" /></i>
					<span>Mi Perfil</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="../images/party3.jpg" /></i>
					<span>Eventos</span>
				</a>
			</li>
			<li class="photos.php">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="../images/party2.jpg" /></i>
					<span>Fotos</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="../images/party4.jpg" /></i>
					<span>Seguidores</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="../images/party2.jpg" /></i>
					<span>Listas</span>
				</a>
			</li>
			<li class="">
				<span class="glow"></span>
				<a href="">
					<i class=""><img class="menu-avatar" src="../images/party3.jpg" /></i>
					<span>DJ's</span>
				</a>
			</li> 
			<li class="">
				<span class="glow"></span>
				<a class="accordion-toggle collapsed " data-toggle="collapse" href="#tnnmk7rjLZ">
					<i class=""><img class="menu-avatar" src="../images/party2.jpg" /></i>
					<span>
						Configuración&nbsp;&nbsp;&nbsp;
						<i class="glyphicon glyphicon-circle-arrow-down"></i>
					</span>
				</a>
				<ul id="tnnmk7rjLZ" class="collapse "> 
					<a href="edit.php" style="font-size:12px ;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';" >
						<i class="glyphicon glyphicon-edit" style="color:#FF6B24"></i> Editar Perfil
					</a>
					<br>
					<a href="" style="font-size:12px ;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';">
						<i class="glyphicon glyphicon-lock"style="color:#FF6B24"></i> Privacidad
					</a>	
				</ul>
			</li>
			<img src="../images/logo3_opt.png" />
	</div>
	<!-- /SideBar -->
	
	<!-- My Profile -->
	<div class="main-content" style="background-image:url(images/wall.jpg); max-height:2000px; margin-bottom:-50px;" > 
		<div class="wrapper">
			<div class="container">
				<div align= "center">
					<form class="form-horizontal" role="form" id="edit-profile">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre Empresa: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" name="name" value="<?php //echo $_SESSION['name']; ?>" >
							</div>
						</div>
				  
				  		<div class="form-group">
							<label class="col-sm-2 control-label" style="color: #FFFFCC"><b>Dirección: </b></label>
							<div class="col-sm-1">
									<select id="street" class="form-control">
										<option value="0" selected="1">Calle</option>
										<option value="1" >Avd.</option>
										<option value="2" >Plaza</option>
									</select>
							</div>
							<div class="col-sm-1">
							 <label control-label" style="color: #FFFFCC"><b>Nombre: </b></label>
							</div>
							<div class="col-sm-4">
							 <input id="streetNameLocal" type="text" class="form-control" />
							</div>
							<div class="col-sm-1">
							 <label control-label" style="color: #FFFFCC"><b>Número: </b></label>
							</div>
							<div class="col-sm-1">
							 <input id="streetNumberLocal" type="text" class="form-control"/>
							</div> 
						</div>
				  
						<div class="form-group">
							<label for="poblation" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Población: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="poblation" value="<?php //echo $_SESSION['poblation']; ?>">
							</div>
						</div>
						  
						<div class="form-group">
							<label for="postal-code" class="col-sm-2 control-label" style="color: #FFFFCC"><b>C.P.: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="postal-code" name="postal-code" value="<?php //echo $_SESSION['postal-code']; ?>">
							</div>
						</div>
						  
						<div class="form-group">
							<label for="prices" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Precio bebidas: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="prices" name="prices" value="<?php //echo $_SESSION['drink-price']; ?>">
							</div>
						</div>
				  
						<div class="form-group">
							<label for="music-style" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Estilo de música: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="music-style" name="music-style" value="<?php echo $_SESSION['music']; ?>">
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
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- /script -->

</body>
</html>
