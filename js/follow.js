function paintButton(){
	
if(!(ide==ideEvent))
	document.write("<input id='btn01'  class='botonseguir' type='button'value='SIGUEME'onClick='changeMyClassName(this);'>");  
	
}




function changeMyClassName(theButton)
{

if(!(ide==ideEvent)){

myButtonID = theButton.id;
if(document.getElementById(myButtonID).className=='myClickedButton')
{
document.getElementById(myButtonID).className='myDefaultButton';
document.getElementById(myButtonID).value='SIGUEME';
//unfollowClub();


}
else
{
document.getElementById(myButtonID).className='myClickedButton';
document.getElementById(myButtonID).value='SIGUIENDO';
//followClub();

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
			  alert("seguir");
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
