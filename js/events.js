
function deleteEvent(id) {
	
var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id evento y el id del profile
}

function newEvent(type) {
	
	
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
		
		//ideProfile ---> ide
		//le paso el idProfile,title,text,Date,StartHour,closehour y me devuelve el id
		
		
		$.ajax({
			url: "../develop/create/event.php",
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
			  alert("evento creado");
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
		
		
		///////////////////////////////////////////////////////////////////////////////
		var image;
		
		if(type=="dj") image="src='../images/party3.jpg'";
			else image="src='../images/party2.jpg'";
		
		var events=document.getElementById('ul').innerHTML;
		
		id=id+1;
		
		
		events=events.concat("<li id='button");
		events=events.concat(id);
		events=events.concat("'> <div class='timeline-title orangeBox1'> <img class='menu-avatar time-title-img orangeBox1'");
		events=events.concat(image);  
		events=events.concat("/><h6>");
		events=events.concat(title2);
		events=events.concat("</h6> <i class='glyphicon glyphicon-time'style='color:#FF6B24'>");
		events=events.concat(actualdate);
		events=events.concat("</i> <a class='orangeBox1' id='button");
		events=events.concat(id);
		events=events.concat("' onclick='deleteEvent(this.id);'><i class='glyphicon glyphicon-trash'style='color:#000'></i>Borrar</a></div></li>");
		
		document.getElementById('ul').innerHTML=events;
		   
		    
		   
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
			  
			 var i=0;
			 
			 while (json[i].title!=null && json[i].title!="")
			  	{
			  		
			  		var image;
		
					if(type=="dj") image="src='../images/party3.jpg'";
						else image="src='../images/party2.jpg'";
		
					var events=document.getElementById('ul').innerHTML;
		
					id=id+1;
		
		
					events=events.concat("<li id='button");
					events=events.concat(json[i].idEvent);
					events=events.concat("'> <div class='timeline-title orangeBox1'> <img class='menu-avatar time-title-img orangeBox1'");
					events=events.concat(image);  
					events=events.concat("/><h6>");
					events=events.concat(json[i].title);
					events=events.concat("</h6> <i class='glyphicon glyphicon-time'style='color:#FF6B24'>");
					events=events.concat(json[i].date);
					events=events.concat("</i> <a class='orangeBox1' id='button");
					events=events.concat(json[i].idEvent);
					events=events.concat("' onclick='deleteEvent(this.id);'><i class='glyphicon glyphicon-trash'style='color:#000'></i>Borrar</a></div></li>");
		
					document.getElementById('ul').innerHTML=events;
		   
		
				
				
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});



	
}

