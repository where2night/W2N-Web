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
			//alert(r.responseText);
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


///////// TOP MUSIC

var aux=json.rows - json.numGo;

	if(ide==ideEvent){
	var j = json.rows;
		}
	else {
	
	 var j = json.rows-aux;
	}

	 var musicEnd= j+44;
	 
	 var toSort = new Array();
	 
	 while(j<musicEnd){
	 	toSort[toSort.length]=json[j];
	 	j++;
	 }
	 
	 var music = toSort;
	 
	  for (var i = 0; i < toSort.length; i++) {
    	toSort[i] = [toSort[i], i];
  		}
  		toSort.sort(function(left, right) {
    					return left[0] < right[0] ? -1 : 1;
  					});
  		toSort.sortIndices = [];
  	for (var j = 0; j < toSort.length; j++) {
    	toSort.sortIndices.push(toSort[j][1]);
    	toSort[j] = toSort[j][0];
 		 }
	 
	 toSort=toSort.sortIndices;
	 //alert(toSort);
	 //alert(music);
var one=0;
var types = new Array();

while (one<5){
	var num =43-one;
	var musicType=toSort[num];
	var type="h";
	 switch (musicType) { 
	 				case 0:   type="acid-house";   break; 
	 				case 1:   type="alternative rock";   break; 
	 				case 2:   type="beatbox";   break;
	 				case 3:   type="black metal";   break;
	 				case 4:   type="country";   break;
	 				case 5:   type="death metal";   break;
	 				case 6:   type="deep house";   break;
	 				case 7:   type="disco";   break;
	 				case 8:   type="drum n bass";   break;
	 				case 9:   type="electro";   break;
	 				case 10:   type="europop";   break;
	 				case 11:   type="folk";   break;
	 				case 12:   type="folk rock";   break;
	 				case 13:   type="funk";   break;
	 				case 14:   type="hard trance";   break;
	 				case 15:   type="hard-house";   break;
	 				case 16:   type="hard-rock";   break;
	 				case 17:   type="hardcore";   break;
	 				case 18:   type="hardstyle";   break;
	 				case 19:   type="heavy metal";   break;
	 				case 20:   type="hip hop";   break;
	 				case 21:   type="house";   break;
	 				case 22:   type="indie rock";   break;
	 				case 23:   type="italo-disco";   break;
	 				case 24:   type="italodance";   break;
	 				case 25:   type="jungle";   break;
	 				case 26:   type="latin";   break;
	 				case 27:   type="makina";   break;
	 				case 28:   type="minimal";   break;
	 				case 29:   type="Pachanga";   break;
	 				case 30:   type="pop-rock";   break;
	 				case 31:   type="progressive house";   break;
	 				case 32:   type="progressive trance";   break;
	 				case 33:   type="punk";   break;
	 				case 34:   type="reggae";   break;
	 				case 35:   type="reggaeton";   break;
	 				case 36:   type="rock & roll";   break;
	 				case 37:   type="ska";   break;
	 				case 38:   type="soul";   break;
	 				case 39:   type="soul-jazz";   break;
	 				case 40:   type="tech-house";   break;
	 				case 41:   type="techno";   break;
	 				case 42:   type="trance";   break;
	 				case 43:   type="tribal-house";   break;
	 				default:   break; 
	 				}

	types[one]=type;
 one++;
}



	/*CanvasJS.addColorSet("myColorsMusic",
                	[//colorSet Array
						"#0000FF",
                		"#FF0000",
                		"#00FFFF",
                		"#FF8000",
                		"#40FF00"	                
                	]);*/

	 
	 var chart = new CanvasJS.Chart("chartMusic",
		{
			//colorSet: "myColorsMusic",
			title:{
				text: "Top 5 Música",
				verticalAlign: 'top',
				horizontalAlign: 'left'
			},
			data: [
			{        
				type: "doughnut",
				startAngle:20,
				dataPoints: [
				{  y: music[43], label: types[0] },
				{  y: music[42], label: types[1] },
				{  y: music[41], label: types[2] },
				{  y: music[40],  label: types[3]},
				{  y: music[39],  label: types[4]}

				]
			}
			]
		});

		chart.render();
		

///////// TOP DRINK


	 var j = musicEnd;
	 var drinkEnd= j+25;
	 var toSort = new Array();
	
	 while(j<drinkEnd){
	 	toSort[toSort.length]=json[j];
	 	j++;
	 }
	 
	 
	 
	 var drink = toSort;
	 
	  for (var i = 0; i < toSort.length; i++) {
    	toSort[i] = [toSort[i], i];
  		}
  		toSort.sort(function(left, right) {
    					return left[0] < right[0] ? -1 : 1;
  					});
  		toSort.sortIndices = [];
  	for (var j = 0; j < toSort.length; j++) {
    	toSort.sortIndices.push(toSort[j][1]);
    	toSort[j] = toSort[j][0];
 		 }
	 
	 toSort=toSort.sortIndices;
	 //alert(toSort);
	 //alert(drink);

var one=0;
var types = new Array();

while (one<5){
	var num =24-one;
	var drinkType=toSort[num];
	var type="h";
	 switch (drinkType) { 
	 				case 0:   type="agua con gas";   break; 
	 				case 1:   type="agua sin gas";   break; 
	 				case 2:   type="anís";   break;
	 				case 3:   type="Bourbon";   break;
	 				case 4:   type="Brandy";   break;
	 				case 5:   type="calimocho";   break;
	 				case 6:   type="cava";   break;
	 				case 7:   type="Cerveza";   break;
	 				case 8:   type="Champagne";   break;
	 				case 9:   type="Coñac";   break;
	 				case 10:   type="Energética";   break;
	 				case 11:   type="Ginebra";   break;
	 				case 12:   type="Horchata";   break;
	 				case 13:   type="Licor con alcohol";   break;
	 				case 14:   type="Licor sin alcohol";   break;
	 				case 15:   type="Refresco con gas";   break;
	 				case 16:   type="Refresco sin gas";   break;
	 				case 17:   type="Ron añejo";   break;
	 				case 18:   type="Ron Blanco";   break;
	 				case 19:   type="Sidra";   break;
	 				case 20:   type="Tequila";   break;
	 				case 21:   type="Vermouth";   break;
	 				case 22:   type="vino";   break;
	 				case 23:   type="Vodka";   break;
	 				case 24:   type="Whisky";   break;
	 				case 25:   type="Zumo";   break;
	 				default:   break; 
	 				}

	types[one]=type;
 one++;
}


	/*CanvasJS.addColorSet("myColorsDrink",
                	[//colorSet Array
						"#FFFF00",
                		"#848484",
                		"#190707",
                		"#FF8000",
                		"#40FF00"	                
                	]);*/

	 
	 var chart = new CanvasJS.Chart("chartDrink",
		{
			//colorSet: "myColorsDrink",
			title:{
				text: "Top 5 Bebidas",
				verticalAlign: 'top',
				horizontalAlign: 'left'
			},
			data: [
			{        
				type: "doughnut",
				startAngle:20,
				dataPoints: [
				{  y: drink[24], label: types[0] },
				{  y: drink[23], label: types[1] },
				{  y: drink[22], label: types[2] },
				{  y: drink[21],  label: types[3]},
				{  y: drink[20],  label: types[4]}

				]
			}
			]
		});

		chart.render();
		
		
///////// Civil state

	 var j =drinkEnd;
	 var csEnd= j+7;
	 var toSort = new Array();
	 
	 while(j<csEnd){
	 	toSort[toSort.length]=json[j];
	 	j++;
	 }
	 	




	/*CanvasJS.addColorSet("myColorsCs",
                	[//colorSet Array
						"#FFFF00",
                		"#848484",
                		"#190707",
                		"#FF8000",
                		"#40FF00"	                
                	]);*/

	 
var chart = new CanvasJS.Chart("chartCS",
	{
	
	//colorSet: "myColorsCs",
	  title:{
        text: "modo estado civil"
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
       {  y: toSort[0], legendText:"soltero", indexLabel: "Sin compromiso"},
       {  y: toSort[1], legendText:"ennoviad@", indexLabel: "ennoviad@"},
       {  y: toSort[2], legendText:" novi@",exploded: true, indexLabel: " con novi@, pero no es problema"},
       {  y: toSort[3], legendText:"buscando rollete" , indexLabel: "buscando rollete"},
       {  y: toSort[4], legendText:"casad@" , indexLabel: "casad@"},
       {  y: toSort[5], legendText:"divorciad@" , indexLabel: "divorciad@"},
       {  y: toSort[6], legendText:"viud@" , indexLabel: "viud@"},
       ]
     }
     ]
   });



    chart.render();
    
    
    if(ide==ideEvent){

	 //COSTUMERS		
	
	 var k = json.numGo;
	 var toSort = new Array();
	 
	while(k<json.rows){
		toSort[toSort.length]=json[k].num;
		k++;
	}
	
	 var costumer = toSort;
	 
	  for (var i = 0; i < toSort.length; i++) {
    	toSort[i] = [toSort[i], i];
  		}
  		toSort.sort(function(left, right) {
    					return left[0] < right[0] ? -1 : 1;
  					});
  		toSort.sortIndices = [];
  	for (var j = 0; j < toSort.length; j++) {
    	toSort.sortIndices.push(toSort[j][1]);
    	toSort[j] = toSort[j][0];
 		 }
	 
	 toSort=toSort.sortIndices;
	

if(costumer.length>0){
	
	var t = costumer.length;
	var x=0;
	var names = new Array();
	var surnames = new Array();
	
	
	 while(x<t){
	 	names[names.length]=json[json.numGo+toSort[x]].name;
	 	surnames[surnames.length]=json[json.numGo+toSort[x]].surnames;
	 	x++;
	 }
	
	
	
	while(t<5){
		names[names.length]=" ";
	 	surnames[surnames.length]=" ";
		costumer[costumer.length]=0;
		t++;
		}
		

      /*CanvasJS.addColorSet("myColorsCostumer",
                	[//colorSet Array
						"#0000FF",
                		"#FF0000"	                
                	]);*/

 
	var chart = new CanvasJS.Chart("chartCostumer",
    {
	
	//colorSet: "myColorsCostumer",
       title:{
        text: "Clientes habituales"    
      },

	legend:{
        verticalAlign: "bottom",
        horizontalAlign: "center"       
      },
      theme: "theme2",
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
       {  y: costumer[costumer.length-1], legendText:names[4]+" "+surnames[4], indexlabel: surnames[4] },
       {  y: costumer[costumer.length-2], legendText:names[3]+" "+surnames[3], indexlabel: surnames[3] },
       {  y: costumer[costumer.length-3], legendText:names[2]+" "+surnames[2], indexlabel: surnames[2] },
       {  y: costumer[costumer.length-4], legendText:names[1]+" "+surnames[1] , indexlabel: surnames[1]},       
       {  y: costumer[costumer.length-5], legendText:names[0]+" "+surnames[0], indexlabel: surnames[0]}
       ]
     }
     ]
   });



    chart.render();

	}
	 
	 } else{
	 	
	 	var element=document.getElementById('chartCostumer');
		var parent = element.parentNode;
		parent.removeChild(element);
	 }
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
  										
  										<br />
  										
  										<div id="chartMusic" style="height: 300px; width: 100%;">
  										</div>
  										
  										
  					
  										<br />
  										
  										<div id="chartCS" style="height: 300px; width: 100%;">
  										</div>
  	
  										
  										<br />
  										
  										<div id="chartDrink" style="height: 300px; width: 100%;">
  										</div>
  										
  										
  										<br />
  										
  										<div id="chartCostumer" style="height: 300px; width: 100%;">
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
