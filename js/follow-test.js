function paintButton(){
	
if(!(ide==ideEvent)){
	
	if(followers()){
	
		document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button' value='Local Agregado'onClick='btnSeguir(this);'style='margin-left:50%;margin-top:-5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none; '>");  
		document.getElementById('btn01').className='myClickedSeguir';
	
	}else
		//if you  don't follow
	document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button' value='Agregar Local'onClick='btnSeguir(this);'style='margin-left:50%;margin-top:-5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none; '>");
	
	
	}
}


function btnSeguir(theSeguirBtn)
{
	if(!(ide==ideEvent)){
		myButtonID = theSeguirBtn.id;
		if(document.getElementById(myButtonID).className=='myClickedSeguir')
		{
			document.getElementById(myButtonID).className='myDefaultSeguir';
			document.getElementById(myButtonID).value='Agregar Local';
			unfollowClub();
		}
		else
		{
			document.getElementById(myButtonID).className='myClickedSeguir';
			document.getElementById(myButtonID).value='Local Agregado';
			followClub();
		}
	}
}



function followClub(){
	
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ideEvent);


	  
var url="../develop/actions/follow.php";
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

function unfollowClub(){
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ideEvent);

	  
var url="../develop/actions/follow.php";
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


function followers(){

var follow=false;
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ideEvent);

	  
var url="../develop/actions/pubfollowers.php";
	url=url.concat(params);
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			  var json = JSON.parse(r.responseText);	 
             //alert(json[0].picture);
             //alert(json[5].idPPartier);
             //alert(json[0].name);
             //alert(json[0].surnames);
             //alert(json[0].music);
             //alert(json[0].city);
             //alert(json[0].drink);
             
              
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


return follow;

}


