
function createState(){
	var value = document.getElementById("state-user").value;
	document.getElementById("state-user").value = "";
	var url1 = "../develop/update/status.php" ;
	
	$.ajax({
					url : url1,
					dataType : "json",
					type : "POST",
					data : {
						idProfile : idProfile,
						status : value
					},
					complete : function(r) {
							console.log("estado actualizado");
					},
					onerror : function(e, val) {
						alert("Hay error");
					}
	});

}

function changeMode(){

	var e = document.getElementById("mode");
	var mode_user = e.options[e.selectedIndex].text;
	var m_user;
	
	if (mode_user == "De tranquis"){
		m_user = 0;
	} else if (mode_user == "Hoy no me lio"){
		m_user = 1;
	} else if (mode_user == "Lo que surja"){
		m_user = 2;
	} else if (mode_user == "Lo daré todo"){
		m_user = 3;
	} else if (mode_user == "Destroyer"){
		m_user = 4;
	} else if (mode_user == "Yo me llamo Ralph"){
		m_user = 5;
	}
	
	var url1 = "../develop/update/mode.php" ;

	
	$.ajax({
					url : url1,
					dataType : "json",
					type : "POST",
					data : {
						idProfile : idProfile,
						mode : m_user
					},
					complete : function(r) {
							console.log("estado actualizado");
					},
					onerror : function(e, val) {
						alert("Hay error");
					}
	});
	
}