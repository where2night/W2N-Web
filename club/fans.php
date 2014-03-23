<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Fans Club</title>
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
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/home-club.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
   	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">

	<!-- script -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/keep-session.js"></script>


	<script type="text/javascript">  
		$(document).ready(function(){ 
			
           //Function for closing session
	        $("#close_session").on("click", function (event) {
		        $.post("../framework/session_end.php",
		          {},
		          function(data,status){
		          	  eraseCookie('w2n_id');
		          	  eraseCookie('w2n_token');
		          	  eraseCookie('w2n_type');
			          var url = "http://www.where2night.es";
			          $(location).attr('href',url);
		        });
		    });
		
	</script>

</head>

<body style="background-color: #000000">
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


<?php 
  	/*NavbarHeader*/
	include "templates/navbar-header.php";

 	 /*Sidebar*/
  	include "templates/sidebar.php";
?>

	<!-- My profile -->
	<div class="main-content" >
	  
	  <div class="container"> <!--Container-->
	  <div class="row"> <!--Row -->
		  <div class="fa span9 offset1">  <!--Cover-->
		
		<div class="row">
			<div class="col-md-12 profile-margin">
				<div class="col-md-4">
					<div class="profile-sec-head banner2">
						<img src="../images/profile.jpg" alt="" />
						<h1>
							NOMBRE LOCAL
						</h1>
						<p style="color:#FF6B24"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i>Localizacón local</p>
					</div>
                   	 </div>
		</div><!-- col-md-12 -->
        </div><!-- row -->
		
		
		<!-- Followers -->
					<div class="profile-details orangeBox " style="margin-top:5%;background:#000;width: 30%; float: right;margin-right: 2%" >
						<span style="margin-left: 25%;font-size: 1.5em"><i style="font-size: 1.4em">245</i>SEGUIDORES</span>
					</div>

		
		  </div>
		
		        <div class="titulos" style="clear: left; width: 100%;margin-left:-35px">
                        <ul><li>SEGUIDORES</li></ul>
                 </div>
				
				<div class="seguidores" style="width: 100%; margin-left: -30px">
              		<ul><li></li></ul>
                </div>
                
                <div class="the-timeline">
							<ul>
								<li>
									<img class="the-date2" src="../images/profile.jpg" />
										<h3 style="color: #FF6B24">NOMBRE SEGUIDOR 1</h3>
										<span style="color: #fff"> Estado seguidor 5</span>
									
								</li>
								
								<li>
									<img class="the-date2" src="../images/profile.jpg" />
									<h3 style="color: #FF6B24">NOMBRE SEGUIDOR 2</h3>
									<span style="color: #fff"> Estado seguidor 2</span>
								</li>
								
								<li>
									<img class="the-date2" src="../images/profile.jpg" />
									<h3 style="color: #FF6B24">NOMBRE SEGUIDOR 3</h3>
									<span style="color: #fff"> Estado seguidor 3</span>
								</li>
								
								<li>
									<img class="the-date2" src="../images/profile.jpg" />
									<h3 style="color: #FF6B24">NOMBRE SEGUIDOR 4</h3>
									<span style="color: #fff"> Estado seguidor 4</span>
								</li>
								
								<li>
									<img class="the-date2" src="../images/profile.jpg" />
									<h3 style="color: #FF6B24">NOMBRE SEGUIDOR 5</h3>
									<span style="color: #fff"> Estado seguidor 5</span>
								</li>
								
								<li>
									<img class="the-date2" src="../images/profile.jpg" />
									<h3 style="color: #FF6B24">NOMBRE SEGUIDOR 6</h3>
								    <span style="color: #fff"> Estado seguidor 6</span>
								</li>
								
							</ul>
					</div>
						
		</div> <!--Row-->
		   
		   

	  
	  </div>
	<!-- /My profile --> 


	</div>

	

</body>
</html>
