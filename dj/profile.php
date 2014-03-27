<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile DJ</title>
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
  <link rel="stylesheet" href="../css/profile-dj.css" type="text/css" /><!-- Style -->	
  <link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

  <!-- script -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/registro.js"></script>

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
	<script type="text/javascript">
function changeMyClassName(theButton)
{
myButtonID = theButton.id;
if(document.getElementById(myButtonID).className=='myClickedButton')
{
document.getElementById(myButtonID).className='myDefaultButton';
document.getElementById(myButtonID).value='SIGUEME';
}
else
{
document.getElementById(myButtonID).className='myClickedButton';
document.getElementById(myButtonID).value='SIGUIENDO';
}
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
			
    </style>

<?php 
  /*NavbarHeader*/
  include "templates/navbar-header.php";
?>


<!-- MiPerfil -->
<div class="main-content" style="background-image:url(../images/CollageNeon.jpg);height:2000px; margin-left:0px;margin-bottom:-50px;" > 
<div class="wrapper">
		<div class="container">
		<div class="row">
			<div class="col-md-12 profile-margin">
				<div class="col-md-4">
					<div class="profile-sec-head banner2">
						<img src="../images/profile.jpg" alt="" />
						<h1>
							<span><?php echo get_nameDJ_dj(); ?></span>
						</h1>
						
					</div>
					<div>
						 <input id="btn01"  class="botonseguir" type="button"value="SIGUEME"onClick="changeMyClassName(this);">
					</div>
                   	 </div> 
		</div><!-- col-md-12 -->
        </div><!-- row -->
           	<div class="row">
			<div class="col-md-12 the-timeline-margin">
                        <div class="col-md-6">
                        
					<!-- Begin timeline Events -->
                  		<div class="titulos">
                        <ul><li>EVENTOS</li></ul>
                       
                        </div>
						<div class="the-timeline">
							<ul><li><div class="the-date">
										<span>01</span>
										<small>Feb</small>
									</div>
									<h4>Show event</h4>
									<p>
												
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button>
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
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button>
								</li>
								<li>
									<div class="the-date">
										<span>20</span>
										<small>Des</small>
									</div>
                                    <h4>show event!!</h4>
									<p>
									 
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button>
								</li>
							</ul>
						</div><!-- End div .the-timeline -->
						<!-- End timeline -->
					</div><!-- End div .col-sm-6 -->
                     <div class="col-md-6">
                        
					<!-- Begin timeline Listas -->
             
							
									
					</div><!-- End div .col-sm-6 -->
    </div><!-- col-md-12 -->
        </div><!-- row -->
        <div class="row">
			<div class="col-md-12">
        <div class="titulos">
                        <ul><li>FOTOS</li></ul>
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
         <div class="row">
             <div class="col-md-12">
        <div class="titulos">
                        <ul><li>INFORMACIÓN</li></ul>
                       
                        </div>
              <div class="mapa">
              	<li>Dirección,número de télefono...</li>
              </div>
					    
             </div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /MiPerfil --> 

</body>
</html>
