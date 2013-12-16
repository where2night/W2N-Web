 function ButtonRegister()
{

var name= document.getElementById("name").value;
var surname= document.getElementById("surname").value;
var email= document.getElementById("email").value;
var confirmationemail= document.getElementById("confirmation email").value;
var password=document.getElementById("password").value;
var confirmationpassword=document.getElementById("confirmation password").value;
var terms=document.getElementById("Terms & Conditions").checked;
var man=document.getElementById("man").checked;
var woman=document.getElementById("woman").checked;

var list_day= document.getElementById("day");
var day = list_day.options[list_day.selectedIndex].text;

var list_month= document.getElementById("month");
var month = list_month.options[list_month.selectedIndex].text;

var list_year= document.getElementById("year");
var year = list_year.options[list_year.selectedIndex].text;

//parent.location.href='mailto:'+"javieralejos89@gmail.com"+'?subject='+"prueba"+'';



//alert(day+"/"+month+"/"+ year);
//alert(name+" "+surname+" "+ email+" "+confirmationemail+" "+password+" "+confirmationpassword);
//alert("Se ha enviado un correo electrónico de verificación de la cuenta creada") ;

}


 