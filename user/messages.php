<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Messages Users</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
   <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap-wizard.css" rel="stylesheet" media="screen">
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	   	 
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-wizard.js"></script>
<script src="../js/keep-session.js"></script>
<script src="../js/autoRefresh.js"></script>
<!-- /script -->

<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 

?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>
  <script type="text/javascript">  
    $(document).ready(function(){
		var params = "/" ;
			params=params.concat(ide); 
			params=params.concat("/");
			params=params.concat(tok);
		
		var url="../develop/read/messagesSorted.php";
			url=url.concat(params);
		$.ajax({
								url: url,
								dataType: "json",
								type: "GET",
								async: false,
								complete: function(r){
									var json = JSON.parse(r.responseText);
									
									var message="";
									var mode="";
									var creatTime="";
									for(var i=0; i<json.length; i++){
										var id_user = json[i].idProfile;
										var name  = json[i].name;
										var surnames = json[i].surnames;
										var picture = json[i].picture;
										if (picture == null || picture.length == 0){
										picture = "../images/reg1.jpg";
										}
										var link = "../user/profile.php?idv=" + id_user;
										var num = json[i].num;
										for (var j=0; j<num; j++){
											var createdTime = json[i][j].createdTime;
											var day = createdTime.substring(8,11);
											var month = createdTime.substring(5,8);
											var year = createdTime.substring(0,4);
											var hour = createdTime.substring(11,14);
											var min = createdTime.substring(14,16);
											var men = json[i][j].message;
											men = men.substring(0,10);
											if (json[i][j].mode== 0){
												$('#messages-friends').append('<tr><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+name+" "+surnames+'</a><span class="user-subhead">Fiestero</span></td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;">'+men+"..."+'</td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;">'+day+"-"+month+year+" "+hour+min+'</td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><i class="glyphicon glyphicon-send" style="margin-left:3%;font-size:30px"></i></td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="deleteFriend(this.id,'+id_user+');">Abrir</span></a></td></tr>');
											}
											else if (json[i][0].mode== 1){
												$('#messages-friends').append('<tr><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+name+" "+surnames+'</a><span class="user-subhead">Fiestero</span></td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;">'+men+"..."+'</td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;">'+day+"-"+month+year+" "+hour+min+'</td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><i class="glyphicon glyphicon-envelope" style="margin-left:3%;font-size:30px"></i></td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="deleteFriend(this.id,'+id_user+');">Abrir</span></a></td></tr>');
											}
											else if (json[i][0].mode== 2){
												$('#messages-friends').append('<tr><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+name+" "+surnames+'</a><span class="user-subhead">Fiestero</span></td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;">'+men+"..."+'</td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;">'+day+"-"+month+year+" "+hour+min+'</td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><i class="glyphicon glyphicon-check" style="margin-left:3%;font-size:30px"></i></td><td style="color:#000;box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="deleteFriend(this.id,'+id_user+');">Abrir</span></a></td></tr>');
											}								
										}	
									}
									
								},
								onerror: function(e,val){
									alert("No se pueden saber los mensajes");
									}
			});
	 });//end $(document).ready(function()
	 function getUserName(id){
	 }
	 function sendMessage(id){
		var params = "/" ;
			params=params.concat(ide); 
			params=params.concat("/");
			params=params.concat(tok);
			params=params.concat("/");
			params=params.concat(id);
		var url="../develop/actions/sendMessage.php";
			url=url.concat(params);
		var messageT = $('#messageText').val();
		$.ajax({
								url: url,
								dataType: "json",
								type: "POST",
								async: false,
								data: {
								message:messageT},
								complete: function(r){	
								},
								onerror: function(e,val){
									alert("No se pueden saber los mensajes");
									}
			});
	}
	 function contacts(){
	 var params = "/" ;
		params=params.concat(ide); 
		params=params.concat("/");
		params=params.concat(tok);
		params=params.concat("/");
		params=params.concat(ide);
	
		var url="../develop/read/myFriends.php";
			url=url.concat(params);
		$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			  	var json = JSON.parse(r.responseText);
				var count=json.numFriends;
	   			var i=0;
				var contacts=document.getElementById('contact').innerHTML;
				contacts = contacts.concat('<option>Selecciona Contacto</option>');
					while (i<count){
							var name = json[i].name;
							var surnames = json[i].surnames;
							var id_user = json[i].idProfile;
							contacts = contacts.concat('<option info="'+id_user+'">'+name+" "+surnames+'</option>');
					 i=i+1;
			 		}
				document.getElementById('contact').innerHTML=contacts;
			},
			onerror: function(e,val){
				alert("No se pueden saber los contactos");
			}
		});
	}
	function btnSend() {
		var params = "/" ;
		params=params.concat(ide); 
		params=params.concat("/");
		params=params.concat(tok);
		params=params.concat("/");
		params=params.concat(ide);
	
		var url="../develop/read/myFriends.php";
			url=url.concat(params);
		$.ajax({
			url: url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			  	var json = JSON.parse(r.responseText);
				var count=json.numFriends;
	   			var i=0;
				var id_user=0;
				var str=document.getElementById('contact').options[document.getElementById('contact').selectedIndex].text;
				var allName = str.split(" ");
				var allName1 = str.split(" ");
				allName1.shift();
				var sur = allName1.join(" ");				
				while (i<count){
					var name = json[i].name;
					var surnames = json[i].surnames;
					if (name == allName[0] && surnames==sur){
						id_user = json[i].idProfile;
						i = count;
					}
					else
						i=i+1;
			 	}						
				var contacts=document.getElementById('btnSend').innerHTML;
				contacts = contacts.concat("<button id="+id_user+" class='btn pull-right'  type='button' onclick='sendMessage(this.id);' style='position:fixed;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>Enviar</button>");
				document.getElementById('btnSend').innerHTML=contacts;	
				
			},
			onerror: function(e,val){
				alert("No se pueden saber los contactos");
			}
		});
	 
	}	
</script>
</head>

<body>  <!--onload="JavaScript:timedRefresh(30000);">-->
<style>  
body{
	background-color:#000;
	
}

 navbar-fixed-top{
		z-index:1030;
	  }
	@media (max-width: 979px){
		body{
			padding:0px;
		}
		.navbar-fixed-top {
			margin-bottom: 0px;
		}
		.navbar-fixed-top, .navbar-fixed-bottom {
			position: fixed;
		}	
		.navbar .container {
			width: auto;
			padding: 0px 20px;
			color:#000;
		}
		.container{
			padding:0px 20px;
		}
	}
			
    </style>

<?php 
    /*NavbarHeader*/
  if($_SESSION['user_type'] == "user"){
  	include "templates/navbar-header.php"; 
  } else if($_SESSION['user_type'] == "club"){
  	include "../club/templates/navbar-header.php"; 
  }

  /*Sidebar*/
  if($_SESSION['user_type'] == "user"){
 	 include "templates/sidebar.php";
  } else if($_SESSION['user_type'] == "club"){
  	include "../club/templates/sidebar.php"; 
  }
?>
	<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Bandeja de Entrada</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
										<div class="col-lg-12">
											<!--NEW MESSAGE-->
											
											<a id="open-wizard" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none"><i class="glyphicon glyphicon-plus"style="font-size:12px;margin-bottom:5%;color:#ff6b24;margin-right:4%;"></i>Mensaje Nuevo</a>
											<div class="wizard" id="wizard-demo">
												<h1>Mensaje Nuevo</h1>
												<div class="wizard-card" data-onValidated="setServerName" data-cardname="name">
													<!--TEXT MESSAGE-->
														<div class="form-group">
															<label class="col-lg-2 control-label" style="color:#ff6b24;font-size:18px;">Para :</label>
															<div class="col-sm-7 " >
															<select class="form-control"id="contact" onchange="btnSend();"required><script>contacts();</script></select>
															</div>
														</div>
														<div class="col-lg-14">
                                                                <textarea id="messageText" class="form-control" placeholder="Escribe tu mensaje..." rows="6" style="font-size:13px"></textarea>
                                                        </div>
															<!--<button id="44" class="btn pull-right"  type="button" onclick='sendMessage(this.id);' style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;">Enviar</button>
-->
														<a id="btnSend">
															<script>btnSend();</script>
														</a>
													<!--/TEXT MESSAGE-->
												</div>	
											</div>
											<!--/NEW MESSAGE-->
											<div class="table-responsive">
												<table id="messages-friends" class="table user-list">
												<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fiestero</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Mensaje</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fecha</span></th>
													<th><span class="text-center" style="color:#FF6B24;border-color:#ff6b24">Estado</span></th>
													<th>&nbsp;</th>
												</tr>
												</thead>
												<tbody>
												</tbody>
												</table>
											</div>
										</div>	
									</div>
								</div>
							</div>
						
					</div>
				</div>
			</div>
		</div>
</div>
<!-- /MiPerfil --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
<script src="../js/club-list.js"></script>
<script src="../js/messages-pop.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-wizard.js"></script>
<script src="../js/messages-select.js"></script>
<script type="text/javascript">
	function setServerName(card) {
		var host = $("#new-server-fqdn").val();
		var name = $("#new-server-name").val();
		var displayName = host;
	
		if (name) {
			displayName = name + " ("+host+")";
		};
	
		card.wizard.setSubtitle(displayName);
		card.wizard.el.find(".create-server-name").text(displayName);
	}
	
	function validateIP(ipaddr) {
	    //Remember, this function will validate only Class C IP.
	    //change to other IP Classes as you need
	    ipaddr = ipaddr.replace(/\s/g, "") //remove spaces for checking
	    var re = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/; //regex. check for digits and in
	                                          //all 4 quadrants of the IP
	    if (re.test(ipaddr)) {
	        //split into units with dots "."
	        var parts = ipaddr.split(".");
	        //if the first unit/quadrant of the IP is zero
	        if (parseInt(parseFloat(parts[0])) == 0) {
	            return false;
	        }
	        //if the fourth unit/quadrant of the IP is zero
	        if (parseInt(parseFloat(parts[3])) == 0) {
	            return false;
	        }
	        //if any part is greater than 255
	        for (var i=0; i<parts.length; i++) {
	            if (parseInt(parseFloat(parts[i])) > 255){
	                return false;
	            }
	        }
	        return true;
	    }
	    else {
	        return false;
	    }
	}
	
	function validateFQDN(val) {
		return /^[a-z0-9-_]+(\.[a-z0-9-_]+)*\.([a-z]{2,4})$/.test(val);
	}
	
	function fqdn_or_ip(el) {
		var val = el.val();
		ret = {
			status: true
		};
		if (!validateFQDN(val)) {
			if (!validateIP(val)) {
				ret.status = false;
				ret.msg = "Invalid IP address or FQDN";
			}
		}
		return ret;
	}
	
	
	$(function() {
		
		$('#sel2').select2();
	
		$.fn.wizard.logging = false;
	
		var wizard = $("#wizard-demo").wizard({
			showCancel: true
		});
	
		//$(".chzn-select").chosen();
	
		wizard.el.find(".wizard-ns-select").change(function() {
			wizard.el.find(".wizard-ns-detail").show();
		});
	
		wizard.el.find(".create-server-service-list").change(function() {
			var noOption = $(this).find("option:selected").length == 0;
			wizard.getCard(this).toggleAlert(null, noOption);
		});
	
		wizard.cards["name"].on("validated", function(card) {
			var hostname = card.el.find("#new-server-fqdn").val();
		});
	
		wizard.on("submit", function(wizard) {
			var submit = {
				"hostname": $("#new-server-fqdn").val()
			};
	
			setTimeout(function() {
				wizard.trigger("success");
				wizard.hideButtons();
				wizard._submitting = false;
				wizard.showSubmitCard("success");
				wizard.updateProgressBar(0);
			}, 2000);
		});
	
		wizard.on("reset", function(wizard) {
			wizard.setSubtitle("");
			wizard.el.find("#new-server-fqdn").val("");
			wizard.el.find("#new-server-name").val("");
		});
	
		wizard.el.find(".wizard-success .im-done").click(function() {
			wizard.reset().close();
		});
	
		wizard.el.find(".wizard-success .create-another-server").click(function() {
			wizard.reset();
		});
	
		$(".wizard-group-list").click(function() {
			alert("Disabled for demo.");
		});
	
		$("#open-wizard").click(function() {
			wizard.show();
		});
	});
	</script>	


</body>
</html>
