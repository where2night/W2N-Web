
/**
* Add a song at list
*/
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
					$('#my_songs tbody').empty();
					show_songs_list("home");
			  		alert("canción añadida");
						
			},
			onerror: function(e,val){
				alert("No se puede introducir la canción");
			}
	});
 

}

/**
* Next to add a song, clean the inputs
*/
function cleanInputs(){
	$('#song_name').val("");	
	$('#artist').val("");
}

function show_songs_list(type_home){
	


var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/playList.php";
	url=url.concat(params);


$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
				var json = JSON.parse(r.responseText);	
				
				show_songs(json,type_home);
		  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});



	
}



/**
* Show all the playlist from the server and paint at page
*/
function show_songs(json,type){

	var count = 0;
				
	for(key in json) {
	
		if(json.hasOwnProperty(key)) {
			count = count + 1;
		}
			
	}
	count=count-3;
	var i=0;
	
	if (type == "home"){
		
		while (i<count) {
			var song_name = json[i].trackName;
			var artist_name = json[i].trackArtist;
			var votes = json[i].votes;
			var id_track = json[i].idTrack;
			//var id_track = ide;
			
			$('#my_songs tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="" class="user-link"style="color:#FF6B24">'+ song_name +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ artist_name +'</a></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ votes +'</a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#"id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="'+id_track+'" onclick="deleteSong(this.id);">Editar</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#"id="'+id_track+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="'+id_track+'" onclick="deleteSong(this.id);">Eliminar</span></a></td></tr>');

		
			i=i+1;	
		}
	} else if (type == "profile"){
		alert("paso x prfile");
		while (i<count) {
			var song_name = json[i].trackName;
			var artist_name = json[i].trackArtist;
			var votes = json[i].votes;
			var id_track = json[i].id_track;
			$('#local_songs tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="" class="user-link"style="color:#FF6B24">'+ song_name +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ artist_name +'</a></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ votes +'</a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#"id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="voteSong('+id_track+');">Votar</span></a></td></tr>');

		
			i=i+1;	
		}
	}
	
			
}


function deleteSong(id) {


var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id);

	  
	var url="../develop/update/track.php";
		url=url.concat(params);


$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			timeout: 5000,
			async: false,
			complete: function(r){
					alert("eliminado con éxito");
					$('#my_songs tbody').empty();
					show_songs_list("home");
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

/*var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);
	*/
	
}

