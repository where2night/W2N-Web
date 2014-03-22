<?php

include_once "../framework/sessions.php";

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
    <!-- Bootstrap Styles-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    
    <link rel="stylesheet" href="../css/inicio-fiestero.css" type="text/css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
   <script src="../js/tab.js"></script>
   <script src="../js/events.js"></script>

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
		
	.elementosconhover:hover {
	opacity:0.6;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=29)";
	filter:alpha(opacity=19);

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
			<li class="active"><a href="#Events" data-toggle="tab" >Proximos Eventos</a></li>
			<li><a href="#Lists" data-toggle="tab">Listas de locales</a></li>
			<li><a href="#MyEvents" data-toggle="tab">Mis eventos</a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div class="tab-pane active" id="Events" style="margin-left: 35px; margin-right: 200px;">
				
				<!-- Next Events -->
						<div  class="timeline">
							<ul>
								<li>
									<div class="timeline-title orangeBox1 ">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party2.jpg" alt="" />
										<h6>NOMBRE CLUB</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">31/01/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-thumbs-up"style="color:#000"></i>Me gusta</a>
									</div>
									<div class="timeline-content orangeBox1">
										<p>Dnim eiusmod high life accusamus terry richardson ado squid. 3 wolfmoon officia aute, non cupidatat</p>
									</div>
								</li>
								<li>
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party3.jpg" alt="" />
										<h6>NOMBRE DJ</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">02/02/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-thumbs-up"style="color:#000"></i>Me gusta</a>
										
									</div>
									<div class="timeline-content orangeBox1">
										<p>Dnim eiusmod high life accusamus terry richardson ado squid. 3 wolfmoon officia aute, non cupidatat</p>
									</div>
								</li>
								<li>
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party2.jpg" alt="" />
										<h6>NOMBRE CLUB</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">14/02/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-thumbs-up"style="color:#000"></i>Me gusta</a>
									</div>
									<div class="timeline-content orangeBox1">
										<p>Dnim eiusmod high life accusamus terry richardson ado squid. 3 wolfmoon officia aute, non cupidatat</p>
										<img src="../images/copas.jpg" alt="" />
									</div>
								</li>
							</ul>
						</div>
						</div><!-- col-md-5-->
						
				
			
			<div class="tab-pane" id="Lists" style="margin-left: 120px" > 
			
			  <div class="latest-tweets orangeBox1 " style="width:80%; margin-top:15px">
					
							<div class="latest-tweets-head" >
								<span ><i class="glyphicon glyphicon-glass" style="color:#FF6B24"></i>LISTA LOCAL 1</span>
								<label style=" color:#FF6B24; float: right; margin-top: 6px; margin-left: 5px"> Me apunto</label> <i class="glyphicon glyphicon-ok"style="color:#FF6B24; float: right; top: 6px"></i>
							</div> 
							
					
						 
						 <ul class="orangeBox1">
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Evento <i>Nombre DJ</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i><br><img class="menu-avatar orangeBox1"src="../images/copas.jpg" alt="" /></a>
									</li>
								</ul>
								
							  
						</div> 
						
						 
						
						 <div class="latest-tweets orangeBox1" style="width:80%; margin-top:15px">
							
							<div class="latest-tweets-head" >
								<span ><i class="glyphicon glyphicon-glass"style="color:#FF6B24"></i>LISTA LOCAL 2</span>
								<label style=" color:#FF6B24; float: right; margin-top: 6px; margin-left: 5px"> Me apunto</label> <i class="glyphicon glyphicon-ok"style="color:#FF6B24; float: right; top: 6px"></i>
							</div>
								<ul class="orangeBox1">
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Evento <i>Nombre DJ</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i><br><img class="menu-avatar orangeBox1"src="../images/copas.jpg" alt="" /></a>
									</li>
								</ul>
					
						</div>
			
			</div>
			
			
			
			<div class="tab-pane" id="MyEvents" style="margin-left: 35px; margin-right: 200px;">
				
				<div  class="timeline">
							<ul>
								<li id="button1">
									<div class="timeline-title orangeBox1 ">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party2.jpg" alt="" />
										<h6>EVENTO CLUB</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">31/01/2014</i>
										<a class="orangeBox1" id="button1" onclick="deleteEvent(this.id);"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
									</div>
									
								</li>
								<li id="button2">
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party3.jpg" alt="" />
										<h6>EVENTO DJ</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">02/02/2014</i>
										<a class="orangeBox1" id="button2" onclick="deleteEvent(this.id);"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
										
									</div>
									
								</li>
								<li id="button3">
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party2.jpg" alt="" />
										<h6>EVENTO CLUB</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">14/02/2014</i>
										<a class="orangeBox1" id="button3" onclick="deleteEvent(this.id);"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
									</div>
									
								</li>
								
								<li id="button4">
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party2.jpg" alt="" />
										<h6>LISTA LOCAL</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">14/02/2014</i>
										<a class="orangeBox1" id="button4" onclick="deleteEvent(this.id);"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
									</div>
									
								</li>
							</ul>
						</div>
						</div><!-- col-md-5-->
				
				
				</div>
	 </td>
		
		
	</tr>

	</table>

	<!--/Events>

	<!-- script -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- /script -->

</body>
</html>
