<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-Events User</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->

	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Styles-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    
    <link rel="stylesheet" href="../css/profile-partier.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
	<script src="../js/jquery.js"></script>	
<script src="../js/autoRefresh.js"></script>
   	<script>
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})

	   
	</script>
	
    <script src="../js/keep-session.js"></script>
   <script src="../js/tab.js"></script>
   <script src="../js/eventsUser.js"></script>

   <script type="text/javascript">
   	//Get user info
	var idProfile = <?php echo $_SESSION['id_user'];?>;
    var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url2 = "../develop/update/user.php" + params;
		
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
	</script>
   
</head>

<body> <!--onload="JavaScript:timedRefresh(30000);">-->
	
	<style>

	body{
		background-image:url(../images/wall.jpg);
		background-color: #000000;
	}

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
		
		
	 #fuente{ 
		font-size: 1.7em;
		color:#F59236;
		text-decoration: none;
		-moz-text-decoration-color: -moz-use-text-color;
		-moz-text-decoration-line: none;
		-moz-text-decoration-style: solid;

		}
		
	.elementosconhover:hover {
	opacity:0.6;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=29)";
	filter:alpha(opacity=19);

	}


	 </style>
    

<?php 
	 /*NavbarHeader*/
 	 include "templates/navbar-header.php";

 	 /*Sidebar*/
  	include "templates/sidebar.php";
      $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 
	
?>




<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>



	<!-- Events -->

	<table style="margin-left:200px" border=0 width="100%" >
	<tr>
		
		<td>
		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" style="border: 1.5px solid #FF6B24; background-color: #000000;">
			<li class="active"><a href="#Events" data-toggle="tab" >Próximos Eventos</a></li>
			<li><a href="#Lists" data-toggle="tab">Listas de locales</a></li>
			<li><a href="#MyEvents" data-toggle="tab">Mis eventos</a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div class="tab-pane active" id="Events" style="margin-left: 35px; margin-right: 200px;">
				
				<!-- Next Events -->
						
						<div  class="timeline">
							<ul id="nextev">
								<script>
								nextEvents();
								
								</script>
								
							</ul>
						</div>
						<div id="show_more" >						
											
						</div>
						<script>
								document.getElementById('show_more').innerHTML="";
						</script>
						</div><!-- col-md-5-->
						
				
			
			<div class="tab-pane" id="Lists" style="margin-left: 120px" > 
			
			  <div class="latest-tweets orangeBox1 " style="width:80%; margin-top:15px">
					
							<div class="latest-tweets-head" >
								<span ><i class="glyphicon glyphicon-glass" style="color:#FF6B24"></i>LISTA LOCAL 1</span>
								<label style=" color:#FF6B24; float: right; margin-top: 6px; margin-left: 5px"> Me apunto</label> <i class="glyphicon glyphicon-ok"style="color:#FF6B24; float: right; top: 6px"></i>
							</div> 
							
					
						 
						 <ul class="orangeBox1">
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Evento <i>Nombre Club</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i><br><img class="menu-avatar orangeBox1"src="../images/copas.jpg" alt="" /></a>
									</li>
								</ul>
								
							  
						</div> 
						
						 
						
						 <div class="latest-tweets orangeBox1" style="width:80%; margin-top:15px">
							
							<div class="latest-tweets-head" >
								<span ><i class="glyphicon glyphicon-glass"style="color:#FF6B24"></i>LISTA LOCAL 2</span>
								<label style=" color:#FF6B24; float: right; margin-top: 6px; margin-left: 5px"> Me apunto</label> <i class="glyphicon glyphicon-ok"style="color:#FF6B24; float: right; top: 6px"></i>
							</div>
								<ul class="orangeBox1">
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Evento <i>Nombre Club</i></a>
									</li>
									<li class="orangeBox1"><a class="orangeBox1">Promocion <i>Nombre Club</i><br><img class="menu-avatar orangeBox1"src="../images/copas.jpg" alt="" /></a>
									</li>
								</ul>
					
						</div>
			
			</div>
			
			
			
			<div class="tab-pane" id="MyEvents" style="margin-left: 35px; margin-right: 200px;">
				
				<div  class="timeline">
							<ul id="myev">
								<script>
									myEvents();
								</script>
								
							</ul>
						</div>
						</div><!-- col-md-5-->
				
				
				</div>
	 </td>
		
		
	</tr>

	</table>

	<!--/Events>

	<!-- script -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- /script -->

</body>
</html>
