<?php
include_once "../framework/sessions.php";

w2n_session_check();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>W2N-Home User</title>
		<meta name="description" content="Where2Night"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no" />

		<!-- Icon W2N -->
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

		<!-- Bootstrap Styles -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/home.css" rel="stylesheet" type="text/css">
		<link href="../css/bootstrap-combined.min.css" rel="stylesheet">
		<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
		<link href="../css/custom.css" rel="stylesheet" media="screen">
		<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
		<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" />
		<!-- Responsive -->
		<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" />
		<!-- Responsive -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

		<!-- script -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/keep-session.js"></script>
		<script src="../js/moment-with-langs.js"></script>
		<script src="../js/moment.min.js"></script>
		<script src="../js/state-mode-user.js"></script>
		<script src="../js/lists.js"></script>
<script src="../js/autoRefresh.js"></script>
		<!-- /script -->
		<script type="text/javascript">
			var actual_page = 0;
function btnApuntar(theApuntarBtn)
{
	myButtonID = theApuntarBtn.id;
	if(document.getElementById(myButtonID).className=='myClickedApuntar'){
		document.getElementById(myButtonID).className='myDefaultApuntar';
		document.getElementById(myButtonID).value='Me Apunto';
	}
	else{
		document.getElementById(myButtonID).className='myClickedApuntar';
		document.getElementById(myButtonID).value='Apuntado';
	}
}

/**
* At the time of paging, when given to show more in the "home" that invokes this function makes a request for more data to the server.
*/
function showMore(){
	/*Increases the page where I go*/
	actual_page = actual_page +1;

	/*prepares attributes for the server*/
	var idProfile = <?php echo $_SESSION['id_user']; ?>;
	var token =  "<?php echo $_SESSION['token']; ?>	";
	var params = "/" + idProfile + "/" + token;
	var page = 0;
	var url1 = "../develop/read/news.php" + params+"/"+actual_page;
	/*Sent by the server url page we now load, besides the token and identifier*/
	/*the query is made ​​to the server, via GET*/
	$.ajax({

		url: url1,
		dataType: "json",
		type: "GET",
		timeout: 5000,
		
		complete: function(r2){
			/*In response the server a list of 10 activities is received*/
			var json = JSON.parse(r2.responseText);
			var num_elements = json.numElems;
			var num_page = Math.floor(num_elements/10);
			
			/*Calculates if you follow the link to appear "show more"*/
			if (num_page == actual_page){
				var s = document.getElementById('show_more');
				var div = document.getElementById('show_more');

				div.innerHTML = '';
			}
			
			/*Calculate the maximum number of items you can go to the list*/
			var len = num_elements - actual_page*10;
			var max_elemts;
			
			if (len > 10){
				max_elemts = 10;
			}else if (len < 10){
				max_elemts = len;
			}
			
			/*Browse the list received*/
			for(var i=0; i<max_elemts; i++){
				/*The list that is returned is the activity that can be 5 types:
					1.- Created by local events that follow
					2.- Friends we follow, change status
					3.- Friends we follow, change their mode(De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)
					4.- Friend add to favorites a local
					5.- 5.- Events friends attending */
				var type = json[i].TYPE;
				var goes = json[i].GOES;
				var date = json[i].createdTime;
				var picture = json[i].picture;
				
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
				}

				/*must distinguish what type of activity relates (mentioned above), to paint in the html in the right way*/
				if (type == 1|| type == 11){
					/*1.- Created by local events that follow*/
					var localName = json[i].localName;
					var title = json[i].title;
					var startHour = json[i].startHour;
					var closeHour = json[i].closeHour;

					var idEvent =  json[i].idEvent;
					var goes =  (json[i].GOES != null);

					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					var streetNameLocal = json[i].streetNameLocal;
					var streetNumberLocal = json[i].streetNumberLocal;
					var text = json[i].text;
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					
					if(goes){//User goes to this event, display disjoin
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

					}else{//User doesn't go to this event, display join
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');

					}
					
				}else if (type == 2|| type == 12){
					/*2.- Friends we follow, change status*/
					var name =  json[i].name;
					var surnames =  json[i].surnames;
					var status =  json[i].status;
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					
					var id_user = json[i].idPartierFriend;		
					var link_user = "../user/profile.php?idv=" + id_user;
					
					$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero </span> <a href="'+link_user+'">'+name+' '+surnames+'</a> <span style="font-size:12px;color:orange;" > Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' cambió su estado a : '+status+'</p></td></tr></tbody></table>');

				}else if (type == 3|| type == 13){
					/*3.- Friends we follow, change mode*/
					var name =  json[i].name;
					var surnames =  json[i].surnames;
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

					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";

					var id_user = json[i].idPartierFriend;		
					var link_user = "../user/profile.php?idv=" + id_user;
					
					$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span><a href="'+link_user+'">'+name+' '+surnames+'</a> <span style="font-size:12px;color:orange;"> Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' cambió su modo a : <span class="label label">'+modeString+'</span>	</p></td></tr></tbody></table>');
					
				}else if (type == 4|| type == 14){
					/*4.-friend add to favorites a local*/
					var name =  json[i].name;
					var surnames =  json[i].surnames;
					var localName =  json[i].localName;
					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";

					var id_user = json[i].idPartierFriend;		
					var link_user = "../user/profile.php?idv=" + id_user;

					$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local favorito</span><a href="'+link_user+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange;"> Agregó un local favorito <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' agregó a <a href="'+link+'">'+localName+' '+'</a>como local favorito</p></td></tr></tbody></table>');

				}else if (type == 5|| type == 15){
					/*5.- Events friends attending*/
					var name =  json[i].name;
					var surnames =  json[i].surnames;
					var title = json[i].title;
					var text = json[i].text;

					var id_user = json[i].idPartierFriend;
						
					var link = "../user/profile.php?idv=" + id_user;

					var idEvent =  json[i].idEvent;
					var goes =  (json[i].GOES != null);

					if (goes){//User goes to this event, display disjoin
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

					}else{//User doesn't go to this event, display join
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');
					}
				}else  if (type == 6|| type == 16){
							
						// friend go to pub
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
					

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";
							
						var goes =  (json[i].GOES != null);


						var actualdate=json[i].assistdate;
						var year = actualdate.substring(0,4);
						var month = actualdate.substring(5,7);
						var day = actualdate.substring(8,10);
						actualdate = day+'/'+month+'/'+year;

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local al que asistirá </span><a href="'+link_user+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"><a href="'+link_user+'">'+name+' '+surnames+'</a></h5><p style="color:#E5E4E2;font-size:14px;">irá a <a href="'+link_local+'">'+localName+'</a> el '+actualdate+' </p><p style="color:#707070;font-size:14px;"></p></td></tr></tbody></table>');


	
						} else  if (type == 7|| type == 17){
							
												var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
                        var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Check-In</span><a href="'+link_user+'"> '+name+' '+surnames+' </a><span style="font-size:12px;color:orange;"> entró  <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;"><a href="'+link_user+'">'+name+' '+surnames+'</a> ya está en <a href="'+link_local+'">'+localName+'</a> </p></td></tr></tbody></table>');
					
					
											
							
							
						
						}else  if (type == 8|| type == 18){
							
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var title = json[i].title;
						var text = json[i].text;
						var startHour = json[i].startHour;
						var startH = startHour.substring(0,5);
						var date = json[i].date;
						var year = date.substring(0,4);
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						date = day+'/'+month+'/'+year;

						var localName = json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;

						var listDateClose= json[i].dateClose;
					
						var year = listDateClose.substring(0,4);
						var month = listDateClose.substring(5,7);
						var day = listDateClose.substring(8,11);
						listDateClose = day+'/'+month+'/'+year;

						var max=json[i].maxGuest;
					
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			
					
						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						var idList =  json[i].idEvent;
						var goes =  (json[i].GOES != null);
	
						var lists=document.getElementById('test').innerHTML;	
						lists = lists.concat("<li><div class='workflow-item hover' style='background-image:url(");
						lists=lists.concat(picture);
						lists=lists.concat(");background-size:100% 100%'></div>");
						lists = lists.concat("<span class='label label-dark-blue' style='font-size:12px'>Lista Local</span> <a href='"+ link +"'>"+ localName +"</a>");
						lists = lists.concat("<span style='font-size:12px;color:orange'> ");
						lists = lists.concat(" <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
						lists = lists.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'><b style='color:#34d1be'><a href='"+link_user+"'>");
						lists = lists.concat(name +" "+surnames+ " ");
						lists = lists.concat("</a> </b> se apuntó a la lista <b style='color:orange'>'");
						lists = lists.concat(title);
						lists = lists.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
						lists = lists.concat(text);
						lists = lists.concat("</P>");
						lists = lists.concat("<p style='color:#ff6b24'>El<b style='color:#34d1be'> ");
						lists = lists.concat(date);
						lists = lists.concat("</b> a partir de las <b style='color:#34d1be'> "); 
						lists = lists.concat(startH);
						lists = lists.concat("</b> hrs. Cierre de listas el  <b style='color:#34d1be'>");
						lists = lists.concat(listDateClose);
						lists = lists.concat("</b>");
						lists = lists.concat("</br></p> <span class='glyphicon glyphicon-plus' style='color:#34d1be'> </span> <select id='guests");
						lists = lists.concat(idList); 
						lists = lists.concat("'style='width:8.5%;border-radius:0px'>  <option value='0' selected='1'></option>");
			
				    
				    for(var j = 0; j<max; j++ ) {
    					lists=lists.concat("<option value="+ j +">"+j+"</option>");
 						}

						lists = lists.concat("</select> <span style='color:#ff6b24'> Invitados </span>");
				
				if(!goes)
					lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='joinList(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Entrar en listas</span></a>");
				else
				    lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='disjoinList(this.id);' style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Me Desapunto</span></a>");
					
					lists = lists.concat("</td></tr></tbody></table>");
				
							document.getElementById('test').innerHTML=lists;
							
							
					
												
							
						
					
							
							
							
							
						}else if(type == 9|| type == 19){

					var localName = json[i].localName;
					var title = json[i].title;


					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					var text = json[i].text;

					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";


						var startHour = json[i].startHour;

						var date = json[i].date;
						var year = date.substring(0,4);
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						date = day+'/'+month+'/'+year;

						var listDateClose= json[i].dateClose;
						var year = listDateClose.substring(0,4);
						var month = listDateClose.substring(5,7);
						var day = listDateClose.substring(8,11);
						listDateClose = day+'/'+month+'/'+year;


				
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Lista Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicada <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</br>el <span style="color:#34d1be">'+ date +'<span><span style="color:#ff6b24"> a las </span> <span style="color:#34d1be">'+startHour+'<span> </h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+' </br> <span style="color:#34d1be">cierre de listas el </span>'+listDateClose+'</p></td></tr></tbody></table>');

							
							
						}

			}

		},
	
		onerror: function(e,val){
		alert("Contraseña y/o usuario incorrectos");
		}
	});

}

/********************** Join Events ******************/

function getVisitorEvents(){

	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;
	  
	var url = "../develop/actions/myEvents.php" + params;

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
function clickedJoinEvent(idEvent){
	var partierEvents = new Array();
	partierEvents = getVisitorEvents();

    if(partierEvents.indexOf(idEvent) > -1){//Event in array, display disjoin
		disjoinEvent (idEvent)
	}else{//Event not in array, display join
		joinEvent (idEvent)
	}
}

function joinEvent (idEvent){

	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token + "/" + idEvent;
	  
	var url = "../develop/actions/goToEvent.php" + params;
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);	

			  	$( "button[name='join-event-" + idEvent + "']" ).html('Me Desapunto')
			  	
			},
			onerror: function(e,val){
				alert("No se puedo añadir al evento");
			}
	});
}


function disjoinEvent (idEvent){
	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token + "/" + idEvent;
	  
	var url = "../develop/actions/goToEvent.php" + params;
	$.ajax({
			url:url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);

			  	$( "button[name='join-event-" + idEvent + "']" ).html('Me Apunto')
			  
			},
			onerror: function(e,val){
				alert("No se puedo eliminar del evento");
			}
	});
}

/********************** Join Events ******************/


$(document).ready(function(){

	/*prepares attributes for the server*/
	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;
	var page = 0;
	var url1 = "../develop/read/news.php" + params + "/" + page;

	/*Sent by the server url page we now load, besides the token and identifier*/
	/*the query is made ​​to the server, via GET*/
	$.ajax({

		url: url1,
		dataType: "json",
		type: "GET",
		timeout: 5000,
		complete: function(r2){
			/*In response the server a list of 10 activities is received*/
			var json = JSON.parse(r2.responseText);
			var num_elements = json.numElems;
			
			/*Browse the list received*/
			for(var i=0; i<10; i++){
				/*The list that is returned is the activity that can be 5 types:
					1.- Created by local events that follow
					2.- Friends we follow, change status
					3.- Friends we follow, change their mode(De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)
					4.- Friend add to favorites a local
					5.- Events friends attending */
					
				var type = json[i].TYPE;
				var goes = json[i].GOES;
				var date = json[i].createdTime;
				var picture = json[i].picture;
				
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
				}

				/*must distinguish what type of activity relates (mentioned above), to paint in the html in the right way*/
				if (type == 1 || type == 11){
					/*1.- Created by local events that follow*/
					var localName = json[i].localName;
					var title = json[i].title;
					var startHour = json[i].startHour;
					var closeHour = json[i].closeHour;

					var idEvent =  json[i].idEvent;
					var goes =  (json[i].GOES != null);

					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					var streetNameLocal = json[i].streetNameLocal;
					var streetNumberLocal = json[i].streetNumberLocal;
					var text = json[i].text;

					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";

					if(goes){//User goes to this event, display disjoin
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

					}else{//User doesn't go to this event, display join
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');
					}
					

				}else if (type == 2|| type == 12){
					/*2.- Friends we follow, change status*/
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";

					var name =  json[i].name;
					var surnames =  json[i].surnames;
					var status =  json[i].status;
					
					var id_user = json[i].idPartierFriend;		
					var link_user = "../user/profile.php?idv=" + id_user;
					
					$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero </span> <a href="'+link_user+'">'+name+' '+surnames+'</a> <span style="font-size:12px;color:orange;" > Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' cambió su estado a : '+status+'</p></td></tr></tbody></table>');

				}else if (type == 3|| type == 13){
					/*3.- Friends we follow, change their mode(De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)*/
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					
					var name =  json[i].name;
					var surnames =  json[i].surnames;
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

					var id_user = json[i].idPartierFriend;		
					var link_user = "../user/profile.php?idv=" + id_user;
					
					$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span><a href="'+link_user+'">'+name+' '+surnames+'</a> <span style="font-size:12px;color:orange;"> Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' cambió su modo a : <span class="label label">'+modeString+'</span>	</p></td></tr></tbody></table>');
				}else if (type == 4|| type == 14){
					/*4.- Friend add to favorites a local*/
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";

					var name =  json[i].name;
					var surnames =  json[i].surnames;
					var localName =  json[i].localName;
					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					
					var id_user = json[i].idPartierFriend;		
					var link_user = "../user/profile.php?idv=" + id_user;

					$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local favorito</span><a href="'+link_user+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange;"> Agregó un local favorito <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' agregó a <a href="'+link+'">'+localName+' '+'</a>como local favorito</p></td></tr></tbody></table>');

				}else if (type == 5|| type == 15){
					/*5.- Events friends attending */
					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";
					
					var name =  json[i].name;
					var surnames =  json[i].surnames;
					var title = json[i].title;
					var text = json[i].text;
					
					var id_user = json[i].idPartierFriend;
						
					var link = "../user/profile.php?idv=" + id_user;

					var idEvent =  json[i].idEvent;
					var goes =  (json[i].GOES != null);

					if (goes){//User goes to this event, display disjoin
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

					}else{//User doesn't go to this event, display join
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');
					}
					
				}else  if (type == 6|| type == 16){
							
						// friend go to pub
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
					

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";
							
						var goes =  (json[i].GOES != null);


						var actualdate=json[i].assistdate;
						var year = actualdate.substring(0,4);
						var month = actualdate.substring(5,7);
						var day = actualdate.substring(8,10);
						actualdate = day+'/'+month+'/'+year;

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local al que asistirá </span><a href="'+link_user+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"><a href="'+link_user+'">'+name+' '+surnames+'</a></h5><p style="color:#E5E4E2;font-size:14px;">irá a <a href="'+link_local+'">'+localName+'</a> el '+actualdate+' </p><p style="color:#707070;font-size:14px;"></p></td></tr></tbody></table>');


	
						} else  if (type == 7|| type == 17){
							
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
                        var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Check-In</span><a href="'+link_user+'"> '+name+' '+surnames+' </a><span style="font-size:12px;color:orange;"> entró  <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;"><a href="'+link_user+'">'+name+' '+surnames+'</a> ya está en <a href="'+link_local+'">'+localName+'</a> </p></td></tr></tbody></table>');
					
											
							
							
						
						}else  if (type == 8|| type == 18){
							
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var title = json[i].title;
						var text = json[i].text;
						var startHour = json[i].startHour;
						var startH = startHour.substring(0,5);
						var date = json[i].date;
						var year = date.substring(0,4);
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						date = day+'/'+month+'/'+year;

						var localName = json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;

						var listDateClose= json[i].dateClose;
					
						var year = listDateClose.substring(0,4);
						var month = listDateClose.substring(5,7);
						var day = listDateClose.substring(8,11);
						listDateClose = day+'/'+month+'/'+year;

						var max=json[i].maxGuest;
					
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			
					
						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						var idList =  json[i].idEvent;
						var goes =  (json[i].GOES != null);
	
						var lists=document.getElementById('test').innerHTML;	
						lists = lists.concat("<li><div class='workflow-item hover' style='background-image:url(");
						lists=lists.concat(picture);
						lists=lists.concat(");background-size:100% 100%'></div>");
						lists = lists.concat("<span class='label label-dark-blue' style='font-size:12px'>Lista Local</span> <a href='"+ link +"'>"+ localName +"</a>");
						lists = lists.concat("<span style='font-size:12px;color:orange'> ");
						lists = lists.concat("  <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
						lists = lists.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'><b style='color:#34d1be'><a href='"+link_user+"'>");
						lists = lists.concat(name +" "+surnames+ " ");
						lists = lists.concat("</a> </b> se apuntó a la lista <b style='color:orange'>'");
						lists = lists.concat(title);
						lists = lists.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
						lists = lists.concat(text);
						lists = lists.concat("</P>");
						lists = lists.concat("<p style='color:#ff6b24'>El<b style='color:#34d1be'> ");
						lists = lists.concat(date);
						lists = lists.concat("</b> a partir de las <b style='color:#34d1be'> "); 
						lists = lists.concat(startH);
						lists = lists.concat("</b> hrs. Cierre de listas el  <b style='color:#34d1be'>");
						lists = lists.concat(listDateClose);
						lists = lists.concat("</b>");
						lists = lists.concat("</br></p> <span class='glyphicon glyphicon-plus' style='color:#34d1be'> </span> <select id='guests");
						lists = lists.concat(idList); 
						lists = lists.concat("'style='width:8.5%;border-radius:0px'>  <option value='0' selected='1'></option>");
			
				    
				    for(var j = 0; j<max; j++ ) {
    					lists=lists.concat("<option value="+ j +">"+j+"</option>");
 						}

						lists = lists.concat("</select> <span style='color:#ff6b24'> Invitados </span>");
				
				if(!goes)
					lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='joinList(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Entrar en listas</span></a>");
				else
				    lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='disjoinList(this.id);' style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Me Desapunto</span></a>");
					
					lists = lists.concat("</td></tr></tbody></table>");
				
							document.getElementById('test').innerHTML=lists;
							
							
					
					
												
							
							
							
							
						}else if(type == 9|| type == 19){

					var localName = json[i].localName;
					var title = json[i].title;


					var id_local =  json[i].idProfileLocal;
					var link = "../club/profile.php?idv=" + id_local;
					var text = json[i].text;

					if (picture==0 || picture=="" || picture==null)
					picture = "../images/reg2.jpg";


						var startHour = json[i].startHour;

						var date = json[i].date;
						var year = date.substring(0,4);
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						date = day+'/'+month+'/'+year;

						var listDateClose= json[i].dateClose;
						var year = listDateClose.substring(0,4);
						var month = listDateClose.substring(5,7);
						var day = listDateClose.substring(8,11);
						listDateClose = day+'/'+month+'/'+year;


				
						$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Lista Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicada <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</br>el <span style="color:#34d1be">'+ date +'<span><span style="color:#ff6b24"> a las </span> <span style="color:#34d1be">'+startHour+'<span> </h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+' </br> <span style="color:#34d1be">cierre de listas el </span>'+listDateClose+'</p></td></tr></tbody></table>');

							
							
						}

			}
			
			if (num_elements){
				$('#show_more').append('<a href="home.php#both" onclick="showMore();">Mostrar más..</a>	');
			}


		},
		onerror: function(e,val){
		alert("Contraseña y/o usuario incorrectos");
		}
	});

	/*Next Events*/
	var url2 = "../develop/actions/myEvents.php" + params;

	$.ajax({
		url:url2,
		dataType: "json",
		type: "GET",
		async: false,
		complete: function(r3){
			var json = JSON.parse(r3.responseText);
			var rows = json.rows;
			for(var i=0; i<rows; i++){
				var localName = json[i].localName;
				var title = json[i].title;
				var startHour = json[i].startHour;
				var startH = startHour.substring(0,5);
				var closeHour = json[i].closeHour;
				var closeH = closeHour.substring(0,5);
				var id_local =  json[i].idProfileCreator;
				var link = "../club/profile.php?idv=" + id_local;
				var date = json[i].date;
				var month = date.substring(5,7);
				var day = date.substring(8,11);

				var m;
				if (month == 1){
				m = "ENE";
				}else if (month == 2){
				m = "FEB";
				}else if (month == 3){
				m = "MAR";
				}else if (month == 4){
				m = "ABR";
				}else if (month == 5){
				m = "MAY";
				}else if (month == 6){
				m = "JUN";
				}else if (month == 7){
				m = "JUL";
				}else if (month == 8){
				m = "AGO";
				}else if (month == 9){
				m = "SEP";
				}else if (month == 10){
				m = "OCT";
				}else if (month == 11){
				m = "NOV";
				}else if (month == 12){
				m = "DIC";
				}
				var streetNameLocal = json[i].streetNameLocal;
				var streetNumberLocal = json[i].streetNumberLocal;

				$('#nextEvents').append('<div class="event-item"style="border-color:transparent"><p class="date-label"><span class="month"style="background-color:#404040;color:#34d1be">'+m+'</span><span class="date-number"style="background-color:#000;color:#ff6b24;height:63%">'+day+'</span></p><div class="details" style="height:10%;border-radius:0px;background-color:#404040;border-color:#ff6b24"><a href="" class="title" style="font-size:16px;border-left:0px;padding-left:10%;color:#34d1be;margin-bottom:2%">'+title+'</a><p class="time" style="color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-time"style="color:#ff6b24;"></i> De <b style="color:orange">'+startH+'</b> a <b style="color:orange">'+closeH+'</b> </p><p class="location"style="word-wrap: break-word;padding-right:2px;color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24;"></i>'+" "+streetNameLocal+', '+streetNumberLocal+'</p></div></div>');
			}

		},
		onerror: function(e,val){
		alert("No se puede introducir evento 2");
		}
		});


/*Next Events*/
	var url2 = "../develop/actions/myLists.php" + params;

	$.ajax({
		url:url2,
		dataType: "json",
		type: "GET",
		async: false,
		complete: function(r3){
			//alert(r3.responseText);
			var json = JSON.parse(r3.responseText);
			var rows = json.rows;
			
			$('#nextEvents').append("<div class='profile-header' style='text-align:center'><h3 style='border-color:transparent'><span style='color:#ff6b24;border-color:#ff6b24'>Próximas Listas</span></h3></div>");
			
			for(var i=0; i<rows; i++){
				var localName = json[i].name;
				var title = json[i].title;
				var startHour = json[i].startHour;
				var closeHour = json[i].closeHour;
				var id_local =  json[i].idProfile;
				var link = "../club/profile.php?idv=" + id_local;
				
				var date = json[i].date;
				var month = date.substring(5,7);
				var day = date.substring(8,11);
				
				var dateClose = json[i].dateClose;
				var yearClose = dateClose.substring(0,4);
				var dayClose = dateClose.substring(8,11);
				var monthClose = dateClose.substring(5,7);
					dateClose = dayClose+'/'+monthClose+'/'+yearClose;
                   

                
				var m;
				if (month == 1){
				m = "ENE";
				}else if (month == 2){
				m = "FEB";
				}else if (month == 3){
				m = "MAR";
				}else if (month == 4){
				m = "ABR";
				}else if (month == 5){
				m = "MAY";
				}else if (month == 6){
				m = "JUN";
				}else if (month == 7){
				m = "JUL";
				}else if (month == 8){
				m = "AGO";
				}else if (month == 9){
				m = "SEP";
				}else if (month == 10){
				m = "OCT";
				}else if (month == 11){
				m = "NOV";
				}else if (month == 12){
				m = "DIC";
				}
				
				
				$('#nextEvents').append('<div class="event-item"style="border-color:transparent"><p class="date-label"><span class="month"style="background-color:#404040;color:#34d1be">'+m+'</span><span class="date-number"style="background-color:#000;color:#ff6b24;height:63%">'+day+'</span></p><div class="details" style="height:10%;border-radius:0px;background-color:#404040;border-color:#ff6b24"><a href="" class="title" style="font-size:16px;border-left:0px;padding-left:10%;color:#34d1be;margin-bottom:2%">'+title+'</a><p class="time" style="color:#E5E4E2;margin-left:5%"><i class="glyphicon glyphicon-time"style="color:#ff6b24;"></i> Cierre de Lista: <b style="color:orange">'+dateClose+'</b> </p></div></div>');
			
			}

		},
		onerror: function(e,val){
		alert("No se puede introducir evento 2");
		}
		});





	});//end $(document).ready(function()

		</script>
	</head>

	<body ><!--onload="JavaScript:timedRefresh(30000);">-->
		<style>
			body{
			  background-color: #000;
			}
			navbar-fixed-top {
				z-index: 1030;
			}
			@media (max-width: 979px) {
				body {
					padding: 0px;
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
					color: #000;
				}
				.container {
					padding: 0px 20px;
				}
			}
		</style>

		<?php /*NavbarHeader*/
		include "templates/navbar-header.php";

		/*Sidebar*/
		include "templates/sidebar.php";

		$idProfile = $_SESSION['id_user'];
		$token = $_SESSION['token'];
		?>

		<script>var idProfile =  '<?php echo $idProfile; ?>' ;
	var token = '<?php echo $token; ?>	' ;

		</script>
		<!-- MiPerfil -->
		<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
			<div class="row">
				<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
					<div class="row">
						<div class="col-lg-12">
							<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
								<h1 style="color:#ff6b24;font-size:30px;">Inicio Fiestero</h1>
							</header>
							<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
								<div class="col-lg-9 col-md-8 col-sm-8">
									<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">

										<!--Aqui empieza-->
										<div class="col-lg-8">
											<form method="post" class="well padding-bottom-10" onsubmit="return false;"style="border-radius:0px;background: #D1D0CE;box-shadow: 1px 1px 2px 0 #ff6b24">
												<textarea rows="2" class="form-control" style="border-radius:0px;background-color:#E5E4E2"placeholder="¿En qué fiesta estas pensando?" id="state-user"></textarea>
												<div class="margin-top-10">
													<a href="#"id="" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-top:10px;margin-left:44%" onclick="createState();">Publicar</a>
													<a href="" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="glyphicon glyphicon-map-marker"style="color:#ff6b24"></i></a>
													<a href="" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="glyphicon glyphicon-camera" style="color:#ff6b24"></i></a>
												</div>
											</form>
											</div class="col-sm-4">

											<div class="profile-header" style="text-align:center">
												<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Modo</span></h3>
												<div class="form-group col-sm-2" style="margin-left:9%">
													<select id="mode" onchange="changeMode();" class="form-control textModo" style="background-color:#E5E4E2"  >
														<option  value="De tranquis" id="id1">De tranquis</option>
														<option value="Hoy no me lio" id="id2">Hoy no me lio</option>
														<option value="Lo que surja" id="id3" >Lo que surja</option>
														<option value="Lo daré todo" id="id4" >Lo daré todo</option>
														<option value="Destroyer" id="id5" >Destroyer</option>
														<option value="Yo me llamo Ralph" id="id6" >Yo me llamo Ralph</option>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-8">
													<div class="the-timeline">
														<ul id="test">

														</ul>

													</div>
													<div id="show_more" name="both">

													</div>
												</div>
												<div class="col-sm-3" style="margin-left:4%" >
													<div class="profile-header" style="text-align:center">
														<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Próximos Eventos</span></h3>
													</div>
													<section class="events" style="background-color:transparent;margin-bottom: -400px">
														<section class="events" style="background-color:transparent;margin-bottom: -400px">
														<div id="nextEvents" class="section-content">

														</div><!--//section-content-->
													</section><!--//events-->

												</div><!--//col-md-3-->
											
								<!--	<div class="col-sm-3" style="margin-left:4%" >
											 <div class="profile-header" style="text-align:center">
														<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Próximas listas</span></h3>
													</div>
													<section class="events" style="background-color:transparent;">
														<div id="nextLists" class="section-content">

														</div>
													</section>

											
										</div>-->
										
											
											
											</div>

										</div >

									</div >

									<!--Aqui termina-->
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
	</body>
</html>
