
function showFans(){
	
	
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ideEvent);	
	
			
        var url1 = "../develop/actions/pubfollowers.php";
        url1=url1.concat(params);
		
 
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				
				var key, count = 0;
				for(key in json) {
  					if(json.hasOwnProperty(key)) {
    				count++;
  					}
				}
	   		count=count-1;
	   		
	   	
	   		
	   		var i=0;
			 
			 while (i<count){
			 	
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
                 var name = json[i].name;
                 var surname = json[i].surnames;
                 
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

				var id_user = json[i].idPPartier;
				
				var link_user = "../user/profile.php?idv=" + id_user;
				
				var friend=document.getElementById('friends').innerHTML;

		      			friend=friend.concat("<li class='col-md-6'style='border-color:#ff6b24;'> <div class='img'> <img src='");
						friend=friend.concat(picture);
						friend=friend.concat("' alt=''/></div><div class='details'style='background-color:#1B1E24;border:0px'><div class='name'><a href='"+link_user+"' style='color:#ff6b24; font-size:16px;'>");
						friend=friend.concat(name);
						friend=friend.concat(" ");
						friend=friend.concat(surname);
						friend=friend.concat("</a></div><div class='time'><i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:11px;'></i> Última publicación: 1 semana</div><div class='type'> <span class='label'>");
						friend=friend.concat(modeString);
						friend=friend.concat("</span></div></div></div></li>");				
										
															
						document.getElementById('friends').innerHTML=friend;

			    
			    i=i+1;
			 }

			
							
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});


	
	
}
