<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Home User</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/inicio-fiestero.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

  <script type="text/javascript">  
    $(document).ready(function(){ 
      
      $("#close_session").on("click", function (event) {
        $.post("../framework/session_end.php",
          {},
          function(data,status){
        /*  alert("Data: " + data + "\nStatus: " + status);*/
          //redirectLoginFiestero();
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
			
    </style>


<?php 
  /*NavbarHeader*/
  include "templates/navbar-header.php";

  /*Sidebar*/
  include "templates/sidebar.php";
?>

<!-- My Profile-->
<div class="main-content" style="background-image:url(../images/wall.jpg); max-height:2000px; margin-bottom:-50px;" > 


<div class="wrapper">
		<div class="container">
		<div class="row">
			<div class="col-md-12 profile-margin">
				<div class="col-md-4">
                	<!-- header profile -->
					<div class="profile-sec-head orangeBox ">
						<img src="../images/profile.jpg" alt="" />
						<h1>
							<?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
						</h1>
						<p style="color:#FF6B24"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i><?php echo $_SESSION['city']; ?></p>
					</div>
                    <!-- Followers -->
					<div class="profile-details orangeBox " style="margin-top:5px;background:#000" >
						<span ><i>245</i>SEGUIDORES</span>
						<span><i>98</i>SIGUIENDO</span>
                        </div>
                      <!-- Information -->
                     <div class="profile-details orangeBox " style="margin-top:5px" >
					<p><i><strong>ACERCA DE MI : </strong><?php echo $_SESSION['about']; ?></i>
					
                    <i></i>
                    <i><strong>MÚSICA FAVORITA : </strong><?php echo $_SESSION['music']; ?></i>
                   	
					</p>
					</div>
				</div><!-- col-md-4 -->
                
                <div class="col-md-5">
                	<!-- State -->
					<div id="tabmenu" class="orangeBox1">
						
                        <div class="share-sec ">
								<span ><i class="glyphicon glyphicon-leaf"style="color:#FF6B24"> ESTADO</i></span>
						</div>
						<div id="tab-content">
							<div class="orangeBox1">
								<textarea  placeholder="¿Qué piensas?..."></textarea>
							</div>
							<div class="share-sec">
								<a class="orangeBox1"><strong>Share</strong></a>
							</div>
						</div>
					</div>
                    <!-- Friends -->
                    <div class="total-members orangeBox1">
						<div class="total-memeber-head">
							<span><i class="glyphicon glyphicon-user"style="color:#FF6B24"></i>AMIGOS FIESTEROS</span>
						</div>
						<ul class="orangeBox1">
						<li><a><img class="menu-avatar orangeBox1"  src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1"  src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1"  src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1"  src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                       	<li><a><img class="menu-avatar orangeBox1"  src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1"  src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
                        <li><a><img class="menu-avatar orangeBox1" src="../images/profile.jpg" alt="" /></a></li>
						</ul>
					</div>
                    
                    <!-- Events -->
                    <div  class="timeline">
						<ul>
							<li>
								<div class="timeline-title orangeBox1 ">
                                	<img class="menu-avatar time-title-img orangeBox1"  src="../images/profile.jpg" alt="" />
									<h6>NOMBRE CLUB</h6>
									<i class="glyphicon glyphicon-time"style="color:#FF6B24">hace m min</i>
									<a class="orangeBox1"><i class="glyphicon glyphicon-thumbs-up"style="color:#000"></i>Me gusta</a>
								</div>
								<div class="timeline-content orangeBox1">
									<p>Dnim eiusmod high life accusamus terry richardson ado squid. 3 wolfmoon officia aute, non cupidatat</p>
								</div>
							</li>
							<li>
								<div class="timeline-title orangeBox1">
                                	<img class="menu-avatar time-title-img orangeBox1"  src="../images/profile.jpg" alt="" />
									<h6>NOMBRE DJ</h6>
                                    <i class="glyphicon glyphicon-time"style="color:#FF6B24">hace m min</i>
									<a class="orangeBox1"><i class="glyphicon glyphicon-thumbs-up"style="color:#000"></i>Me gusta</a>
                                    
								</div>
								<div class="timeline-content orangeBox1">
									<p>Dnim eiusmod high life accusamus terry richardson ado squid. 3 wolfmoon officia aute, non cupidatat</p>
								</div>
							</li>
                            <li>
								<div class="timeline-title orangeBox1">
                                	<img class="menu-avatar time-title-img orangeBox1"  src="../images/profile.jpg" alt="" />
									<h6>NOMBRE CLUB</h6>
									<i class="glyphicon glyphicon-time"style="color:#FF6B24">hace m min</i>
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
                	<div class="col-md-3">
                    <!-- My Events --> 
                    <div class="latest-tweets orangeBox1 " >
						<div class="latest-tweets-head" >
							<span ><i class="glyphicon glyphicon-glass"style="color:#FF6B24"></i>EVENTOS</span>
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
                    <!-- My Photos --> 
                    <div class="my-photos orangeBox1">
						<div class="my-photo-head">
							<span><i class="glyphicon glyphicon-camera" style="color:#FF6B24"></i>FOTOS FIESTERO</span>
						</div>
							<ul class="orangeBox1">
								<li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
								<li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
								<li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a ><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
								<li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
                                <li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
                                <li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
								<li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a ><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
								<li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
                                <li><img class="menu-avatar orangeBox1" src="../images/photo.jpg" alt="" />
								<div class="my-photo-hover">
									<a ><i class="glyphicon glyphicon-picture"></i></a>
									<a><i class="glyphicon glyphicon-trash"></i></a>
								</div>
								<p>Mensaje</p>
								</li>
								
							</ul>
					</div>
                	
         			</div><!-- col-md-3 -->     	
		</div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /My Profile --> 



<!-- script -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- /script -->

</body>
</html>
