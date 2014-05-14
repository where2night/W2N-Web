<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<title>W2N-Lists Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
	<!-- Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link href="../css/events-yuli.css" media="screen" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
    <!-- script -->
	<script src="../js/fillDate.js"></script>
   	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/moment-with-langs.js"></script>
	<script src="../js/moment.min.js"></script>
	<script src="../js/keep-session.js"></script>
    <script src="../js/autoRefresh.js"></script>
    <script src="../js/lists.js"></script>
	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
 	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);


});    

        $(document).ready(function() {

           $(".datepicker").datepicker();

        });
		
		
	   $('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	
		
    </script>

	
	
	<!-- /script -->
	
</head>

<body>  <!--onload="JavaScript:timedRefresh(30000);">-->
	<style>  
		body{
			  background-color: #000;
		}
		navbar-fixed-top{
				z-index:1030;
		}
		@media (max-width: 979px){

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
 	include "templates/navbar-header.php";

 	 /*Sidebar*/
  	include "templates/sidebar.php";


$idProfile=$_SESSION['id_user']; 
$token=$_SESSION['token']; 

?>


<script>
	
var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
	
</script>
	<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Listas Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-newEvent" data-toggle="tab">Crear Lista</a></li>
											<li><a href="#tab-myEvents" data-toggle="tab">Mis Listas</a></li>
										</ul>
										
										<div class="tab-content">
										<!-- Comienza Basic-->
											<div class="tab-pane fade in active" id="tab-newEvent">
												<form class="form-horizontal" style="width:99%"role="form">
													<div class="form-group">
                                                        <label for="title" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Título Lista</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" id="Title" name="" placeholder="Título Lista">
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="description" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Descripción</label>
                                                        <div class="col-lg-9">
                                                            <textarea id="Description" class="form-control" placeholder="Descripción de la Lista..." rows="6" style="font-size:13px"></textarea>
                                                        </div>
                                                    </div>
													<div class="form-group">
														<label for="startendate" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;margin-left:0%;">Fecha fiesta</label>
														<div class="col-sm-2">
															<i  class="glyphicon glyphicon-calendar" style="margin-left:0px;font-size:18px;margin-top:3%;color:#34d1be;"></i> 
															<input type="text" id="date" class="datepicker" readonly="readonly" style="width:75%;background: #1B1E24;color: #fff;border: 1px solid #1B1E24;" placeholder=""/>
                                                         </div>   
															<label for="" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;margin-left:-5%;">Hora Inicio</label>
															<div class="col-sm-2">
                                                                <select id="hour-init" class="form-control" style="width:45%">
																	<option value="0" selected="1">HH</option>
																	<script>
																		SelectOptionRange(0,24);
																	</script>	
																</select>
																<span style="font-size:1.7em ">:</span>
																<select id="minutes-init" class="form-control"style="width:45%">
																	<option value="0" selected="1">MM</option>
																	<script>
																		SelectOptionRange(0,60);
																	</script>
																</select>
                                                            </div>
															<label for="" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Hora Fin</label>
                                                            <div class="col-sm-2">
																<select id="hour" class="form-control"style="width:45%">
																	<option value="0" selected="1">HH</option>
																	<script>
																		SelectOptionRange(0,24);
																	</script>	
																</select>
																<span style="font-size:1.7em ">:</span>
																<select id="minutes" class="form-control"style="width:45%">
																	<option value="0" selected="1">MM</option>
																	<script>
																		SelectOptionRange(0,60);
																	</script>
																</select>    
                                                            </div>
                                                          
                                                        <label for="startendate" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;margin-left:0%;margin-top: 5%">Cierre lista</label>
														<div class="col-sm-2" style="margin-top: 5%">
															<i  class="glyphicon glyphicon-calendar" style="margin-left:0px;font-size:18px;margin-top:3%;color:#34d1be;"></i> 
															<input type="text" id="dateClose" class="datepicker" readonly="readonly" style="width:75%;background: #1B1E24;color: #fff;border: 1px solid #1B1E24;" placeholder=""/>
                                                         </div>   
													 	
													<div style="float: left;;margin-top: 5%">
														<label for="startendate" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;margin-left:10%">Máx. Invitados</label>
														 <input type="text" class="form-control" id="Max" name="" placeholder="" style="width: 8%">
                                                    </div>
                                                        
                                                        
                                                        </div>
                                                        
												</form>
												<a id="" class="btn btn-success" onclick="newList();"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%;">Crear Lista</a>	
	       
											</div>
										<!-- Termina Basic -->	
										<!-- Comienza Details -->
											<div class="tab-pane fade " id="tab-myEvents">
												<div class="the-timeline">
													<ul id="myLists">
														<script>
															myLists();
														</script>
													</ul>
												</div>
											</div>
										<!-- Termina Details -->		
								</div> <!-- Termina tab-content -->
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MiPerfil --> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
</body>
</html>