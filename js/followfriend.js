function paintButton(){
	
if(!(ide==id_abs)){
	
	//if(follow()){
		
		//document.write("<input id='btn01'  class='botonseguir' type='button'value='SIGUIENDO'onClick='changeMyClassName(this);'>");  
		//document.getElementById('btn01').className='myClickedButton';
	
	//}else
		//if you  don't follow
	
	document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button'value='Agregar Fiestero'onClick='changeMyClassName(this);'style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>");
	
	
	
	}
}





function changeMyClassName(theSeguirBtn)
{
	
	if(!(ide==id_abs)){
	
			myButtonID = theSeguirBtn.id;
			if(document.getElementById(myButtonID).className=='myClickedSeguir')
			{
				document.getElementById(myButtonID).className='myDefaultSeguir';
				document.getElementById(myButtonID).value='Agregar Fiestero';
				//unfollowFriend();
			}
			else
			{
				document.getElementById(myButtonID).className='myClickedSeguir';
				document.getElementById(myButtonID).value='Fiestero Agregado';
				//followFriend();
			}

	}

}


function followFriend(){
	
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat("1");//must be id_abs


	  
var url="../develop/actions/followFriend.php";
	url=url.concat(params);

	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			complete: function(r){
				alert(r.responseText);
			  
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
	params=params.concat("1");// must be id_abs 

	  
var url="../develop/actions/followFriend.php";
	url=url.concat(params);
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
				alert(r.responseText);
			 
			},
			onerror: function(e,val){
				alert("No se puede dejar de seguir");
			}
	});



}