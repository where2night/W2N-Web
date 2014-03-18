
function deleteEvent(id) {
	
var elemento=document.getElementById(id);
var padre = elemento.parentNode;
padre.removeChild(elemento);

//aqui habria que eliminar el evento de la base de datos
// habria que pasarle el id


}

function newEvent() {


}



