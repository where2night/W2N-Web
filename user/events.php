<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-Events User</title>
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
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>
	
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

function myEvents(){
	
	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;

	var url2="../develop/actions/myEvents.php";
	url2=url2.concat(params);

	$.ajax({
		url:url2,
		dataType: "json",
		type: "GET",
		complete: function(r3){
			var json = JSON.parse(r3.responseText);
			var rows = json.rows;
			for(var i=0; i<rows; i++){
				var events=document.getElementById('myEvents').innerHTML;
				var picture = json[i].pictureC;
				var dateEvent = json[i].date; 
				var year = dateEvent.substring(0,4);
				var month = dateEvent.substring(5,7);
				var day = dateEvent.substring(8,11);
				var eventDate = day+'-'+month+'-'+year;
				var date = json[i].createdTime;
				/*Calculates uptime*/
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
					
					var title = json[i].title;
					var startHour = json[i].startHour;
					var starH = startHour.substring(0,5);
					var closeHour = json[i].closeHour;
					var closeH = closeHour.substring(0,5);
					var text = json[i].text;
					var localName = json[i].name;
					var idEvent = json[i].idEvent;

				if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					events = events.concat("<li><div class='workflow-item hover' style='background-image:url("+picture+");background-size:100% 100%'></div>");
					events = events.concat("<span name='localName' class='label label-dark-blue' style='font-size:12px'>Evento Local</span> "+localName+" ");
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
					events = events.concat("<a href='events.php'id='"+idEvent+"'class='btn pull-right' onclick='disjoinEvent(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Me Desapunto</span></a>");
					events = events.concat("</td></tr></tbody></table>");
					
					document.getElementById('myEvents').innerHTML=events;			   
			}

		},
		onerror: function(e,val){
		alert("No se puede introducir evento 2");
		}
		});	
}
function disjoinEvent(id){

var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id);
	
	var url = "../develop/actions/goToEvent.php";
	url=url.concat(params);
	
    $.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			timeout: 5000,
			async: false,
			complete: function(r2){
				
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});
	myEvents();	
}
function allEvents(){
	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;

	var url2="../develop/actions/eventsDontGo.php";
	url2=url2.concat(params);
	$.ajax({
		url:url2,
		dataType: "json",
		type: "GET",
		complete: function(r3){
		
			var json = JSON.parse(r3.responseText);
			var rows = json.rows;
			/*var partierEvents;
            if(ide != idRequest){
            	partierEvents = getVisitorEvents();
            } */
            
			for(var i=0; i<rows; i++){
			
				var events=document.getElementById('allEvents').innerHTML;
				
				var picture = json[i].pictureC;
				var dateEvent = json[i].date; 
				var year = dateEvent.substring(0,4);
				var month = dateEvent.substring(5,7);
				var day = dateEvent.substring(8,11);
				var eventDate = day+'-'+month+'-'+year;
				var date = json[i].createdTime;
				/*Calculates uptime*/
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
					
					var title = json[i].title;
					var startHour = json[i].startHour;
					var starH = startHour.substring(0,5);
					var closeHour = json[i].closeHour;
					var closeH = closeHour.substring(0,5);
					var text = json[i].text;
					var localName = json[i].name;
					var idEvent = json[i].idEvent;

				if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					events = events.concat("<li><div class='workflow-item hover' style='background-image:url("+picture+");background-size:100% 100%'></div>");
					events = events.concat("<span name='localName' class='label label-dark-blue' style='font-size:12px'>Evento Local</span> "+localName+" ");
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
					//BOTON//
					/*if(partierEvents.indexOf(json[i].idEvent) > -1){//Event in array, display disjoin
							events=events.concat('<button type="button" id="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button>');
						}else{//Event not in array, display join
							events=events.concat('<button type="button" id="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button>');
						}*/
					//FIN BOTON
					events = events.concat("</td></tr></tbody></table>");
					
					document.getElementById('allEvents').innerHTML=events;			   
			}

		},
		onerror: function(e,val){
		alert("No se puede introducir evento 2");
		}
		});
}
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
      $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 
	
?>
<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>
	
	<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Eventos Fiestero</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%"> 
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-myEvents" data-toggle="tab">Mis Eventos</a></li>
											<li><a href="#tab-allEvents" data-toggle="tab">Todos los Eventos</a></li>
										</ul>
										
										<div class="tab-content">
										<!-- Comienza Mis Eventos-->
											<div class="tab-pane fade in active" id="tab-myEvents">
												<!-- Comienza Evento -->
												<div class="the-timeline">
													<ul id="myEvents">
														<script>
															myEvents();
														</script> 
													</ul>
												</div>
												<!-- Termina Evento --> 		
																
											</div>
										<!-- Termina Mis Eventos -->	
										<!-- Comienza Todos los Eventos -->
											<div class="tab-pane fade " id="tab-allEvents">
												 <div class="the-timeline">
														<ul id="allEvents">
															<script>
																allEvents();
															</script>
														</ul>

													</div>
													<div id="show_more" name="both">

													</div>
											</div>
										<!-- Termina Todos los Eventos -->	

								</div> <!-- Termina tab-content -->
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
