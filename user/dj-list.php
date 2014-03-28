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
	<link href="../css/club-user.css" rel="stylesheet" media="screen">
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/registro.js"></script>
<script src="../js/keep-session.js"></script>
<!-- /script -->

  <script type="text/javascript">  
    $(document).ready(function(){ 
      
         //Function for closing session
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
					if (music == null || picture.length == 0){
						music = "Estilo no definido";
					}
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					var link = "../dj/profile.php?idv=" + id_user;
					
					$('#dj-list tbody').append('<tr><td><img src="'+ picture + '" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ nameDJ +'</a><span class="user-subhead">DJ</span></td><td></td><td class="text-center"><a href="#">'+ music +'</a></td><td></td><td style="width: 20%;"><a href="#" class="" style="margin-right:2px;margin-left:2px;"><span class="label" style="padding-top:8px;"><i class="glyphicon glyphicon-zoom-in"style="color:#1B1E24;"></i></span></a><a href="#" class="" style="margin-right:2px;margin-left:2px;"><span class="label" style="padding-top:8px;padding-right:2px;"><i class="glyphicon glyphicon-star"style="color:#1B1E24;"></i></span></a><a href="#" class=""style="margin-right:2px;margin-left:2px;"><span class="label" style="padding-top:8px;padding-left:3px;"><i class="glyphicon glyphicon-trash"style="color:#1B1E24;"></i></span></a></td></tr>');
				}
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
  include "templates/navbar-header.php";

  /*Sidebar*/
  include "templates/sidebar.php";
?>
<!-- MiPerfil -->
<div class="main-content" style="background-image:url(../images/CollageNeon.jpg);height:2000px;margin-bottom:-50px;margin-left:200px;" > 
<div class="wrapper">
<div class="container">
<div class="col-md-10" id="content-wrapper" style="background-color:#1B1E24; margin-top:40px;margin-left:30px;width:95%;">
				<div class="row">
					<div class="col-lg-12">
					
						<div class="clearfix">
							<h1 class="pull-left" style="color:#FF6B24;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;"">DJ's</h1>
							
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="main-box clearfix">
									<div class="table-responsive">
										<table id="dj-list" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24">DJ</span></th>	
													<th>&nbsp;</th>													
													<th class="text-center"><span style="color:#FF6B24">Estilo de Música</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
									<ul class="pagination pull-right">
										<li ><a href="#" ><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						<script src="../js/club-list.js"></script>
</body>
</html>
