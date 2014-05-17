<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Club</title>
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
<script src="../js/autoRefresh.js"></script>
<script src="../js/canvasjs.min.js"></script>
<!-- /script -->

<?php 

  $idProfile=$_SESSION['id_user']; 
  $token=$_SESSION['token']; 

  if (isset($_GET['idv'])){
	$id_event = $_GET['idv'];
}else $id_event = $idProfile;
  
  
?>


<script>
var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
var ideEvent = '<?php echo $id_event; ?>' ;	
</script>



<script>
  window.onload = function () {
  
          
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ideEvent);
	  
var url="../develop/actions/statisticsPub.php";
	url=url.concat(params);

$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			alert(r.responseText);
			var json = JSON.parse(r.responseText);	 
            var a1820 = json['a18-20'];
			var a2123 = json['a21-23'];
			var a2430 = json['a24-30'];  
			var am31 = json['am31'];  

////////////////AGE

				CanvasJS.addColorSet("myColors",
                	[//colorSet Array
						"#2F4F4F",
                		"#008080",
                		"#2E8B57",
                		"#3CB371",
                		"#90EE90"                
                	]);



					var chart = new CanvasJS.Chart("chartContainer",
    {
	
	colorSet: "myColors",
      title:{
        text: "Rango de edades"
      },
      legend:{
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      data: [
      {        
       indexLabelFontSize: 20,
       indexLabelFontFamily: "Monospace",       
       indexLabelFontColor: "darkgrey", 
       indexLabelLineColor: "darkgrey",        
       indexLabelPlacement: "outside",
       type: "pie",       
       showInLegend: true,
       dataPoints: [
       {  y: a1820, legendText:"18-20", indexLabel: "18-20 años" },
       {  y: a2123, legendText:"21-23", indexLabel: "21-23 años" },
       {  y: a2430, legendText:"24-30",exploded: true, indexLabel: "24-30 años" },
       {  y: am31, legendText:"+31" , indexLabel: "más de 31 años"},
       ]
     }
     ]
   });

chart.render();

//////////Man vs Female
			  
			var mens = json.mens;
			var womens = json.womens;


CanvasJS.addColorSet("myColorsGender",
                	[//colorSet Array
						"#0000FF",
                		"#FF0000"	                
                	]);



					var chart = new CanvasJS.Chart("chartGender",
    {
	
	colorSet: "myColorsGender",
       title:{
        text: "Géneros"    
      },
      axisY: {
        title: ""
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: "Género",
        dataPoints: [      
        {y: mens, label: "Hombres"},
        {y: womens,  label: "Mujeres" }
        ]
      }   
      ]
    });

    chart.render();


			 
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});




  
  
    };

</script>


</head>

<body> <!--onload="JavaScript:timedRefresh(30000);">-->
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
  if($_SESSION['user_type'] == "club"){
  	include "templates/navbar-header.php"; 
  } else if($_SESSION['user_type'] == "user"){
  	include "../user/templates/navbar-header.php"; 
  }

  /*Sidebar*/
  if($_SESSION['user_type'] == "club")
  		include "templates/sidebar.php";
?>
<!-- MiPerfil -->

<script>
if (ide==ideEvent)
      document.write("<div class='container' style='background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px'>");
else
      document.write("<div class='container' style='background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px'>");

</script>

		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Estadisticas</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
							    		<div id="chartContainer" style="height: 300px; width: 100%;">
  										</div>
  										
  										<br />
  										
  										<div id="chartGender" style="height: 300px; width: 100%;">
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
