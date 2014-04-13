function favouriteLocals(){
	
		//Get clubs info
        var params = "/" + ide + "/" + tok; 
        var url1 = "../develop/read/locals.php" + params;
        
        
       $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			async: false,
			timeout: 5000,
			complete: function(r2){
				
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var user_type = "club";
					var id_user = json[i].idProfile;
					var localName = json[i].localName;
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					
					
					
					
					var follow=false;
					var param = "/" ;
					param=param.concat(ide); 
					param=param.concat("/");
					param=param.concat(tok);
					param=param.concat("/");
					param=param.concat(id_user);

	  				var url="../develop/actions/pubfollowers.php";
					url=url.concat(param);
	                 
	                 
	               	$.ajax({
						url: url,
						dataType: "json",
						type: "GET",
						async: false,
						complete: function(r){
			  			var json = JSON.parse(r.responseText);	 
             			var key, count = 0;
						for(key in json) {
  							if(json.hasOwnProperty(key)) {
    							count++;
  							}
						}
	   					count=count-1;
	   		
	   		            var i=0;
			 			while (i<count && follow==false){
			 	
			 				if(json[i].idPPartier==ide)follow=true;
			 			i++;
			 			}
					},
					onerror: function(e,val){
						alert("No se pueden saber los seguidores");
				}
			});
      
         
            
           if(follow){
                        
					var local=document.getElementById('localfav').innerHTML;
					
		      			local=local.concat("<li class='col-md-6'style='border-color:#ff6b24;'> <div class='img'> <img src='");
						local=local.concat(picture);
						local=local.concat("' alt=''/></div><div class='details'style='background-color:#1B1E24;border:0px'><div class='name'><a href='#' style='color:#ff6b24; font-size:16px;'>");
						local=local.concat(localName);
						local=local.concat("</a></div><div class='time'><i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:11px;'></i> Última publicación: 1 semana</div></div></li>");

									
									
															
					document.getElementById('localfav').innerHTML=local;
		   
					}
					
				
				}
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});

    
}
