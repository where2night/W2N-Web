
function deleteEvent(id) {
	
var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id


}

function newEvent() {

id=id+1;

var title = document.getElementById("Title").value;
var description = document.getElementById("Description").value;
var fileName = document.getElementById('upload').value;

var date = new Date();
var actualdate=date.getDate() + "/" + (date.getMonth() +1) + "/" + date.getFullYear();


if (!(title=="")){

var events=document.getElementById('ul').innerHTML;
events=events.concat("<li id='button");
events=events.concat(id);
events=events.concat("'> <div class='timeline-title orangeBox1'> <img class='menu-avatar time-title-img orangeBox1'  src='../images/party2.jpg' /><h6>");
events=events.concat(title);
events=events.concat("</h6> <i class='glyphicon glyphicon-time'style='color:#FF6B24'>");
events=events.concat(actualdate);
events=events.concat("</i> <a class='orangeBox1' id='button");
events=events.concat(id);
events=events.concat("' onclick='deleteEvent(this.id);'><i class='glyphicon glyphicon-trash'style='color:#000'></i>Borrar</a></div></li>");

document.getElementById('ul').innerHTML=events;
   
   alert("Evento creado");
   
   }else
   		alert("introduce al menos un título");


}

function clean(){
	
	var inputText=document.getElementById("Title");
	var inputTextArea=document.getElementById("Description");
    
    inputText.value="";
    inputTextArea.value="";
}

