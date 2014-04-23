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


/*function name(){
	
		if (type=="club")
				document.write("<?php echo $_SESSION['local_name'];?>");
						else 
                            document.write("<?php echo $_SESSION['name'].' '.$_SESSION['surnames'];?>");
}*/

</script>

<!--inventos yuli-->
<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 

?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>
<script type="text/javascript">  
function aceptarbtn(id){
   //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token + "/" + id; 
		var url2 = "../develop/actions/followFriend.php" + params;
		alert(id);
		$.ajax({
			url: url2,
			dataType: "json",
			type: "POST",
			async: false,
			complete: function(r){
				alert(r.responseText);
			}
			},
			onerror: function(e,val){
			alert("No se puede aceptar peticion");
			}
		});
}
</script>
<script type="text/javascript">  
function numNotifications(){
   //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url2 = "../develop/actions/myPetFriendship.php" + params;
		
		$.ajax({
			url: url2,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			var count=json.numPetitions;
			if (count != 0){
			var noti=document.getElementById('numNoti').innerHTML;
			noti = noti.concat(count);
			document.getElementById('numNoti').innerHTML=noti;	
			}
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
		var url2 = "../develop/actions/myPetFriendship.php" + params;
		
		$.ajax({
			url: url2,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
			var json = JSON.parse(r.responseText);
			var count=json.numPetitions;
	   		var i=0;
			document.write("<li class='item-header'style='line-height:15px;'>Tienes "+ count + " peticiones de amistad</li>");
			
			while (i<count){
				var id_user = json[i].idProfile;			
				var picture = json[i].picture;
				if (picture == null || picture.length == 0){
					picture = "../images/reg1.jpg";
				}
				var link = "../user/profile.php?idv=" + id_user;
				var name = json[i].name;	
				var surnames = json[i].surnames;
				
				
						/*<li class="item"style="line-height:15px;">
							<a href="">
								<i class="glyphicon glyphicon-user"style="color:#ff6b24;"></i>
								<span class="content" style="font-size:13px"><b style="text-transform: uppercase;color:#000"><?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?></b>  desea ser tu amigo
								<input id="'+id_user+'" class="btn pull-right" onclick='aceptarbtn(this.id);' type="button"value="Aceptar"style="font-family:'Lucida Sans Unicode','Lucida Grande', sans-serif;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"></span>
								<p style="font-size:11px"><i class="glyphicon glyphicon-time" style="font-size:11px;margin-left:5%;color:#ff6b24"></i> hace 13 min</p>
							</a>
						</li>	*/
				
				
				document.write("<li class='item'style='line-height:15px;'><a><i class='glyphicon glyphicon-user'style='color:#ff6b24;'>holaaaaa </i></a><a id='"+id_user+"' class='btn pull-right' onclick='aceptarbtn(this.id);' type='button'value='Aceptar'></a></</li>");
				
					i=i+1;		
			}
			},
			onerror: function(e,val){
			alert("No se pueden saber las notificaciones");
			}
		});
}//end function notifications()
    
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
						<!--<li class="item-header"style="line-height:15px;">Tienes 8 peticiones de amistad</li>
						<li class="item"style="line-height:15px;">
							<a href="">
								<i class="glyphicon glyphicon-user"style="color:#ff6b24;"></i>
								<span class="content" style="font-size:13px"><b style="text-transform: uppercase;color:#000"><?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?></b>  desea ser tu amigo
								<input class="btn pull-right" type="button"value="Aceptar"style="font-family:'Lucida Sans Unicode','Lucida Grande', sans-serif;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;"></span>
								<p style="font-size:11px"><i class="glyphicon glyphicon-time" style="font-size:11px;margin-left:5%;color:#ff6b24"></i> hace 13 min</p>
							</a>
						</li>	-->
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
                <img class="menu-avatar" src="../images/profile.jpg" /> <span onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';">
				<script>
				//name();
				</script>
				 <span id="navbar-complete-name">
					 <?php //echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
				 </span>
				&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-cog"style="color:#FF6B24"></i></span>
              </span>
              </a>
              <ul class="dropdown-menu">


                <li class="with-image">
                  <div class="avatar">
                    <img src="../images/profile.jpg" />
                  </div>
                  <span id="navbar-complete-name2">
					 <?php //echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
				  </span>
                </li>

                <li class="divider"></li>

                <li><a href="profile.php" ><i class="glyphicon glyphicon-user"style="color:#FF6B24"></i> <span>Perfil Fiestero</span></a></li>
                <li><a href="edit.php"><i class="glyphicon glyphicon-edit"style="color:#FF6B24"></i> <span>Editar Perfil</span></a></li>
                <!--<li><a href="#"><i class="glyphicon glyphicon-wrench"style="color:#FF6B24"></i> <span>Configuración</span></a></li>-->
			   <li id="close_session"><a href="#"><i class="glyphicon glyphicon-off"style="color:#FF6B24"></i> <span>Cerrar Sesión</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-collapse -->
      </div>
    </div>
<!-- /NavbarHeader -->