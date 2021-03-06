<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Users Friends</title>
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
<script src="../js/user-list.js"></script>
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



  <script type="text/javascript">  
    $(document).ready(function(){ 
         
          //Get USER's info 
          
						var params = "/" ;
							params=params.concat(ide); 
							params=params.concat("/");
							params=params.concat(tok);
							params=params.concat("/");
							params=params.concat(ide);
	

	  					var url="../develop/read/myFriends.php";
							url=url.concat(params);
	
					var Array_friends = new Array();
					$.ajax({
								url: url,
								dataType: "json",
								type: "GET",
								async: false,
								complete: function(r){
			  							var json = JSON.parse(r.responseText);
													  							var count=json.numFriends;
	   									var i=0;
			 
			 							while (i<count){
			 							
			 							var id_user = json[i].idProfile;
										Array_friends[Array_friends.length]=id_user;
										var music = json[i].music;
												if (music == null || music.length == 0){
													music = "Estilo no definido";
												}
												else {
													if (music == 0){music="Acid-House";}	
													if (music == 1){music="Alternative Rock";}
													if (music == 2){music="Beatbox";}
													if (music == 3){music="Black Metal";}
													if (music == 4){music="Country";}
													if (music == 5){music="Death Metal";}
													if (music == 6){music="Deep House";}
													if (music == 7){music="Disco";}
													if (music == 8){music="Drum n Bass";}
													if (music == 9){music="Electro";}
													if (music == 10){music="Europop";}
													if (music == 11){music="Folk";}
													if (music == 12){music="Folk Rock";}
													if (music == 13){music="Funk";}
													if (music == 14){music="Hard Trance";}	
													if (music == 15){music="Hard-House";}
													if (music == 16){music="Hard-Rock";}
													if (music == 17){music="Hardcore";}
													if (music == 18){music="Hardstyle";}
													if (music == 19){music="Heavy Metal";}
													if (music == 20){music="Hip Hop";}
													if (music == 21){music="House";}
													if (music == 22){music="Indie Rock";}
													if (music == 23){music="Italo-Disco";}
													if (music == 24){music="Italo-Dance";}
													if (music == 25){music="Jungle";}
													if (music == 26){music="Latin";}
													if (music == 27){music="Makina";}	
													if (music == 28){music="Minimal";}
													if (music == 29){music="Pachanga";}
													if (music == 30){music="Pop-Rock";}
													if (music == 31){music="Progressive House";}
													if (music == 32){music="Progressive Trance";}
													if (music == 33){music="Punk";}
													if (music == 34){music="Reggae";}
													if (music == 35){music="Reggaeton";}
													if (music == 36){music="Rock & Roll";}
													if (music == 37){music="Ska";}
													if (music == 38){music="Soul";}
													if (music == 39){music="Soul-Jazz";}
													if (music == 40){music="Tech-House";}
													if (music == 41){music="Techno";}
													if (music == 42){music="Trance";}
													if (music == 43){music="Tribal-House";}
												}
										var picture = json[i].picture;
										if (picture == null || picture.length == 0){
										picture = "../images/reg1.jpg";
										}
										var link = "../user/profile.php?idv=" + id_user;
				
				    					var name = json[i].name;
										var surnames = json[i].surnames;
										var drink = json[i].drink;
										if (drink == null || drink.length == 0){
											drink= "Bebida no definida";
										}
										else {
											if (drink == 0){drink="Agua con gas";}	
											if (drink == 1){drink="Agua sin gas";}
											if (drink == 2){drink="Anís";}
											if (drink == 3){drink="Bourbon";}
											if (drink == 4){drink="Brandy";}
											if (drink == 5){drink="Calimocho";}
											if (drink == 6){drink="Cava";}
											if (drink == 7){drink="Cerveza";}
											if (drink == 8){drink="Champagne";}
											if (drink == 9){drink="Coñac";}
											if (drink == 10){drink="Energética";}
											if (drink == 11){drink="Ginebra";}
											if (drink == 12){drink="Horchata";}
											if (drink == 13){drink="Licor con alcohol";}
											if (drink == 14){drink="Licor sin alcohol";}
											if (drink == 15){drink="Refresco con gas";}
											if (drink == 16){drink="Refresco sin gas";}
											if (drink == 17){drink="Ron añejo";}
											if (drink == 18){drink="Ron Blanco";}
											if (drink == 19){drink="Sidra";}
											if (drink == 20){drink="Tequila";}
											if (drink == 21){drink="Vermouth";}
											if (drink == 22){drink="Vino";}
											if (drink == 23){drink="Vodka";}
											if (drink == 24){drink="Whisky";}
											if (drink == 25){drink="Zumo";}
										}
										var mode =  json[i].mode;
										var modeString;
						
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



			 							
			 							
			 								$('#user-friends tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+ name+' '+surnames +'</a><span class="user-subhead">Fiestero</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ modeString +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ drink+'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="2"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span id="b'+i+'" class="glyphicon glyphicon-user" style="color:#000000;font-size: 30px"></span></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="deleteFriend(this.id,'+id_user+');">Eliminar</span></a></td></tr>');
						
			 							     i=i+1;
			 								}
								},
								onerror: function(e,val){
									alert("No se pueden saber los seguidores");
									}
								});


                         		                     	
			                     	var url="../develop/actions/myPetFriendship.php";
										url=url.concat(params);

					
					var Array_request = new Array();
									$.ajax({
											url: url,
											dataType: "json",
											type: "GET",
											async: false,
											complete: function(r){
			  									var json = JSON.parse(r.responseText);
						 									var count=json.numPetitions;
	   											var i=0;
			 
			 									while (i<count){
			
												var id_user = json[i].idProfile;
												Array_request[Array_request.length]=id_user;
												var music = json[i].music;
												if (music == null || music.length == 0){
													music = "Estilo no definido";
												}
												else {
													if (music == 0){music="Acid-House";}	
													if (music == 1){music="Alternative Rock";}
													if (music == 2){music="Beatbox";}
													if (music == 3){music="Black Metal";}
													if (music == 4){music="Country";}
													if (music == 5){music="Death Metal";}
													if (music == 6){music="Deep House";}
													if (music == 7){music="Disco";}
													if (music == 8){music="Drum n Bass";}
													if (music == 9){music="Electro";}
													if (music == 10){music="Europop";}
													if (music == 11){music="Folk";}
													if (music == 12){music="Folk Rock";}
													if (music == 13){music="Funk";}
													if (music == 14){music="Hard Trance";}	
													if (music == 15){music="Hard-House";}
													if (music == 16){music="Hard-Rock";}
													if (music == 17){music="Hardcore";}
													if (music == 18){music="Hardstyle";}
													if (music == 19){music="Heavy Metal";}
													if (music == 20){music="Hip Hop";}
													if (music == 21){music="House";}
													if (music == 22){music="Indie Rock";}
													if (music == 23){music="Italo-Disco";}
													if (music == 24){music="Italo-Dance";}
													if (music == 25){music="Jungle";}
													if (music == 26){music="Latin";}
													if (music == 27){music="Makina";}	
													if (music == 28){music="Minimal";}
													if (music == 29){music="Pachanga";}
													if (music == 30){music="Pop-Rock";}
													if (music == 31){music="Progressive House";}
													if (music == 32){music="Progressive Trance";}
													if (music == 33){music="Punk";}
													if (music == 34){music="Reggae";}
													if (music == 35){music="Reggaeton";}
													if (music == 36){music="Rock & Roll";}
													if (music == 37){music="Ska";}
													if (music == 38){music="Soul";}
													if (music == 39){music="Soul-Jazz";}
													if (music == 40){music="Tech-House";}
													if (music == 41){music="Techno";}
													if (music == 42){music="Trance";}
													if (music == 43){music="Tribal-House";}
												}
												var picture = json[i].picture;
												if (picture == null || picture.length == 0){
													picture = "../images/reg1.jpg";
													}
												var link = "../user/profile.php?idv=" + id_user;
				
				    							var name = json[i].name;	
												var surnames = json[i].surnames;
												var city = json[i].city;
												var drink = json[i].drink;
										if (drink == null || drink.length == 0){
											drink= "Bebida no definida";
										}
										else {
											if (drink == 0){drink="Agua con gas";}	
											if (drink == 1){drink="Agua sin gas";}
											if (drink == 2){drink="Anís";}
											if (drink == 3){drink="Bourbon";}
											if (drink == 4){drink="Brandy";}
											if (drink == 5){drink="Calimocho";}
											if (drink == 6){drink="Cava";}
											if (drink == 7){drink="Cerveza";}
											if (drink == 8){drink="Champagne";}
											if (drink == 9){drink="Coñac";}
											if (drink == 10){drink="Energética";}
											if (drink == 11){drink="Ginebra";}
											if (drink == 12){drink="Horchata";}
											if (drink == 13){drink="Licor con alcohol";}
											if (drink == 14){drink="Licor sin alcohol";}
											if (drink == 15){drink="Refresco con gas";}
											if (drink == 16){drink="Refresco sin gas";}
											if (drink == 17){drink="Ron añejo";}
											if (drink == 18){drink="Ron Blanco";}
											if (drink == 19){drink="Sidra";}
											if (drink == 20){drink="Tequila";}
											if (drink == 21){drink="Vermouth";}
											if (drink == 22){drink="Vino";}
											if (drink == 23){drink="Vodka";}
											if (drink == 24){drink="Whisky";}
											if (drink == 25){drink="Zumo";}
										}
												var mode =  json[i].mode;
												var modeString;
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



			 										$('#user-pending tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+ name+' '+surnames +'</a><span class="user-subhead">Fiestero</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ modeString +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ drink+'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="2"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span class="glyphicon glyphicon-envelope" style="color:#000000;font-size: 30px"></span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="2">SOLICITUD PENDIENTE</td></tr>');
													i=i+1;		
			    								}
											},
												onerror: function(e,val){
													alert("No se pueden saber los seguidores");
														}
										});




		var params = "/" + ide + "/" + tok; 
        var url1 = "../develop/read/partiers.php" + params;
        
        
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			async: false,
			timeout: 5000,
			complete: function(r2){
				
				var json = JSON.parse(r2.responseText);
				
				for(var i=0; i<json.length; i++){
					
					
					var id_user = json[i].idProfile;
					if (id_user != ide){
						var music = json[i].music;
												if (music == null || music.length == 0){
													music = "Estilo no definido";
												}
												else {
													if (music == 0){music="Acid-House";}	
													if (music == 1){music="Alternative Rock";}
													if (music == 2){music="Beatbox";}
													if (music == 3){music="Black Metal";}
													if (music == 4){music="Country";}
													if (music == 5){music="Death Metal";}
													if (music == 6){music="Deep House";}
													if (music == 7){music="Disco";}
													if (music == 8){music="Drum n Bass";}
													if (music == 9){music="Electro";}
													if (music == 10){music="Europop";}
													if (music == 11){music="Folk";}
													if (music == 12){music="Folk Rock";}
													if (music == 13){music="Funk";}
													if (music == 14){music="Hard Trance";}	
													if (music == 15){music="Hard-House";}
													if (music == 16){music="Hard-Rock";}
													if (music == 17){music="Hardcore";}
													if (music == 18){music="Hardstyle";}
													if (music == 19){music="Heavy Metal";}
													if (music == 20){music="Hip Hop";}
													if (music == 21){music="House";}
													if (music == 22){music="Indie Rock";}
													if (music == 23){music="Italo-Disco";}
													if (music == 24){music="Italo-Dance";}
													if (music == 25){music="Jungle";}
													if (music == 26){music="Latin";}
													if (music == 27){music="Makina";}	
													if (music == 28){music="Minimal";}
													if (music == 29){music="Pachanga";}
													if (music == 30){music="Pop-Rock";}
													if (music == 31){music="Progressive House";}
													if (music == 32){music="Progressive Trance";}
													if (music == 33){music="Punk";}
													if (music == 34){music="Reggae";}
													if (music == 35){music="Reggaeton";}
													if (music == 36){music="Rock & Roll";}
													if (music == 37){music="Ska";}
													if (music == 38){music="Soul";}
													if (music == 39){music="Soul-Jazz";}
													if (music == 40){music="Tech-House";}
													if (music == 41){music="Techno";}
													if (music == 42){music="Trance";}
													if (music == 43){music="Tribal-House";}
												}
						var picture = json[i].picture;
						if (picture == null || picture.length == 0){
							picture = "../images/reg1.jpg";
						}
						var link = "../user/profile.php?idv=" + id_user;
					
					    var name = json[i].name;
						var surnames = json[i].surnames;
						var city = json[i].city;
						var drink = json[i].drink;
										if (drink == null || drink.length == 0){
											drink= "Bebida no definida";
										}
										else {
											if (drink == 0){drink="Agua con gas";}	
											if (drink == 1){drink="Agua sin gas";}
											if (drink == 2){drink="Anís";}
											if (drink == 3){drink="Bourbon";}
											if (drink == 4){drink="Brandy";}
											if (drink == 5){drink="Calimocho";}
											if (drink == 6){drink="Cava";}
											if (drink == 7){drink="Cerveza";}
											if (drink == 8){drink="Champagne";}
											if (drink == 9){drink="Coñac";}
											if (drink == 10){drink="Energética";}
											if (drink == 11){drink="Ginebra";}
											if (drink == 12){drink="Horchata";}
											if (drink == 13){drink="Licor con alcohol";}
											if (drink == 14){drink="Licor sin alcohol";}
											if (drink == 15){drink="Refresco con gas";}
											if (drink == 16){drink="Refresco sin gas";}
											if (drink == 17){drink="Ron añejo";}
											if (drink == 18){drink="Ron Blanco";}
											if (drink == 19){drink="Sidra";}
											if (drink == 20){drink="Tequila";}
											if (drink == 21){drink="Vermouth";}
											if (drink == 22){drink="Vino";}
											if (drink == 23){drink="Vodka";}
											if (drink == 24){drink="Whisky";}
											if (drink == 25){drink="Zumo";}
										}
						
						var mode =  json[i].mode;
						var modeString;
						
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

	    					
	    					var contains_friend=$.inArray(id_user, Array_friends);
	    					var contains_request=$.inArray(id_user, Array_request);
	    					
	    				if(contains_friend==-1 && contains_request==-1 )	
	    					$('#user-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+ name+' '+ surnames +'</a><span class="user-subhead">Fiestero</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ modeString +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ drink+'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="4"></td></tr>');
	    			}//end if (id_user != ide)
				}//end for
					
    		},
			onerror: function(e,val){
				alert("Contraseña y/o usuario incorrectos");
			}
		});

		$('#user-favourite').dataTable();
      	$('#user-list').dataTable();


    });//end $(document).ready(function()
    
  </script> 

</head>

<!--<body onload="JavaScript:timedRefresh(30000);"> -->
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
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Amigos Fiesteros</h1>
					</header>
					<div class="row" style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
							<div class="col-lg-12">
									<h1 style="color:#ff6b24;font-size:26px;">Amigos</h1>
									<div class="table-responsive">
										<table id="user-friends" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fiestero</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Modo</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Bebida favorita</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Música favorita</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
							<!--		<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul> -->
								</div>
								
								<div class="col-lg-12">
									<h1 style="color:#ff6b24;font-size:26px;">Todos</h1>
									<div class="table-responsive">
										<table id="user-list" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fiestero</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Modo</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Bebida favorita</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Música favorita</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
							<!--		<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul> -->
								</div>

								<div class="col-lg-12">
									<h1 style="color:#ff6b24;font-size:26px;">Pendientes de confirmación</h1>
									<div class="table-responsive">
										<table id="user-pending" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fiestero</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Modo</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Bebida favorita</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Música favorita</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
							<!--		<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul> -->
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
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
</body>
</html>
