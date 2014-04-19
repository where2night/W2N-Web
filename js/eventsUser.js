/*<li id="button1">
									<div class="timeline-title orangeBox1 ">
										<img class="menu-avatar time-title-img orangeBox1"  src="../images/party2.jpg" alt="" />
										<h6>EVENTO CLUB</h6>
										<i class="glyphicon glyphicon-time"style="color:#FF6B24">31/01/2014</i>
										<a class="orangeBox1" id="button1" onclick="deleteEvent(this.id);"><i class="glyphicon glyphicon-trash"style="color:#000"></i>Borrar</a>
									</div>
									
								</li>*/
								

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
			complete: function(r){
				//alert(r.responseText);
			 //var json = JSON.parse(r.responseText);	 
             /*alert(json[0].idEvent);
             alert(json[0].title);
             alert(json[0].text);
             alert(json[0].date);*/
			  
			/*  var key, count = 0;
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
				}*/
			  
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
			complete: function(r2){
				
				
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});





}






