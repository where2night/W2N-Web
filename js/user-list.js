function deleteFriend(id,id_user){
	
	
var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);
	
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_user);

	  
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
