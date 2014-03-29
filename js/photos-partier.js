
function Delete() {

var elementos = document.getElementsByName("select");
var numSelect=0; 
 
for(var i=0; i<elementos.length; i++) {
	if(elementos[i].checked)numSelect=numSelect+1;
}


if (numSelect!=0){
 	var entrar = confirm("¿Seguro que quiere borrar las fotos seleccionadas?")
	if ( !entrar ) self.close()
			}
}

function Forbidden() {

var elementos = document.getElementsByName("select");
var numSelect=0; 
 
for(var i=0; i<elementos.length; i++) {
	if(elementos[i].checked)numSelect=numSelect+1;
}

if (numSelect!=0){
	var entrar = confirm("¿Seguro que quiere denunciar las fotos seleccionadas?")
	if ( !entrar ) self.close()
	}
}

function SelectAll(){
	
var box= document.getElementById("selectall");
var elementos = document.getElementsByName("select");

if(box.checked){

	for(var i=0; i<elementos.length; i++) {
		elementos[i].checked=true;
	}
}

else{
	
	for(var i=0; i<elementos.length; i++) {
		elementos[i].checked=false;
	}
	
	
	
}
	
}


