function newList(){

	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	  
var url="../develop/create/list.php";
	url=url.concat(params);


var actualdate=document.getElementById("date").value;
var dateClose=document.getElementById("dateClose").value;
var max=document.getElementById("Max").value;

var title2 = document.getElementById("Title").value;
var description = document.getElementById("Description").value;

var list_hour_init= document.getElementById("hour-init");
var hour_init = list_hour_init.options[list_hour_init.selectedIndex].text;

var list_minutes_init= document.getElementById("minutes-init");
var minutes_init = list_minutes_init.options[list_minutes_init.selectedIndex].text;

var list_hour= document.getElementById("hour");
var hour = list_hour.options[list_hour.selectedIndex].text;

var list_minutes= document.getElementById("minutes");
var minutes = list_minutes.options[list_minutes.selectedIndex].text;


var time1 = hour_init.concat(":");
time1=time1.concat(minutes_init);

var time2 = hour.concat(":");
time2=time2.concat(minutes);
	

var year = actualdate.substring(6,11);
var day = actualdate.substring(3,5);
var month = actualdate.substring(0,2);
actualdate = day+'/'+month+'/'+year;


var yearClose = dateClose.substring(6,11);
var dayClose = dateClose.substring(3,5);
var monthClose = dateClose.substring(0,2);
dateClose = dayClose+'/'+monthClose+'/'+yearClose;


if (!(title2=="")){
	

	if (actualdate!="//" && dateClose!="//"){

		if(!(hour=="HH"||minutes=="MM"||hour_init=="HH"||minutes_init=="MM")){
		
				if (!isNaN(max) && !max==""){


		
						$.ajax({
							url:url,
							dataType: "json",							
							type: "POST",
							async: false,
							data: {
								idProfile:ide,
								title: title2,
								text: description,
								date: actualdate,
								closeDate: dateClose,
								maxGuest: max,
								startHour: time1,
								closeHour: time2
									},
							complete: function(r){
			  			  
								},
							onerror: function(e,val){
								alert("No se puede introducir evento 2");
							}
						});
		
    document.getElementById('myLists').innerHTML="";
     		    myLists();
		   
		  
		  }else alert("el máximo número de acompañantes debería ser un número");
		  }else alert("evento sin hora");
	   
   		} else alert("introduce fecha");
   
   
   }else
   		alert("introduce al menos un título");

    clean();

	
}

function clean(){
	
	var inputText=document.getElementById("Title");
	var inputText2=document.getElementById("Max");
	var inputTextArea=document.getElementById("Description");
    var inputdate=document.getElementById("date");
    var inputdate2=document.getElementById("dateClose");
	

var list_hour_init= document.getElementById("hour-init");
list_hour_init.selectedIndex=0;

var list_minutes_init= document.getElementById("minutes-init");
list_minutes_init.selectedIndex=0;

var list_hour= document.getElementById("hour");
list_hour.selectedIndex=0;

var list_minutes= document.getElementById("minutes");
list_minutes.selectedIndex=0;


    
    inputdate.value="";
    inputdate2.value="";
    inputText.value="";
    inputText2.value="";
    inputTextArea.value="";
}


function myLists(){
	
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ide);
	  
var url="../develop/read/lists.php";
	url=url.concat(params);

$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
            
			var key, count = 0;
			for(key in json) {
	  			if(json.hasOwnProperty(key)) {
		    		count++;
		  		}
			}
	   		count=count-3;		  
			
			var i=0;
		 
	    var picture=json.pictureC;
	    if (picture == null || picture.length == 0){
					picture = "../images/profile-club.jpg";
				}
		    
		
			while (i<count)
			  	{
					var lists=document.getElementById('myLists').innerHTML;
					
					var dateList = json[i].date; 
					var year = dateList.substring(0,4);
					var month = dateList.substring(5,7);
					var day = dateList.substring(8,11);
					var listDate = day+'-'+month+'-'+year;
					var date = json[i].createdTime;
					var dateClose = json[i].dateClose;
					var yearClose = dateClose.substring(0,4);
					var monthClose = dateClose.substring(5,7);
					var dayClose = dateClose.substring(8,11);
					var listDateClose = dayClose+'-'+monthClose+'-'+yearClose;
					var startHour = json[i].startHour;
					var starH = startHour.substring(0,5);
					var closeHour = json[i].closeHour;
					var closeH = closeHour.substring(0,5);
					var idList = json[i].idLists;
					
					
					moment.lang('es', {
						 relativeTime : {
										future : "en %s",
										past : "hace %s",
										s : "unos segundos",
										m : "un minuto",
										mm : "%d minutos",
										h : "una hora",
										hh : "%d horas",
										d : "un día",
										dd : "%d días",
										M : "un mes",
										MM : "%d meses",
										y : "un año",
										yy : "%d años"
									}
					});
					var dateActivity = moment(date);
					if (dateActivity.isValid()){
						var activityFromNow = dateActivity.fromNow();
					}
	
					lists = lists.concat("<li><div class='workflow-item hover' style='background-image:url(");
					lists=lists.concat(picture);
					lists=lists.concat(");background-size:100% 100%'></div>");
					lists = lists.concat("<span class='label label-dark-blue' style='font-size:12px'>Lista Local</span> ");
					lists = lists.concat("<span style='font-size:12px;color:orange'>  publicado <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
					lists = lists.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'>Título Lista <b style='color:orange'>'");
					lists = lists.concat(json[i].title);
					lists = lists.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
					lists = lists.concat(json[i].about);
					lists = lists.concat("</P>");
					lists = lists.concat("<p style='color:#ff6b24'>El<b style='color:#34d1be'> ");
					lists = lists.concat(listDate);
					lists = lists.concat("</b> a partir de las <b style='color:#34d1be'> "); 
					lists = lists.concat(starH);
					lists = lists.concat("</b> hrs. </br> Cierre de listas el  <b style='color:#34d1be'>");
					lists = lists.concat(listDateClose);
					lists = lists.concat("</b>");
					lists = lists.concat("</br></p>");
					lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='deleteList(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Eliminar</span></a>");
					lists = lists.concat("</td></tr></tbody></table>");
					
					document.getElementById('myLists').innerHTML=lists;		
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});


	
	
}



function deleteList(id) {
	

var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
 	params=params.concat("/");
	params=params.concat(id);
	  
	var url="../develop/update/list.php";
		url=url.concat(params);


$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			timeout: 5000,
			async: false,
			complete: function(r){
			  
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


function myListsProfile(){
	
	if(ide==ideEvent)
		myLists();
	
	else
	
	{
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(ideEvent);
	  
var url="../develop/read/lists.php";
	url=url.concat(params);

$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			var json = JSON.parse(r.responseText);	 
            
			var key, count = 0;
			for(key in json) {
	  			if(json.hasOwnProperty(key)) {
		    		count++;
		  		}
			}
	   		count=count-3;		  
			
			var i=0;
		 
	    var picture=json.pictureC;
	    if (picture == null || picture.length == 0){
					picture = "../images/profile-club.jpg";
				}
		    
		
			while (i<count)
			  	{
					var lists=document.getElementById('myLists').innerHTML;
					
					var dateList = json[i].date; 
					var year = dateList.substring(0,4);
					var month = dateList.substring(5,7);
					var day = dateList.substring(8,11);
					var listDate = day+'-'+month+'-'+year;
					var date = json[i].createdTime;
					var dateClose = json[i].dateClose;
					var yearClose = dateClose.substring(0,4);
					var monthClose = dateClose.substring(5,7);
					var dayClose = dateClose.substring(8,11);
					var listDateClose = dayClose+'-'+monthClose+'-'+yearClose;
					var startHour = json[i].startHour;
					var starH = startHour.substring(0,5);
					var closeHour = json[i].closeHour;
					var closeH = closeHour.substring(0,5);
					var idList = json[i].idLists;
					var max = json[i].maxGuest;
			        var goes = json[i].GOES;
			        
					
					moment.lang('es', {
						 relativeTime : {
										future : "en %s",
										past : "hace %s",
										s : "unos segundos",
										m : "un minuto",
										mm : "%d minutos",
										h : "una hora",
										hh : "%d horas",
										d : "un día",
										dd : "%d días",
										M : "un mes",
										MM : "%d meses",
										y : "un año",
										yy : "%d años"
									}
					});
					var dateActivity = moment(date);
					if (dateActivity.isValid()){
						var activityFromNow = dateActivity.fromNow();
					}
	
					lists = lists.concat("<li><div class='workflow-item hover' style='background-image:url(");
					lists=lists.concat(picture);
					lists=lists.concat(");background-size:100% 100%'></div>");
					lists = lists.concat("<span class='label label-dark-blue' style='font-size:12px'>Lista Local</span> ");
					lists = lists.concat("<span style='font-size:12px;color:orange'>  publicado <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
					lists = lists.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'>Lista <b style='color:orange'>'");
					lists = lists.concat(json[i].title);
					lists = lists.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
					lists = lists.concat(json[i].about);
					lists = lists.concat("</P>");
					lists = lists.concat("<p style='color:#ff6b24'>El<b style='color:#34d1be'> ");
					lists = lists.concat(listDate);
					lists = lists.concat("</b> a partir de las <b style='color:#34d1be'> "); 
					lists = lists.concat(starH);
					lists = lists.concat("</b> hrs. </br> Cierre de listas el  <b style='color:#34d1be'>");
					lists = lists.concat(listDateClose);
					lists = lists.concat("</b>");
					lists = lists.concat("</br></p> <span class='glyphicon glyphicon-plus' style='color:#34d1be'> </span> <select id='guests");
					lists = lists.concat(idList); 
					lists = lists.concat("'style='width:15%'>  <option value='0' selected='1'></option>");
			
				    
				    for(var j = 0; j<max; j++ ) {
    					lists=lists.concat("<option value="+ j +">"+j+"</option>");
 						}

					lists = lists.concat("</select> <span style='color:#ff6b24'> Invitados </span>");
				
				if(goes==null)
					lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='joinList(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Entrar en listas</span></a>");
				else
				    lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='disjoinList(this.id);' style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Me Desapunto</span></a>");
					
					lists = lists.concat("</td></tr></tbody></table>");
					
					document.getElementById('myLists').innerHTML=lists;		
				
				i=i+1;	
				}
			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});


	}
	
}


function joinList(idList){
	
	var aux="guests";
	aux = aux.concat(idList);
	
	var guests= document.getElementById(aux).value;
	
			
	
	var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idList);
	  
var url="../develop/actions/joinList.php";
	url=url.concat(params);

	
	
						$.ajax({
							url:url,
							dataType: "json",
							type: "POST",
				            async: false,
							data: {
								numGuest:guests
									},
							complete: function(r){
			  			  
								},
							onerror: function(e,val){
								alert("No se puede introducir evento 2");
							}
						});

	
}

function disjoinList(idList){

	
				var params = "/" ;
					params=params.concat(ide); 
					params=params.concat("/");
					params=params.concat(tok);
					params=params.concat("/");
					params=params.concat(idList);
	  
				var url="../develop/actions/joinList.php";
					url=url.concat(params);

	
	
						$.ajax({
							url:url,
							dataType: "json",
							type: "DELETE",
	                        async:false,
							complete: function(r){
								},
							onerror: function(e,val){
								alert("No se puede introducir evento 2");
							}
						});

	
}

