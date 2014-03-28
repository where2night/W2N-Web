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
    <link rel="stylesheet" href="../css/profile-club.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

	<!-- script -->
<script src="../js/events.js"></script>
	<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/registro.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/keep-session.js"></script>

<script type="text/javascript"> 
	function getData(){
<?php 
	if(isset($_GET['idv'])){
		//$id = w2n_generate_encoded_id($id_user);
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
		    id_user: id,
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
  $idProfile=$_SESSION['id_user']; 
  $token=$_SESSION['token']; 
  
  
?>


<script>
	

var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
	
</script>




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
							<?php echo get_local_name_club(); ?>
						</h1>
						<p style="color:#FF6B24"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i><?php echo get_poblation_local_club();?></p>
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

<?php
if (isset($_GET['idv'])){
	$id_event = $_GET['idv'];
}else $id_event = $idProfile;
?>							
							<ul id="ul">
								<script>
									eventProfile("<?php echo $id_event;?>");
								</script>
							</ul>
						</div><!-- End div .the-timeline -->
						<!-- End timeline -->
					</div><!-- End div .col-sm-6 -->
                     <div class="col-md-6">
                        
					<!-- Begin timeline Listas -->
               <div class="titulos">
                        <ul><li>LISTAS</li></ul>
                       
                        </div>
                  		<div class="the-timeline">
							<ul><li><div class="the-date">
										<span>01</span>
										<small>Feb</small>
									</div>
									<h4>Show Lista</h4>
									<p>
												
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto</button>
								</li>
								<li>
									<div class="the-date">
										<span>31</span>
										<small>Jan</small>
									</div>
									<h4>Show Lista</h4>
									<p>
												
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto</button>
								</li>
								<li>
									<div class="the-date">
										<span>12</span>
										<small>agos</small>
									</div>
                                    <h4>show Lista!!</h4>
									<p>
									 
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto</button>
								</li>
                                <li>
									<div class="the-date">
										<span>05</span>
										<small>Jun</small>
									</div>
                                    <h4>show Lista!!</h4>
									<p>
									 
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto</button>
								</li>
                                <li>
									<div class="the-date">
										<span>08</span>
										<small>May</small>
									</div>
                                    <h4>show Lista!!</h4>
									<p>
									 
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto</button>
								</li>
								<li>
									<div class="the-date">
										<span>03</span>
										<small>May</small>
									</div>
                                    <h4>show Lista!!</h4>
									<p>
									 
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto</button>
								</li>
                           
                           
							</ul>
						</div><!-- End div .the-timeline -->
								
                        
							
									
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
						<div class="seguidores">
              	<ul><li>
				<h4 style="color:#1B1E24">Acerca de Mi:</h4><p style="font-size:14px;"><?php echo $_SESSION['about'];?></p>
				<h4 style="color:#1B1E24">Estilo de Música:</h4><p style="font-size:14px;"><?php echo $_SESSION['music']; ?></p>
				<h4 style="color:#1B1E24">Precio Entrada:</h4><p style="font-size:14px;"><?php echo $_SESSION['entry_price']; ?></p>
				<h4 style="color:#1B1E24">Precio Bebida:</h4><p style="font-size:14px;"><?php echo $_SESSION['drink_price']; ?></p>
				</li></ul>	 </div>   
             </div><!-- col-md-12 -->
        </div><!-- row -->
         <div class="row">
             <div class="col-md-12">
        <div class="titulos">
                        <ul><li>CONTACTO</li></ul>
                       
                        </div>
              <div class="mapa">
              	<li>
				<?php include "map.php";?>
				<div class="contactBox">
					<h1>Dirección:</h1> 
					<p>
						<?php if (get_street_club() == 0) echo 'Calle'; ?>
						<?php if (get_street_club() == 1) echo 'Avd.'; ?>
						<?php if (get_street_club() == 2) echo 'Plaza'; ?>
						<?php echo get_street_name_club(); ?>,<br>
						<?php echo get_poblation_local_club();?>
						<?php echo get_cp_local_club();?>
					</p>
					<h1>Teléfono:</h1>
					<p><?php echo get_telephone_club();?></p>
					<h1>Horario:</h1>	
					<p><b>Apertura: </b><?php echo get_opening_hours_club();?></p>
					<p><b>Cierre: </b><?php echo get_close_hours_club();?></p>			
				</div>
				
				</li>
              </div>
					   
             </div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /MiPerfil --> 

</body>
</html>
