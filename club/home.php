<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Home Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
	
	<!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
	
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
	<link href="../css/custom.css" rel="stylesheet" media="screen">
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/club-template.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	   

	<!-- script -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/events.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/registro.js"></script>
	<script src="../js/keep-session.js"></script>
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>	
	<!-- /script -->

<script type="text/javascript">
function cosa(but)
{
myButtonID = but.id;
if(document.getElementById(myButtonID).className=='ccosa')
{
document.getElementById(myButtonID).className='dcosa';
document.getElementById(myButtonID).value='Me apunto';
}
else
{
document.getElementById(myButtonID).className='ccosa';
document.getElementById(myButtonID).value='Apuntado';
}
}
</script>
<script type="text/javascript">
function eventHomeTest() {
	
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
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/
			  
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
	
					events = events.concat("<li><div class='workflow-item hover' style='background-image:url(../images/reg2.jpg);background-size:100% 100%'></div>");
					events = events.concat("<span class='label label-dark-blue' style='font-size:12px'>Evento Local</span> <?php echo $_SESSION['local_name']; ?>");
					events = events.concat("<span style='font-size:12px;color:orange'>  publicado <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
					events = events.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'>Título Evento <b style='color:orange'>'");
					events = events.concat(json[i].title);
					events = events.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
					events = events.concat(json[i].text);
					events = events.concat("</P>");
					events = events.concat("<p style='color:#ff6b24'>Fecha : <b style='color:#34d1be'> ");
					events = events.concat(json[i].date);
					events = events.concat("</b> , a partir de  <b style='color:#34d1be'>");
					events = events.concat(json[i].startHour);
					events = events.concat("</b> hasta  <b style='color:#34d1be'>");
					events = events.concat(json[i].closeHour);
					events = events.concat("</b></p>");
					events = events.concat("<a href='events.php'><input class='btn btn-success ' type='button'value='Editar'style='margin-left:42%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'></a>");
					events = events.concat("</td></tr></tbody></table>");

						document.getElementById('ul').innerHTML=events;				
				i=i+1;	
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
	body{background-color:#000;}		
    </style>

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
	
</script>

<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Inicio Local</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
							<!--Aqui empieza-->	
								<!--EVENTS-->	
								<div class="col-sm-6">	
									<div class="profile-header" style="text-align:left">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Eventos</span><a href="events.php"><input class="btn pull-right" type="button"value="Crear Evento"style="font-family:'Lucida Sans Unicode','Lucida Grande', sans-serif;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-right:8%;"></a></h3>
										
									</div>
									
									<div class="the-timeline">
										<ul id="ul">
											<script>
												eventHomeTest();
											</script>
										</ul>
									</div>
								</div>
									<!--LISTS-->

								<div class="col-sm-6">
										<div class="profile-header" style="text-align:left">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Listas</span><!--<a href=""><input class="btn pull-right" type="button"value="Crear Lista"style="font-family:'Lucida Sans Unicode','Lucida Grande', sans-serif;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-right:8%;"></a>--></h3>
										</div>
									
									<div class="the-timeline">
										<ul id="ul">
											<!--<script>
												eventHomeTest();
											</script>-->
										</ul>
									</div>
																	
								</div>
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
