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
			<ul class="nav navbar-nav navbar-left">
			<li class="dropdown hidden-xs">
						<a class="btn dropdown-toggle" data-toggle="dropdown" style="box-shadow:none;border-bottom:0px;background-color:#000;border-color:#ff6b24">
							<i class="glyphicon glyphicon-warning-sign"style="color:#ff6b24"></i>
							<span class="count" style="color:#34d1be">8</span>
						</a>
						<ul class="dropdown-menu notifications-list"style="border-radius:0px;box-width:300px">
							
							<li class="item-header"style="line-height:15px;">Tienes 8 peticiones de amistad</li>
							
							
							<li class="item"style="line-height:15px;">
								<a href="#">
									<i class="glyphicon glyphicon-user"style="color:#ff6b24;"></i>
									<span class="content">Fulanito desea ser tu amigo</span><br>
									<span class="time"><i class="glyphicon glyphicon-time"></i> hace 13 min.</span>
								</a>
							</li>
							<li class="item-footer"style="line-height:15px;">
								<a href="#">
									Ver todas las notificaciones
								</a>
							</li>
						</ul>
					</li>
               
          
			</ul>
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