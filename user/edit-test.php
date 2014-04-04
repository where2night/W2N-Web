<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-EditProfile User</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/profile-partier.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	
	<!-- script -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>	
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/keep-session.js"></script>	

	<script type="text/javascript">  
    $(document).ready(function(){ 
            
      $("#change-data").on("click", function (event) {
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
        var name = $('#name').val();
        var surnames = $('#surname').val();
        var day = $('#day').val();
        if (day.length < 2){
          day = "0"+day;
        } 
        var month = $('#month').val();
        if (month.length < 2){
          month = "0"+month;
        }
        var year = $('#year').val();
        var birthdate = year+"/"+month+"/"+day;
        var gender = $("input[type='radio']:checked").val();
        var music = $('#favourite-music').val();
        var civil_state = $('#marital-status').val();
        var city = $('#city').val();
        var drink = $('#favourite-drink').val();
        var about = $('#about-you').val();
        var params = "/" + idProfile + "/" + token;
        
         console.log($.ajax({
            url: "../develop/update/user.php" + params,
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
                      	user_type: 'user',
                     	id_user: idProfile,
				    	token: token,
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
	
<?php 
  	/*NavbarHeader*/
  	include "templates/navbar-header.php";

 	 /*Sidebar*/
  	include "templates/sidebar.php";
?>
	
	<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Editar Perfil Fiestero</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									
									<div class="profile-header">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
									</div> 
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-activity" data-toggle="tab">Básica</a></li>
											<li><a href="#tab-friends" data-toggle="tab">Detallada</a></li>
											<li><a href="#tab-dj" data-toggle="tab">Foto</a></li>
										</ul>
										<!-- Comienza Actividad -->
										<div class="tab-content">
											<div class="tab-pane fade in active" id="tab-activity">
												
															
																<div class="the-timeline">
																	<ul>
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> Nombre Local
																				<span style="font-size:12px;color:orange"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn05"  class="botonapuntar" type="button"value="Me Apunto"onClick="btnApuntar(this);">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento DJ</span> Nombre DJ
																				<span style="font-size:12px;color:orange;"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn04"  class="botonapuntar" type="button"value="Me Apunto"onClick="btnApuntar(this);">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero</span> <?php echo $_SESSION['name']." ".$_SESSION['surnames'];?>
																				<span style="font-size:12px;color:orange;">Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><p style="color:#707070;font-size:14px;"><?php echo $_SESSION['name']." ".$_SESSION['surnames'];?> cambió su estado a :</p>
																					<input id="btn03"  class="botonapuntar" type="button"value="Me Apunto"onClick="btnApuntar(this);">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																		<!-- Comienza Evento -->
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
																					<input id="btn02"  class="botonapuntar" type="button"value="Me Apunto"onClick="btnApuntar(this);">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																	</ul>
																</div>	
											</div>
										<!-- Termina Actividad -->	
										<!-- Comienza Amigos -->
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
													
												<br/>
												
											</div>
										<!-- Termina Amigos -->	
										<!-- Comienza DJ's -->
											<div class="tab-pane fade " id="tab-dj">
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
												
											</div>
											
											<!-- Termina DJ's -->
											<!-- Comienza Clubs -->
											<div class="tab-pane fade " id="tab-club">
												<ul class="widget-users row">
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Local</a>
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
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Local</a>
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
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Local</a>
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
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Local</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															
														</div>
													</li>
												<br/>
												
											</div>
											<!-- Termina Clubs -->
											<!-- Comienza Fotos -->
											
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MiPerfil --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
</body>
</html>
