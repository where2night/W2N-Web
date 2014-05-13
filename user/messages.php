<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Messages Users</title>
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
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap-wizard.css" rel="stylesheet" media="screen">
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	   	 
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-wizard.js"></script>
<script src="../js/keep-session.js"></script>
<script src="../js/autoRefresh.js"></script>
<!-- /script -->

<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 

?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>
</head>

<body>  <!--onload="JavaScript:timedRefresh(30000);">-->
<style>  
body{
	background-color:#000;
	
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
					<h1 style="color:#ff6b24;font-size:30px;">Bandeja de Entrada</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
										<div class="col-lg-12">
											<!--NEW MESSAGE-->
											
											<!--<a id="open-wizard" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none"><i class="glyphicon glyphicon-plus"style="font-size:12px;margin-bottom:5%;color:#ff6b24;margin-right:4%;"></i>Mensaje Nuevo</a>-->
											
											<!--/NEW MESSAGE-->
											<div class="table-responsive">
												<table id="user-friends" class="table user-list">
												<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fiestero</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Mensaje</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fecha</span></th>
													<th>&nbsp;</th>
												</tr>
												</thead>
												<tbody>
												</tbody>
												</table>
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
<script src="../js/club-list.js"></script>
<script src="../js/bootstrap-wizard.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
</body>
</html>
