<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Home User</title>
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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>	
<script src="../js/keep-session.js"></script>	


<!-- /script -->
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

$(document).ready(function(){ 
      
        //Get clubs info
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
        var url1 = "../develop/read/locals.php" + params;
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var user_type = "club";
					var id_user = json[i].idProfile;
					var localName = json[i].localName;
					//var poblationLocal = json[i].poblationLocal;
					//var cpLocal = json[i].cpLocal;
					var telephoneLocal = json[i].telephoneLocal;
					var street_int = json[i].street;
					switch(street_int){
						case 0:
						  var street = "Calle";
						break;
						case 1:
						  var street = "Avda.";
						break;
						case 2:
						  var street = "Plaza";
						break;
						default:
						  var street = "Calle";
					}
					var streetName = json[i].streetNameLocal;
					var streetNumber = json[i].streetNumberLocal;
					//var music = json[i].music;
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					var latitude = json[i].latitude;
					var longitude = json[i].longitude;
					var link = "../club/profile.php?idv=" + id_user;

					//$('#club-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ localName +'</a><span class="user-subhead">Local</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ street + " " + streetName + " " + 'Nº' + " " + streetNumber +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ telephoneLocal +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#"id="" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Eliminar</a></td></tr>');
				}
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
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
					<h1 style="color:#ff6b24;font-size:30px;">Inicio Fiestero</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
								
								<!--Aqui empieza-->	
								<div class="col-lg-8">	
								<form method="post" class="well padding-bottom-10" onsubmit="return false;"style="border-radius:0px;background: #D1D0CE;box-shadow: 1px 1px 2px 0 #ff6b24">
									<textarea rows="2" class="form-control" style="border-radius:0px;background-color:#E5E4E2"placeholder="¿En qué fiesta estas pensando?"></textarea>
									<div class="margin-top-10">
										<a href="#"id="" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-top:10px;margin-left:44%">Publicar</a>
										<a href="" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24"></i></a>
										<a href="" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="glyphicon glyphicon-camera" style="color:#ff6b24"></i></a>
									</div>
								</form>	
								</div class="col-sm-4">
										
									<div class="profile-header" style="text-align:center">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Modo</span></h3>
										<div class="form-group col-sm-2" style="margin-left:9%">
										<select class="form-control textModo" style="background-color:#E5E4E2" >
											<option value="">De tranquis</option>
											<option value="">Hoy no me lio</option>
											<option value="">Lo que surja</option>
											<option value="">Lo daré todo</option>
											<option value="">Destroyer</option>
											<option value="">Yo me llamo Ralph</option>
										</select>
									</div>			
									</div>
									
									
									
									<div class="row">
									<div class="col-sm-8">
										<div class="the-timeline">
																	<ul>
																		<!-- Begin event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> Nombre Local
																				<span style="font-size:12px;color:orange"> Acaba de crear un evento <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn01"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">

																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- End event -->
																		
																		<!-- Begin event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span> Nombre Fiestero
																				<span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn01"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">

																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- End event -->
																		
																		<!-- Begin event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Local favorito</span> Nombre Amigo Fiestero
																				<span style="font-size:12px;color:orange;">Agregó un local favorito <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><p style="color:#707070;font-size:14px;">Nombre Amigo Fiestero agregó a Cats como local favorito</p>
																					
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- End event -->
																		<!-- Begin event -->
																		
																		<!-- Begin event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero</span> Nombre Amigo Fiestero
																				<span style="font-size:12px;color:orange;">Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><p style="color:#707070;font-size:14px;">Nombre Amigo Fiestero cambió su estado a :</p>
																					
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- End event -->
																		<!-- Begin event -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span> Nombre Amigo Fiestero
																				<span style="font-size:12px;color:orange;">Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td>
																					<p style="color:#707070;font-size:14px;">
																						Nombre Amigo Fiestero cambió su modo a : <span class="label label">Destroyer</span>								
																					</p>
																					
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- End event -->
																	</ul>
																</div>	
																
															
									</div>
									<div class="col-sm-3" style="margin-left:4%" >
									<div class="profile-header" style="text-align:center">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Próximos Eventos</span></h3>
									</div>
									<section class="events" style="background-color:transparent;">
									<div class="section-content">
										<div class="event-item"style="border-color:transparent">
										<p class="date-label">
											<span class="month"style="background-color:#404040;color:#34d1be">FEB</span>
											<span class="date-number"style="background-color:#000;color:#ff6b24;height:63%">18</span>
										</p>
										<div class="details" style="height:10%;border-radius:0px;background-color:#404040;border-color:#ff6b24">
											<h2 class="title" style="border-left:0px;padding-left:15%;color:#34d1be;margin-bottom:2%">Girls Night</h2>
											<p class="time" style="color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-time"style="color:#ff6b24;"></i> 10:00am - 18:00pm</p>
											<p class="location"style="word-wrap: break-word;padding-right:2px;color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24;"></i> Atocha</p>                            
										</div><!--//details-->
										</div><!--event-item-->  
										<div class="event-item"style="border-color:transparent">
										<p class="date-label">
											<span class="month"style="background-color:#404040;color:#34d1be">SEP</span>
											<span class="date-number"style="background-color:#000;color:#ff6b24;height:63%">06</span>
										</p>
										<div class="details"style="height:10%;border-radius:0px;background-color:#404040;border-color:#ff6b24">
											<h2 class="title"style="border-left:0px;padding-left:15%;color:#34d1be;margin-bottom:2%">Happy Hour</h2>
											<p class="time"style="color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-time"style="color:#ff6b24;"></i> 10:00am - 16:00pm</p>
											<p class="location"style="color:#E5E4E2;word-wrap: break-word;padding-right:2px;margin-left:5%"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24;"></i> Guzman el Bueno</p>                            
										</div><!--//details-->
										</div><!--event-item-->
										<div class="event-item"style="border-color:transparent">
										<p class="date-label">
											<span class="month"style="background-color:#404040;color:#34d1be">JUN</span>
											<span class="date-number"style="background-color:#000;color:#ff6b24;height:63%">23</span>
										</p>
										<div class="details"style="height:10%;border-radius:0px;background-color:#404040;border-color:#ff6b24">
											<h2 class="title"style="border-left:0px;padding-left:15%;color:#34d1be;margin-bottom:2%">DJ Remix</h2>
											<p class="time"style="color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-time"style="color:#ff6b24;"></i> 09:45am - 16:00pm</p>
											<p class="location"style="color:#E5E4E2;word-wrap: break-word;padding-right:2px;margin-left:5%"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24;"></i> Ciudad Universitaria</p>                            
										</div><!--//details-->
										</div><!--event-item-->
										<div class="event-item"style="border-color:transparent">
										<p class="date-label">
											<span class="month"style="background-color:#404040;color:#34d1be">May</span>
											<span class="date-number"style="background-color:#000;color:#ff6b24;height:63%">17</span>
										</p>
										<div class="details"style="height:10%;border-radius:0px;background-color:#404040;border-color:#ff6b24">
											<h2 class="title"style="border-left:0px;padding-left:15%;color:#34d1be;margin-bottom:2%">Free Drink</h2>
											<p class="time"style="color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-time"style="color:#ff6b24;"></i> 14:00pm - 18:00pm</p>
											<p class="location" style="color:#E5E4E2;word-wrap: break-word;padding-right:2px;margin-left:5%"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24;"></i> Moncloa</p>                            
										</div><!--//details-->
										</div><!--event-item-->
										
									</div><!--//section-content-->
								</section><!--//events-->
							</div><!--//col-md-3-->
								</div>
									
								</div >
								
								</div >
								
								
								
								<!--Aqui termina-->
							</div>
						</div>
					</div>	
					</div>	
				</div>
			</div>
		</div>
</div>	
<!-- MiPerfil -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
</body>
</html>
