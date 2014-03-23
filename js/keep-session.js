/*
type (id_user, email...)
*/
function setCookie(cname,value){
	alert('undefined value');
	if(value != ""){ 
		var today = new Date();
		var the_date = new Date("December 31, 2023");
		var the_cookie_date = the_date.toGMTString();
		var the_cookie = cname+"="+ value;
		var the_cookie = the_cookie + ";expires=" + the_cookie_date;
		document.cookie=the_cookie;
		alert(the_cookie);
	}
}

function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
	  {
	  var c = ca[i].trim();
	  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	  }
	return "";
}

function createCookie(cname,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = cname+"="+value+expires+"; path=/";
}

function eraseCookie(cname) {
    createCookie(cname,"",-1);
}