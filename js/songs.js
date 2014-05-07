

function add_song() {
alert("paso x songs");

	var params = "/" ;
		params=params.concat(ide); 
		params=params.concat("/");
		params=params.concat(tok);
	  
	var url="../develop/create/track.php";
		url=url.concat(params);
	var name = document.getElementById("song_name").value;
	alert(name);
	var artist = document.getElementById("artist").value;
	alert(artist);
	
		$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				name:name,
				artist: artist
			},
			complete: function(r){
				
			  		alert("completo");	 
						alert(r.responseText);
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
 

}



