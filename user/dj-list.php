<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-DJ Users</title>
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
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	   	 
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>
<script src="../js/keep-session.js"></script>
<!-- /script -->

  <script type="text/javascript">  
    $(document).ready(function(){ 

    		//Get user info
	var idProfile = <?php echo $_SESSION['id_user'];?>;
    var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url2 = "../develop/update/partier.php" + params;
		
		$.ajax({
			url:url2,
			dataType: "json",
			type: "GET",
			complete: function(r3){
				var json = JSON.parse(r3.responseText);
			/*	var picture = json.picture;
				//$("#profile-img").attr("src", picture);*/
				var name = json.name;
				var surnames = json.surnames;
				//$("#complete-name").text(name + " " + surnames);
				//$("#complete-name2").text(name + " " + surnames);
				$("#navbar-complete-name").text(name + " " + surnames);
				$("#navbar-complete-name2").text(name + " " + surnames);
			/*	var birthdate = json.birthdate;
				var birth_array = birthdate.split("/");
				$("#birthdate").text(birth_array[2] + "/" + birth_array[1] + "/" + birth_array[0]);
				var gender = json.gender;
				if(gender == "male"){
					$("#gender").text("Hombre");
				}
				if(gender == "female"){
					$("#gender").text("Mujer");
				}
				var music = json.music;
				$("#music").text(music);
				var civil_state = json.civil_state;
				$("#civil_state").text(civil_state);
				var city = json.city;
				$("#city").text(city);
				var drink = json.drink;
				$("#drink").text(drink);
				var about = json.about;
				$("#about").text(about);
				var mode = json.mode;
				if (mode == 0){
						modeString = "De tranquis";
				}else if (mode == 1){
					modeString = "Hoy no me lío";
				}else if (mode == 2){
					modeString = "Lo que surja";
				}else if (mode == 3){
					modeString = "Lo daré todo";
				}else if (mode == 4){
					modeString = "Destroyer";
				}else if (mode == 5){
					modeString = "Yo me llamo Ralph";
				}
				
				$('#mode').append('<span class="label label">'+modeString+'</span>');
			  */
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
		});
      
         
          //Get DJ's info
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
        var url1 = "../develop/read/djs.php" + params;
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var user_type = "dj";
					var id_user = json[i].idProfile;
					var nameDJ = json[i].nameDJ;
					var music = json[i].music;
					if (music == null || music.length == 0){
						music = "Estilo no definido";
					}
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					var link = "../dj/profile.php?idv=" + id_user;
					
					$('#dj-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture + '" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ nameDJ +'</a><span class="user-subhead">DJ</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#"style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="width:20%;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#"id="" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Eliminar</a></td></tr>');
				}style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"
				/*var picture = json.picture;
				var name = json.name;
				var surnames = json.surnames;
				var birthdate = json.birthdate;
				var gender = json.gender;
				var music = json.music;
				var civil_state = json.civil_state;
				var city = json.city;
				var drink = json.drink;
				var about = json.about;*/
			/*	$.post("../framework/session_start.php",
				  {
				  	user_type: 'user',
				    type_login: login_type,
				    id_user: id,
				    token: token,
					picture: picture,
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
					//alert("Data: " + data + "\nStatus: " + status);
					//window.location.href = "../user/home.php";										  
				  });*/
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
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
  if($_SESSION['user_type'] == "user"){
  	include "templates/navbar-header.php"; 
  } else if($_SESSION['user_type'] == "club"){
  	include "../club/templates/navbar-header.php"; 
  }

  /*Sidebar*/
  if($_SESSION['user_type'] == "user"){
 	 include "templates/sidebar.php";
  } else if($_SESSION['user_type'] == "club"){
  	include "../club/templates/sidebar.php"; 
  }
?>
<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">DJ's Favoritos</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
							<div class="col-lg-12">
								
									<div class="table-responsive">
										<table id="dj-list" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">DJ</span></th>
													<th>&nbsp;</th>													
													<th class=""><span style="color:#FF6B24;border-color:#ff6b24">Estilo de Música</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
									<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul>
								</div>
							
						</div>
								<!--Aqui empieza-->
							</div>
						</div>
					</div>	
					</div>	
				</div>
			</div>
		</div>
</div>	
<!-- MiPerfil -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
<script src="../js/club-list.js"></script>
</body>
</html>
