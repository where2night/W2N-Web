<script type="text/javascript">  

    $(document).ready(function(){ 
      
      $("#close_session").on("click", function (event) {
        $.post("../framework/session_end.php",
          {},
          function(data,status){
          	  eraseCookie('w2n_id');
          	  eraseCookie('w2n_token');
          	  eraseCookie('w2n_type');
	          var url = "../";
	          $(location).attr('href',url);
          });
      });
      
    });//end $(document).ready(function()
    
</script>

<?php 
  
$typeProfile=$_SESSION['user_type']; 

?>

<script>
	
var type = '<?php echo $typeProfile; ?>' ;

function goToHome(where){

if(where=="logo"){

	if (type=="user")
		document.write("<a href='../user/home.php' class='navbar-brand'><img src='../images/mainlogo.png' alt='logoWhere2Night'</a>");
	else
		if (type=="club")
			document.write("<a href='../club/home.php' class='navbar-brand'><img src='../images/mainlogo.png' alt='logoWhere2Night'</a>");
				//else
					//document.write("<a href='../dj/home.php' class='navbar-brand'><img src='../images/mainlogo.png' alt='logoWhere2Night'</a>");

	} else{
	
	if (type=="user")
		document.write("<a href='../user/home.php' style='font-size:12px ;color:#6C6C6C' onmouseout='javascript:this.style.color='#6C6C6C';'onmouseover='javascript:this.style.color='#F2A116';'><strong>Inicio</strong>&nbsp;&nbsp;&nbsp;<i class='glyphicon glyphicon-home' style='color:#FF6B24;'></i></a>");
	else
		if (type=="club")
			document.write("<a href='../club/home.php' style='font-size:12px ;color:#6C6C6C' onmouseout='javascript:this.style.color='#6C6C6C';'onmouseover='javascript:this.style.color='#F2A116';'><strong>Inicio</strong>&nbsp;&nbsp;&nbsp;<i class='glyphicon glyphicon-home' style='color:#FF6B24; '></i></a>");
				//else
					//document.write("<a href='../dj/home.php' style='font-size:12px ;color:#6C6C6C' onmouseout='javascript:this.style.color='#6C6C6C';'onmouseover='javascript:this.style.color='#F2A116';'><strong>Inicio</strong>&nbsp;&nbsp;&nbsp;<i class='glyphicon glyphicon-home' style='color:#FF6B24; margin-top:15px'></i></a>");

	
	}					
}




</script>

<!--inventos yuli-->
<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 

?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
var not=0;
</script>
<script type="text/javascript">  
function aceptarbtn(id){
   //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token + "/" + id; 
		var url2 = "../develop/actions/followFriend.php" + params;

		$.ajax({
			url: url2,
			dataType: "json",
			type: "POST",
			async: false,
			complete: function(r){
			
			},
			onerror: function(e,val){
			alert("No se puede aceptar peticion");
			}
		});
		
		
		not--;
	
		if(not==0)document.getElementById('numNoti').innerHTML="";
		else document.getElementById('numNoti').innerHTML=not;
		
		
		var element=document.getElementById(id);
		var parent = element.parentNode;
			parent.removeChild(element);

			var aux="";

			if (not==0)
				aux="No tienes peticiones de amistad";
			else if (not==1)
				aux="Tienes "+ not + " petición de amistad";
			else
				aux="Tienes "+ not + " peticiones de amistad";

			document.getElementById('li').innerHTML=aux;
		
}
</script>
<script type="text/javascript">  
function cancelarbtn(id){
   //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token + "/" + id; 
		var url2 = "../develop/actions/followFriend.php" + params;

		$.ajax({
			url: url2,
			dataType: "json",
			type: "DELETE",
			async: false,
			complete: function(r){
				
			},
			onerror: function(e,val){
			alert("No se puede cancelar peticion");
			}
		});


		not--;
	
		if(not==0)document.getElementById('numNoti').innerHTML="";
		else document.getElementById('numNoti').innerHTML=not;
		
		
		var element=document.getElementById(id);
		var parent = element.parentNode;
			parent.removeChild(element);

			var aux="";

			if (not==0)
				aux="No tienes peticiones de amistad";
			else if (not==1)
				aux="Tienes "+ not + " petición de amistad";
			else
				aux="Tienes "+ not + " peticiones de amistad";

			document.getElementById('li').innerHTML=aux;
		


}
</script>
<script type="text/javascript">  
function numNotifications(){
   //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url2 = "../develop/read/petFriendship.php" + params;
		not=0;
		
		$.ajax({
			url: url2,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			var count=json.numPetitions;
			not=count;
			var noti=document.getElementById('numNoti').innerHTML;
			if (count != 0)
				noti = noti.concat(count);
			else{
				noti = noti.concat("<b style='color:#000'>");
				noti = noti.concat(count);
				noti = noti.concat("</b>");
			}
			document.getElementById('numNoti').innerHTML=noti;
			},
			onerror: function(e,val){
			alert("No se pueden saber las notificaciones");
			}
		});
}
</script>
<script type="text/javascript">
function notifications(){ 
    	
         //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url2 = "../develop/read/petFriendship.php" + params;
		
		$.ajax({
			url: url2,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			var count=json.numPetitions;
	   		var i=0;
			if (count==0)
				document.write("<li id='li' class='item-header'style='line-height:15px;'>No tienes peticiones de amistad</li>");
			else if (count==1)
				document.write("<li id='li' class='item-header'style='line-height:15px;'>Tienes "+ count + " petición de amistad</li>");
			else
				document.write("<li id='li' class='item-header'style='line-height:15px;'>Tienes "+ count + " peticiones de amistad</li>");
			
			while (i<count){
				var id_user = json[i].idProfile;			
				var picture = json[i].picture;
				if (picture == null || picture.length == 0){
					picture = "../images/reg1.jpg";
				}
				var link = "../user/profile.php?idv=" + id_user;
				var name = json[i].name;	
				var surnames = json[i].surnames;
				
				document.write("<li id="+id_user+" class='item'style='line-height:15px;'><i class='glyphicon glyphicon-user'style='margin-top:4%;margin-left:3%;color:#ff6b24;'></i><span class='content' style='font-size:13px'><b style='text-transform: uppercase;margin-left:3%;color:#000'>"+name+" "+surnames+"</b><b style='margin-left:2%'>desea ser tu amigo</b><button id="+id_user+" class='btn pull-right' value='Aceptar' type='button' onclick='aceptarbtn(this.id);' style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>Aceptar</button><button id="+id_user+" class='btn pull-right' value='Aceptar' type='button' onclick='cancelarbtn(this.id);' style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>Cancelar</button></span><p style='font-size:11px'><i class='glyphicon glyphicon-time' style='font-size:11px;margin-left:9%;color:#ff6b24'></i> hace 13 min</p></li>");
				
					i=i+1;		
			}
			},
			onerror: function(e,val){
			alert("No se pueden saber las notificaciones");
			}
		});
}//end function notifications()
    
</script> 

<script type="text/javascript">  
function numMessages(){
   //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url2 = "../develop/read/checkMessagesUnread.php" + params;
		$.ajax({
			url: url2,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			var count=json.numPetitions;
			
			var noti=document.getElementById('numNoti').innerHTML;
			if (count != 0)
				noti = noti.concat(count);
			else{
				noti = noti.concat("<b style='color:#000'>");
				noti = noti.concat(count);
				noti = noti.concat("</b>");
			}
			document.getElementById('numNoti').innerHTML=noti;
			},
			onerror: function(e,val){
			alert("No se pueden saber las notificaciones");
			}
		});
}
</script>
<script type="text/javascript">
function messages(){ 
    	
         //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url2 = "../develop/read/checkMessagesUnread.php" + params;
		
		$.ajax({
			url: url2,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			var count=json.numPetitions;
	   		var i=0;
			if (count==0)
				document.write("<li id='li' class='item-header'style='line-height:15px;'>No tienes peticiones de amistad</li>");
			else if (count==1)
				document.write("<li id='li' class='item-header'style='line-height:15px;'>Tienes "+ count + " petición de amistad</li>");
			else
				document.write("<li id='li' class='item-header'style='line-height:15px;'>Tienes "+ count + " peticiones de amistad</li>");
			
			while (i<count){
				var id_user = json[i].idProfile;			
				var picture = json[i].picture;
				if (picture == null || picture.length == 0){
					picture = "../images/reg1.jpg";
				}
				var link = "../user/profile.php?idv=" + id_user;
				var name = json[i].name;	
				var surnames = json[i].surnames;
				
				document.write("<li id="+id_user+" class='item'style='line-height:15px;'><i class='glyphicon glyphicon-user'style='margin-top:4%;margin-left:3%;color:#ff6b24;'></i><span class='content' style='font-size:13px'><b style='text-transform: uppercase;margin-left:3%;color:#000'>"+name+" "+surnames+"</b><b style='margin-left:2%'>desea ser tu amigo</b><button id="+id_user+" class='btn pull-right' value='Aceptar' type='button' onclick='aceptarbtn(this.id);' style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>Aceptar</button><button id="+id_user+" class='btn pull-right' value='Aceptar' type='button' onclick='cancelarbtn(this.id);' style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>Cancelar</button></span><p style='font-size:11px'><i class='glyphicon glyphicon-time' style='font-size:11px;margin-left:9%;color:#ff6b24'></i> hace 13 min</p></li>");
				
					i=i+1;		
			}
			},
			onerror: function(e,val){
			alert("No se pueden saber las notificaciones");
			}
		});
}//end function messages()
    
</script> 
<!-- fin inventos yuli -->



<!-- NavbarHeader -->
	<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000;height:5%" role="banner">
      <div class="container">
        <div class="navbar-header">
           <script>
		     goToHome("logo");
		  </script>

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
          <span class="sr-only">Toggle Side Navigation</span>
          <i class="icon-th-list"></i>
        </button>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
          <span class="sr-only">Toggle Top Navigation</span>
          <i class="icon-align-justify"></i>
        </button>
    
        </div>  
         <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-collapse-top">
        <div class="navbar-right">
		
           <ul class="nav navbar-nav navbar-left" style="margin-top:-2.5%">
        
          <script>
		     goToHome("notlogo");
		  </script>
			</ul>
			<!-- Notifications -->
			<ul class="nav navbar-nav navbar-left">
				<li id="noti"class="dropdown hidden-xs">
					<a class="btn dropdown-toggle" data-toggle="dropdown" style="box-shadow:none;border-bottom:0px;background-color:#000;border-color:#ff6b24">
						<i class="glyphicon glyphicon-warning-sign"style="color:#ff6b24"></i>
						<span id="numNoti" class="count" style="color:#34d1be"><script>numNotifications();</script></span>
					</a>
					
					<ul class="dropdown-menu notifications-list"style="max-height:200px;width:400px;border-radius:0px;overflow-y: scroll; ">
						
						<script>
							notifications();
						</script>	
						
					</ul>
				</li>
				<li id="mess"class="dropdown hidden-xs">
					<a class="btn dropdown-toggle" data-toggle="dropdown" style="box-shadow:none;border-bottom:0px;background-color:#000;border-color:#ff6b24">
						<i class="glyphicon glyphicon-envelope"style="color:#ff6b24"></i>
						<span id="numMess" class="count" style="color:#34d1be"><script>numMessages();</script></span>
					</a>
					
					<ul class="dropdown-menu notifications-list"style="max-height:200px;width:400px;border-radius:0px;overflow-y: scroll; ">
						
						<script>
							messages();
						</script>	
						
					</ul>
				</li>
			</ul>
			<!-- /Notifications -->
           <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="search-query animated" placeholder="Buscar" style="margin-top:-1px" >
            <i class="glyphicon glyphicon-search" style="color:#FF6B24; margin-top:0px"></i>
            </div>
          </form>

          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle dropdown-avatar" data-toggle="dropdown">
              <span>
                <img name="nav-profile-photo" class="menu-avatar" /> <span onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';">

				 <span name="nav-name"></span>
				&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-cog"style="color:#FF6B24"></i></span>
              </span>
              </a>
              <ul class="dropdown-menu">


                <li class="with-image">
                  <div class="avatar">
                    <img name="nav-profile-photo"/>
                  </div>
                  <span name="nav-name"></span>
                </li>

                <li class="divider"></li>

                <li><a href="../user/profile.php" ><i class="glyphicon glyphicon-user"style="color:#FF6B24"></i> <span>Perfil Fiestero</span></a></li>
                <li><a href="../user/edit.php"><i class="glyphicon glyphicon-edit"style="color:#FF6B24"></i> <span>Editar Perfil</span></a></li>
                <!--<li><a href="#"><i class="glyphicon glyphicon-wrench"style="color:#FF6B24"></i> <span>Configuración</span></a></li>-->
			   <li id="close_session"><a href="#"><i class="glyphicon glyphicon-off"style="color:#FF6B24"></i> <span>Cerrar Sesión</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-collapse -->
      </div>
    </div>
    <script type="text/javascript"> 
	    var idProfile = <?php echo $_SESSION['id_user'];?>;
		var id = <?php echo $_SESSION['id_user'];?>;
		var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url1 = "../develop/update/";
		var params = "/" + id + "/" + token + "/" + idProfile;
		if (type=="club"){
		  url1 += "local.php";
		  url1 += params;
		  $.ajax({
		    url: url1,
		    dataType: "json",
		    type: "GET",
		    timeout: 5000,
		    async: false,
		    complete: function(r2){
		      var json = JSON.parse(r2.responseText);
		      var localName = json.localName;
		      $('[name="nav-name"]').text(localName);
		      var picture = json.picture;
		      if (picture.length >0){ 
		     	 $('[name="nav-profile-photo"]').attr("src", picture);
		      }else{
		      	  $('[name="nav-profile-photo"]').attr("src", "../images/profile.jpg");
		      }
		    },
		    onerror: function(e,val){
		    }
		  });
		} else {
		 url1 += "user.php";
		  url1 += params;
		  $.ajax({
		    url: url1,
		    dataType: "json",
		    type: "GET",
		    timeout: 5000,
		    async: false,
		    complete: function(r2){
		      var json = JSON.parse(r2.responseText);
		      var name = json.name;
		      var surnames = json.surnames;
		      $('[name="nav-name"]').text(name + " " + surnames);
		      var picture = json.picture;
		      if (picture.length >0){ 
		      	$('[name="nav-profile-photo"]').attr("src", picture);
		      }else{
		      	  $('[name="nav-profile-photo"]').attr("src", "../images/profile.jpg");
		      }
		    },
		    onerror: function(e,val){
		    }
		  });
		}
    </script>
<!-- /NavbarHeader -->