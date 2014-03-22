<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<title>W2N-Events DJ</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Styles-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/inicio-fiestero.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
    
    <!-- script -->
	<script src="../js/tab.js"></script>
	<script src="../js/fillDate.js"></script>
   	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/events.js"></script>

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
    </script>

	<!-- /script -->

</head>

<body>
	
	<style>

	body{
		background-image:url(../images/wall.jpg);
		background-color: #000000;
	}

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
		
		
	 #fuente{ 
		font-size: 1.7em;
		color:#F59236;
		text-decoration: none;
		-moz-text-decoration-color: -moz-use-text-color;
		-moz-text-decoration-line: none;
		-moz-text-decoration-style: solid;

		}
		
		
.Mybutton {
    background-color:#F4A460;
    padding:10px;
    position:relative;
    font-family: 'Open Sans', sans-serif;
    font-size:12px;
    text-decoration:none;
    color:#000;
    box-shadow: inset 0px 1px 0px #b2f17f, 0px 6px 0px ##F4A460;
    border-radius: 5px;
}
 
.Mybutton:active {
    top:7px;
    box-shadow: inset 0px 1px 0px #b2f17f, inset 0px -1px 0px ##F4A460;
    color: #000;
}
    

.Mybutton::before {
    background-color:#F4A460;
    content:"";
    display:block;
    position:absolute;
    width:100%;
    height:100%;
    padding-left:2px;
    padding-right:2px;
    padding-bottom:4px;
    left:-2px;
    top:5px;
    z-index:-1;
    border-radius: 6px;
    box-shadow: 0px 1px 0px #fff;
}
 
.Mybutton:active::before {
    top:-2px;
}


	 </style>
    
	<script>
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})

	   
	</script>
    
<?php 
  	/*NavbarHeader*/
 	include "templates/navbar-header.php";

 	 /*Sidebar*/
  	include "templates/sidebar.php";
?>


	<!-- Events -->


	<table style="margin-left:200px" border=0 width="100%" >
	<tr>
		
		<td>
		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" style="border: 1.5px solid #FF6B24; background-color: #000000;">
			<li class="active"><a href="#NewEvent" data-toggle="tab" onclick="clean();">Crear evento</a></li>
			<li ><a href="#MyEvents" data-toggle="tab">Eventos DJ</a></li>
			
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div class="tab-pane" id="MyEvents" style="margin-left: 35px; margin-right: 200px;">
				
				<div  class="timeline">
							<ul id="ul">
								
							</ul>
				</div>
			</div><!-- col-md-5-->
				
				
			<div class="tab-pane active" id="NewEvent" style="margin-left: 35px; margin-right: 200px;">
				
				<!-- New Events -->
				<div style="float: left">
					<h3 style="color: #F4A460;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87"><em>TÍTULO</em></h3>
				</div>
				
				<div style="float: left;margin-top: 2%;margin-left:5%; margin-bottom: 5%">
					<input id="Title" type="text" style="width: 350px;background-color: #d3d3d3" class="form-control" placeholder="Título del evento" required style=" color: #000000;background-color: #d3d3d3"/>
				</div>
				
				<div style="float: right; margin-top: 3%; margin-right: 2%">
				 	<img src="../images/logo7_gris.png">
				 </div>		
				
				<div style="clear: left" >
					<h3 style="color: #F4A460; margin-left: 15%;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87"><em>DESCRIPCIÓN</em></h3>
				    <div style="float: right">
				    	<div>
							<label style="color: #F4A460;margin-right:3%;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87;font-size:1.7em ">Fecha</label>
				        </div>
						<div>
							<input type="text" id="datepicker" readonly="readonly" size="12" style="width: 35%;background-color: #d3d3d3;color: #000;margin-right:50%" />
						</div>
				   </div>
				</div>		
						
				
				<div style="clear: left; margin-top: 5%"> 
					<textarea id="Description"  class="form-control" style="height:200px; width:500px ;color: #000000;background-color: #d3d3d3"></textarea>
				</div>
				
					<div style="clear: left;margin-top: 5%;margin-right: 8%">
				 
				   	<div>
				 		<label style="color: #F4A460;margin-right:5%;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87;font-size:1.7em ">inicio evento</label>
						<label style="color: #F4A460;margin-left:15%;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87;font-size:1.7em ">fin evento</label>
					</div>
					<div>
						<select id="hour-init" style="width: 10%;background-color: #d3d3d3">
	            			<option value="0" selected="1">HH</option>
	          					<script>
	        						SelectOptionRange(0,24);
	        					</script>	
	            	 	</select>
	            	<span style="color: #F4A460;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87;font-size:1.7em ">:</span>
	            		<select id="minutes-init" style="width: 10%;background-color: #d3d3d3">
	            			<option value="0" selected="1">MM</option>
	            				<script>
	        						SelectOptionRange(0,60);
	        					</script>
	                	</select>
	            
						<select id="hour" style="width: 10%; margin-left: 15%;background-color: #d3d3d3">
	            			<option value="0" selected="1">HH</option>
	          					<script>
	        						SelectOptionRange(0,24);
	        					</script>	
	            	 	</select>
	            	<span style="color: #F4A460;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87;font-size:1.7em ">:</span>
	            		<select id="minutes" style="width: 10%;background-color: #d3d3d3">
	            			<option value="0" selected="1">MM</option>
	            				<script>
	        						SelectOptionRange(0,60);
	        					</script>
	                	</select>
	            	</div>
				</div>
			
				
				
				<div style="float: right;margin-top: 5%;margin-right: 8%">
				 	<img src="../images/logo3_gris.png">
				 </div>
				
				<div style="clear: left; margin-top: 5%"> 
					<h3 style="color: #F4A460; margin-left: 5%;text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87"><em>FOTO DE PROMOCIÓN</em></h3>
				</div>
				
				<div style="clear: left; margin-top: 3%"> 
					<input type=file size=50 style="color: #F4A460; margin-left: 5% " id="upload"/>
				 </div>
				 
				 
				
				<div style="float: left">
					<button type="submit" class="Mybutton" onClick="newEvent('dj');" style="margin-left: 70%;margin-top: 8%">crear evento</button>
				</div>
			
			
			</div>
				
				</div>
	 </td>
		
		
	</tr>

	</table>

	<!--/Events>-->

	

</body>
</html>
