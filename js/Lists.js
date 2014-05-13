function newList(){
	
var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	  
var url="../develop/create/list.php";
	url=url.concat(params);

var actualdate=document.getElementById("datepicker").value;
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
					

if (!(title2=="")){

	if (!actualdate==""){

		if(!(hour=="HH"||minutes=="MM"||hour_init=="HH"||minutes_init=="MM")){
		
		
		$.ajax({
			url:url,
			dataType: "json",
			type: "POST",
			data: {
				idProfile:ide,
				title: title2,
				text: description,
				date: actualdate,
				startHour: time1,
				closeHour: time2
			},
			complete: function(r){
			  			  
			},
			onerror: function(e,val){
				alert("No se puede introducir evento 2");
			}
	});
		
    //document.getElementById('ul').innerHTML="";
     //events(type);		    
		   
		  }else alert("evento sin hora");
	   
   		} else alert("introduce fecha");
   
   
   }else
   		alert("introduce al menos un título");

    //clean();

	
	
	
	
	
	
}
