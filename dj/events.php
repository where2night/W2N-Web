<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Eventos DJ</title>
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
			<li class="active"><a href="#MyEvents" data-toggle="tab">Eventos DJ</a></li>
			<li><a href="#NewEvent" data-toggle="tab" >Crear evento</a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div class="tab-pane active" id="MyEvents" style="margin-left: 35px; margin-right: 200px;">
				
				<div  class="timeline">
							<ul>
								<li>
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party3.jpg" alt="" />
										<h6>EVENTO DJ 1</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">02/02/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
										
									</div>
									
								</li>
								<li>
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party3.jpg" alt="" />
										<h6>EVENTO DJ 2</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">02/02/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
										
									</div>
									
								</li>
								<li>
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party3.jpg" alt="" />
										<h6>EVENTO DJ 3</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">02/02/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
										
									</div>
									
								</li>
								
								<li>
									<div class="timeline-title orangeBox1">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party3.jpg" alt="" />
										<h6>EVENTO DJ 4</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">02/02/2014</i>
										<a class="orangeBox1"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
										
									</div>
									
								</li>
							</ul>
						</div>
						</div><!-- col-md-5-->
				
				
				<div class="tab-pane" id="NewEvent" style="margin-left: 35px; margin-right: 200px;">
				
				<!-- New Events -->
				

				<table border="0" style="margin-top: 1%; margin-left: 5%">
				
					<tr>
						<td>
							<h3 style="color: #F4A460; margin-left: 15%;"><em>TÍTULO</em></h3>
						</td>
						
						<td>
							<input id="Title"  type="text" size="50%" class="form-control" placeholder="Título del evento" required style="margin-left: 5%; margin-top: 5%; color: #000000;background-color: #d3d3d3"/>
						</td>
					</tr>
					
						<td colspan="2">
							<h3 style="color: #F4A460; margin-left: 30% "><em>DESCRIPCIÓN</em></h3>
						</td>
					
					
					<tr>
					     <td colspan="2">
							<textarea id="Description"  class="form-control"  size="50%"  style="margin-left: 5%; margin-top: 5%; height:200px;color: #000000;background-color: #d3d3d3"></textarea>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<h3 style="color: #F4A460; margin-left: 5%; margin-top: 8% "><em>FOTO DE PROMOCIÓN</em></h3>
						</td>
				
					</tr>
					
					<tr>
					   <td colspan="2">
							<input type=file size=50 style="color: #F4A460; margin-left: 5% "/>
						</td>
					</tr>
				
				<tr>
						<td colspan="2">
							 <button type="submit" class="btn btn-default" onClick="NewEvent();" style="color: #000000;margin-left: 80%;margin-top: 8%">Crear evento</button>
						</td>
				
					
				</tr>
				
				
				</table>
				



				
			    </div>
				
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
