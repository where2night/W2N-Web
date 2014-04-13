<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-profile User</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->
	
	<!--<link rel="stylesheet" href="../css/images-user.css">
<link rel="stylesheet" href="../css/images-user1.css">
<link rel="stylesheet" href="../css/images-user2.css">-->

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>	
<script src="../js/keep-session.js"></script>	
<script src="../js/favouriteClubs.js"></script>


<!-- /script -->
<script type="text/javascript">

     /* $(document).ready(function(){ 
      
        
          //Get DJ's info
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
        var url1 = "../develop/read/djs.php" + params;
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var user_type = "dj";
					var id_user = json[i].idProfile;
					var nameDJ = json[i].nameDJ;
					var music = json[i].music;
					if (music == null || music.length == 0){
						music = "Estilo no definido";
					}
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					var link = "../dj/profile.php?idv=" + id_user;
					
					$('#dj-list tbody').append('<tr><td><img src="'+ picture + '" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ nameDJ +'</a><span class="user-subhead">DJ</span></td><td></td><td class="text-center"><a href="#">'+ music +'</a></td><td></td><td style="width: 20%;"><a href="#" class="" style="margin-right:2px;margin-left:2px;"><span class="label" style="padding-top:8px;"><i class="glyphicon glyphicon-zoom-in"style="color:#1B1E24;"></i></span></a><a href="#" class="" style="margin-right:2px;margin-left:2px;"><span class="label" style="padding-top:8px;padding-right:2px;"><i class="glyphicon glyphicon-star"style="color:#1B1E24;"></i></span></a><a href="#" class=""style="margin-right:2px;margin-left:2px;"><span class="label" style="padding-top:8px;padding-left:3px;"><i class="glyphicon glyphicon-trash"style="color:#1B1E24;"></i></span></a></td></tr>');
				}
				/*var picture = json.picture;
				var name = json.name;
				var surnames = json.surnames;
				var birthdate = json.birthdate;
				var gender = json.gender;
				var music = json.music;
				var civil_state = json.civil_state;
				var city = json.city;
				var drink = json.drink;
				var about = json.about;*/
			/*	$.post("../framework/session_start.php",
				  {
				  	user_type: 'user',
				    type_login: login_type,
				    id_user: id,
				    token: token,
					picture: picture,
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
					//alert("Data: " + data + "\nStatus: " + status);
					//window.location.href = "../user/home.php";										  
				  });*/
	    		//},
				//onerror: function(e,val){
					//alert("Contraseña y/o usuario incorrectos");
				//}
			//});


    //});//end $(document).ready(function()
function btnSeguir(theSeguirBtn)
{
myButtonID = theSeguirBtn.id;
if(document.getElementById(myButtonID).className=='myClickedSeguir')
{
document.getElementById(myButtonID).className='myDefaultSeguir';
document.getElementById(myButtonID).value='Agregar Fiestero';
}
else
{
document.getElementById(myButtonID).className='myClickedSeguir';
document.getElementById(myButtonID).value='Fiestero Agregado';
}
}
</script>
<script type="text/javascript">
function btnApuntar(theApuntarBtn)
{
myButtonID = theApuntarBtn.id;
if(document.getElementById(myButtonID).className=='myClickedApuntar')
{
document.getElementById(myButtonID).className='myDefaultApuntar';
document.getElementById(myButtonID).value='Me Apunto';
}
else
{
document.getElementById(myButtonID).className='myClickedApuntar';
document.getElementById(myButtonID).value='Apuntado';
}
}
</script>
<script type="text/javascript">
function btnVoy(theVoyBtn)
{
myButtonID = theVoyBtn.id;
if(document.getElementById(myButtonID).className=='myClickedVoy')
{
document.getElementById(myButtonID).className='myDefaultVoy';
document.getElementById(myButtonID).value='Voy a ir';
}
else
{
document.getElementById(myButtonID).className='myClickedVoy';
document.getElementById(myButtonID).value='Apuntado';
}
}
</script>
</head>

<body>
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
			color:#000;
			
		}
		.container{
			padding:0px 20px;
		}
		
	}	
			
    </style>


<?php 
  /*NavbarHeader*/
  include "templates/navbar-header.php";
?>




<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 

?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>


<!-- MyProfile -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;margin-left:1%;margin-right:-20%">
					<h1 style="color:#ff6b24;font-size:30px;margin-left:4%;">Perfil Fiestero</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							<div class="col-lg-3 col-md-4 col-sm-4" >
								<div class="main-box clearfix"style="background-color:#1B1E24;border-color:#ff6b24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<h2 style="color:#ff6b24;text-transform: uppercase; text-align:center;"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?></h2>
									
									<img src="../images/reg1.jpg" alt="" class="profile-img img-responsive center-block banner1" style="border-color:#ff6b24;"/>
									
									<div class="profile-label">
										<span class="label label">Destroyer</span>
									</div>
									
									<div class="profile-stars">
										
										<span style="color:orange;">Modo</span>
									</div>
						
									<div class="profile-since"style="color:#707070;">
										Miembro desde: Ene 2012
									</div>
									<div class="profile-message-btn center-block text-center">
										
										<a href="#" class="">
							
											<input id="btnVoy01"  class="btn btn-success botonvoy" type="button"value="Voy a ir"onClick="btnVoy(this);"style="margin-top:3%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
											
										</a>
									</div>
									<div class="profile-details" style="background-color:#1B1E24;border-color:#ff6b24;">
										<ul class="fa-ul">
											<li  style="color:#ff6b24;">Seguidores: <span> 456</span></li>
											<li  style="color:#ff6b24;">Siguiendo: <span> 828</span></li>
											<li  style="color:#ff6b24;">Publicaciones: <span> 828</span></li>
										</ul>
									</div>
									
									<div class="profile-message-btn center-block text-center">
										
										<a href="#" class="">
							
											<input id="btn01"  class="btn btn-success botonseguir" type="button"value="Agregar Fiestero"onClick="btnSeguir(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
											
										</a>
									</div>
								</div>
							</div>
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<div class="profile-header">
										<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Acerca de mí</span></h3>
									</div>
									
									<p style="color:#707070;">
										<?php echo $_SESSION['about']; ?>
									</p>
									
									<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
									
									<div class="row profile-user-info">
										<div class="col-sm-8">
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Nombre y Apellidos
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['name']." ".$_SESSION['surnames'];?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Fecha de Nacimiento
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php
														$birth_array = explode ('/',$_SESSION['birthdate']);
														$day = $birth_array[2];
														$month = $birth_array[1];
														$year = $birth_array[0]; 
														echo $day."/".$month."/".$year
													?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Sexo
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php if ($_SESSION['gender']=="male") echo "Hombre" ?><?php if ($_SESSION['gender']=="female") echo "Mujer" ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Estado Civil
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['civil_state']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Ciudad Actual
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['city']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Música Favorita
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['music']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Bebida Favorita
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['drink']; ?>
												</div>
											</div>
										</div>
										
										<div class="col-sm-4 profile-social">
											<ul class="fa-ul" style="color:orange">
												<li><i class=""></i><a href="#">@Twitter</a></li>
												<li><i class=""></i><a href="#">Facebook</a></li>
												<li><i class=""></i><a href="#">Instagram</a></li>
		
											</ul>
										</div>
									</div>
									
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-activity" data-toggle="tab">Actividad</a></li>
											<li><a href="#tab-friends" data-toggle="tab">Amigos</a></li>
											<!--<li><a href="#tab-dj" data-toggle="tab">DJ's</a></li>-->
											<li><a href="#tab-club" data-toggle="tab">Locales</a></li>
											<li><a href="#tab-photos" data-toggle="tab">Fotos</a></li>
										</ul>
										<!-- begin Activity -->
										<div class="tab-content">
											<div class="tab-pane fade in active" id="tab-activity">
												
															
																<div class="the-timeline">
																	<ul>
																		<!-- begin Event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> Nombre Local
																				<span style="font-size:12px;color:orange"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn03"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!--end Event -->
																		<!-- begin Event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> Nombre Local
																				<span style="font-size:12px;color:orange;"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn02"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- end Event -->
																		<!-- begin Event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero</span> <?php echo $_SESSION['name']." ".$_SESSION['surnames'];?>
																				<span style="font-size:12px;color:orange;">Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><p style="color:#707070;font-size:14px;"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> cambió su estado a :</p>
																					
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- end Event -->
																		<!-- begin Event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span> <?php echo $_SESSION['name']." ".$_SESSION['surnames'];?>
																				<span style="font-size:12px;color:orange;">Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td>
																					<p style="color:#707070;font-size:14px;">
																						<?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> cambió su modo a : <span class="label label">Destroyer</span>								
																					</p>
																					
																					
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- end Event -->
																	</ul>
																</div>	
											</div>
										<!-- end Activity -->	
										<!-- begin friends -->
											<div class="tab-pane fade " id="tab-friends">
												<ul class="widget-users row">
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Amigo</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Amigo</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Amigo</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Amigo</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
												</ul>	
												
												
											</div>
										<!-- end friends -->	
										<!-- begin DJ's -->
										<!--	<div class="tab-pane fade " id="tab-dj">
												<ul class="widget-users row">
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															
														</div>
													</li>
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															
														</div>
													</li>
													
												<br/>
												
											</div>-->
											
											<!-- end DJ's -->
											<!-- begin Clubs -->
											<div class="tab-pane fade " id="tab-club">
												<ul class="widget-users row" id="localfav">
												<script>
												favouriteLocals();
												</script>
												</ul>
											</div>
											<!-- end Clubs -->
											<!-- begin Fotos -->
											<div class="tab-pane fade" id="tab-photos">	
											<!--	<div class="container" style="background-color:#000;box-shadow: 1px 1px 2px 0 #ff6b24;">
													<form class="form-inline">
													<div class="form-group">
														<a href="#"id="image-gallery-button" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Ver todas</a>
													</div>
													</form>
													<br>
												<!-- The container for the list of example images -->
												<!-- 	<div id="links"></div>
													<br>
												</div>
											<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
											<!-- 	<div id="blueimp-gallery" class="blueimp-gallery" >
												<!-- The container for the modal slides -->
												<!-- 	<div class="slides"></div>
													<!-- Controls for the borderless lightbox -->
												<!-- 	<h3 class="title"></h3>
													<a class="prev">‹</a>
													<a class="next">›</a>
													<a class="close">×</a>
													<a class="play-pause"></a>
													<ol class="indicator"></ol>
													<!-- The modal dialog, which will be used to wrap the lightbox content -->
												<!-- 	<div class="modal fade" style="background-color:transparent; width:100%;height:100%;margin-top:20%;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" aria-hidden="true">&times;</button>
																	<h4 class="modal-title"></h4>
																</div>
																<div class="modal-body next"></div>
																<div class="modal-footer">
																	<a href="#" class="btn btn-success pull-left prev" style="background-color:#000;border-color:#ff6b24;color:#34d1be;"><i class="glyphicon glyphicon-chevron-left"></i> Anterior </a>
																	<a href="#" class="btn btn-success pull-right next" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></a>
												
																</div>
															</div>
														</div>
													</div>
												</div>-->
	
											</div>	<!--end Fotos -->
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MyProfile --> 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
<!--<script src="../js/bootstrap.min.js"></script>
<script src="../js/images-user2.js"></script>
<script src="../js/images-user1.js"></script>
<script src="../js/images-user.js"></script>-->

</body>
</html>
