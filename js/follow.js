function paintButton(){
	
if(!(ide==ideEvent)){
	
	if(followers()){
		
		document.write("<input id='btn01'  class='botonseguir' type='button'value='SIGUIENDO'onClick='changeMyClassName(this);'>");  
		document.getElementById('btn01').className='myClickedButton';
	
	}else
		//if you  don't follow
	document.write("<input id='btn01'  class='botonseguir' type='button'value='SIGUEME'onClick='changeMyClassName(this);'>");
	
	
	}
}




function changeMyClassName(theButton)
{

if(!(ide==ideEvent)){

myButtonID = theButton.id;
if(document.getElementById(myButtonID).className=='myClickedButton')
{
document.getElementById(myButtonID).className='myDefaultButton';
document.getElementById(myButtonID).value='SIGUEME';
unfollowClub();


}
else
{
document.getElementById(myButtonID).className='myClickedButton';
document.getElementById(myButtonID).value='SIGUIENDO';
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
			  alert(r.responseText);
			},
			onerror: function(e,val){
				alert("No se puede introducir seguir ");
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
			  alert("dejar de seguir");
			},
			onerror: function(e,val){
				alert("No se puede introducir dejar de seguir");
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
				alert("No se puede introducir dejar de seguir");
			}
	});


return follow;

}


