<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-EditProfile Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap Styles -->
    <link href="../css/bootstrap-edit.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application-edit.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/inicio-fiestero.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->
	<link href="../css/kendo.common.min.css" rel="stylesheet" />
    <link href="../css/kendo.default.min.css" rel="stylesheet" />

	<!-- script -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/keep-session.js"></script>
    <script src="../js/kendo.all.min.js"></script>

	<script type="text/javascript">  
    $(document).ready(function(){ 
      
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

</head>

<body>
	<style>  
		body{
			  background-color: #000;
		}
		navbar-fixed-top{
				z-index:1030;
		}
		@media (max-width: 979px){

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

	
	<!-- My Profile -->
	<div class="main-content" style="background-image:url(../images/wall.jpg); max-height:2000px; margin-bottom:-50px;" > 
		<div class="wrapper">
			<div class="container">
				<div align= "center">
					<form class="form-horizontal" role="form" id="edit-profile">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre Empresa: </b></label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['company_name']; ?>" >
							</div>
							<label for="cif" class="col-sm-1 control-label" style="color: #FFFFCC"><b>CIF: </b></label>
							<div class="col-sm-2">
							  <input type="text" class="form-control" id="cif" name="cif" value="<?php echo $_SESSION['cif']; ?>" >
							</div>
						</div>

						<div class="form-group">
							<label for="local_name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre Local: </b></label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" id="local_name" name="local_name" value="<?php echo $_SESSION['local_name']; ?>" >
							</div>

							<label for="telephone" class="col-sm-1 control-label" style="color: #FFFFCC"><b>Teléfono: </b></label>
							<div class="col-sm-2">
							  <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $_SESSION['telephone']; ?>" >
							</div>
						</div>
				  
				  		<div class="form-group">
							<label class="col-sm-2 control-label" style="color: #FFFFCC"><b>Dirección: </b></label>
							
									<select class="col-sm-1" id="street" required>
										<option value="0" <?php if ($_SESSION['street'] == 0) echo 'selected="1"'; ?>>Calle</option>
										<option value="1" <?php if ($_SESSION['street'] == 1) echo 'selected="1"'; ?>>Avd.</option>
										<option value="2" <?php if ($_SESSION['street'] == 2) echo 'selected="1"'; ?>>Plaza</option>
									</select>
							
							<div class="col-sm-6">
							 <input id="streetName" type="text" class="form-control" placeholder="Nombre"/>
							</div>
							<div class="col-sm-1">
							 <input id="streetNumber" type="text" class="form-control" placeholder="Número"/>
							</div> 
						</div>
				  
						<div class="form-group">
							<label for="poblation" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Población: </b></label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" id="poblation" value="<?php echo $_SESSION['poblation_local']; ?>">
							</div>
							<label for="postal-code" class="col-sm-2 control-label" style="color: #FFFFCC"><b>C.P.: </b></label>
							<div class="col-sm-2">
							  <input type="text" class="form-control" id="postal-code" name="postal-code" value="<?php echo $_SESSION['cp_local']; ?>">
							</div>
						</div>
						  
						<div class="form-group">
							<label for="entryPrice" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Precio entrada: </b></label>
							<div class="col-sm-3">
							  <input type="text" class="form-control" id="entryPrice" name="entryPrice" value="<?php echo $_SESSION['entry_price']; ?>">
							</div>
							<label for="drinkPrice" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Precio bebidas: </b></label>
							<div class="col-sm-3">
							  <input type="text" class="form-control" id="drinkPrice" name="drinkPrice" value="<?php echo $_SESSION['drink_price']; ?>">
							</div>
						</div>
				  
						<div class="form-group">
							<label for="music-style" class="col-sm-1 control-label" style="color: #FFFFCC"><b>Estilo de música: </b></label>
							<div class="col-sm-2">
							  <input type="text" class="form-control" id="music-style" name="music-style" value="<?php echo $_SESSION['music']; ?>">
							</div>

							<div class="col-sm-3">
								<label for="timepicker_open" style="color: #FFFFCC"><b>Apertura: </b></label>
							    <input id="timepicker_open" value="22:00" />
						    </div>
			                
			                <div class="col-sm-3">
								<label for="timepicker_close" style="color: #FFFFCC"><b>Cierre: </b></label>
						        <input id="timepicker_close" value="06:00" />
					        </div>
						</div>
						  
						<div class="form-group">
							<label for="about-you" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Acerca de ti: </b></label>
							<div class="col-sm-8">
							  <textarea id="about-you" class="form-control" rows="3"><?php echo $_SESSION['about']; echo var_dump($_SESSION); ?></textarea>
							</div>
						</div>
				  
						<button type="button" class="btn btn-default" id="change-data">Editar perfil</button>
				  
					</form>
				</div> <!-- align center-->  
			</div><!-- Container -->
		</div><!-- Wrapper -->

	</div>
	<!-- /My Profile --> 

</body>
</html>
