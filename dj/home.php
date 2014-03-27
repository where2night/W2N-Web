<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Home DJ</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

   <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
  <link href="../css/custom.css" rel="stylesheet" media="screen">
  <link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
  <link rel="stylesheet" href="../css/home-dj.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

	<!-- script -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/registro.js"></script>
  <script src="../js/keep-session.js"></script>

  <script type="text/javascript">  
    $(document).ready(function(){ 
      
      //Function for close session
        $("#close_session").on("click", function (event) {
          $.post("../framework/session_end.php",
            {},
            function(data,status){
                eraseCookie('w2n_id');
                eraseCookie('w2n_token');
                eraseCookie('w2n_type');
              var url = "../";
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


<!-- MiPerfil -->
<div class="main-content" style="background-image:url(../images/CollageNeon.jpg);height:2000px;margin-bottom:-50px;margin-left:200px" > 
<div class="wrapper">
		<div class="container">
		<div class="row">
			<div class="col-md-12 profile-margin">
				<div class="col-md-4">
					<div class="profile-sec-head banner2">
						<img src="../images/profile.jpg" alt="" />
						<h1>
							 <?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
						</h1>
					</div>
                   	 </div>
		</div><!-- col-md-12 -->
        </div><!-- row -->
           	<div class="row">
			<div class="col-md-12 the-timeline-margin">
                        <div class="col-md-6">
                        
					<!-- Begin timeline Events -->
                  		<div class="titulos">
                        <ul><li>EVENTOS <button type="button" class="btn botonanadir"style="margin-left:60%"><i class="glyphicon glyphicon-plus"style="color:#FF6B24"></i></button></li></ul>
                       
                        </div>
						<div class="the-timeline">
							<ul><li><div class="the-date">
										<span>01</span>
										<small>Feb</small>
									</div>
									<h4>Show event</h4>
									<p>
												
									</p>
								</li>
								<li>
									<div class="the-date">
										<span>31</span>
										<small>Jan</small>
									</div>
									<h4>show pic </h4>
									<div class="videoWrapper">
									<iframe src=""></iframe>
									</div>
									<p>
								
									</p>
								</li>
								<li>
									<div class="the-date">
										<span>20</span>
										<small>Des</small>
									</div>
                                    <h4>show event!!</h4>
									<p>
									 
									</p>
								</li>
							</ul>
						</div><!-- End div .the-timeline -->
						<!-- End timeline -->
					</div><!-- End div .col-sm-6 -->
                     <div class="col-md-6">
                        
				
									
					</div><!-- End div .col-sm-6 -->
    </div><!-- col-md-12 -->
        </div><!-- row -->
        <div class="row">
			<div class="col-md-12">
        <div class="titulos">
                        <ul><li>FOTOS  <button type="button" class="btn botonanadir"style="margin-left:85%"><i class="glyphicon glyphicon-plus"style="color:#FF6B24"></i></button></li></ul>
                        </div>
						 <div class="seguidores">
              	<ul><li></li></ul>
              </div>
					    
             </div><!-- col-md-12 -->
			  </div><!-- row -->
			  <div class="row">
             <div class="col-md-12">
        <div class="titulos">
                        <ul><li>SEGUIDORES</li></ul>
                       
                        </div>
						 <div class="seguidores">
              	<ul><li></li></ul>
              </div>
					    
             </div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /MiPerfil --> 

</body>
</html>
