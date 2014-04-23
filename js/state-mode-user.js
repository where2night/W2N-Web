/**
 * When the user creates a new state in your account, that information is sent to the server where the database is to be stored
 */
function createState() {
	/*Get information from html*/
	var value = document.getElementById("state-user").value;
	document.getElementById("state-user").value = "";
	/*prepares attributes for the server*/
	var params = "/" + idProfile + "/" + token;
	var url1 = "../develop/update/status.php" + params;
	/*sends the new data to the server via POST*/
	$.ajax({
		url : url1,
		dataType : "json",
		type : "POST",
		data : {
			status : value /*new status to server*/
		},
		complete : function(r) {
			/*If data has arrived correctly*/
			console.log("estado actualizado");
		},
		onerror : function(e, val) {
			/*If an error has occurred*/
			alert("Hay error");
		}
	});

}

/**
 * When the state of a user is changed (De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)
 * that information is sent to the server where the database is to be stored
 */
function changeMode() {

	/*Get information from html*/
	var e = document.getElementById("mode");
	var mode_user = e.options[e.selectedIndex].text;
	var m_user;

	/*prepares attributes for the server*/
	if (mode_user == "De tranquis") {
		m_user = 0;
	} else if (mode_user == "Hoy no me lio") {
		m_user = 1;
	} else if (mode_user == "Lo que surja") {
		m_user = 2;
	} else if (mode_user == "Lo daré todo") {
		m_user = 3;
	} else if (mode_user == "Destroyer") {
		m_user = 4;
	} else if (mode_user == "Yo me llamo Ralph") {
		m_user = 5;
	}

	var params = "/" + idProfile + "/" + token;
	var url1 = "../develop/update/mode.php" + params;

	/*sends the new data to the server via POST*/
	$.ajax({
		url : url1,
		dataType : "json",
		type : "POST",
		data : {
			mode : m_user /*Send the new user mode*/
		},
		complete : function(r) {
			/*If data has arrived correctly*/
			console.log("estado actualizado");
		},
		onerror : function(e, val) {
			/*If an error has occurred*/
			alert("Hay error");
		}
	});

}