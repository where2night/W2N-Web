<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile Club</title>
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
    <link href="../css/bootstrap-image-gallery.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/club-template.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link href="../css/TinySlideshow-master.css" rel="stylesheet" type="text/css">
	<!-- script -->
	
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="../js/keep-session.js"></script>
	<script src="../js/follow-test.js"></script>
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>
	<script src="../js/localFans.js"></script>	
	<script src="../js/autoRefresh.js"></script>
	<script src="../js/songs.js"></script>
	<script src="../js/fillDate.js"></script>
	<script src="../js/lists.js"></script>
	<script src="../js/canvasjs.min.js"></script>
	<script src="../js/bootstrap-image-gallery.min.js"></script>
	<script src="../js/fileupload/jquery.fileupload-process.js"></script>


<?php 
  /*NavbarHeader*/
  if($_SESSION['user_type'] == "club"){
  	include "templates/navbar-header.php"; 
  } else if($_SESSION['user_type'] == "user"){
  	include "../user/templates/navbar-header.php"; 
  }

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
var idlocal = '<?php echo $id_event; ?>' ;	

</script>

<script type="text/javascript"> 
	function getData(){
<?php 
	if(isset($_GET['idv'])){
?>
	
	var idProfile = <?php echo $_GET['idv'];?>;
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "local.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	async: false,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);

		var companyName = json.companyNameLocal;
		$('[name="companyName"]').text(companyName);
		var localName = json.localName;
		$('[name="localName"]').text(localName);
		var cif = json.cif;
		$('[name="localName"]').text(localName);
		var telephoneLocal = json.telephoneLocal;
		$('[name="telephoneLocal"]').text(telephoneLocal);

		var address = "";
		var street = json.street;
		switch(street){
		case 0:
		  address += "Calle ";
		  break;
		case 1:
		  address += "Avd. ";
		  break;
		case 2:
		  address += "Plaza ";
		  break;
		default:
		  address += "Calle ";
		}
		var streetName = json.streetNameLocal;
		address += streetName + " ";
		var streetNumber = json.streetNumberLocal;
		address += "Nº " + streetNumber + ", ";
		var cpLocal = json.cpLocal;
		address += "C.P. " + cpLocal + " ";
		var poblationLocal = json.poblationLocal;
		address += poblationLocal + " ";
		$('[name="address"]').text(address);

		
		var music = json.music;
					if (music == 0){$('[name="music"]').text("Acid-House");}	
					if (music == 1){$('[name="music"]').text("Alternative Rock");}
					if (music == 2){$('[name="music"]').text("Beatbox");}
					if (music == 3){$('[name="music"]').text("Black Metal");}
					if (music == 4){$('[name="music"]').text("Country");}
					if (music == 5){$('[name="music"]').text("Death Metal");}
					if (music == 6){$('[name="music"]').text("Deep House");}
					if (music == 7){$('[name="music"]').text("Disco");}
					if (music == 8){$('[name="music"]').text("Drum n Bass");}
					if (music == 9){$('[name="music"]').text("Electro");}
					if (music == 10){$('[name="music"]').text("Europop");}
					if (music == 11){$('[name="music"]').text("Folk");}
					if (music == 12){$('[name="music"]').text("Folk Rock");}
					if (music == 13){$('[name="music"]').text("Funk");}
					if (music == 14){$('[name="music"]').text("Hard Trance");}	
					if (music == 15){$('[name="music"]').text("Hard-House");}
					if (music == 16){$('[name="music"]').text("Hard-Rock");}
					if (music == 17){$('[name="music"]').text("Hardcore");}
					if (music == 18){$('[name="music"]').text("Hardstyle");}
					if (music == 19){$('[name="music"]').text("Heavy Metal");}
					if (music == 20){$('[name="music"]').text("Hip Hop");}
					if (music == 21){$('[name="music"]').text("House");}
					if (music == 22){$('[name="music"]').text("Indie Rock");}
					if (music == 23){$('[name="music"]').text("Italo-Disco");}
					if (music == 24){$('[name="music"]').text("Italo-Dance");}
					if (music == 25){$('[name="music"]').text("Jungle");}
					if (music == 26){$('[name="music"]').text("Latin");}
					if (music == 27){$('[name="music"]').text("Makina");}	
					if (music == 28){$('[name="music"]').text("Minimal");}
					if (music == 29){$('[name="music"]').text("Pachanga");}
					if (music == 30){$('[name="music"]').text("Pop-Rock");}
					if (music == 31){$('[name="music"]').text("Progressive House");}
					if (music == 32){$('[name="music"]').text("Progressive Trance");}
					if (music == 33){$('[name="music"]').text("Punk");}
					if (music == 34){$('[name="music"]').text("Reggae");}
					if (music == 35){$('[name="music"]').text("Reggaeton");}
					if (music == 36){$('[name="music"]').text("Rock & Roll");}
					if (music == 37){$('[name="music"]').text("Ska");}
					if (music == 38){$('[name="music"]').text("Soul");}
					if (music == 39){$('[name="music"]').text("Soul-Jazz");}
					if (music == 40){$('[name="music"]').text("Tech-House");}
					if (music == 41){$('[name="music"]').text("Techno");}
					if (music == 42){$('[name="music"]').text("Trance");}
					if (music == 43){$('[name="music"]').text("Tribal-House");}

		var entryPrice = json.entryPrice;
		if (entryPrice != '0'){
			$('[name="entryPrice"]').text(entryPrice + " €");
		}else{
			$('[name="entryPrice"]').text("Información no disponible");
		}

		var drinkPrice = json.drinkPrice;
		if (drinkPrice != '0'){
			$('[name="drinkPrice"]').text(drinkPrice + " €");
		}else{
			$('[name="drinkPrice"]').text("Información no disponible");
		}

		var openingHours = json.openingHours;
		var starH = openingHours.substring(0,5);
		$('[name="openingHours"]').html("<b style='color:#ff6b24;'>Apertura:</b> " + starH);
		var closeHours = json.closeHours;
		var closeH = closeHours.substring(0,5);
		$('[name="closeHours"]').html("<b style='margin-left:2.5%;color:#ff6b24;'>Cierre:</b> " + closeH);

		var picture = json.picture;
		if (picture != undefined && picture.length > 0){
			$('[name="club-image"]').attr("src", picture);			
		}else{
			$('[name="club-image"]').attr("src", "../images/profile-club.jpg");
		}
		
		var about = json.about;
		$('[name="about"]').text(about);
		var latitude = json.latitude;
		$('#latitude').val(latitude);
		var longitude = json.longitude;
		$('#longitude').val(longitude);
		var follow = json.follow;
		$('[name="follow"]').text(follow);
		var followers = json.followers;
		$('[name="followers"]').text(followers);
		var goto = json.goto;
		$('[name="goto"]').text(goto);
		

		var date = json.createdTime;

		/*Calculates uptime*/

		moment.lang('es', {
			relativeTime : {
			future : "en %s",
			past : "hace %s",
			s : "unos segundos",
			m : "un minuto",
			mm : "%d minutos",
			h : "una hora",
			hh : "%d horas",
			d : "un día",
			dd : "%d días",
			M : "un mes",
			MM : "%d meses",
			y : "un año",
			yy : "%d años"
			}
		});
		var dateActivity = moment(date);
		if (dateActivity.isValid()){
			var activityFromNow = dateActivity.fromNow();
			$("#member-since").append("Miembro desde: " + activityFromNow);
		}
		},
		onerror: function(e,val){
			//alert("Contraseña y/o usuario incorrectos");
		}
	});

	//View photos
	var params = "/" + id + "/" + token + "/" + idProfile;
	var url = "../develop/actions/photoLocal.php" + params;

<?php		
	}else{//(!isset($_GET['idv']))
?>

	var idProfile = <?php echo $_SESSION['id_user'];?>;
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "local.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	async: false,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);

		var companyName = json.companyNameLocal;
		$('[name="companyName"]').text(companyName);
		var localName = json.localName;
		$('[name="localName"]').text(localName);
		var cif = json.cif;
		$('[name="cif"]').text(cif);
		var telephoneLocal = json.telephoneLocal;
		$('[name="telephoneLocal"]').text(telephoneLocal);

		var address = "";
		var street = json.street;
		switch(street){
		case 0:
		  address += "Calle ";
		  break;
		case 1:
		  address += "Avd. ";
		  break;
		case 2:
		  address += "Plaza ";
		  break;
		default:
		  address += "Calle ";
		}
		var streetName = json.streetNameLocal;
		address += streetName + " ";
		var streetNumber = json.streetNumberLocal;
		address += "Nº " + streetNumber + ", ";
		var cpLocal = json.cpLocal;
		address += "C.P. " + cpLocal + " ";
		var poblationLocal = json.poblationLocal;
		address += poblationLocal + " ";
		$('[name="address"]').text(address);

		var music = json.music;
					if (music == 0){$('[name="music"]').text("Acid-House");}	
					if (music == 1){$('[name="music"]').text("Alternative Rock");}
					if (music == 2){$('[name="music"]').text("Beatbox");}
					if (music == 3){$('[name="music"]').text("Black Metal");}
					if (music == 4){$('[name="music"]').text("Country");}
					if (music == 5){$('[name="music"]').text("Death Metal");}
					if (music == 6){$('[name="music"]').text("Deep House");}
					if (music == 7){$('[name="music"]').text("Disco");}
					if (music == 8){$('[name="music"]').text("Drum n Bass");}
					if (music == 9){$('[name="music"]').text("Electro");}
					if (music == 10){$('[name="music"]').text("Europop");}
					if (music == 11){$('[name="music"]').text("Folk");}
					if (music == 12){$('[name="music"]').text("Folk Rock");}
					if (music == 13){$('[name="music"]').text("Funk");}
					if (music == 14){$('[name="music"]').text("Hard Trance");}	
					if (music == 15){$('[name="music"]').text("Hard-House");}
					if (music == 16){$('[name="music"]').text("Hard-Rock");}
					if (music == 17){$('[name="music"]').text("Hardcore");}
					if (music == 18){$('[name="music"]').text("Hardstyle");}
					if (music == 19){$('[name="music"]').text("Heavy Metal");}
					if (music == 20){$('[name="music"]').text("Hip Hop");}
					if (music == 21){$('[name="music"]').text("House");}
					if (music == 22){$('[name="music"]').text("Indie Rock");}
					if (music == 23){$('[name="music"]').text("Italo-Disco");}
					if (music == 24){$('[name="music"]').text("Italo-Dance");}
					if (music == 25){$('[name="music"]').text("Jungle");}
					if (music == 26){$('[name="music"]').text("Latin");}
					if (music == 27){$('[name="music"]').text("Makina");}	
					if (music == 28){$('[name="music"]').text("Minimal");}
					if (music == 29){$('[name="music"]').text("Pachanga");}
					if (music == 30){$('[name="music"]').text("Pop-Rock");}
					if (music == 31){$('[name="music"]').text("Progressive House");}
					if (music == 32){$('[name="music"]').text("Progressive Trance");}
					if (music == 33){$('[name="music"]').text("Punk");}
					if (music == 34){$('[name="music"]').text("Reggae");}
					if (music == 35){$('[name="music"]').text("Reggaeton");}
					if (music == 36){$('[name="music"]').text("Rock & Roll");}
					if (music == 37){$('[name="music"]').text("Ska");}
					if (music == 38){$('[name="music"]').text("Soul");}
					if (music == 39){$('[name="music"]').text("Soul-Jazz");}
					if (music == 40){$('[name="music"]').text("Tech-House");}
					if (music == 41){$('[name="music"]').text("Techno");}
					if (music == 42){$('[name="music"]').text("Trance");}
					if (music == 43){$('[name="music"]').text("Tribal-House");}

		var entryPrice = json.entryPrice;
		if (entryPrice != '0'){
			$('[name="entryPrice"]').text(entryPrice + " €");
		}else{
			$('[name="entryPrice"]').text("Información no disponible");
		}

		var drinkPrice = json.drinkPrice;
		if (drinkPrice != '0'){
			$('[name="drinkPrice"]').text(drinkPrice + " €");
		}else{
			$('[name="drinkPrice"]').text("Información no disponible");
		}

		var openingHours = json.openingHours;
		var starH = openingHours.substring(0,5);
		$('[name="openingHours"]').html("<b style='color:#ff6b24;'>Apertura:</b> " + starH);
		var closeHours = json.closeHours;
		var closeH = closeHours.substring(0,5);
		$('[name="closeHours"]').html("<b style='margin-left:2.5%;color:#ff6b24;'>Cierre:</b> " + closeH);

		var picture = json.picture;
		//alert(picture);
		if (picture != undefined && picture.length > 0){
			$('[name="club-image"]').attr("src", picture);			
		}else{
			$('[name="club-image"]').attr("src", "../images/profile-club.jpg");
		}

		var about = json.about;
		$('[name="about"]').text(about);
		var latitude = json.latitude;
		$('#latitude').val(latitude);
		var longitude = json.longitude;
		$('#longitude').val(longitude);
		var follow = json.follow;
		$('[name="follow"]').text(follow);
		var followers = json.followers;
		$('[name="followers"]').text(followers);
		var goto = json.goto;
		$('[name="goto"]').text(goto);

		var date = json.createdTime;

		/*Calculates uptime*/

		moment.lang('es', {
			relativeTime : {
			future : "en %s",
			past : "hace %s",
			s : "unos segundos",
			m : "un minuto",
			mm : "%d minutos",
			h : "una hora",
			hh : "%d horas",
			d : "un día",
			dd : "%d días",
			M : "un mes",
			MM : "%d meses",
			y : "un año",
			yy : "%d años"
			}
		});
		var dateActivity = moment(date);
		if (dateActivity.isValid()){
			var activityFromNow = dateActivity.fromNow();
			$("#member-since").append("Miembro desde: " + activityFromNow);
		}
	
		},
		onerror: function(e,val){
			//alert("Contraseña y/o usuario incorrectos");
		}

	});

	//View photos
	var params = "/" + idProfile + "/" + token + "/" + idProfile;
	var url = "../develop/actions/photoLocal.php" + params;


<?php		
	}//end else (!isset($_GET['idv']))
?>

	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
				var json = JSON.parse(r.responseText);	
			  	for (var i = 0; i < json.length; i++) { 
				    var url = json[i].url;
				    var stringPre = "club/" + idProfile + "/";
				    var stringPos = "club/" + idProfile + "/thumbnail/";
				    var urlThumb = url.replace(stringPre, stringPos);
				    var description = json[i].title;
				    var li = '<a href="' + url + '" data-gallery>';
				    li += '<img src="' + urlThumb + '"/> </a>';
				    
				    $("#links").append(li);
				}
			},
			onerror: function(e,val){
				alert("Error al ver fotos");
			}
	});

}//end getData()
    
    
    </script>


<script type="text/javascript">  
	$(document).ready(function(){ 

		getData();	

	});//end $(document).ready(function()
</script>

<script type="text/javascript">
function getVisitorEvents(){

	var params = "/" ;
	params = params.concat(ide); 
	params = params.concat("/");
	params = params.concat(tok);
	  
	var url = "../develop/actions/myEvents.php";
	url = url.concat(params);
	var array_ids = new Array(); 
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
				var json = JSON.parse(r.responseText);	
				
			  	for (var i = 0; i < json.rows; i++) {
			  		array_ids[i] = "" +json[i].idEvent;
		  		}
			},
			onerror: function(e,val){
				alert("Error al buscar eventos de usuario");
			}
	});
	return array_ids;
}


//Check if function is join or disjoin
function clickedJoinEvent(idRequest, idEvent){
	var partierEvents = new Array();
    if(ide != idRequest){
    	partierEvents = getVisitorEvents();
    } 
    if(partierEvents.indexOf(idEvent) > -1){//Event in array, display disjoin
		disjoinEvent (idRequest, idEvent)
	}else{//Event not in array, display join
		joinEvent (idRequest, idEvent)
	}
}

function joinEvent (idRequest, idEvent){

	var params = "/" ;
	params = params.concat(ide); 
	params = params.concat("/");
	params = params.concat(tok);
	params = params.concat("/");
	params = params.concat(idEvent);
	  
	var url = "../develop/actions/goToEvent.php";
	url = url.concat(params);
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);	 
          		var button = document.getElementById("join-event-" + idEvent);
		  		button.innerHTML ='Me Desapunto';
			  
			},
			onerror: function(e,val){
				alert("No se puedo añadir al evento");
			}
	});
}


function disjoinEvent (idRequest, idEvent){

	var params = "/" ;
	params = params.concat(ide); 
	params = params.concat("/");
	params = params.concat(tok);
	params = params.concat("/");
	params = params.concat(idEvent);
	  
	var url = "../develop/actions/goToEvent.php";
	url = url.concat(params);
	$.ajax({
			url:url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);
          		var button = document.getElementById("join-event-" + idEvent);
		  		button.innerHTML ='Me Apunto';
			  
			},
			onerror: function(e,val){
				alert("No se puedo eliminar del evento");
			}
	});
}

</script>
<script type="text/javascript">
function eventProfileTest(idRequest) {
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idRequest);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
            var partierEvents;
            if(ide != idRequest){
            	partierEvents = getVisitorEvents();
            } 
			  
			var key, count = 0;
			for(key in json) {
	  			if(json.hasOwnProperty(key)) {
		    		count++;
		  		}
			}
	   		count=count-3;		  
			
			var i=0;
		
			while (i<count)
			  	{
					var events=document.getElementById('ul').innerHTML;
					
					var dateEvent = json[i].date; 
					var year = dateEvent.substring(0,4);
					var month = dateEvent.substring(5,7);
					var day = dateEvent.substring(8,11);
					var eventDate = day+'-'+month+'-'+year;
					var date = json[i].createdTime;
					var startHour = json[i].startHour;
					var starH = startHour.substring(0,5);
					var closeHour = json[i].closeHour;
					var closeH = closeHour.substring(0,5);
					
					moment.lang('es', {
						 relativeTime : {
										future : "en %s",
										past : "hace %s",
										s : "unos segundos",
										m : "un minuto",
										mm : "%d minutos",
										h : "una hora",
										hh : "%d horas",
										d : "un día",
										dd : "%d días",
										M : "un mes",
										MM : "%d meses",
										y : "un año",
										yy : "%d años"
									}
					});
					var dateActivity = moment(date);
					if (dateActivity.isValid()){
						var activityFromNow = dateActivity.fromNow();
					}
	
					events = events.concat("<li><div class='workflow-item hover' style='background-image:url(../images/reg2.jpg);background-size:100% 100%'></div>");
					events = events.concat("<span class='label label-dark-blue' style='font-size:12px'>Evento Local</span> <?php echo get_local_name_club(); ?>");
					events = events.concat("<span style='font-size:12px;color:orange'>  publicado <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
					events = events.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'>Título Evento <b style='color:orange'>'");
					events = events.concat(json[i].title);
					events = events.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
					events = events.concat(json[i].text);
					events = events.concat("</P>");
					events = events.concat("<p style='color:#ff6b24'>Fecha : <b style='color:#34d1be'> ");
					events = events.concat(eventDate);
					events = events.concat("</b>, a partir de  <b style='color:#34d1be'>");
					events = events.concat(starH);
					events = events.concat("</b> hasta  <b style='color:#34d1be'>");
					events = events.concat(closeH);
					events = events.concat("</b> hrs.</p>");
					if(ide != idRequest){
						if(partierEvents.indexOf(json[i].idEvent) > -1){//Event in array, display disjoin
							events=events.concat('<button type="button" id="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button>');
						}else{//Event not in array, display join
							events=events.concat('<button type="button" id="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button>');
						}
					}
					events = events.concat("</td></tr></tbody></table>");
					
					document.getElementById('ul').innerHTML=events;		
				
				i=i+1;	
				}
				document.getElementById('local_followers').innerHTML=i;	
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

}
</script>
</head>

<body> <!--onload="JavaScript:timedRefresh(30000);">-->
<style>  
 body{background-color:#000;}
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



<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;margin-left:1%;margin-right:-20%">
					<h1 style="color:#ff6b24;font-size:30px;margin-left:4%;">Perfil Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							<div class="col-lg-11 col-md-8 col-sm-8" >
								<div class="main-box clearfix"style="margin-left:4%;width:100%;background-color:#1B1E24;border-color:#ff6b24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<h2 name="localName" style="color:#ff6b24;text-transform: uppercase; text-align:center;"></h2>
									
									<img name="club-image" alt="" class="profile-img img-responsive center-block banner1" style="border-color:#ff6b24;"/>
									<div class="profile-since"style="color:#707070;margin-top:1%;margin-bottom:-2%">
										<div id="member-since"></div>	
										<ul class="fa-ul" >
											<li  style="color:transparent;"><span style="color:#ff6b24">Seguidores: </span><span name="followers" style="color:#34d1be"> </span></li>
											<li  style="color:transparent;"><span style="color:#ff6b24">Publicaciones: </span>
											<span style="color:#34d1be" id="local_followers">  </span></li>
											
											<script>
												if (ide!=ideEvent)
													document.write("<li  style='color:transparent;'><a href='../club/statistics.php?idv="+ideEvent+"'>Ver estadisticas</a></li>");
											</script>
											
										</ul>
<?php 
	if (isset($_GET['idv']) && $_SESSION['user_type'] == "user"){
?>
										<div id="dialog-goToPub-1" title="Asistir a local" style="display:none" align="center"> 
											<p>¿Qué día piensas asistir?</p>
											<input id="date-goToPub" class="datepicker" type="text" size="5" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"/>
											<input id="button-goToPub-2"  class="myClickedButton" type="button"value="Voy a ir" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
										</div> 
										
										<input id="button-goToPub-1"  class="myClickedButton" type="button"value="Voy a ir" style="margin-top:-5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">
										<script>
											paintButton();
										</script>
<?php 
	}
?>
					                     </div>			
								</div>
							</div>
						</div>
						
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-11 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="margin-left:9%;background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									
									
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-activity" data-toggle="tab">Actividad</a></li>
											<li><a href="#tab-friends" data-toggle="tab">Seguidores</a></li>
											<li><a href="#tab-songs" data-toggle="tab">Canciones</a></li>
											<li><a href="#tab-lists" data-toggle="tab">Listas</a></li>
											<li><a href="#tab-photos" data-toggle="tab">Fotos</a></li>
											<li><a href="#tab-contact" data-toggle="tab">Contacto</a></li>
										</ul>
										<!-- Begin Activity -->
										<div class="tab-content" style="overflow:visible;">
											<div class="tab-pane fade in active" id="tab-activity">
												
															
																<div class="the-timeline">
																	<ul id="ul">
																		<script>
																			eventProfileTest("<?php echo $id_event;?>");
																		</script>
																		
																	</ul>
																</div>	
											</div>
										<!-- End Activity -->	
										<!-- Begin Friends -->
											<div class="tab-pane fade " id="tab-friends">
												<ul class="widget-users row" id="friends">
														<script>
															
															showFans();
														</script>
														
												</ul>
												
											</div>
										<!-- End Friends -->	
										
										<!-- Begin Songs -->
											<div class="tab-pane fade " id="tab-songs">
												<div class="container" >
		
													<div class="row">
														<table id="local_songs" class="table user-list">
															<thead>
																<tr>
																	<th><span style="color:#FF6B24;border-color:#ff6b24">Canción</span></th>									
																	<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Nombre artista</span></th>
																	<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Votos</span></th>
																	
																</tr>
																<script>
																	show_songs_list_profile();
																 </script>
															</thead>
															<tbody>
															</tbody>
														</table>
													</div>	
				
												</div>
											</div>
										<!-- End Songs -->
										
										<!-- Begin Lists -->
										<div class="tab-pane fade " id="tab-lists">
											<div class="the-timeline">
												<ul id="myLists">
														<script>
															myListsProfile();
														</script>
												</ul>
											</div>

										</div>
										<!-- End lists -->
										
											<!-- Begin Photos -->
											<div class="tab-pane fade" id="tab-photos">	
												<div class="container" style="background-color:#000;box-shadow: 1px 1px 2px 0 #ff6b24;">
													<form class="form-inline">
													<div class="form-group">
														<a href="#"id="image-gallery-button" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Ver todas</a>
													</div>
													</form>
													<br>
												<!-- The container for the list of example images -->
												 	<div id="links"></div>
													<br>
												</div>
											<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
												<div id="blueimp-gallery" class="blueimp-gallery" >
												<!-- The container for the modal slides -->
												 	<div class="slides"></div>
													<!-- Controls for the borderless lightbox -->
													<h3 class="title"></h3>
													<a class="prev">‹</a>
													<a class="next">›</a>
													<a class="close">×</a>
													<a class="play-pause"></a>
													<ol class="indicator"></ol>
													<!-- The modal dialog, which will be used to wrap the lightbox content -->
												 	<div class="modal fade" style="background-color:transparent; width:100%;height:100%;margin-top:20%;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" aria-hidden="true">&times;</button>
																	<h4 class="modal-title"></h4>
																</div>
																<div class="modal-body next"></div>
																<div class="modal-footer">
																	<a href="#" class="btn btn-success pull-left prev" style="background-color:#000;border-color:#ff6b24;color:#34d1be;"><i class="glyphicon glyphicon-chevron-left"></i> Anterior </a>
																	<a href="#" class="btn btn-success pull-right next" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></a>
												
																</div>
															</div>
														</div>
													</div>
												</div>

										<!--			<ul id="slideshow">
		<li>
			<h3>TinySlideshow v1</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="photos/orange-fish.jpg" alt="Orange Fish"/></a>
			<img src="thumbnails/orange-fish-thumb.jpg" class="thumbnail"/>
		</li>
		
	</ul>
	<div id="wrapper">
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>
			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<div id="information">
				<h3></h3>
				<p></p>
			</div>
		</div>
		<div id="thumbnails">
			<div id="slideleft" title="Slide Left"></div>
			<div id="slidearea">
				<div id="slider"></div>
			</div>
			<div id="slideright" title="Slide Right"></div>
		</div>
	</div>
	<script src="../js/TinySlideshow-master.js"></script>
<script type="text/javascript">
	$T('slideshow').style.display='none';
	$T('wrapper').style.display='block';
	var slideshow=new TINY.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=5;
		slideshow.link="linkhover";
		slideshow.info="information";
		slideshow.thumbs="slider";
		slideshow.left="slideleft";
		slideshow.right="slideright";
		slideshow.scrollSpeed=4;
		slideshow.spacing=0;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink","slidearea");
	}
</script>-->
	
											</div>	<!-- End Photos -->
											
											<div class="tab-pane fade " id="tab-contact">
												<div class="col-lg-4 " >
													<h3 style="border-color:#ff6b24;text-align:center"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
													<p name="about" style="color:#707070;margin-left:3%;margin-right:3%;font-size:14px">
													</p>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Estilo de música <span name="music" style="margin-left:2%;color:#707070; font-size:14px"></span>
														</div>	
													</div>
													<br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Precio de Entrada <span name="entryPrice" style="margin-left:2%;color:#707070; font-size:14px"> </span>
														</div>	
													</div>
													<br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Precio de Bebida <span  name="drinkPrice" style="margin-left:3%;color:#707070; font-size:14px"> </span>
														</div>	
													</div>
												</div>
												<div class="col-lg-8">
													<h3 style="border-color:#ff6b24;text-align:center"><span style="color:#ff6b24;border-color:#ff6b24">Localización</span></h3>	
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Dirección <span name="address" style="margin-left:2%;color:#707070; font-size:14px"></span>
														</div>	
													</div><br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Teléfono <span name="telephoneLocal" style="margin-left:2%;color:#707070; font-size:14px"> </span>
														</div>	
													</div><br>
													<div class="profile-user-details clearfix">
														<div class="profile-user-details-label"style="color:#34d1be;margin-left:3%;font-size:14px">
															Horario <span name="openingHours" style="margin-left:2%;color:#707070; font-size:14px"></span>
															<br><span name="closeHours" style="margin-left:12%;color:#707070; font-size:14px"></span>
														</div>	
													</div>
												</div>
												<div class="row">
												<div class="col-lg-8" style="margin-left:10%;margin-top:2%">
												<!-- Hidden values for map -->
													<input type="hidden" id="latitude" name="latitude"/>
													<input type="hidden" id="longitude" name="longitude"/>
												<?php include "map.php";?>
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
	</div>
	<!-- /MiPerfil --> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 

	<!--<script src="../js/profile-test1.js"></script>-->
	<script src="../js/profile-test2.js"></script>	
	<script src="../js/jquery-ui.min.js"></script>
	<link href="../css/jquery-ui.custom1.css" rel="stylesheet" media="screen">

<?php 
if (isset($_GET['idv']) && $_SESSION['user_type'] == "user"){
?>	
	<script type="text/javascript">  

	$(document).ready(function(){ 

		/****************** Go to club with date ****************/

		function goToPub(){
			var idProfile = <?php echo $_SESSION['id_user']; ?>	;
			var token =  "<?php echo $_SESSION['token']; ?>";
			var idClub = "<?php echo $_GET['idv']; ?>";
			var params = "/" + idProfile + "/" + token + "/" + idClub;

			var date = $("#date-goToPub").val();

			if (date.length > 0){
				  
				var url = "../develop/actions/goToPub.php" + params;

				$.ajax({
						url:url,
						dataType: "json",
						type: "POST",
						async: false,
						data: {
							date:date,
						},
						complete: function(r){
							var json = JSON.parse(r.responseText);	
							
						  	$("#dialog-goToPub-1").html("<b>Asistirás al local el " + date + "</b>");
						},
						onerror: function(e,val){
							alert("Error al buscar eventos de usuario");
						}
				});
			}else{//No date selected
				$("#dialog-goToPub-1").append("</br>Debes seleccionar una fecha");
			}
		
		}

		$(".datepicker").datepicker({
		    dateFormat: 'dd/mm/yy',
	    });

		$("#dialog-goToPub-1").dialog({ autoOpen: false });

	    $("#button-goToPub-1").on( "click", function() {
		 	$("#dialog-goToPub-1").dialog('open');
                return false;
		});

		$("#button-goToPub-2").on( "click", function() {
			goToPub();
		 	
		});


		/****************** Go to club with date ****************/


	});//end $(document).ready(function()
</script>

<?php 
}
?>
</body>
</html>
