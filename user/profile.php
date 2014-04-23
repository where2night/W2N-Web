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
	<script src="../js/favourites.js"></script>
	<script src="../js/followfriend.js"></script>
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>	


	
	
<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 


 if (isset($_GET['idv'])){
	$id_partier = $_GET['idv'];
}else $id_partier = $idProfil;
  


?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
var id_abs = '<?php echo $id_partier; ?>' ;
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

<script type="text/javascript">
$(document).ready(function(){ 

      
        //Get local and friends info
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
        var url1 = "../develop/read/news.php" + params;
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var type = json[i].TYPE;
					var goes = json[i].GOES;
					var date = json[i].createdTime;
					
					moment.lang('es', {
						 relativeTime : {
										future : "en %s",
										past : "hace %s",
										s : "unos segundos",
										m : "un minuto",
										mm : "%d minutos",
										h : "una hora",
										hh : "%d horas",
										d : "un día",
										dd : "%d días",
										M : "un mes",
										MM : "%d meses",
										y : "un año",
										yy : "%d años"
									}
					});
					var dateActivity = moment(date);
					if (dateActivity.isValid()){
						var activityFromNow = dateActivity.fromNow();
					}	
					
					if (type == 1){
						var localName = json[i].localName;
						var title = json[i].title;	
						var startHour = json[i].startHour;
						var closeHour = json[i].closeHour;
						var date = json[i].date;
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						
						var m;
						if (month == 1){
							m = "ENE";
						}else if (month == 2){
							m = "FEB";
						}else if (month == 3){
							m = "MAR";
						}else if (month == 4){
							m = "ABR";
						}else if (month == 5){
							m = "MAY";
						}else if (month == 6){
							m = "JUN";
						}else if (month == 7){
							m = "JUL";
						}else if (month == 8){
							m = "AGO";
						}else if (month == 9){
							m = "SEP";
						}else if (month == 10){
							m = "OCT";
						}else if (month == 11){
							m = "NOV";
						}else if (month == 12){
							m = "DIC";
						}	
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;
						var streetNameLocal = json[i].streetNameLocal;
						var streetNumberLocal = json[i].streetNumberLocal;
						var text = json[i].text;
						
						//Local event
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Acaba de crear un evento <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><input id="btn01"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"></td></tr></tbody></table>');
						
					}else if (type == 2){
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var status =  json[i].status;
						//Change status
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero </span> '+name+' '+surnames+' <span style="font-size:12px;color:orange;" > Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' cambió su estado a : '+status+'</p></td></tr></tbody></table>');
						
					}else if (type == 3){
						//Change mode
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var mode =  json[i].mode;
						var modeString;
						
						if (mode == 0){
							modeString = "De tranquis";
						}else if (mode == 1){
							modeString = "Hoy no me lío";
						}else if (mode == 2){
							modeString = "Lo que surja";
						}else if (mode == 3){
							modeString = "Lo daré todo";
						}else if (mode == 4){
							modeString = "Destroyer";
						}else if (mode == 5){
							modeString = "Yo me llamo Ralph";
						}
						
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span> '+name+' '+surnames+' <span style="font-size:12px;color:orange;"> Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' cambió su modo a : <span class="label label">'+modeString+'</span>	</p></td></tr></tbody></table>');
					}else if (type == 4){
						//friend add to favorites a local 
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;
						
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local favorito</span>'+name+' '+surnames+'<span style="font-size:12px;color:orange;"> Agregó un local favorito <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' agregó a <a href="'+link+'">'+localName+' '+'</a>como local favorito</p></td></tr></tbody></table>')
						
					}else if (type == 5){
						//Events friends attending
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var title = json[i].title;
						var text = json[i].text;
						
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span>'+name+' '+surnames+'<span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><input id="btn01"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"></td></tr></tbody></table>');;
					}
				}
					
				
				//}
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});

		//Get user info
		var url2 = "../develop/update/partier.php" + params;
			
			$.ajax({
				url:url2,
				dataType: "json",
				type: "GET",
				complete: function(r3){
					var json = JSON.parse(r3.responseText);
					var picture = json.picture;
					//$("#profile-img").attr("src", picture);
					var name = json.name;
					var surnames = json.surnames;
					$("#complete-name").text(name + " " + surnames);
					$("#complete-name2").text(name + " " + surnames);
					$("#navbar-complete-name").text(name + " " + surnames);
					$("#navbar-complete-name2").text(name + " " + surnames);
					var birthdate = json.birthdate;
					var birth_array = birthdate.split("/");
					$("#birthdate").text(birth_array[2] + "/" + birth_array[1] + "/" + birth_array[0]);
					var gender = json.gender;
					if(gender == "male"){
						$("#gender").text("Hombre");
					}
					if(gender == "female"){
						$("#gender").text("Mujer");
					}
					var music = json.music;
					$("#music").text(music);
					var civil_state = json.civil_state;
					$("#civil_state").text(civil_state);
					var city = json.city;
					$("#city").text(city);
					var drink = json.drink;
					$("#drink").text(drink);
					var about = json.about;
					$("#about").text(about);
					var mode = json.mode;
					if (mode == 0){
							modeString = "De tranquis";
					}else if (mode == 1){
						modeString = "Hoy no me lío";
					}else if (mode == 2){
						modeString = "Lo que surja";
					}else if (mode == 3){
						modeString = "Lo daré todo";
					}else if (mode == 4){
						modeString = "Destroyer";
					}else if (mode == 5){
						modeString = "Yo me llamo Ralph";
					}
					
					$('#mode').append('<span class="label label">'+modeString+'</span>');
				  
				},
				onerror: function(e,val){
					alert("No se puede introducir evento 2");
				}
			});

    });//end $(document).ready(function()
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
									<h2 id="complete-name" style="color:#ff6b24;text-transform: uppercase; text-align:center;"></h2>
									
									<img id="profile-img" src="../images/reg1.jpg" alt="" class="profile-img img-responsive center-block banner1" style="border-color:#ff6b24;"/>
									
									<div class="profile-label" id="mode">
										
									</div>
									
									<div class="profile-stars">
										
										<span style="color:orange;">Modo</span>
									</div>
						
									<div class="profile-since"style="color:#707070;">
										Miembro desde: Ene 2012
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
							
							              <script>
											paintButton();
											</script>
											
											
											
										</a>
									</div>
								</div>
							</div>
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<div class="profile-header">
										<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Acerca de mí</span></h3>
									</div>
									
									<p id="about" style="color:#707070;">
										<?php //echo $_SESSION['about']; ?>
									</p>
									
									<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
									
									<div class="row profile-user-info">
										<div class="col-sm-8">
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Nombre y Apellidos
												</div>
												<div id="complete-name2" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php //echo $_SESSION['name']." ".$_SESSION['surnames'];?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Fecha de Nacimiento
												</div>
												<div id="birthdate" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
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
												<div id="gender" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php //if ($_SESSION['gender']=="male") echo "Hombre" ?><?php //if ($_SESSION['gender']=="female") echo "Mujer" ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Estado Civil
												</div>
												<div id="civil_state" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php// echo $_SESSION['civil_state']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Ciudad Actual
												</div>
												<div id="city" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php //echo $_SESSION['city']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Música Favorita
												</div>
												<div id="music" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php //echo $_SESSION['music']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Bebida Favorita
												</div>
												<div id="drink" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
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
																	<ul id="test">
												
																	</ul>
																</div>	
											</div>
										<!-- end Activity -->	
										<!-- begin friends -->
											<div class="tab-pane fade " id="tab-friends">
												<ul class="widget-users row" id="friends">
												  <script>
												  	myfriends();
												  </script> 
														
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
