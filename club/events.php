<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
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
    <link href="../css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Styles-->
    <link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
   <link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
   <link href="../css/events.css" media="screen" rel="stylesheet" type="text/css" /> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
    
    <!-- script -->
	<script src="../js/tab.js"></script>
	<script src="../js/fillDate.js"></script>
   	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/events.js"></script>
	<script src="../js/keep-session.js"></script>
     <script src="../js/autoRefresh.js"></script>
	
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

	
	
	<!-- /script -->
	
</head>

<body id="home" onload="JavaScript:timedRefresh(30000);">

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


	<!-- Events -->


	<table style="margin-left:200px; margin-top:50px" border=0 width="100%" >
	<tr>
		
		<td>
		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" style="border: 1.5px solid #000; background-color: #000000;">
			<li class="active"><a href="#NewEvent" data-toggle="tab" onclick="clean();">Crear evento</a></li>
			<li ><a href="#MyEvents" data-toggle="tab">Eventos Club</a></li>
			
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div class="tab-pane" id="MyEvents" style="margin-left: 35px; margin-right: 200px;">
				
				<div  class="timeline">
							<ul id="ul">
                             <script>
							 events('club');
							 </script>
							
							</ul>
				</div>
			</div><!-- col-md-5-->
				
				
			<div class="tab-pane active" id="NewEvent" style="margin-left: 35px; margin-right: 200px;">
				
             <h1 style="padding-left:120px;color:#444">CREA TU PROPIO EVENTO </h1>
	     <div class="rain">
			<div class="border start">
				<form>
					<label for="title">TÍTULO</label>
					<input id="Title" type="text" placeholder="título del evento" style="background: #111;color: #fff;border: 1px solid #000;"/>
					<label for="description">DESCRIPCIÓN</label>
					<textarea id="Description" placeholder="descripción" style="background: #111;color: #fff;height:200px;border: 1px solid #000;"></textarea>
					<label for="startendate">FECHA <span style="margin-left:22%">INICIO EVENTO </span> <span style="margin-left:15%">FIN EVENTO </span> </label>
					
					<input type="text" id="datepicker" readonly="readonly" style="width:10%;background: #111;color: #fff;border: 1px solid #000;" placeholder="fecha" />
                    
						<select id="hour-init" style="width: 8%; color:#fff;margin-left:10%">
	            			<option value="0" selected="1">HH</option>
	          					<script>
	        						SelectOptionRange(0,24);
	        					</script>	
	            	 	</select>
						<span style="font-size:1.7em ">:</span>
	            		<select id="minutes-init" style="width: 8%;color:#fff">
	            			<option value="0" selected="1">MM</option>
	            				<script>
	        						SelectOptionRange(0,60);
	        					</script>
	                	</select>
									
						<select id="hour" style="width: 8%; margin-left: 5%;color:#fff">
	            			<option value="0" selected="1">HH</option>
	          					<script>
	        						SelectOptionRange(0,24);
	        					</script>	
	            	 	</select>
	            	<span style="font-size:1.7em ">:</span>
	            		<select id="minutes" style="width: 8%;color:#fff">
	            			<option value="0" selected="1">MM</option>
	            				<script>
	        						SelectOptionRange(0,60);
	        					</script>
	                	</select>
						
					

	            	
					<label for="photo" style="margin-top:3%; margin-left:2%">FOTO DE PROMOCIÓN</label>
					<input type=file id="upload" style="margin-left:3%"/>
		
					
			<input type="button" value="CREAR EVENTO" style="width:20%; margin-left:40%" onclick="newEvent('club');"/>
				</form>
			</div>
		</div>				




				
	        </div>
			
			
			
			</div>
				
				
	 </td>
		
		
	</tr>

	</table>

	<!--/Events>-->

	

</body>
</html>
