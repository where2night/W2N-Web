<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv="pragma" content="no-cache" />
   <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/club-template.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<!-- script -->
	
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="../js/keep-session.js"></script>
	<script src="../js/follow-test.js"></script>
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>
	<script src="../js/localFans.js"></script>	
	<script src="../js/autoRefresh.js"></script>
	<script src="../js/songs.js"></script>
	<script src="../js/fillDate.js"></script>
	<script src="../js/lists.js"></script>
	<script src="../js/canvasjs.min.js"></script>


<?php 
  /*NavbarHeader*/
  if($_SESSION['user_type'] == "club"){
  	include "templates/navbar-header.php"; 
  } else if($_SESSION['user_type'] == "user"){
  	include "../user/templates/navbar-header.php"; 
  }

  $idProfile=$_SESSION['id_user']; 
  $token=$_SESSION['token']; 

  if (isset($_GET['idv'])){
	$id_event = $_GET['idv'];
}else $id_event = $idProfile;
  
  
?>


<script>
	

var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
var ideEvent = '<?php echo $id_event; ?>' ;	
var idlocal = '<?php echo $_GET['idv'];?>';
</script>


<script type="text/javascript"> 
	function getData(){
<?php 
	if(isset($_GET['idv'])){
?>
	
	var idProfile = <?php echo $_GET['idv'];?>;
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "local.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	async: false,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);

		var companyName = json.companyNameLocal;
		$('[name="companyName"]').text(companyName);
		var localName = json.localName;
		$('[name="localName"]').text(localName);
		var cif = json.cif;
		$('[name="localName"]').text(localName);
		var telephoneLocal = json.telephoneLocal;
		$('[name="telephoneLocal"]').text(telephoneLocal);

		var address = "";
		var street = json.street;
		switch(street){
		case 0:
		  address += "Calle ";
		  break;
		case 1:
		  address += "Avd. ";
		  break;
		case 2:
		  address += "Plaza ";
		  break;
		default:
		  address += "Calle ";
		}
		var streetName = json.streetNameLocal;
		address += streetName + " ";
		var streetNumber = json.streetNumberLocal;
		address += "Nº " + streetNumber + ", ";
		var cpLocal = json.cpLocal;
		address += "C.P. " + cpLocal + " ";
		var poblationLocal = json.poblationLocal;
		address += poblationLocal + " ";
		$('[name="address"]').text(address);

		var music = json.music;
		$('[name="music"]').text(music);

		var entryPrice = json.entryPrice;
		if (entryPrice != '0'){
			$('[name="entryPrice"]').text(entryPrice + " €");
		}else{
			$('[name="entryPrice"]').text("Información no disponible");
		}

		var drinkPrice = json.drinkPrice;
		if (drinkPrice != '0'){
			$('[name="drinkPrice"]').text(drinkPrice + " €");
		}else{
			$('[name="drinkPrice"]').text("Información no disponible");
		}

		var openingHours = json.openingHours;
		$('[name="openingHours"]').html("<b>Apertura:</b> " + openingHours);
		var closeHours = json.closeHours;
		$('[name="closeHours"]').html("<b>Cierre:</b> " + closeHours);

		var picture = json.picture;
		if (picture != undefined && picture.length > 0){
			$('[name="club-image"]').attr("src", picture);			
		}else{
			$('[name="club-image"]').attr("src", "../images/profile-club.jpg");
		}
		
		var about = json.about;
		$('[name="about"]').text(about);
		var latitude = json.latitude;
		$('#latitude').val(latitude);
		var longitude = json.longitude;
		$('#longitude').val(longitude);
		var follow = json.follow;
		$('[name="follow"]').text(follow);
		var followers = json.followers;
		$('[name="followers"]').text(followers);
		var goto = json.goto;
		$('[name="goto"]').text(goto);
		},
		onerror: function(e,val){
			//alert("Contraseña y/o usuario incorrectos");
		}
	});


<?php		
	}else{//(!isset($_GET['idv']))
?>

	var idProfile = <?php echo $_SESSION['id_user'];?>;
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "local.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	async: false,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);

		var companyName = json.companyNameLocal;
		$('[name="companyName"]').text(companyName);
		var localName = json.localName;
		$('[name="localName"]').text(localName);
		var cif = json.cif;
		$('[name="cif"]').text(cif);
		var telephoneLocal = json.telephoneLocal;
		$('[name="telephoneLocal"]').text(telephoneLocal);

		var address = "";
		var street = json.street;
		switch(street){
		case 0:
		  address += "Calle ";
		  break;
		case 1:
		  address += "Avd. ";
		  break;
		case 2:
		  address += "Plaza ";
		  break;
		default:
		  address += "Calle ";
		}
		var streetName = json.streetNameLocal;
		address += streetName + " ";
		var streetNumber = json.streetNumberLocal;
		address += "Nº " + streetNumber + ", ";
		var cpLocal = json.cpLocal;
		address += "C.P. " + cpLocal + " ";
		var poblationLocal = json.poblationLocal;
		address += poblationLocal + " ";
		$('[name="address"]').text(address);

		var music = json.music;
		$('[name="music"]').text(music);

		var entryPrice = json.entryPrice;
		if (entryPrice != '0'){
			$('[name="entryPrice"]').text(entryPrice + " €");
		}else{
			$('[name="entryPrice"]').text("Información no disponible");
		}

		var drinkPrice = json.drinkPrice;
		if (drinkPrice != '0'){
			$('[name="drinkPrice"]').text(drinkPrice + " €");
		}else{
			$('[name="drinkPrice"]').text("Información no disponible");
		}

		var openingHours = json.openingHours;
		$('[name="openingHours"]').html("<b>Apertura:</b> " + openingHours);
		var closeHours = json.closeHours;
		$('[name="closeHours"]').html("<b>Cierre:</b> " + closeHours);

		var picture = json.picture;
		//alert(picture);
		if (picture != undefined && picture.length > 0){
			$('[name="club-image"]').attr("src", picture);			
		}else{
			$('[name="club-image"]').attr("src", "../images/profile-club.jpg");
		}

		var about = json.about;
		$('[name="about"]').text(about);
		var latitude = json.latitude;
		$('#latitude').val(latitude);
		var longitude = json.longitude;
		$('#longitude').val(longitude);
		var follow = json.follow;
		$('[name="follow"]').text(follow);
		var followers = json.followers;
		$('[name="followers"]').text(followers);
		var goto = json.goto;
		$('[name="goto"]').text(goto);
	
		},
		onerror: function(e,val){
			//alert("Contraseña y/o usuario incorrectos");
		}
	});


<?php		
	}//end else (!isset($_GET['idv']))
?>

}//end getData()
    
    
    </script>


	<script type="text/javascript">  
    $(document).ready(function(){ 
		getData();	
	});//end $(document).ready(function()
	</script>
<script type="text/javascript">
function btnVoy(theVoyBtn)
{
myButtonID = theVoyBtn.id;
if(document.getElementById(myButtonID).className=='myClickedVoy')
{
document.getElementById(myButtonID).className='myDefaultVoy';
document.getElementById(myButtonID).value='Quiero Asitir';
}
else
{
document.getElementById(myButtonID).className='myClickedVoy';
document.getElementById(myButtonID).value='Voy a ir';
}
}
</script>
<script type="text/javascript">
function getVisitorEvents(){

	var params = "/" ;
	params = params.concat(ide); 
	params = params.concat("/");
	params = params.concat(tok);
	  
	var url = "../develop/actions/myEvents.php";
	url = url.concat(params);
	var array_ids = new Array(); 
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
				var json = JSON.parse(r.responseText);	
				
			  	for (var i = 0; i < json.rows; i++) {
			  		array_ids[i] = "" +json[i].idEvent;
		  		}
			},
			onerror: function(e,val){
				alert("Error al buscar eventos de usuario");
			}
	});
	return array_ids;
}


//Check if function is join or disjoin
function clickedJoinEvent(idRequest, idEvent){
	var partierEvents = new Array();
    if(ide != idRequest){
    	partierEvents = getVisitorEvents();
    } 
    if(partierEvents.indexOf(idEvent) > -1){//Event in array, display disjoin
		disjoinEvent (idRequest, idEvent)
	}else{//Event not in array, display join
		joinEvent (idRequest, idEvent)
	}
}

function joinEvent (idRequest, idEvent){

	var params = "/" ;
	params = params.concat(ide); 
	params = params.concat("/");
	params = params.concat(tok);
	params = params.concat("/");
	params = params.concat(idEvent);
	  
	var url = "../develop/actions/goToEvent.php";
	url = url.concat(params);
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);	 
          		var button = document.getElementById("join-event-" + idEvent);
		  		button.innerHTML ='Me Desapunto';
			  
			},
			onerror: function(e,val){
				alert("No se puedo añadir al evento");
			}
	});
}


function disjoinEvent (idRequest, idEvent){

	var params = "/" ;
	params = params.concat(ide); 
	params = params.concat("/");
	params = params.concat(tok);
	params = params.concat("/");
	params = params.concat(idEvent);
	  
	var url = "../develop/actions/goToEvent.php";
	url = url.concat(params);
	$.ajax({
			url:url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);
          		var button = document.getElementById("join-event-" + idEvent);
		  		button.innerHTML ='Me Apunto';
			  
			},
			onerror: function(e,val){
				alert("No se puedo eliminar del evento");
			}
	});
}

</script>
<script type="text/javascript">
function eventProfileTest(idRequest) {
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idRequest);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
            var partierEvents;
            if(ide != idRequest){
            	partierEvents = getVisitorEvents();
            } 
			  
			var key, count = 0;
			for(key in json) {
	  			if(json.hasOwnProperty(key)) {
		    		count++;
		  		}
			}
	   		count=count-3;		  
			
			var i=0;
		
			while (i<count)
			  	{
					var events=document.getElementById('ul').innerHTML;
					
					var dateEvent = json[i].date; 
					var year = dateEvent.substring(0,4);
					var month = dateEvent.substring(5,7);
					var day = dateEvent.substring(8,11);
					var eventDate = day+'-'+month+'-'+year;
					var date = json[i].createdTime;
					var startHour = json[i].startHour;
					var starH = startHour.substring(0,5);
					var closeHour = json[i].closeHour;
					var closeH = closeHour.substring(0,5);
					
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
	
					events = events.concat("<li><div class='workflow-item hover' style='background-image:url(../images/reg2.jpg);background-size:100% 100%'></div>");
					events = events.concat("<span class='label label-dark-blue' style='font-size:12px'>Evento Local</span> <?php echo get_local_name_club(); ?>");
					events = events.concat("<span style='font-size:12px;color:orange'>  publicado <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
					events = events.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'>Título Evento <b style='color:orange'>'");
					events = events.concat(json[i].title);
					events = events.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
					events = events.concat(json[i].text);
					events = events.concat("</P>");
					events = events.concat("<p style='color:#ff6b24'>Fecha : <b style='color:#34d1be'> ");
					events = events.concat(eventDate);
					events = events.concat("</b>, a partir de  <b style='color:#34d1be'>");
					events = events.concat(starH);
					events = events.concat("</b> hasta  <b style='color:#34d1be'>");
					events = events.concat(closeH);
					events = events.concat("</b> hrs.</p>");
					if(ide != idRequest){
						if(partierEvents.indexOf(json[i].idEvent) > -1){//Event in array, display disjoin
							events=events.concat('<button type="button" id="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button>');
						}else{//Event not in array, display join
							events=events.concat('<button type="button" id="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button>');
						}
					}
					events = events.concat("</td></tr></tbody></table>");
					
					document.getElementById('ul').innerHTML=events;		
				
				i=i+1;	
				}
				document.getElementById('local_followers').innerHTML=i;	
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

}
</script>
</head>

<body> <!--onload="JavaScript:timedRefresh(30000);">-->
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



<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;margin-left:1%;margin-right:-20%">
					<h1 style="color:#ff6b24;font-size:30px;margin-left:4%;">Perfil Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							<div class="col-lg-11 col-md-8 col-sm-8" >
								<div class="main-box clearfix"style="margin-left:4%;width:100%;background-color:#1B1E24;border-color:#ff6b24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<h2 name="localName" style="color:#ff6b24;text-transform: uppercase; text-align:center;"><?php //echo get_local_name_club(); ?></h2>
									
									<img name="club-image" alt="" class="profile-img img-responsive center-block banner1" style="border-color:#ff6b24;"/>
									<div class="profile-since"style="color:#707070;margin-top:1%;margin-bottom:-2%">
										Miembro desde: Ene 2012	
										<ul class="fa-ul" >
											<!--<li style="color:#transparent"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i> <?php echo get_poblation_local_club();?></li>-->
											<li  style="color:transparent;"><span style="color:#ff6b24">Seguidores: </span><span name="followers" style="color:#34d1be"> </span></li>
											<li  style="color:transparent;"><span style="color:#ff6b24">Publicaciones: </span>
											<span style="color:#34d1be" id="local_followers">  </span></li>
											
											<script>
												if (ide!=ideEvent)
													document.write("<li  style='color:transparent;'><a href='../club/statistics.php?idv="+ideEvent+"'>Ver estadisticas</a></li>");
											</script>
											
										</ul>
										<script>
											paintButton();
										</script>
										<!--<input id="btnVoy01"  class="btn btn-success botonvoy" type="button"value="Quiero Asistir"onClick="btnVoy(this);"style="margin-top:-5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
										<input id="btn01"  class="btn btn-success botonseguir " type="button"value="Agregar Local"onClick="btnSeguir(this);"style="margin-left:50%;margin-top:-7%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">-->
					    
					                     </div>			
								</div>
							</div>
						</div>
						
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-11 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="margin-left:9%;background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									
									
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-activity" data-toggle="tab">Actividad</a></li>
											<li><a href="#tab-friends" data-toggle="tab">Seguidores</a></li>
											<li><a href="#tab-songs" data-toggle="tab">Canciones</a></li>
											<li><a href="#tab-lists" data-toggle="tab">Listas</a></li>
											<li><a href="#tab-photos" data-toggle="tab">Fotos</a></li>
											<li><a href="#tab-contact" data-toggle="tab">Contacto</a></li>
										</ul>
										<!-- Begin Activity -->
										<div class="tab-content" style="overflow:visible;">
											<div class="tab-pane fade in active" id="tab-activity">
												
															
																<div class="the-timeline">
																	<ul id="ul">
																		<script>
																			eventProfileTest("<?php echo $id_event;?>");
																		</script>
																		<!-- Comienza Evento -->
																	<!--	<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> 
																				<span style="font-size:12px;color:orange">publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
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
																		<!-- Termina Evento -->
																		<!-- Comienza Evento -->
																		<!--<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Lista Local</span> 
																				<span style="font-size:12px;color:orange;"> publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Lista</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn02"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
																					</td>
																				</tr>
																			</tbody>
																		</table> 
																		<!-- Termina Evento -->
																	</ul>
																</div>	
											</div>
										<!-- End Activity -->	
										<!-- Begin Friends -->
											<div class="tab-pane fade " id="tab-friends">
												<ul class="widget-users row" id="friends">
														<script>
															
															showFans();
														</script>
														
												</ul>
												
											</div>
										<!-- End Friends -->	
										
										<!-- Begin Songs -->
											<div class="tab-pane fade " id="tab-songs">
												<div class="container" >
		
													<div class="row">
														<table id="local_songs" class="table user-list">
															<thead>
																<tr>
																	<th><span style="color:#FF6B24;border-color:#ff6b24">Canción</span></th>									
																	<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Nombre artista</span></th>
																	<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Votos</span></th>
																	<th>&nbsp;</th>
																</tr>
																<script>
																	show_songs_list_profile();
																 </script>
															</thead>
															<tbody>
															</tbody>
														</table>
													</div>	
				
												</div>
											</div>
										<!-- End Songs -->
										
										<!-- Begin Lists -->
										<div class="tab-pane fade " id="tab-lists">
											<div class="the-timeline">
												<ul id="myLists">
														<script>
															myListsProfile();
														</script>
												</ul>
											</div>

										</div>
										<!-- End lists -->
										
											<!-- Begin Photos -->
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
	
											</div>	<!-- End Photos -->
											
											<div class="tab-pane fade " id="tab-contact">
												<div class="col-lg-4 " >
													<h3 style="border-color:#ff6b24;text-align:center"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
													<p name="about" style="color:#707070;margin-left:3%;margin-right:3%;font-size:14px">
															<?php //echo $_SESSION['about']; ?>
													</p>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Estilo de música <span name="music" style="margin-left:2%;color:#707070; font-size:14px"> <?php //echo $_SESSION['music']; ?></span>
														</div>	
													</div>
													<br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Precio de Entrada <span name="entryPrice" style="margin-left:2%;color:#707070; font-size:14px"> <?php //if( $_SESSION['entry_price']!=0) echo $_SESSION['entry_price']." €"; ?></span>
														</div>	
													</div>
													<br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Precio de Bebida <span  name="drinkPrice" style="margin-left:3%;color:#707070; font-size:14px"> <?php //if($_SESSION['drink_price']!= 0) echo $_SESSION['drink_price']." €" ;?></span>
														</div>	
													</div>
												</div>
												<div class="col-lg-8">
													<h3 style="border-color:#ff6b24;text-align:center"><span style="color:#ff6b24;border-color:#ff6b24">Localización</span></h3>	
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															<!--Dirección <span style="margin-left:2%;color:#707070; font-size:14px"> <?php if (get_street_club() == 0) echo 'Calle'; ?>
																				<?php if (get_street_club() == 1) echo 'Avd.'; ?>
																				<?php if (get_street_club() == 2) echo 'Plaza'; ?>
																				<?php echo get_street_name_club(); ?>,
																				<?php echo get_poblation_local_club();?>
																				<?php echo get_cp_local_club();?></span>-->
															Dirección <span name="address" style="margin-left:2%;color:#707070; font-size:14px"></span>
														</div>	
													</div><br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Teléfono <span name="telephoneLocal" style="margin-left:2%;color:#707070; font-size:14px"> <?php //echo get_telephone_club();?></span>
														</div>	
													</div><br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
														<!--	Horario <span name="openingHours" style="margin-left:2%;color:#707070; font-size:14px"> <b>Apertura: </b><?php echo get_opening_hours_club();?></span>
																	<br><span style="margin-left:12%;color:#707070; font-size:14px">Cierre: <?php echo get_close_hours_club();?></span> -->
															Horario <span name="openingHours" style="margin-left:2%;color:#707070; font-size:14px"></span>
															<br><span name="closeHours" style="margin-left:12%;color:#707070; font-size:14px"></span>
														</div>	
													</div>
												</div>
												<div class="row">
												<div class="col-lg-8" style="margin-left:10%;margin-top:2%">
												<!-- Hidden values for map -->
													<input type="hidden" id="latitude" name="latitude"/>
													<input type="hidden" id="longitude" name="longitude"/>
												<?php include "map.php";?>
												</div>
												</div>
											</div>
									
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
