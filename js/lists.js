
function deleteList(id) {
	
var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id evento y el id del profile
}

function newList() {


var partydate=document.getElementById("datepicker").value;
var limitdate=document.getElementById("datepicker2").value;
var title = document.getElementById("Title").value;
var description = document.getElementById("Description").value;


if (!(title=="")){
		
		var events=document.getElementById('ul').innerHTML;
		id=id+1;
		
events=events.concat("<div id=");		
events=events.concat(id);		
events=events.concat(" > <div class='timeline-title orangeBox1' style='margin-top: 5%'> <img class='menu-avatar time-title-img orangeBox1'  src='../images/party2.jpg' alt='' /> <h6>");
events=events.concat(title);
events=events.concat("</h6> <a class='orangeBox1' id=");
events=events.concat(id);
events=events.concat(" onclick='deleteList(this.id);'><i class='glyphicon glyphicon-trash'style='color:#000'></i>Borrar</a></div><div class='timeline-content orangeBox1'> <p>");
events=events.concat(description);
events=events.concat("</p>  </div>  </div>");
									
												
		
		document.getElementById('ul').innerHTML=events;
		   
	       clean();
		   alert("Evento creado");
		   
	
   
   }else
   		alert("introduce al menos un título");


}

function clean(){
	
	var inputText=document.getElementById("Title");
	var inputTextArea=document.getElementById("Description");
    var inputdate=document.getElementById("datepicker");
	var inputdate2=document.getElementById("datepicker2");
    
    inputdate.value="";
    inputdate2.value="";
    inputText.value="";
    inputTextArea.value="";
}

