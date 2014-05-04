<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-EditProfile User</title>
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
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <link rel="stylesheet" href="../css/profile-partier.css" type="text/css" /><!-- Style -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/profile-photo.css" type="text/css" />

	<!-- script -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>	
 
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/keep-session.js"></script>	
	<script src="../js/autoRefresh.js"></script>

	<script type="text/javascript">  
    $(document).ready(function(){ 

        //Get user info
    var id = <?php echo $_SESSION['id_user'];?>;
    var token = "<?php echo $_SESSION['token'];?>";
    var params = "/" + idProfile + "/" + token; 
    var url1 = "../develop/update/";
    var params = "/" + id + "/" + token + "/" + id;
    url1 += "user.php";
    url1 += params;
    
    $.ajax({
      url:url1,
      dataType: "json",
      type: "GET",
      complete: function(r3){
        var json = JSON.parse(r3.responseText);
        var picture = json.picture;
        if (picture.length >0){    
          $( "#imageform" ).prepend('<div> <label for="actual-photo" class="col-lg-2 control-label" style="color:#ff6b24;font-size:15px;">Imagen actual</label><img src="' + picture + '" name="actual-photo" id="actual-photo" style="width:300px;margin:10px;padding:10px;" /> </div>');
        }
        
        var name = json.name;
        $("#name").val(name);
        var surnames = json.surnames;
        $("#surname").val(surnames);

        var birthdate = json.birthdate;
        var birth_array = birthdate.split("/");
        var day = birth_array[2];
        if (day.substr(0, 1) == "0"){
          day = day.substr(1,2);
        }
        $('#day').val(day);
        var month = birth_array[1];
         if (month.substr(0, 1) == "0"){
          month = month.substr(1,2);
        }
        $('#month').val(month);
        var year = birth_array[0];
        $('#year').val(year);

        var gender = json.gender;
        var radios = $("input[type='radio']");
        radios.filter('[value=' + gender + ']').prop('checked', true);
       
        var music = json.music;
        $("#favourite-music").val(music);
        var civil_state = json.civil_state;
        $("#marital-status").val(civil_state);
        var city = json.city;
        $("#city").val(city);
        var drink = json.drink;
        $("#favourite-drink").val(drink);
        var about = json.about;
        $("#about-you").val(about);
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
        
      },
      onerror: function(e,val){
        //alert("No se puede introducir evento 2");
      }
    });

            
      $("#change-data").on("click", function (event) {
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
        var name = $('#name').val();
        var surnames = $('#surname').val();
        var day = $('#day').val();
        if (day.length < 2){
          day = "0"+day;
        } 
        var month = $('#month').val();
        if (month.length < 2){
          month = "0"+month;
        }
        var year = $('#year').val();
        var birthdate = year+"/"+month+"/"+day;
        var gender = $("input[type='radio']:checked").val();
        var music = $('#favourite-music').val();
        var civil_state = $('#marital-status').val();
        var city = $('#city').val();
        var drink = $('#favourite-drink').val();
        var about = $('#about-you').val();
        var img_url = $("#preview").find("#profile_photo").attr("src");
        if (img_url != undefined){
          var picture = img_url;
        }else{
          var picture = $("#actual-photo").attr("src");
        }
        var params = "/" + idProfile + "/" + token;
        
         console.log($.ajax({
            url: "../develop/update/user.php" + params,
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
              picture: picture,
              about: about
            },
            complete: function(r){
              $.post("../framework/session_start.php",
                    {
                      	type_login: 'normal',
                      	user_type: 'user',
                     	id_user: idProfile,
				             	token: token,
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
	  
	   $("#change-data1").on("click", function (event) {
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
        var name = $('#name').val();
        var surnames = $('#surname').val();
        var day = $('#day').val();
        if (day.length < 2){
          day = "0"+day;
        } 
        var month = $('#month').val();
        if (month.length < 2){
          month = "0"+month;
        }
        var year = $('#year').val();
        var birthdate = year+"/"+month+"/"+day;
        var gender = $("input[type='radio']:checked").val();
        var music = $('#favourite-music').val();
        var civil_state = $('#marital-status').val();
        var city = $('#city').val();
        var drink = $('#favourite-drink').val();
        var about = $('#about-you').val();
        var img_url = $("#preview").find("#profile_photo").attr("src");
        if (img_url != undefined){
          var picture = img_url;
        }else{
          var picture = $("#actual-photo").attr("src");
        }
        var params = "/" + idProfile + "/" + token;
        
         console.log($.ajax({
            url: "../develop/update/user.php" + params,
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
              picture: picture,
              about: about
            },
            complete: function(r){
              $.post("../framework/session_start.php",
                    {
                        type_login: 'normal',
                        user_type: 'user',
                      id_user: idProfile,
                      token: token,
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

      $("#change-data3").on("click", function (event) {
          
         var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
        var name = $('#name').val();
        var surnames = $('#surname').val();
        var day = $('#day').val();
        if (day.length < 2){
          day = "0"+day;
        } 
        var month = $('#month').val();
        if (month.length < 2){
          month = "0"+month;
        }
        var year = $('#year').val();
        var birthdate = year+"/"+month+"/"+day;
        var gender = $("input[type='radio']:checked").val();
        var music = $('#favourite-music').val();
        var civil_state = $('#marital-status').val();
        var city = $('#city').val();
        var drink = $('#favourite-drink').val();
        var about = $('#about-you').val();
        var img_url = $("#preview").find("#profile_photo").attr("src");
        if (img_url != undefined){
          var picture = img_url;
        }else{
          var picture = $("#actual-photo").attr("src");
        }
        var params = "/" + idProfile + "/" + token;
        
         console.log($.ajax({
            url: "../develop/update/user.php" + params,
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
              picture: picture,
              about: about
            },
            complete: function(r){
              $.post("../framework/session_start.php",
                    {
                        type_login: 'normal',
                        user_type: 'user',
                      id_user: idProfile,
                      token: token,
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

      //Upload image
      $(document.body).on('change', '#photoimg', function() {
        $("#preview").html('');
        $("#preview").html('<img src="../images/edit/loader.gif" alt="Subiendo imagen..."/>');
        $("#imageform").ajaxForm({
            target: '#preview'
        }).submit();

      });

      
    });//end $(document).ready(function()
    
    
    </script>

</head>

<!--<body onload="JavaScript:timedRefresh(30000);"> -->
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
	
	<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Editar Perfil Fiestero</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									
									<div class="profile-header">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
									</div> 
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-basic" data-toggle="tab">Básica</a></li>
											<li><a href="#tab-details" data-toggle="tab">Detallada</a></li>
											<li><a href="#tab-photo" data-toggle="tab">Foto</a></li>
										</ul>
										
										<div class="tab-content">
										<!-- Comienza Basic-->
											<div class="tab-pane fade in active" id="tab-basic">
												 <form class="form-horizontal" style="width:99%"role="form">
                                                        <div class="form-group">
                                                            <label for="name" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Nombre</label>
                                                            <div class="col-lg-9">
                                                                <input type="email" class="form-control" style=""id="name" placeholder="Nombre" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="surname" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Apellidos</label>
                                                            <div class="col-lg-9">
                                                                <input type="email" class="form-control" id="surname" placeholder="Apellidos" >
                                                            </div>
                                                        </div>
												
														<div class="form-group">
															<label class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Fecha de nacimiento</label>
															<div class="col-sm-2">
																<select id="day" class="form-control">
																	<option value="0">Día</option>
																  <?php 
                                    for ($i=1; $i<32; $i++){
                                      if ($i == $day){
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
                                      if ($i == $month){
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
                                    for ($i=2013; $i>1905; $i--){
                                      if ($i == $year){
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
															<label  class="col-sm-2 control-label" style="color:#ff6b24;font-size:13px;">Sexo</label>
															<div class="col-sm-8">
																<label class="radio-inline">
																	<input name="radioGroup" id="radio1" value="male" type="radio"><span style="color: #FFFFCC">Hombre</span>
																</label>
																<label class="radio-inline">
																	<input name="radioGroup" id="radio2" value="female" type="radio"><span style="color: #FFFFCC">Mujer</span>
																</label>
															</div>
														</div>
                                                <!--        <div class="form-group">
                                                            <label for="inputemail" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Correo Electrónico</label>
                                                            <div class="col-lg-9">
                                                                <input type="email" class="form-control" id="inputemail" placeholder="Correo Electrónico">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputpassword" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Contraseña</label>
                                                            <div class="col-lg-9">
                                                                <input type="password" class="form-control" id="inputpassword" placeholder="Contraseña">
                                                                <input type="password" class="form-control together" id="inputpassword2" placeholder="Repite Contraseña">
                                                            </div>
                                                        </div>-->
                                                       
                                                    </form>
													 <a id="change-data" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Guardar Cambios</a>		
																
											</div>
										<!-- Termina Basic -->	
										<!-- Comienza Details -->
											<div class="tab-pane fade " id="tab-details">
												 <form class="form-horizontal " style="width:99%"role="form">
                                                        <div class="form-group">
                                                            <label for="marital-status" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Estado Civil</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" class="form-control" id="marital-status" placeholder="Estado Civil">             
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="city" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Ciudad Actual</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" class="form-control" id="city" placeholder="Ciudad Actual">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="favourite-music" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Música Favorita</label>
                                                            <div class="col-lg-10">
                                                                <input id="favourite-music" name="favourite-music" type="text" placeholder="Música Favorita" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="favourite-drink" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Bebida Favorita</label>
                                                            <div class="col-lg-10">
                                                                <input id="favourite-drink" name="favourite-drink" type="text" placeholder="Bebida Favorita" class="form-control">
                                                            </div>
                                                        </div>
														<div class="form-group">
                                                            <label for="about-you" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Acerca de Mi</label>
                                                            <div class="col-lg-10">
                                                                <textarea id="about-you" class="form-control" placeholder="Acerca de Mi..." rows="6" style="font-size:13px"></textarea>
                                                            </div>
                                                        </div>
														
                                                     </form>   
													<a id="change-data1" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Guardar Cambios</a>	
													
											</div>
										<!-- Termina Details -->	
										<!-- Comienza Photo -->
											<div align="center" class="tab-pane fade" id="tab-photo" style="color:#ff6b24;font-size:12px;">
												
												<form id="imageform" method="post" enctype="multipart/form-data" action='../framework/profile_image.php'>
                          
                          <label for="file" class="col-lg-2 control-label" style="color:#ff6b24;font-size:15px;">Subir imagen</label>
                          <input type="file" name="photoimg" id="photoimg" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"/>
                        </form>

                        <div id='preview'></div>
                        <div width"100%" align="center">
                          <a id="change-data3" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin:10px;padding:10px;">Guardar Cambios</a>  
                        </div>
											</div>
											
											<!-- Termina Photo -->
										
											
									
								</div> <!-- Termina tab-content -->
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
<script src="../js/jquery.form.js"></script>

</body>
</html>
