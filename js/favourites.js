function favouriteLocals(){
	
		//Get clubs info	  
        
						var param = "/" ;
					param=param.concat(ide); 
					param=param.concat("/");
					param=param.concat(tok);
					param=param.concat("/");
					param=param.concat(id_abs);

	  				var url="../develop/actions/myFavLocals.php";
					url=url.concat(param);
					
					
	                 
	                 
	               	$.ajax({
						url: url,
						dataType: "json",
						type: "GET",
						async: false,
						complete: function(r){
			  			var json = JSON.parse(r.responseText);	 
             			count=json.rows;
	   		
	   		            var i=0;
			 			while (i<count){
			 	
			 				var picture = json[i].picture;
							if (picture == null || picture.length == 0){
								picture = "../images/reg1.jpg";
						}
							
						var localName = json[i].localName;
						var id_user = json[i].idProfile;
						
						var link = "../club/profile.php?idv=" + id_user;
			 	
			 			var local=document.getElementById('localfav').innerHTML;
					
		      			local=local.concat("<li class='col-md-6'style='border-color:#ff6b24;'> <div class='img'> <img src='");
						local=local.concat(picture);
						local=local.concat("' alt=''/></div><div class='details'style='background-color:#1B1E24;border:0px'><div class='name'><a href='"+link+"' style='color:#ff6b24; font-size:16px;'>");
						local=local.concat(localName);
						local=local.concat("</a></div><div class='time'><i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:11px;'></i> Última publicación: 1 semana</div></div></li>");

						document.getElementById('localfav').innerHTML=local;

			 			
			 			
			 			i++;
			 			}
					},
					onerror: function(e,val){
						alert("No se pueden saber los seguidores");
				}
			});
      
            
           
                        

					   

    
}



function myfriends(){




var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_abs);
	

	  
var url="../develop/read/myFriends.php";
	url=url.concat(params);
	
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			  var json = JSON.parse(r.responseText);
			  
			  var count=json.numFriends;
				var num_friends=document.getElementById('friends').innerHTML;
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


				var friend=document.getElementById('friends').innerHTML;
				var id_user = json[i].idProfile;
				
				var link = "../user/profile.php?idv=" + id_user;

		      			friend=friend.concat("<li class='col-md-6'style='border-color:#ff6b24;'> <div class='img'> <img src='");
						friend=friend.concat(picture);
						friend=friend.concat("' alt=''/></div><div class='details'style='background-color:#1B1E24;border:0px'><div class='name'><a href='"+link+"' style='color:#ff6b24; font-size:16px;'>");
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
				alert("No se pueden saber los seguidores");
			}
	});

}


function my_followers(){

	var params = "/" ;
	var count;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_abs);
	
	var url="../develop/read/myFriends.php";
	url=url.concat(params);
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			  
			count = json.numFriends;
			var div = document.getElementById('followers');
			div.innerHTML = count;
			  
        		  
			},
			onerror: function(e,val){
				alert("No se pueden saber los seguidores");
			}
	});
	
}

function following(){

	var params = "/" ;
	var num_friends;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_abs);
	
	var url="../develop/read/myFriends.php";
	url=url.concat(params);
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			  
			num_friends = json.numFriends;
			var div = document.getElementById('followers');
			div.innerHTML = num_friends;
			  
        		  
			},
			onerror: function(e,val){
				alert("No se pueden saber los seguidores");
			}
	});
	
	
	var param = "/" ;
	param=param.concat(ide); 
	param=param.concat("/");
	param=param.concat(tok);
	param=param.concat("/");
	param=param.concat(id_abs);

	var url="../develop/actions/myFavLocals.php";
	url=url.concat(param);
	                 
	var num_favourites_pubs ;                
	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
			num_favourites_pubs=json.rows;

				
			},
			onerror: function(e,val){
				alert("No se pueden saber los seguidores");
			}
	});
	
	var total_followers = num_friends + num_favourites_pubs;

	var div = document.getElementById('following');
			div.innerHTML = total_followers;
	
	
}