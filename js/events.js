function myEvents(){
	


var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
            
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
					var events=document.getElementById('myEvents').innerHTML;
					
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
					var idEvent = json[i].idEvent;
					
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
					events = events.concat("<span class='label label-dark-blue' style='font-size:12px'>Evento Local</span> ");
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
					events = events.concat("<a href=''id='"+idEvent+"'class='btn pull-right' onclick='deleteEvent(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Eliminar</span></a>");
					events = events.concat("</td></tr></tbody></table>");
					
					document.getElementById('myEvents').innerHTML=events;		
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

	
}





function deleteEvent(id) {
	

var params = "/" ;
	params=params.concat(id); 
	params=params.concat("/");
	params=params.concat(ide);

	  
var url="../develop/update/event.php";
	url=url.concat(params);


//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id evento y el id del profile

$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

	
	
}

function newEvent(type) {

var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	  
var url="../develop/create/event.php";
	url=url.concat(params);

var actualdate=document.getElementById("datepicker").value;
var title2 = document.getElementById("Title").value;
var description = document.getElementById("Description").value;

var list_hour_init= document.getElementById("hour-init");
var hour_init = list_hour_init.options[list_hour_init.selectedIndex].text;

var list_minutes_init= document.getElementById("minutes-init");
var minutes_init = list_minutes_init.options[list_minutes_init.selectedIndex].text;

var list_hour= document.getElementById("hour");
var hour = list_hour.options[list_hour.selectedIndex].text;

var list_minutes= document.getElementById("minutes");
var minutes = list_minutes.options[list_minutes.selectedIndex].text;


var time1 = hour_init.concat(":");
time1=time1.concat(minutes_init);

var time2 = hour.concat(":");
time2=time2.concat(minutes);

//var fileName = document.getElementById('upload').value;
if (!(title2=="")){

	if (!actualdate==""){

		if(!(hour=="HH"||minutes=="MM"||hour_init=="HH"||minutes_init=="MM")){
		
		
		$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				idProfile:ide,
				title: title2,
				text: description,
				date: actualdate,
				startHour: time1,
				closeHour: time2
			},
			complete: function(r){
			  			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
		
    document.getElementById('ul').innerHTML="";
     events(type);		    
		   
		  }else alert("evento sin hora");
	   
   		} else alert("introduce fecha");
   
   
   }else
   		alert("introduce al menos un título");

    clean();

}

function clean(){
	
	var inputText=document.getElementById("Title");
	var inputTextArea=document.getElementById("Description");
    var inputdate=document.getElementById("datepicker");
	

var list_hour_init= document.getElementById("hour-init");
list_hour_init.selectedIndex=0;

var list_minutes_init= document.getElementById("minutes-init");
list_minutes_init.selectedIndex=0;

var list_hour= document.getElementById("hour");
list_hour.selectedIndex=0;

var list_minutes= document.getElementById("minutes");
list_minutes.selectedIndex=0;


    
    inputdate.value="";
    inputText.value="";
    inputTextArea.value="";
}


function events(type){
	


var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 var json = JSON.parse(r.responseText);	 
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/
			  
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
			  		
			  		var image="src='../images/party2.jpg'";
		
					var events=document.getElementById('ul').innerHTML;
		
					
		
		
					events=events.concat("<li id='");
					events=events.concat(json[i].idEvent);
					events=events.concat("'> <div class='timeline-title orangeBox1'> <img class='menu-avatar time-title-img orangeBox1'");
					events=events.concat(image);  
					events=events.concat("/><h6 style='color:#FF6B24'>");
					events=events.concat(json[i].title);
					events=events.concat("</h6> <i class='glyphicon glyphicon-time'style='color:#FF6B24'>");
					events=events.concat(json[i].date);
					events=events.concat("</i> <a class='orangeBox1' id='");
					events=events.concat(json[i].idEvent);
					events=events.concat("' onclick='deleteEvent(this.id);' style='color:#FF6B24'><i class='glyphicon glyphicon-trash'style='color:#FF6B24'></i>Borrar</a></div></li>");
		
					document.getElementById('ul').innerHTML=events;
		   
		
				
				
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});



	
}

function eventProfile(idRequest) {
	
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
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/

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
		
					events = events.concat("<li><div class='the-date'>");
					events = events.concat(json[i].date);
					events = events.concat("</div> <h4 style='color: #FF6B24'>");
					events = events.concat(json[i].title);
					events = events.concat("<br>");
					events = events.concat(json[i].text);
					if(ide != idRequest){
						if(partierEvents.indexOf(json[i].idEvent) > -1){//Event in array, display disjoin
							events=events.concat('<p> </p> <button type="button" id="join-event-' + json[i].idEvent + '" class="btn joinEventButton" style="margin-left:80%" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Desapunto<i class="glyphicon glyphicon-thumbs-down iconColor"></i></button> </li>');
						}else{//Event not in array, display join
							events=events.concat('<p> </p> <button type="button" id="join-event-' + json[i].idEvent + '" class="btn joinEventButton" style="margin-left:80%" onclick="clickedJoinEvent(' + "'" + idRequest + "'" + ', ' + "'" + json[i].idEvent + "'" + ');">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button> </li>');
						}
					}
					
					document.getElementById('ul').innerHTML=events;		
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

}

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
		  		button.innerHTML ='Me Desapunto<i class="glyphicon glyphicon-thumbs-down iconColor"></i>';
			  
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
		  		button.innerHTML ='Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i>';
			  
			},
			onerror: function(e,val){
				alert("No se puedo eliminar del evento");
			}
	});
}


function eventHome() {
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 var json = JSON.parse(r.responseText);	 
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/
			  
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
		
					events=events.concat("<li><div class='the-date'>");
					events=events.concat(json[i].date);
					events=events.concat("</div> <h4 style='color: #FF6B24'>");
					events=events.concat(json[i].title);
					events=events.concat("<br>");
					events=events.concat(json[i].text);
					events=events.concat("<p> </p> <button type='button' class='btn botoneditar'style='margin-left:83%'>Editar</button> </li>");
					
					
						document.getElementById('ul').innerHTML=events;
		   
		
				
				
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});


}



function eventHomedj() {
	



var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/events.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 var json = JSON.parse(r.responseText);	 
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/
			  
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
		
					events=events.concat("<li><div class='the-date'>");
					events=events.concat(json[i].date);
					events=events.concat("</div> <h4 style='color: #FF6B24'>");
					events=events.concat(json[i].title);
					events=events.concat("<br>");
					events=events.concat(json[i].text);
					events=events.concat("<p> </p>  </li>");
					
					
						document.getElementById('ul').innerHTML=events;
		   
		
				
				
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});


}



