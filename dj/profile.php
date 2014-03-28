<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile DJ</title>
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
  <link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
  <link href="../css/custom.css" rel="stylesheet" media="screen">
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
  <link rel="stylesheet" href="../css/profile-dj.css" type="text/css" /><!-- Style -->	
  <link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

  <!-- script -->
  <script src="../js/events.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/registro.js"></script>
  <script src="../js/keep-session.js"></script>

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
	url1 += "dj.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);
		var nameDJ = json.nameDJ;
		var name = json.name;
		var surname = json.surname;
		var telephone = json.telephoneDJ;
		var gender = json.gender;
		var birthdate = json.birthdate;
		var picture = json.picture;
		var music = json.music;
		var about = json.about;
		$.post("../framework/visits_add.php",
		  {
		  	user_type: 'dj',
		    id_user: idProfile,
			nameDJ: nameDJ,
			name: name,
			surname: surname,
			telephone: telephone,
			gender: gender,
			birthdate: birthdate,
			picture: picture,
			music: music,
			about: about
		  },
		  function(data,status){
			//alert("Data: " + data + "\nStatus: " + status);						  ;
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

      //Function for close session
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
							<span><?php echo get_nameDJ_dj(); ?></span>
						</h1>
						
					</div>
					<div>
						 <input id="btn01"  class="botonseguir" type="button"value="SIGUEME"onClick="changeMyClassName(this);">
					</div>
                   	 </div> 
		</div><!-- col-md-12 -->
        </div><!-- row -->
           	<div class="row">
			<div class="col-md-12 the-timeline-margin">
                       
                        
					<!-- Begin timeline Events -->
                  		<div class="titulos">
                        <ul><li>EVENTOS</li></ul>
                       
                        </div>
						<div class="the-timeline">
							<ul id="ul">
							
<?php
if (isset($_GET['idv'])){
	$id_event = $_GET['idv'];
}else $id_event = $idProfile;
?>							
							<script>
									eventProfile("<?php echo $id_event;?>");
								</script>
							</ul>
						</div><!-- End div .the-timeline -->
						<!-- End timeline -->
					<!-- End div .col-sm-6 -->
                     
    </div><!-- col-md-12 -->
        </div><!-- row -->
        <div class="row">
			<div class="col-md-12">
        <div class="titulos">
                        <ul><li>FOTOS   <button type="button" class="btn botonanadir"style="margin-left:79%">Ver más</button></li></ul>
                        </div>
      <div class="seguidores">
              	<ul><li></li></ul>
              </div>
					    
             </div><!-- col-md-12 -->
              </div><!-- row -->
              <div class="row">
             <div class="col-md-12">
        <div class="titulos">
                        <ul><li>SEGUIDORES   <button type="button" class="btn botonanadir"style="margin-left:73%">Ver más</button></li></ul>
                       
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
              <div class="mapa">
              	<li>
					   <h4 style="color:#1B1E24">Estilo de música:</h4> <p style="font-size:14px;"><?php echo get_music_dj(); ?> </p>
					   <h4 style="color:#1B1E24">Acerca de mi:</h4> <p style="font-size:14px;"><?php echo get_about_dj(); ?> 
						</p>
				
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
