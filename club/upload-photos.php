<?php

include_once "../framework/sessions.php";
 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-Upload photos Club</title>
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
	<!-- Generic page styles -->
	<link rel="stylesheet" href="../css/fileupload/style.css">
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="../css/fileupload/jquery.fileupload.css">
	<link rel="stylesheet" href="../css/fileupload/jquery.fileupload-ui.css">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="../fileupload/css/query.fileupload-noscript.css"></noscript>
	<noscript><link rel="stylesheet" href="../fileupload/css/jquery.fileupload-ui-noscript.css"></noscript>

	<!-- script -->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/keep-session.js"></script>
 	



</head>

<body> 
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
?>
	<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
	<div class="row">
		<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
			<div class="row">
				<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Subir fotos</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
								<div class="container">

								    <!-- The file upload form used as target for the file upload widget -->
								    <form id="fileupload" action="../framework/fileupload/php" method="POST" enctype="multipart/form-data">
										<!-- Submit additional form data -->
									<!--	<input type="hidden" name="example1" value="test">
									    <div class="row">
									        <label>Example: <input type="text" name="example2"></label>
									    </div>-->
								    	
								        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
								        <div class="row fileupload-buttonbar">
								            <div class="col-lg-7">
								            	
								                <!-- The fileinput-button span is used to style the file input field as button -->
								                <span class="btn btn-success fileinput-button">
								                    <i class="glyphicon glyphicon-plus"></i>
								                    <span>Añadir fotos</span>
								                    <input type="file" name="files[]" multiple>
								                </span>
								                <button type="submit" class="btn btn-primary start">
								                    <i class="glyphicon glyphicon-upload"></i>
								                    <span>Comenzar a subir</span>
								                </button>
								                <button type="reset" class="btn btn-warning cancel">
								                    <i class="glyphicon glyphicon-ban-circle"></i>
								                    <span>Cancelar subida</span>
								                </button>
								               <!-- <button type="button" class="btn btn-danger delete">
								                    <i class="glyphicon glyphicon-trash"></i>
								                    <span>Borrar</span>
								                </button>
								                <input type="checkbox" class="toggle">-->
								                <!-- The global file processing state -->
								                <span class="fileupload-process"></span>
								            </div>
								            <!-- The global progress state -->
								            <div class="col-lg-5 fileupload-progress fade">
								                <!-- The global progress bar -->
								                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
								                </div>
								                <!-- The extended global progress state -->
								                <div class="progress-extended">&nbsp;</div>
								            </div>
								        </div>
								        <!-- The table listing the files available for upload/download -->
								        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
								        <input type="hidden" name="id-url" value="club/<?php echo $idProfile;?>/"> 
								    </form>
									   
									</div>
									<!-- The blueimp Gallery widget -->
									<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
									    <div class="slides"></div>
									    <h3 class="title"></h3>
									    <a class="prev">‹</a>
									    <a class="next">›</a>
									    <a class="close">×</a>
									    <a class="play-pause"></a>
									    <ol class="indicator"></ol>
									</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td class="title">
        	<label>
        		Title: 
        		<input name="title[]" required>
        	</label>
        </td>
        <td>
            <p class="size">Procesando...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Comenzar</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="files/club/<?php echo $idProfile;?>/"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

										
										
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MiPerfil -->

<script src="../js/fileupload/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="../js/fileupload/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="../js/fileupload/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="../js/fileupload/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="../js/fileupload/jquery.fileupload-image.js"></script>
<!-- The File Upload validation plugin -->
<script src="../js/fileupload/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="../js/fileupload/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="../js/fileupload/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<script type="text/javascript"> 

	function submitPhotoClub(nameFile){
		var idProfile = <?php echo $_SESSION['id_user']; ?>	;
		var token =  "<?php echo $_SESSION['token']; ?>";
		var params = "/" + idProfile + "/" + token;

		var date = $("#date-goToPub").val();

		  //* <baseUrl> + /actions/photoLocal.php/<idLocalProfile>/<Token>
		var url = "../develop/actions/photoLocal.php" + params;
		urlPhoto = "../framework/fileupload/php/files/club/" + '<?php echo $idProfile;?>' + "/" + nameFile;

		$.ajax({
				url:url,
				dataType: "json",
				type: "POST",
				//async: false,
				data: {
					url:urlPhoto,
					title:"prueba",
				},
				complete: function(r){
					var json = JSON.parse(r.responseText);	
					
				  	$("#dialog-goToPub-1").html("<b>Asistirás al local el " + date + "</b>");
				},
				onerror: function(e,val){
					alert("Error al buscar eventos de usuario");
				}
		});


	}

    $('#fileupload').bind('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            alert(data.result.files[index].name);
            submitPhotoClub(data.result.files[index].name);
        });
    });
</script>

<script src="../js/profile-test2.js"></script>
</body>
</html>
