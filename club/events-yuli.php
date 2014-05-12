<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-Events Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
	<!-- Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link href="../css/events-yuli.css" media="screen" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
    <!-- script -->
	<script src="../js/fillDate.js"></script>
   	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>
	<script src="../js/keep-session.js"></script>
    <script src="../js/autoRefresh.js"></script>
	<!-- /script -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
 	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {

           $("#datepicker").datepicker();

        });
		
		
	   $('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	
		
    </script>
<script type="text/javascript">
function myEvents(){
	


var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
            
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
					var events=document.getElementById('myEvents').innerHTML;
					
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
					var idEvent = json[i].idEvent;
					
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
					events = events.concat("<span class='label label-dark-blue' style='font-size:12px'>Evento Local</span> ");
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
					events = events.concat("<a href=''id='"+idEvent+"'class='btn pull-right' onclick='deleteEvent(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Eliminar</span></a>");
					events = events.concat("</td></tr></tbody></table>");
					
					document.getElementById('myEvents').innerHTML=events;		
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

	
}
function deleteEvent(id) {
	

var params = "/" ;
	params=params.concat(id); 
	params=params.concat("/");
	params=params.concat(ide);

	  
	var url="../develop/update/event.php";
		url=url.concat(params);


//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id evento y el id del profile

$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			timeout: 5000,
			async: false,
			complete: function(r){
			  alert(r.responseText);
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);
	
	
}

</script>
<script type="text/javascript">
function newEvent(type) {

var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	  
var url="../develop/create/event.php";
	url=url.concat(params);

var actualdate=document.getElementById("datepicker").value;
var title2 = document.getElementById("Title").value;
var description = document.getElementById("Description").value;

var list_hour_init= document.getElementById("hour-init");
var hour_init = list_hour_init.options[list_hour_init.selectedIndex].text;

var list_minutes_init= document.getElementById("minutes-init");
var minutes_init = list_minutes_init.options[list_minutes_init.selectedIndex].text;

var list_hour= document.getElementById("hour");
var hour = list_hour.options[list_hour.selectedIndex].text;

var list_minutes= document.getElementById("minutes");
var minutes = list_minutes.options[list_minutes.selectedIndex].text;


var time1 = hour_init.concat(":");
time1=time1.concat(minutes_init);

var time2 = hour.concat(":");
time2=time2.concat(minutes);

//var fileName = document.getElementById('upload').value;
if (!(title2=="")){

	if (!actualdate==""){

		fif(!(hour=="HH"||minutes=="MM"||hour_init=="HH"||minutes_init=="MM")){
		
		
		$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				idProfile:ide,
				title: title2,
				text: description,
				date: actualdate,
				startHour: time1,
				closeHour: time2
			},
			complete: function(r){
			  			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
		
    document.getElementById('ul').innerHTML="";
     events(type);		    
		   
		  }else alert("evento sin hora");
	   
   		} else alert("introduce fecha");
   
   
   }else
   		alert("introduce al menos un título");

	clean();

}
function clean(){
	
	var inputText=document.getElementById("Title");
	var inputTextArea=document.getElementById("Description");
    var inputdate=document.getElementById("datepicker");
	

var list_hour_init= document.getElementById("hour-init");
list_hour_init.selectedIndex=0;

var list_minutes_init= document.getElementById("minutes-init");
list_minutes_init.selectedIndex=0;

var list_hour= document.getElementById("hour");
list_hour.selectedIndex=0;

var list_minutes= document.getElementById("minutes");
list_minutes.selectedIndex=0;


    
    inputdate.value="";
    inputText.value="";
    inputTextArea.value="";
}
</script>
</head>

<body>
<?php 
  	/*NavbarHeader*/
 	include "templates/navbar-header.php";

 	 /*Sidebar*/
  	include "templates/sidebar.php";


$idProfile=$_SESSION['id_user']; 
$token=$_SESSION['token']; 

?>


<script>
	

var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
var ideEvent = '<?php echo $id_event; ?>' ;	
</script>
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
					<h1 style="color:#ff6b24;font-size:30px;">Eventos Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-newEvent" data-toggle="tab">Crear Evento</a></li>
											<li><a href="#tab-myEvents" data-toggle="tab">Mis Eventos</a></li>
										</ul>
										
										<div class="tab-content">
										<!-- Comienza Basic-->
											<div class="tab-pane fade in active" id="tab-newEvent">
												<form class="form-horizontal" style="width:99%"role="form">
													<div class="form-group">
                                                        <label for="title" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Título Evento</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" id="Title" name="" placeholder="Título Evento">
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="description" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Descripción</label>
                                                        <div class="col-lg-9">
                                                            <textarea id="Description" class="form-control" placeholder="Descripción del Evento..." rows="6" style="font-size:13px"></textarea>
                                                        </div>
                                                    </div>
													<div class="form-group">
														<label for="startendate" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;margin-left:0%;">Fecha</label>
														<div class="col-sm-2">
															<i  class="glyphicon glyphicon-calendar" style="margin-left:0px;font-size:18px;margin-top:3%;color:#34d1be;"></i> 
															<input type="text" id="datepicker" readonly="readonly" style="width:75%;background: #1B1E24;color: #fff;border: 1px solid #1B1E24;" placeholder=""/>
                                                         </div>   
															<label for="" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;margin-left:-5%;">Hora Inicio</label>
                                                            <div class="col-sm-2">
                                                                <select id="hour-init" class="form-control" style="width:45%">
																	<option value="0" selected="1">HH</option>
																	<script>
																		SelectOptionRange(0,24);
																	</script>	
																</select>
																<span style="font-size:1.7em ">:</span>
																<select id="minutes-init" class="form-control"style="width:45%">
																	<option value="0" selected="1">MM</option>
																	<script>
																		SelectOptionRange(0,60);
																	</script>
																</select>
                                                            </div>
															<label for="" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Hora Fin</label>
                                                            <div class="col-sm-2">
																<select id="hour" class="form-control"style="width:45%">
																	<option value="0" selected="1">HH</option>
																	<script>
																		SelectOptionRange(0,24);
																	</script>	
																</select>
																<span style="font-size:1.7em ">:</span>
																<select id="minutes" class="form-control"style="width:45%">
																	<option value="0" selected="1">MM</option>
																	<script>
																		SelectOptionRange(0,60);
																	</script>
																</select>    
                                                            </div>
                                                        </div>
														<input type="button" value="CREAR EVENTO" style="width:20%; margin-left:40%" onclick="newEvent('club');"/>
														<!--<a id="" class="btn btn-success" onclick="newEvent('club');"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Crear Evento</a>-->
												</form>
													
	       
											</div>
										<!-- Termina Basic -->	
										<!-- Comienza Details -->
											<div class="tab-pane fade " id="tab-myEvents">
												<div class="the-timeline">
													<ul id="myEvents">
														<script>
															myEvents();
														</script>
													</ul>
												</div>
											</div>
										<!-- Termina Details -->		
								</div> <!-- Termina tab-content -->
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MiPerfil --> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
</body>
</html>
