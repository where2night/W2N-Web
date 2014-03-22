<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile User</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

	<script type="text/javascript">  
	    $(document).ready(function(){ 
	      
	      $("#close_session").on("click", function (event) {
	        $.post("../framework/session_end.php",
	          {},
	          function(data,status){
	          var url = "http://www.where2night.es";
	          $(location).attr('href',url);
	          });
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
		
		.btn.btn-registro{
			
			background:#000;
			border:2px solid #D41F00;
			color:#F59236;
			
			padding: 17px 22px;
			position: fixed;
			bottom: 7.5%;
  			right: 0.5%;
			font-weight: 50;
			z-index:2;
		}		
		.btn.btn-registro:hover{
			background:#000;
			color:#FF6B24;
			padding: 17px 22px;
			position: fixed;
			bottom: 7.5%;
  			right: 0.5%;
			font-size: 15px;
			font-weight: 50;
			z-index:2;
		}	
    </style>


<?php 
  	/*NavbarHeader*/
	include "templates/navbar-header.php";

 	 /*Sidebar*/
  	//include "templates/sidebar.php";
?>

	<!-- My profile -->
	<div class="main-content" >
	  
	  <div class="container"> <!--Container-->
	  <div class="row"> <!--Row -->
		  <div class="fb span9 offset1">  <!--Cover-->
		  <div class=""><img class="profilePhoto" src="../images/profile.jpg" /></div>
		  </div>  <!--Cover-->
		  <div class="span2"><!--Advertisement-->
		  </div> <!--Advertisement-->
	  </div> <!--Row-->
		   <div class="row"> <!--Row -->
				<div class="panel span9 offset1"> <!--Panel -->   
					<div class="row"> <!--Row -->
						<div class="span9"> <!--Panel Inside -->
							<div class="row push"> <!--Row -->
							  <!--First Line Panel -->
							  <div class="span3 offset2 "> 
								<p class="name"> <?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?> </p>
							  </div>
							   <div class="span2"> 
								<p class="panelButton"> Sígueme <i class=""></i> </p>
							  </div>

					
							  <!--First Line Panel-->
							</div> <!--Row -->
							<div class="row"> <!--Row -->
							  <!--Details -->
							  <div class="span4 details "> 
								<p> Datos del perfil que se quieran mostrar </p>
								<p> Fecha de nacimiento: <?php echo $_SESSION['birthdate']; ?></p>
								<p> Estado civil: <?php echo $_SESSION['civil_state']; ?></p>
								<p> Música favorita: <?php echo $_SESSION['music']; ?></p>
								<p> Bebida favorita: <?php echo $_SESSION['drink']; ?></p>
								<p> Acerca de mí: <?php echo $_SESSION['about']; ?> </p>
							  </div> 
							 <div class="row">
	  <div class="col-md-12">
		
	<ul class="chat-box timeline">

	  <li class="arrow-box-left gray">
		<div class="avatar"><img class="avatar-small" src="../images/party2.jpg" /></div>
		<div class="info">
		  <span class="name">
			<span class="label label-green">PROMOCION</span> <strong class="indent">CATS CLUB</strong>
		  </span>
		  <span class="time"><i class="glyphicon glyphicon-time"></i> 3 minutes ago</span>
		</div>
		<div class="content">
		  <blockquote>
			CATS!! 
			Chicas gratis hasta la 1:30, 1x6$ hasta las 2 
			Chicos 2x10$ hasta la 1
		  </blockquote>
		</div>
	  </li>
	</ul>
	 </div>
	  </div>
	   <div class="row">
	  <div class="col-md-12">
		
	<ul class="chat-box timeline">

	  <li class="arrow-box-left grey">
		<div class="avatar"><img class="avatar-small" src="../images/party2.jpg" /></div>
		<div class="info">
		  <span class="name">
			<span class="label label-dark-red">PROMOCION</span> <strong class="indent">PACHA CLUB</strong>
		  </span>
		  <span class="time"><i class="glyphicon glyphicon-time"></i> 3 minutes ago</span>
		</div>
		<div class="content">
		  <blockquote>
			PACHA!! 
			Chicas gratis hasta la 1:30, 1x6$ hasta las 2 
			Chicos 2x10$ hasta la 1
		  </blockquote>
		</div>
	  </li>
	</ul>
	 </div>
	  </div>
						 <!--Details -->
						   </div><!--Row -->
						</div> <!--Panel Inside -->
					</div>  <!--Row -->
				</div> <!--Panel -->
			  </div> <!--Row -->
	</div> <!--Container-->

	  


	  
	  </div>
	<!-- /My profile --> 




	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>


</body>
</html>
