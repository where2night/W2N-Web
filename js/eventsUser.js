
								

function myEvents(){
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	
var url="../develop/actions/myEvents.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			 var json = JSON.parse(r.responseText);	 
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/
			  
			  document.getElementById('myev').innerHTML="";
			  
			  var key, count = 0;
		for(key in json) {
  			if(json.hasOwnProperty(key)) {
    		count++;
  		}
	}
	   count=count-1;		  
			
			 var i=0;
			 
			 while (i<count)
			  	{
			  		
			  		var image="src='../images/party2.jpg'";
		
					var events=document.getElementById('myev').innerHTML;
		
					
		
		  			   events=events.concat("<li>");
		  			   events=events.concat("<div class='timeline-title orangeBox1'><img class='menu-avatar time-title-img orangeBox1'  src='../images/party2.jpg' alt='' /> <h6>");
		               events=events.concat(json[i].title);
					   events=events.concat("</h6> <i style='color:#FF6B24'> <span class='glyphicon glyphicon-time'>");
					   events=events.concat(" ");
					   events=events.concat(json[i].date);
					   events=events.concat("   ");
					   events=events.concat(json[i].startHour);				
					   events=events.concat("</span></i> <a id='");
					   events=events.concat(json[i].idEvent);
					   events =events.concat("'class='orangeBox1'onclick='disjoinEvent(this.id);' ><i class='glyphicon glyphicon-trash'style='color:#000'></i> <span");
					   events=events.concat(">Borrar</span></a>");				
					   events=events.concat("</div> ");										
					   events=events.concat("</li>");			
									
					document.getElementById('myev').innerHTML=events;
		   
		
				
				
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});


	
	
	
}



function nextEvents(){
		
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	
	var url = "../develop/read/news.php";
	url=url.concat(params);
		 
        
        $.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			async: false,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var type = json[i].TYPE;
					
					if (type == 1){
						
						var idEven = json[i].idEvent;
						var localName = json[i].localName;
						var title = json[i].title;	
						var startHour = json[i].startHour;
						var closeHour = json[i].closeHour;
						var date = json[i].date;
						var text = json[i].text;
						
						
					   var events=document.getElementById('nextev').innerHTML;
					   events=events.concat("<li><div class='timeline-title orangeBox1'><img class='menu-avatar time-title-img orangeBox1'  src='../images/party2.jpg' alt='' /> <h6>");
		               events=events.concat(localName);
		               events=events.concat(" ");
		               events=events.concat("<span class='glyphicon glyphicon-arrow-right'></span>");
		               events=events.concat(" ");
		               events=events.concat(title);
					   events=events.concat("</h6> <i style='color:#FF6B24'> <span class='glyphicon glyphicon-time'>");
					   events=events.concat(" ");
					   events=events.concat(date);
					   events=events.concat("   ");
					   events=events.concat(startHour);				
					   events=events.concat("</span></i> <a class='orangeBox1'><i class='glyphicon glyphicon-thumbs-up'style='color:#000'></i> <span id='");
					   events=events.concat(idEven);
					   events=events.concat("'onclick='joinEvent(this.id);'>Me apunto</span></a>");				
					   events=events.concat("</div> <div class='timeline-content orangeBox1'><p>");					
					   events=events.concat(text);					
					   events=events.concat("</p></div></li>");			
									
					   document.getElementById('nextev').innerHTML=events;
									
								
				
				
				
				
					}
				}
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});

	
	
	
	
	
}



function joinEvent(id){
	
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id);
	
	var url = "../develop/actions/goToEvent.php";
	url=url.concat(params);
	
	
    $.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			async: false,
			complete: function(r2){
				
				
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});



    myEvents();

}



function disjoinEvent(id){


/*var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);
*/


var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id);
	
	var url = "../develop/actions/goToEvent.php";
	url=url.concat(params);
	
    $.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			timeout: 5000,
			async: false,
			complete: function(r2){
				
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});



	myEvents();
	
	
}


