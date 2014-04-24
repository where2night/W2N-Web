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
				var picture = json[i].picture;
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
					events = events.concat("<li><div class='workflow-item hover' style='background-image:url(../images/reg2.jpg);background-size:100% 100%'></div>");
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

var actual_page = 0;
function showMore(){
	/*Increases the page where I go*/
	actual_page = actual_page +1;

	/*prepares attributes for the server*/
	var idProfile = <?php echo $_SESSION['id_user']; ?>;
	var token =  "<?php echo $_SESSION['token']; ?>	";
	var params = "/" + idProfile + "/" + token;
	var page = 0;
	var url1 = "../develop/read/news.php" + params+"/"+actual_page;
	/*Sent by the server url page we now load, besides the token and identifier*/
	/*the query is made ​​to the server, via GET*/
	$.ajax({

		url: url1,
		dataType: "json",
		type: "GET",
		timeout: 5000,
		
		complete: function(r2){
			/*In response the server a list of 10 activities is received*/
			var json = JSON.parse(r2.responseText);
			var num_elements = json.numElems;
			var num_page = Math.floor(num_elements/10);
			
			/*Calculates if you follow the link to appear "show more"*/
			if (num_page == actual_page){
				var s = document.getElementById('show_more');
				var div = document.getElementById('show_more');

				div.innerHTML = '';
			}
			
			/*Calculate the maximum number of items you can go to the list*/
			var len = num_elements - actual_page*10;
			var max_elemts;
			
			if (len > 10){
				max_elemts = 10;
			}else if (len < 10){
				max_elemts = len;
			}
			
			/*Browse the list received*/
			for(var i=0; i<max_elemts; i++){
				/*The list that is returned is the activity that can be 5 types:
					1.- Created by local events that follow   --> the type we want here
					2.- Friends we follow, change status
					3.- Friends we follow, change their mode(De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)
					4.- Friend add to favorites a local
					5.- 5.- Events friends attending */
				var type = json[i].TYPE;
				var goes = json[i].GOES;
				var date = json[i].createdTime;
				var picture = json[i].picture;
				
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

				/*must distinguish what type of activity relates (mentioned above), to paint in the html in the right way*/
				if (type == 1){
					/*1.- Created by local events that follow*/
					var localName = json[i].localName;
					var title = json[i].title;
					var startHour = json[i].startHour;
					var closeHour = json[i].closeHour;

					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					var streetNameLocal = json[i].streetNameLocal;
					var streetNumberLocal = json[i].streetNumberLocal;
					var text = json[i].text;
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					
					$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><input id="btn01"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"></td></tr></tbody></table>');
				}
			}

		},
	
		onerror: function(e,val){
		alert("Problema al mostrar eventos");
		}
	});

}
	$(document).ready(function(){

	//Get user info
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + id;
	url1 += "user.php";
	url1 += params;
	
	$.ajax({
		url:url1,
		dataType: "json",
		type: "GET",
		complete: function(r3){
		var json = JSON.parse(r3.responseText);
		var name = json.name;
		var surnames = json.surnames;
		$("#navbar-complete-name").text(name + " " + surnames);
		$("#navbar-complete-name2").text(name + " " + surnames);
	},
	onerror: function(e,val){
		//alert("No se puede introducir evento 2");
	}
	});

	/*prepares attributes for the server*/
	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;
	var page = 0;
	var url1 = "../develop/read/news.php" + params+"/"+page;

	/*Sent by the server url page we now load, besides the token and identifier*/
	/*the query is made ​​to the server, via GET*/
	$.ajax({

		url: url1,
		dataType: "json",
		type: "GET",
		timeout: 5000,
		complete: function(r2){
			/*In response the server a list of 10 activities is received*/
			var json = JSON.parse(r2.responseText);
			var num_elements = json.numElems;
			
			/*Browse the list received*/
			for(var i=0; i<10; i++){
				/*The list that is returned is the activity that can be 5 types:
					1.- Created by local events that follow
					2.- Friends we follow, change status
					3.- Friends we follow, change their mode(De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)
					4.- Friend add to favorites a local
					5.- Events friends attending */
					
				var type = json[i].TYPE;
				var goes = json[i].GOES;
				var date = json[i].createdTime;
				var picture = json[i].picture;
				
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

				/*must distinguish what type of activity relates (mentioned above), to paint in the html in the right way*/
				if (type == 1){
					/*1.- Created by local events that follow*/
					var localName = json[i].localName;
					var title = json[i].title;
					var startHour = json[i].startHour;
					var closeHour = json[i].closeHour;

					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					var streetNameLocal = json[i].streetNameLocal;
					var streetNumberLocal = json[i].streetNumberLocal;
					var text = json[i].text;

					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><input id="btn01"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"></td></tr></tbody></table>');

				}
			}

		},
		onerror: function(e,val){
		alert("Contraseña y/o usuario incorrectos");
		}
	});
	
	$('#show_more').append('<a href="home.php#both" onclick="showMore();">Mostrar más..</a>	');

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
														<ul id="test">

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
