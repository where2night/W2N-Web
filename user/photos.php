<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-Photos User</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Style -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="../js/fotos-fiestero.js"></script>
</head>

<body>

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
			
			.btn.btn-registro{
				
				background:#000;
				border:2px solid #D41F00;
				color:#F59236;
				
				padding: 17px 22px;
				position: fixed;
				bottom: 7.5%;
				right: 0.5%;
				font-weight: 50;
				z-index:2;
			}		
			.btn.btn-registro:hover{
				background:#000;
				color:#FF6B24;
				padding: 17px 22px;
				position: fixed;
				bottom: 7.5%;
				right: 0.5%;
				font-size: 15px;
				font-weight: 50;
				z-index:2;
			}	
			
			
		<!--div#name {}-->
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
?>


	<table   style="margin-left:200px" border=0 width="100%" >

	<tr>
		<td width="45%">
			
			<br/> <br/>
			
				<img style="margin-left: 5px" src="../images/photos_24.png" /> 
				<label id="font" style="margin-left: 2px"> Fotos </label>
				
				<!-- <input class="button" name="hola" /> --->
		</td>
		
		<td width="20%">
			<br/> <br/>
			<i class="glyphicon glyphicon-circle-arrow-up"style="color:#FF6B24; margin-left:5px;"></i>		
			<label id="loginButton" style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';"><span>Subir Fotos</span></label>
			
			
			</td>
	</tr>


	<tr>
		
		<td ><br />  
				
				<i class="glyphicon glyphicon-trash"style="color:red; margin-left: 5px" onclick="Delete();"></i> 
				<label style="font-size:12px ;color:#F59236" onmouseout="javascript:this.style.color='#F59236';"onmouseover="javascript:this.style.color='#F2A116';" onclick="Delete();">Borrar fotos seleccionadas</label>
				
				
				<i class="glyphicon glyphicon-ban-circle"style="color:red; margin-left:100px" onclick="Forbidden();"></i>
				<label style="font-size:12px ;color:#F59236" onmouseout="javascript:this.style.color='#F59236';"onmouseover="javascript:this.style.color='#F2A116';" onclick="Forbidden();">Denunciar fotos seleccionadas</label>
		</td>
		
		<td>
			<input type="checkbox" style="margin-top: -2px"  id="selectall" onclick="SelectAll();"/>
				<label style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" onmouseout="javascript:this.style.color='#F59236';" >Elegir Todas</label>
			
		</td>
		
	</tr>



	<tr>
		
		
		<td ><br /><input type="checkbox" style="margin-top: -100px; margin-left: 5px;"  name="select" id="photo1"/> <img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg">
				   <input type="checkbox" style="margin-top: -100px"  name="select" id="photo2" /><img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg" >
				   <input type="checkbox" style="margin-top: -100px"  name="select" id="photo3" /><img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg" >
		</td>
		
	</tr>

	<tr>
		
		<td ><br /><input type="checkbox" style="margin-top: -100px; margin-left: 5px;" name="select" id="photo4"/> <img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg">
				   <input type="checkbox" style="margin-top: -100px" name="select" id="photo5"/><img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg" >
				   <input type="checkbox" style="margin-top: -100px" name="select" id="photo6"/><img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg" >
		</td>
		
	</tr>

	<tr>
		
		<td ><br /><input type="checkbox" style="margin-top: -100px; margin-left: 5px;" name="select" id="photo7"/> <img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg">
				   <input type="checkbox" style="margin-top: -100px" name="select" id="photo8"/><img style="border: 1.5px solid #FF6B24;" class="elementosconhover" class="img-rounded" src="../images/party4_opt.jpg" >
				   <input type="checkbox" style="margin-top: -100px" name="select" id="photo9"/><img class="elementosconhover" style="border: 1.5px solid #FF6B24;" class="img-rounded" src="../images/party4_opt.jpg" >
		</td>
		
	</tr>


	<!--<tr>
		<td>
			
			
				<img src="../fotos/bin3_opt.png" /> 
				<label>Borrar seleccionadas</label>
				<!-- <input class="button" name="hola" /> --->
				
			
		<!--</td>
	</tr>--->


	</table>




	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>
