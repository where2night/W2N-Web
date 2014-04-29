function paintButton(){
	


if(!(ide==id_abs)){
	
	var status=follow();
	
	
	if(status==2){
		document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button'value='Agregar Fiestero'onClick='changeMyClassName(this);' style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>");
	}
	
	if(status==1){
	
		document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button'value='Fiestero Agregado'onClick='changeMyClassName(this);' onmouseout='changeNameOut(this);' onmouseover='changeNameOver(this);' style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>");  
		document.getElementById('btn01').className='myClickedSeguir';
	
	}
	
	if(status==0){
	
		document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button'value='Enviada solicitud de amistad'onClick='changeMyClassName(this);'style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>");  
		document.getElementById('btn01').className='myClickedRequest';
	
	
	}
	
	
	
	}
}





function changeMyClassName(theSeguirBtn)
{
	
	if(!(ide==id_abs)){
			myButtonID = theSeguirBtn.id;
			if(!(document.getElementById(myButtonID).className=='myClickedRequest')){
					
					if(document.getElementById(myButtonID).className=='myClickedSeguir')
					{
						var unfollow = confirm("¿Dejar de seguir?");

						if (unfollow==true){
                              	document.getElementById(myButtonID).className='myDefaultSeguir';
								document.getElementById(myButtonID).value='Agregar Fiestero';
								unfollowFriend();
								}
					}
					else
					{
						document.getElementById(myButtonID).className='myClickedRequest';
						document.getElementById(myButtonID).value='Enviada solicitud de amistad';
						followFriend();
					}

			}
	}

}


function followFriend(){
	
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_abs);


	  
var url="../develop/actions/followFriend.php";
	url=url.concat(params);

	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			  
			},
			onerror: function(e,val){
				alert("No se puede  seguir ");
			}
	});



}

function unfollowFriend(){
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_abs);

	  
var url="../develop/actions/followFriend.php";
	url=url.concat(params);
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
			 
			},
			onerror: function(e,val){
				alert("No se puede dejar de seguir");
			}
	});



}



function follow(){

var followers=2;
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	

	  
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
	   		
	   		var i=0;
			 
			 while (i<count){
			 	
			 	if(json[i].idProfile==id_abs)followers=1;
			    
			    i=i+1;
			 }
	
			  
			},
			onerror: function(e,val){
				alert("No se pueden saber los seguidores");
			}
	});


    if (followers==2){
    	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);


	var url="../develop/actions/myPetFriendship.php";
	url=url.concat(params);


	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			  var json = JSON.parse(r.responseText);
	          
			 
           var count=json.numPetitions;
	   		
	   		var i=0;
			 
			 while (i<count){
			 	
			 	if(json[i].idProfile==id_abs)followers=0;
			    
			    i=i+1;
			 }
	
			  
			},
			onerror: function(e,val){
				alert("No se pueden saber los seguidores");
			}
	});
    	
    	
    	
    }



return followers;

}


function changeNameOver(theSeguirBtn)
{
	
	
	if(!(ide==id_abs)){
			myButtonID = theSeguirBtn.id;
			if(document.getElementById(myButtonID).value=='Fiestero Agregado'){
			document.getElementById(myButtonID).value='Dejar de seguir'
			}
	}

}

function changeNameOut(theSeguirBtn)
{
	
	if(!(ide==id_abs)){
			myButtonID = theSeguirBtn.id;
			if(document.getElementById(myButtonID).value=='Dejar de seguir'){
			document.getElementById(myButtonID).value='Fiestero Agregado'
			}
	}

}
