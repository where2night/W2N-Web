<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Editar Datos</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/inicio-fiestero.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

	<!-- script -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
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
	          var url = "http://www.where2night.es";
	          $(location).attr('href',url);
          });
      });
            
      $("#change-data").on("click", function (event) {
        
          //var email = $.cookie("email_log");
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var name = $('#name').val();
            var surnames = $('#surname').val();
            var day = $('#day').val();
            if (day.length < 2){
              day = "0"+day;
            } 
            var month = $('#month').val();
            if (month.length < 2){
              month = "0"+day;
            }
            var year = $('#year').val();
            var birthdate = day+"/"+month+"/"+year;
            var gender = $("input[type='radio']:checked").val();
            var music = $('#favourite-music').val();
            var civil_state = $('#marital-status').val();
            var city = $('#city').val();
            var drink = $('#favourite-drink').val();
            var about = $('#about-you').val();
        
         console.log($.ajax({
            url: "../api/editprofile.php",
            dataType: "json",
            type: "POST",
            timeout: 5000,
            data: {
              idProfile:idProfile,
              name:name,
              surnames: surnames,
              birthdate: birthdate,
              gender: gender,
              music: music,
              civil_state: civil_state,
              city: city,
              drink: drink,
              about: about
            },
            complete: function(r){
              $.post("../framework/session_start.php",
                    {
                      type_login: 'normal',
                      id_user: idProfile,
                    name: name,
                    surnames: surnames,
                    birthdate: birthdate,
                    gender: gender,
                    music: music,
                    civil_state: civil_state,
                    city: city,
                    drink: drink,
                    about: about
                    },
                    function(data,status){
                      window.location.href="home.php";
                    });
                
              },
            onerror: function(e,val){
              alert("Hay error");
            }
        }));
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
	<div class="main-content" style="background-image:url(images/wall.jpg); max-height:2000px; margin-bottom:-50px;" > 
		<div class="wrapper">
			<div class="container">
				<div align= "center">
					<form class="form-horizontal" role="form" id="edit-profile">
						<div class="form-group">
							<label for="artistic-name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre Artístico: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="artistic-name" name="artistic-name" value="<?php //echo $_SESSION['name']; ?>" >
							</div>
						</div>
					  
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" name="name" value="<?php //echo $_SESSION['name']; ?>" >
							</div>
						</div>
					  
						<div class="form-group">
							<label for="surname" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Apellidos: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="surname" value="<?php //echo $_SESSION['surnames']; ?>">
							</div>
						</div>

						<?php
						/* $birth_array = explode ('/',$_SESSION['birthdate']);
						 $day = $birth_array[0];
						 $month = $birth_array[1];
						 $year = $birth_array[2];*/
						?>
				  
						<div class="form-group">
							<label class="col-sm-2 control-label" style="color: #FFFFCC"><b>Fecha de nacimiento: </b></label>
							<div class="col-sm-2">
							  <select id="day" class="form-control">
								  <option value="0">Día</option>
								  <?php 
									for ($i=1; $i<32; $i++){
									  if ($i == $day) {
										echo "<option value=".$i." selected=\"selected\">".$i."</option>";
									  }else{
										echo "<option value=".$i.">".$i."</option>";
									  }
									} 
								  ?>  
								</select>
							</div>
							  
							<div class="col-sm-2">
								<select id="month" class="form-control">
								  <option value="0">Mes</option>
									<?php  
									for ($i=1; $i<13; $i++){
									  if ($i == $month) {
										echo "<option value=".$i." selected=\"selected\">".$i."</option>";
									  }else{
										echo "<option value=".$i.">".$i."</option>";
									  }
									} 
								  ?>
								  </select>
							</div>
							  
							<div class="col-sm-2">
								<select id="year" class="form-control">
								  <option value="0">Año</option>
									<?php 
									for ($i=2013; $i<1905; $i--){
									  if ($i == $day) {
										echo "<option value=".$i." selected=\"selected\">".$i."</option>";
									  }else{
										echo "<option value=".$i.">".$i."</option>";
									  }
									} 
								  ?>    
								</select>
							</div>
						</div>
				  
						<div class="form-group">
							<label  class="col-sm-2 control-label" style="color: #FFFFCC"><b>Sexo: </b></label>
							<div class="col-sm-8">
								<label class="radio-inline">
								  <input name="radioGroup" id="radio1" value="male" type="radio" <?php //if ($_SESSION['gender']=="male") echo "selected=selected" ?>><span style="color: #FFFFCC">Hombre</span>
								</label>
								<label class="radio-inline">
								  <input name="radioGroup" id="radio2" value="female" type="radio" <?php //if ($_SESSION['gender']=="female") echo "selected=selected" ?>><span style="color: #FFFFCC">Mujer</span>
								</label>
							</div>
						</div>
				  
						<div class="form-group">
							<label for="music-style" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Estilo de música: </b></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="music-style" name="music-style" value="<?php //echo $_SESSION['music-style']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="about-you" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Acerca de ti: </b></label>
							<div class="col-sm-8">
							  <textarea id="about-you" class="form-control" rows="3"><?php //echo $_SESSION['about']; ?></textarea>
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
