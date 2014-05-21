
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
				
				show_songsNotPlayingSet(json,type_home);
		  
			},
			onerror: function(e,val){
				alert("No se puede mostrar canciones");
			}
	});



	
}

function show_songs_list_to_play(type_home){

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
				alert("No se puede mostrar canciones");
			}
	});



	
}

function show_songs_list_profile(){
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idlocal);
	
	var url="../develop/read/playList.php";
		url=url.concat(params);
	
	if (ide == idlocal) {
		$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
				var json = JSON.parse(r.responseText);	
				
				show_song_profile_asLocal(json);
		  
			},
			onerror: function(e,val){
				alert("No se puede mostrar canciones");
			}
		});
	} else {
		$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
				var json = JSON.parse(r.responseText);	
				
				show_song_profile(json);
		  
			},
			onerror: function(e,val){
				alert("No se puede mostrar canciones");
			}
		});
	}


	
}

function show_song_profile_asLocal(json){
	var count = 0;
				
	for(key in json) {
	
		if(json.hasOwnProperty(key)) {
			count = count + 1;
		}
			
	}
	count=count-3;
	var i=0;
	while (i<count) {
		var song_name = json[i].trackName;
		var artist_name = json[i].trackArtist;
		var votes = json[i].votes;
		var id_track = json[i].id_track;
		$('#local_songs tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#FF6B24">'+ song_name +'</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ artist_name +'</span></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ votes +'</span></td> </tr>');

	
		i=i+1;	
	}
}

function show_song_profile(json){

		
		var count = 0;
				
		for(key in json) {
		
			if(json.hasOwnProperty(key)) {
				count = count + 1;
			}
				
		}
		count=count-3;
		var i=0;
		while (i<count) {
			var song_name = json[i].trackName;
			var artist_name = json[i].trackArtist;
			var votes = json[i].votes;
			var id_track = json[i].id_track;
			$('#local_songs tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#FF6B24">'+ song_name +'</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ artist_name +'</span></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ votes +'</span></td></tr>');

		
			i=i+1;	
		}
	

}


/**
* Vote song
*/

function voteSong(id_track) {
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idlocal);
	params=params.concat("/");
	params=params.concat(id_track);
	
	var url="../develop/actions/voteTrack.php";
	url=url.concat(params);
	
	$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				
			},
			complete: function(r){
			
					alert(r.responseText);
						
			},
			onerror: function(e,val){
				alert("No se puede introducir la canción");
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
			//var id_track = ide
			
			$('#my_songs tbody').append('<tr id="tr_'+id_track+'"><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#FF6B24">'+ song_name +'</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ artist_name +'</span></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ votes +'</span></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="play_'+id_track+'" onclick="play('+id_track +',' + "'" + artist_name + "'" + ',' + "'" + song_name + "'" + ',' + votes + ');">Play</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="edit_'+id_track+'" onclick="editSong('+id_track+','+votes+');">Editar</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="'+id_track+'" onclick="deleteSong(this.id);">Eliminar</span></a></td></tr>');

		
			i=i+1;	
		}
	} 
	
			
}

function show_songsNotPlayingSet(json,type){


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
			
			$('#my_songs tbody').append('<tr id="tr_'+id_track+'"><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#FF6B24">'+ song_name +'</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ artist_name +'</span></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span style="color:#1B1E24">'+ votes +'</span></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#"  class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="edit_'+id_track+'" onclick="editSong('+id_track+','+votes+');">Editar</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="'+id_track+'" onclick="deleteSong(this.id);">Eliminar</span></a></td></tr>');

			i=i+1;	
		}
	} 
	
			
}

function play (id_track,artist_name,song_name,votes){

	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_track);

	  
	var url="../develop/actions/playTrack.php";
		url=url.concat(params);
		
		$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				
			},
			complete: function(r){
					
					var json = JSON.parse(r.responseText);	
					var canPlay = json['playTrack'];
					
					/**If there is not error at play track*/
					if (canPlay) {
					
						var count = 0;
				
						for(key in json) {
						
							if(json.hasOwnProperty(key)) {
							
								count = count + 1;
							}
								
						}
					
						count=count-1;
						
						var i=0;
					
						while( i < count ) {
							var idT = json[i].idTrack;
							
							if ( id_track != idT){
								var element_button = '#play_'+ idT;
								$(element_button).text('play'); 
							} else {
									var element_button = '#play_'+ idT;
								$(element_button).text('sonando'); 
							}
							
							i = i +1;
						}
					
					
					}			
					
						
			},
			onerror: function(e,val){
				alert("No se puede reproducir la canción");
			}
	});
		
		
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
					var element_tr = '#tr_'+ id;
					$(element_tr).remove();
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

function editSong(idT,votes) {

var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idT);

	  
	var url="../develop/update/track.php";
		url=url.concat(params);


	$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			async: false,
			complete: function(r){
					var json = JSON.parse(r.responseText);
					var id_track = json['idTrack'];
					var song_name = json['trackName'];
					var artist_name = json['trackArtist'];
					
					var element_tr = '#tr_'+ id_track;
					var element_song_name = '#edit_song_name' + id_track;
					var element_song_artist = '#edit_artist' + id_track;
					
					$(element_tr).replaceWith('<tr id="tr_'+id_track+'"><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><input type="text" class="form-control" id="edit_song_name'+id_track+'" style="width:75%;" name="" ></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><input type="text" class="form-control" id="edit_artist'+id_track+'" style="width:75%;" name="" ></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ votes +'</a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="accept_'+id_track+'" onclick="acceptChangeSong('+id_track+','+votes+');" >Aceptar</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="cancel_'+id_track+'" onclick="cancelChangeSong('+id_track +',' + "'" + artist_name + "'" + ',' + "'" + song_name + "'" + ',' + votes + ');">Cancelar</span></a></td></tr>');
					$(element_song_name).val(song_name);
					$(element_song_artist).val(artist_name);
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});

	
}


function acceptChangeSong(id_track,votes){

	var element_song_name = '#edit_song_name' + id_track;
	var element_song_artist = '#edit_artist' + id_track;
	var name = $(element_song_name).val();
	var artist = $(element_song_artist).val();
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(id_track);

	  
	var url="../develop/update/track.php";
		url=url.concat(params);


	$.ajax({
			url: url,
			dataType: "json",
			type: "POST",
			timeout: 5000,
			async: false,
			data: {
				name : name,
				artist : artist
			},
			complete: function(r){
					var element_tr = '#tr_'+ id_track;
					
					$(element_tr).replaceWith('<tr id="tr_'+id_track+'"><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="" class="user-link"style="color:#FF6B24">'+ name +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ artist +'</a></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ votes +'</a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="edit_'+id_track+'" onclick="editSong('+id_track+','+votes+');">Editar</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="'+id_track+'" onclick="deleteSong(this.id);">Eliminar</span></a></td></tr>');
					
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
	


}

function cancelChangeSong(id_track,artist_name,song_name,votes){
	
	
	var element_tr = '#tr_'+ id_track;
	$(element_tr).replaceWith('<tr id="tr_'+id_track+'"><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="" class="user-link"style="color:#FF6B24">'+ song_name +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ artist_name +'</a></td> <td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ votes +'</a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="edit_'+id_track+'" onclick="editSong('+id_track+','+votes+');">Editar</span></a></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="'+id_track+'" onclick="deleteSong(this.id);">Eliminar</span></a></td></tr>');
}

function restartPlayList(){

	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	
	var url="../develop/actions/restartPlaylist.php";
	url=url.concat(params);


	$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			complete: function(r){
				
				var json = JSON.parse(r.responseText);	
				var reStartPlayList = json['restartPlayList'];
				
				if (reStartPlayList) {
					$('#my_songs tbody').empty();
					show_songs_list_to_play("home");
				}
				
		  
			},
			onerror: function(e,val){
				alert("No se puede mostrar canciones");
			}
	});


}
