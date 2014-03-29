<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

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
    <link rel="stylesheet" href="../css/profile-user.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

	<!-- script -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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
		
		$("#timepicker_open").kendoTimePicker({
		    format: "HH:mm"
		});
		$("#timepicker_close").kendoTimePicker({
		    format: "HH:mm"
		});     
    });//end $(document).ready(function()
    
    
    </script>
	
<style type="text/css">

</style>
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
							<?php echo get_name_user()." ".get_surname_user(); ?>
						</h1>
						<p style="color:#FF6B24"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i>Localización Usuario</p>
						<br>
					</div>
					<div>
						<input id="btn01"  class="botonseguir" type="button"value="SIGUEME"onClick="changeMyClassName(this);">
	
					</div>
                   	 </div>
		</div><!-- col-md-12 -->
        </div><!-- row -->
		<div class="row">
			<div class="col-md-12 the-timeline-margin">
                        <div class="col-md-3">
					<div class="titulos">
                        <ul><li>INFORMACIÓN</li></ul>
                    </div>
					<table class="table  tablaC">
                          <tbody>
                            <tr class="info0">
                              <td class="info1">Nombre y Apellidos:</td>
							   <td><?php echo get_name_user()." ".get_surname_user(); ?></td>
                          </tr>
                            <tr>                            
                              <td class="info2">Fecha de Nacimiento:</td>
							   <td ><?php echo get_birthdate_user(); ?></td>
                            
                            </tr>
							 <tr class="info0">
                              
                              <td class="info1">Sexo:</td>
							   <td><?php if (get_gender_user()=="male") echo "Hombre" ?><?php if (get_gender_user()=="female") echo "Mujer" ?></td>
                             
                              
                            </tr>
							<tr>
                              
                              <td class="info2">Estado Civil:</td>
							   <td><?php echo get_civil_state_user(); ?></td>
                            
                              
                            </tr>
                             <tr class="info0">
                             
                               <td class="info1">Ciudad Actual:</td>
							    <td><?php echo get_city_user(); ?></td>
                            
                            </tr>
							 <tr>
                             
                               <td class="info2">Música Favorita:</td>
							    <td><?php echo get_music_user(); ?></td>
                            
                            </tr>
							  <tr class="info0">
                             
                               <td class="info1">Bebida Favorita:</td>
							    <td><?php echo get_drink_user(); ?></td>
                            
                            </tr>
							 <tr>
                             
                               <td class="info2">Acerca de Mi:</td>
							    <td><?php echo get_about_user(); ?></td>
                            
                            </tr>
                          </tbody>
                        </table>
						
						<table class="table  tablaC2">
								<tbody>
								<tr>
								<td>SIGUIENDO:
	
								</td>
								<td>SEGUIDORES:
	
								</td>
								</tr>
								</tbody>
								</table>
                   	 </div>
					 <div class="col-md-9">
					
					<div class="the-timeline">
							<ul><li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
	
								<span class="label label-dark-blue">Evento Local</span> CLUB PACHA
								 <span style="font-size:13px;margin-left:40%"><i class="glyphicon glyphicon-time"style="color:#FF6B24"></i> hace 3 min</span>
								</li>
								<table class="table  tablaC1">
								<tbody>
								<tr class="info0">
								<td><p ></p>
								<input id="btn02"  class="botonanadir" type="button"value="Me Apunto"onClick="cosa(this);">
								
								</td>
								</tr>
								</tbody>
								</table>	
								<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
							
								<span class="label label-dark-blue">Evento DJ</span> DJ TIESTO
								 <span style="font-size:13px;margin-left:45%"><i class="glyphicon glyphicon-time"style="color:#FF6B24"></i> hace 3 min</span>
								</li>
								<table class="table  tablaC1">
								<tbody>
								<tr class="info0">
								<td><p ></p>
								<input id="btn03"  class="botonanadir" type="button"value="Me Apunto"onClick="cosa(this);">
								</td>
								</tr>
								</tbody>
								</table>
								<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
							
								<span class="label label-dark-blue">Estado Fiestero</span> CLUB PACHA
								 <span style="font-size:13px;margin-left:40%"><i class="glyphicon glyphicon-time"style="color:#FF6B24"></i> hace 3 min</span>
								</li>
								<table class="table  tablaC1">
								<tbody>
								<tr class="info0">
								<td><p ></p>
								<input id="btn04"  class="botonanadir" type="button"value="Me Apunto"onClick="cosa(this);">
								</td>
								</tr>
								</tbody>
								</table>
								<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
							
								<span class="label label-dark-blue">Evento Local</span> CLUB PACHA
								 <span style="font-size:13px;margin-left:40%"><i class="glyphicon glyphicon-time"style="color:#FF6B24"></i> hace 3 min</span>
								</li>
								<table class="table  tablaC1">
								<tbody>
								<tr class="info0">
								<td><p ></p>
								<input id="btn05"  class="botonanadir" type="button"value="Me Apunto"onClick="cosa(this);">
								</td>
								</tr>
								</tbody>
								</table>
								<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
							
								<span class="label label-dark-blue">Evento Local</span> CLUB PACHA
								 <span style="font-size:13px;margin-left:40%"><i class="glyphicon glyphicon-time"style="color:#FF6B24"></i> hace 3 min</span>
								</li>
								<table class="table  tablaC1">
								<tbody>
								<tr class="info0">
								<td><p ></p>
								<input id="btn06"  class="botonanadir" type="button"value="Me Apunto"onClick="cosa(this);">
								</td>
								</tr>
								</tbody>
								</table>
								<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
							
								<span class="label label-dark-blue">Evento Local</span> CLUB PACHA
								 <span style="font-size:13px;margin-left:40%"><i class="glyphicon glyphicon-time"style="color:#FF6B24"></i> hace 3 min</span>
								</li>
								<table class="table  tablaC1">
								<tbody>
								<tr class="info0">
								<td><p ></p>
								<input id="btn07"  class="botonanadir" type="button"value="Me Apunto"onClick="cosa(this);">
								</td>
								</tr>
								</tbody>
								</table>
                         
							</ul>
						</div><!-- End div .the-timeline -->	
					</div>
		
	
		</div><!-- col-md-12 -->
        </div><!-- row -->
		<div class="row">
			<div class="col-md-12 the-timeline-margin">
				<div class="titulos">
                        <ul><li>FOTOS</li></ul>
                        </div>
			</div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /MiPerfil --> 

</body>
</html>
