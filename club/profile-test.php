<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv="pragma" content="no-cache" />
   <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/club-template.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<!-- script -->
<script src="../js/events.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/keep-session.js"></script>
<script src="../js/follow.js"></script>

<script type="text/javascript"> 
	function getData(){
<?php 
	if(isset($_GET['idv'])){
?>
	
	var idProfile = <?php echo $_GET['idv'];?>;
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "local.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);
		var companyName = json.companyName;
		var localName = json.localName;
		var cif = json.cif;
		var poblationLocal = json.poblationLocal;
		var cpLocal = json.cpLocal;
		var telephoneLocal = json.telephoneLocal;
		var street = json.street;
		var streetName = json.streetNameLocal;
		var streetNumber = json.streetNumberLocal;
		var music = json.music;
		var entryPrice = json.entryPrice;
		var drinkPrice = json.drinkPrice;
		var openingHours = json.openingHours;
		var closeHours = json.closeHours;
		var picture = json.picture;
		var about = json.about;
		var latitude = json.latitude;
		var longitude = json.longitude;
		$.post("../framework/visits_add.php",
		  {
		  	user_type: 'club',
		    id_user: idProfile,
			companyName: companyName,
			localName: localName,
			cif: cif,
			poblationLocal: poblationLocal,
			cpLocal: cpLocal,
			telephoneLocal: telephoneLocal,
			street: street,
			streetName: streetName,
			streetNumber: streetNumber,
			music: music,
			entryPrice: entryPrice,
			drinkPrice: drinkPrice,
			openingHours: openingHours,
			closeHours: closeHours,
			picture: picture,
			about: about,
			latitude: latitude,
			longitude: longitude
		  },
		  function(data,status){
			//alert("Data: " + data + "\nStatus: " + status);								  ;
		  });
		},
		onerror: function(e,val){
			alert("Contraseña y/o usuario incorrectos");
		}
	});

	


<?php		
	}// end (isset($_GET['idv']))
?>

}
    
    
    </script>


	<script type="text/javascript">  
    $(document).ready(function(){ 
		getData();
      
	     $("#change-data").on("click", function (event) {
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
        var companyName = $('#name').val();
        var localName = $('#local_name').val();
        var cif = $('#cif').val();
        var poblationLocal = $('#poblation').val();
        var cpLocal = $('#postal-code').val();
        var telephone = $('#telephone').val();
        var street = $("#street").val();
        var streetName = $("#streetName").val();
        var streetNumber = $("#streetNumber").val();
        var music = $('#music-style').val();
        var entryPrice = $('#entryPrice').val();
        var drinkPrice = $('#drinkPrice').val();

        var timepicker_open = $("#timepicker_open").data("kendoTimePicker");
		var date1 = timepicker_open.value();
		var openingHours = '';

		var h = date1.getHours();
		var m = date1.getMinutes();
		var s = date1.getSeconds();

		if (h < 10) h = '0' + h;
		if (m < 10) m = '0' + m;
		if (s < 10) s = '0' + s;

		openingHours = h + ':' + m + ':' + s;

		var timepicker_close = $("#timepicker_close").data("kendoTimePicker");
		var date2 = timepicker_close.value();
		var closeHo2rs = '';

		var h = date2.getHours();
		var m = date2.getMinutes();
		var s = date2.getSeconds();

		if (h < 10) h = '0' + h;
		if (m < 10) m = '0' + m;
		if (s < 10) s = '0' + s;

		closeHours = h + ':' + m + ':' + s;

        var about = $('#about-you').val();
        var picture = '';

        var params = "/" + idProfile + "/" + token;
        
         console.log($.ajax({
            url: "../develop/update/local.php" + params,
            dataType: "json",
            type: "POST",
            timeout: 5000,
            data: {
              idProfile:idProfile,
              companyName:companyName,
              localName:localName,
              cif: cif,
              telephone: telephone,
              poblationLocal: poblationLocal,
              cpLocal: cpLocal,
              street: street,
              streetName: streetName,
              streetNumber: streetNumber,
              music: music,
              entryPrice: entryPrice,
              drinkPrice: drinkPrice,
              openingHours: openingHours,
              closeHours: closeHours,
              picture: picture,
              about: about
            },
            complete: function(r){
              $.post("../framework/session_start.php",
                    {
						type_login: 'normal',
						user_type: 'club',
						id_user: idProfile,
						token: token,
						companyName:companyName,
						localName:localName,
						cif: cif,
						telephone: telephone,
						poblationLocal: poblationLocal,
						cpLocal: cpLocal,
						street: street,
						streetName: streetName,
						streetNumber: streetNumber,
						music: music,
						entryPrice: entryPrice,
						drinkPrice: drinkPrice,
						openingHours: openingHours,
						closeHours: closeHours,
						picture: picture,
						about: about
					},
                    function(data,status){
                      //window.location.href="home.php";
                    });
                
              },
            onerror: function(e,val){
              alert("Hay error");
            }
        }));
      });
 
		
	});//end $(document).ready(function()
	</script>
<script type="text/javascript">
function btnSeguir(theSeguirBtn)
{
myButtonID = theSeguirBtn.id;
if(document.getElementById(myButtonID).className=='myClickedSeguir')
{
document.getElementById(myButtonID).className='myDefaultSeguir';
document.getElementById(myButtonID).value='Agregar Local';
}
else
{
document.getElementById(myButtonID).className='myClickedSeguir';
document.getElementById(myButtonID).value='Local Agregado';
}
}
</script>
<script type="text/javascript">
function btnVoy(theVoyBtn)
{
myButtonID = theVoyBtn.id;
if(document.getElementById(myButtonID).className=='myClickedVoy')
{
document.getElementById(myButtonID).className='myDefaultVoy';
document.getElementById(myButtonID).value='Quiero Asitir';
}
else
{
document.getElementById(myButtonID).className='myClickedVoy';
document.getElementById(myButtonID).value='Voy a ir';
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
  $idProfile=$_SESSION['id_user']; 
  $token=$_SESSION['token']; 

  if (isset($_GET['idv'])){
	$id_event = $_GET['idv'];
}else $id_event = $idProfile;
  
  
?>


<script>
	

var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
var ideEvent = '<?php echo $id_event; ?>' ;	
</script>



<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;margin-left:1%;margin-right:-20%">
					<h1 style="color:#ff6b24;font-size:30px;margin-left:4%;">Perfil Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							<div class="col-lg-11 col-md-8 col-sm-8" >
								<div class="main-box clearfix"style="margin-left:4%;width:100%;background-color:#1B1E24;border-color:#ff6b24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<h2 style="color:#ff6b24;text-transform: uppercase; text-align:center;"><?php echo get_local_name_club(); ?></h2>
									
									<img src="../images/profile-club.jpg" alt="" class="profile-img img-responsive center-block banner1" style="width:1024px;max-height:42%;border-color:#ff6b24;"/>
									<div class="profile-since"style="color:#707070;margin-top:1%;margin-bottom:-2%">
										Miembro desde: Ene 2012	
										<ul class="fa-ul" >
											<li  style="color:transparent;"><span style="color:#ff6b24">Seguidores: </span><span style="color:#34d1be"> 456</span></li>
											<li  style="color:transparent;"><span style="color:#ff6b24">Publicaciones: </span><span style="color:#34d1be"> 828</span></li>
										</ul>
										<input id="btnVoy01"  class="btn btn-success botonvoy" type="button"value="Quiero Asistir"onClick="btnVoy(this);"style="margin-top:-7%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
										<input id="btn01"  class="btn btn-success botonseguir " type="button"value="Agregar Local"onClick="btnSeguir(this);"style="margin-left:50%;margin-top:-7%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
									</div>			
								</div>
							</div>
						</div>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-11 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="margin-left:9%;background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									
									
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-activity" data-toggle="tab">Actividad</a></li>
											<li><a href="#tab-friends" data-toggle="tab">Seguidores</a></li>
											<li><a href="#tab-photos" data-toggle="tab">Fotos</a></li>
											<li><a href="#tab-contact" data-toggle="tab">Contacto</a></li>
										</ul>
										<!-- Comienza Actividad -->
										<div class="tab-content" style="overflow:visible;">
											<div class="tab-pane fade in active" id="tab-activity">
												
															
																<div class="the-timeline">
																	<ul>
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <?php echo get_local_name_club(); ?>
																				<span style="font-size:12px;color:orange">publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn03"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Lista Local</span> <?php echo get_local_name_club(); ?>
																				<span style="font-size:12px;color:orange;"> publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Lista</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn02"  class="btn btn-success botonapuntar " type="button"value="Me Apunto"onClick="btnApuntar(this);"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																	</ul>
																</div>	
											</div>
										<!-- Termina Actividad -->	
										<!-- Comienza Amigos -->
											<div class="tab-pane fade " id="tab-friends">
												<ul class="widget-users row">
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													
												</ul>
												
											</div>
										<!-- Termina Amigos -->	
										
								
											<!-- Comienza Fotos -->
											<div class="tab-pane fade" id="tab-photos">	
											<!--	<div class="container" style="background-color:#000;box-shadow: 1px 1px 2px 0 #ff6b24;">
													<form class="form-inline">
													<div class="form-group">
														<a href="#"id="image-gallery-button" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Ver todas</a>
													</div>
													</form>
													<br>
												<!-- The container for the list of example images -->
												<!-- 	<div id="links"></div>
													<br>
												</div>
											<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
											<!-- 	<div id="blueimp-gallery" class="blueimp-gallery" >
												<!-- The container for the modal slides -->
												<!-- 	<div class="slides"></div>
													<!-- Controls for the borderless lightbox -->
												<!-- 	<h3 class="title"></h3>
													<a class="prev">‹</a>
													<a class="next">›</a>
													<a class="close">×</a>
													<a class="play-pause"></a>
													<ol class="indicator"></ol>
													<!-- The modal dialog, which will be used to wrap the lightbox content -->
												<!-- 	<div class="modal fade" style="background-color:transparent; width:100%;height:100%;margin-top:20%;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" aria-hidden="true">&times;</button>
																	<h4 class="modal-title"></h4>
																</div>
																<div class="modal-body next"></div>
																<div class="modal-footer">
																	<a href="#" class="btn btn-success pull-left prev" style="background-color:#000;border-color:#ff6b24;color:#34d1be;"><i class="glyphicon glyphicon-chevron-left"></i> Anterior </a>
																	<a href="#" class="btn btn-success pull-right next" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></a>
												
																</div>
															</div>
														</div>
													</div>
												</div>-->
	
											</div>	<!-- Termina Fotos -->
											<div class="tab-pane fade " id="tab-contact">
												<div class="col-lg-4 " >
													<h3 style="border-color:#ff6b24;text-align:center"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
													<p style="color:#707070;margin-left:3%;margin-right:3%;font-size:14px">
															<?php echo $_SESSION['about']; ?>
													</p>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Estilo de música <span style="margin-left:2%;color:#707070; font-size:14px"> <?php echo $_SESSION['music']; ?></span>
														</div>	
													</div>
													<br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Precio de Entrada <span style="margin-left:2%;color:#707070; font-size:14px"> <?php if( $_SESSION['entry_price']!=0) echo $_SESSION['entry_price']." €"; ?></span>
														</div>	
													</div>
													<br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Precio de Bebida <span style="margin-left:3%;color:#707070; font-size:14px"> <?php if($_SESSION['drink_price']!= 0) echo $_SESSION['drink_price']." €" ;?></span>
														</div>	
													</div>
												</div>
												<div class="col-lg-8">
													<h3 style="border-color:#ff6b24;text-align:center"><span style="color:#ff6b24;border-color:#ff6b24">Localización</span></h3>	
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Dirección <span style="margin-left:2%;color:#707070; font-size:14px"> <?php if (get_street_club() == 0) echo 'Calle'; ?>
																				<?php if (get_street_club() == 1) echo 'Avd.'; ?>
																				<?php if (get_street_club() == 2) echo 'Plaza'; ?>
																				<?php echo get_street_name_club(); ?>,
																				<?php echo get_poblation_local_club();?>
																				<?php echo get_cp_local_club();?></span>
														</div>	
													</div><br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Teléfono <span style="margin-left:2%;color:#707070; font-size:14px"> <?php echo get_telephone_club();?></span>
														</div>	
													</div><br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Horario <span style="margin-left:2%;color:#707070; font-size:14px"> <b>Apertura: </b><?php echo get_opening_hours_club();?></span>
																	<br><span style="margin-left:12%;color:#707070; font-size:14px">Cierre: <?php echo get_close_hours_club();?></span>
														</div>	
													</div>
												</div>
												<div class="row">
												<div class="col-lg-8" style="margin-left:10%;margin-top:2%">
												<?php include "map.php";?>
												</div>
												</div>
											</div>
											
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MiPerfil --> 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
</body>
</html>
