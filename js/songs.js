

function add_song() {
	var params = "/" ;
		params=params.concat(ide); 
		params=params.concat("/");
		params=params.concat(tok);
	  
	var url="../develop/create/track.php";
		url=url.concat(params);
	var name = document.getElementById("song_name").value;
	var artist = document.getElementById("artist").value;
		$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				name:name,
				artist: artist
			},
			complete: function(r){
					cleanInputs();
			  		alert("canción añadida");
						
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
 

}

function cleanInputs(){
	$('#song_name').val("");	
	$('#artist').val("");
}



