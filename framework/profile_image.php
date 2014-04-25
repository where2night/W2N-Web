<?php
$path = "../profilesImages/";

	$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									
									echo "<img id='profile_photo' src='http://www.where2night.es/profilesImages/".$actual_image_name."' class='preview' style='width:300px;margin:10px;padding:10px;''>";
								}
							else
								echo "Lo sentimos, se ha producido un fallo";
						}
						else
						echo "Tamaño de imagen máximo: 1 MB";					
						}
						else
						echo "Formato inválido";	
				}
				
			else
				echo "Por favor, seleccione una imagen";
				
			exit;
		}
?>