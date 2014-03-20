
function deleteEvent(id) {
	
var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id evento y el id del profile
}

function newEvent(type) {


var actualdate=document.getElementById("datepicker").value;
var title = document.getElementById("Title").value;
var description = document.getElementById("Description").value;

var list_hour_init= document.getElementById("hour-init");
var hour_init = list_hour_init.options[list_hour_init.selectedIndex].text;

var list_minutes_init= document.getElementById("minutes-init");
var minutes_init = list_minutes_init.options[list_minutes_init.selectedIndex].text;

var list_hour= document.getElementById("hour");
var hour = list_hour.options[list_hour.selectedIndex].text;

var list_minutes= document.getElementById("minutes");
var minutes = list_minutes.options[list_minutes.selectedIndex].text;


//var fileName = document.getElementById('upload').value;


if (!(title=="")){

	if (!actualdate==""){

		if(!(hour=="HH"||minutes=="MM"||hour_init=="HH"||minutes_init=="MM")){
		
		//le paso el idProfile,title,text,Date,StartHour,closehour y me devuelve el id
		
		
		
		
		
		
		
		
		
		
		
		///////////////////////////////////////////////////////////////////////////////
		var image;
		
		if(type=="dj") image="src='../images/party3.jpg'";
			else image="src='../images/party2.jpg'";
		
		var events=document.getElementById('ul').innerHTML;
		var id=1;
		
		events=events.concat("<li id='button");
		events=events.concat(id);
		events=events.concat("'> <div class='timeline-title orangeBox1'> <img class='menu-avatar time-title-img orangeBox1'");
		events=events.concat(image);  
		events=events.concat("/><h6>");
		events=events.concat(title);
		events=events.concat("</h6> <i class='glyphicon glyphicon-time'style='color:#FF6B24'>");
		//events=events.concat(actualdate);
		events=events.concat("</i> <a class='orangeBox1' id='button");
		events=events.concat(id);
		events=events.concat("' onclick='deleteEvent(this.id);'><i class='glyphicon glyphicon-trash'style='color:#000'></i>Borrar</a></div></li>");
		
		document.getElementById('ul').innerHTML=events;
		   
		   alert("Evento creado");
		   
		  }else alert("evento sin hora");
	   
   		} else alert("introduce fecha");
   
   
   }else
   		alert("introduce al menos un título");


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

