<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

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
	<link rel="stylesheet" href="../css/home-user.css" type="text/css" /><!-- Style -->
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->

<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>	
<script src="../js/keep-session.js"></script>	

<script type="text/javascript">  

    $(document).ready(function(){ 
      
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

<!-- /script -->
<script type="text/javascript">
function changeMyClassName(theButton)
{
myButtonID = theButton.id;
if(document.getElementById(myButtonID).className=='myClickedButton')
{
document.getElementById(myButtonID).className='myDefaultButton';
document.getElementById(myButtonID).value='Publicar';
}
else
{

document.getElementById(myButtonID).value='Publicar';
}
}
</script>
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
<div class="main-content" style="background-image:url(../images/CollageNeon.jpg);height:2000px;margin-bottom:-50px;margin-left:200px;" > 
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
						<p style="color:#FF6B24"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i>Localización Usuario</p>
						<br>
					</div>
                   	 </div>
		</div><!-- col-md-12 -->
        </div><!-- row -->
		
			<div class="row">
			<div class="col-md-12 the-timeline-margin">
                        <div class="col-md-6">
				<div class="titulos">
                        <ul><li>ESTADO 
						<input id="btn01"  class="botonanadir" type="button"value="Publicar"onClick="changeMyClassName(this);"></li></ul>           
                        </div>
						<div class="boxEstado">
              	<ul><li><div id="" class="collapse in">
								<form role="form">
									<div class="form-group">
										<input type="text" class="form-control textEstado" placeholder="Escribe tu estado...">
									</div>
									<div class="form-group">
										<select class="form-control textModo">
											<option value="">De tranquis</option>
											<option value="">Hoy no me lio</option>
											<option value="">Lo que surja</option>
											<option value="">Lo daré todo</option>
											<option value="">Destroyer</option>
											<option value="">Yo me llamo Ralph</option>
										</select>
									</div>								
								</form>	
							</div><!-- End div #quick-post --></li></ul>		
						</div><!-- End div .box-info -->
						<br>
					<div class="titulos">
                        <ul><li>EVENTOS </li></ul>
                       
                        </div>
						
						<table class="table table-hover tablaC">
                          <tbody>
                            <tr>
                              <td>Event</td>
                          </tr>
                            <tr>                             
                              <td>Event</td>
                            
                            </tr>
							<tr>
                              
                              <td>Event</td>
                             
                              
                            </tr>
							<tr>
                              
                              <td>Event</td>
                            
                              
                            </tr>
                            <tr>
                             
                               <td>Event</td>
                            
                            </tr>
                          </tbody>
                        </table>
					<br>
					<div class="titulos">
                        <ul><li>LISTAS </li></ul>
                       
                        </div>
						<table class="table table-hover tablaC">
                          <tbody>
                            <tr>
                              
                              <td>Lista</td>
                             
                              
                            </tr>
							<tr>
                              
                              <td>Lista</td>
                             
                            </tr>
							<tr>
                              
                              <td>Lista</td>
                            
                              
                            </tr>
                            <tr>
                             
                              <td>Lista</td>
                             
                              
                            </tr>
                            <tr>
                             
                               <td>Lista</td>
                              
                            </tr>
                          </tbody>
                        </table>
            	 </div>
				  <div class="col-md-6">
                        
					<!-- Begin timeline Listas -->
               <div class="titulos">
                        <ul><li>NOVEDADES </li></ul>
                       
                        </div>
                  		<div class="the-timeline">
							<ul><li><div class="the-date">
										<span>01</span>
										<small>Feb</small>
									</div>
									<h4>Show Event</h4>
									<p>
												
									</p>
									<input id="btn02"  class="botonMeApunto" type="button"value="Me Apunto"onClick="cosa(this);">
								</li>
								<li>
									<div class="the-date">
										<span>31</span>
										<small>Jan</small>
									</div>
									<h4>Show Lista</h4>
									<p>
												
									</p>
										<input id="btn03"  class="botonMeApunto" type="button"value="Me Apunto"onClick="cosa(this);">
								</li>
								<li>
									<div class="the-date">
										<span>12</span>
										<small>agos</small>
									</div>
                                    <h4>show status</h4>
									<p>
									 
									</p>
									<input id="btn04"  class="botonMeApunto" type="button"value="Me Apunto"onClick="cosa(this);">
								</li>
                                <li>
									<div class="the-date">
										<span>05</span>
										<small>Jun</small>
									</div>
                                    <h4>show Event</h4>
									<p>
									 
									</p>
									<input id="btn05"  class="botonMeApunto" type="button"value="Me Apunto"onClick="cosa(this);">
								</li>
                                <li>
									<div class="the-date">
										<span>08</span>
										<small>May</small>
									</div>
                                    <h4>show Event</h4>
									<p>
									 
									</p>
									<input id="btn06"  class="botonMeApunto" type="button"value="Me Apunto"onClick="cosa(this);">
								</li>
                                <li>
									<div class="the-date">
										<span>12</span>
										<small>Marz</small>
									</div>
                                    <h4>show Lista!!</h4>
									<p>
									 
									</p>
									<input id="btn07"  class="botonMeApunto" type="button"value="Me Apunto"onClick="cosa(this);">
								</li>
                         
							</ul>
						</div><!-- End div .the-timeline -->					
					</div><!-- End div .col-sm-6 -->
		</div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /MiPerfil --> 
</body>
</html>
