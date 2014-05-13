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
		
    document.getElementById('myEvents').innerHTML="";
    myEvents2();		    
		   
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

function myEvents2(){
	


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