<?php

	
	require"Usuario.php";

	$nombre=$_POST['nombre'];
	$edad=$_POST['edad'];
	$correo=$_POST['correo'];
	$clave=$_POST['clave'];
	$foto=$_FILES['archivo']['name'];

	$accion=$_POST['ingresar'];

    //var_dump($_POST);
    $fotoyextension = explode(".", $foto);
    $nombrefoto = $nombre."_".$edad."_".$correo."_".$clave.".".$fotoyextension[1];
    
    $tipoArchivo = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);

	if ($accion=="ingresar"){

        $retorno["Exito"] = FALSE;

		if (!empty($_FILES['archivo'])) {

			if($_FILES["archivo"]["size"] > 500000000) {
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "El archivo es demasiado grande. Verifique!!!";
			echo "El archivo es demasiado grande. Verifique!!!";
			
		    }elseif($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif" && $tipoArchivo != "png")
		    {
  				
   				$retorno["Exito"] = FALSE;
  				$retorno["Mensaje"] = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
   				echo "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
   			
   			}else
   			{
   				$retorno["Exito"] = TRUE;
				move_uploaded_file($_FILES['archivo']['tmp_name'], "Fotos/$nombrefoto");
		        $usuario = new Usuario($nombre,$edad,$correo,$clave,$nombrefoto);
		        $usuario->Guardar();
		        header("location:Carga.php");
   			}

			return $retorno;
				
		    }
	

	}
	elseif ($accion=="eliminar") {

		Usuario::Borrar(new Usuario($nombre,$edad,$correo,$clave,$nombrefoto));
	
	}
	else{

	move_uploaded_file($_FILES['archivo']['tmp_name'], "Fotitos/$nombrefoto");
	Alumno::Modificar(new alumno($nombre,$apellido,$legajo,$nombrefoto));
	}

header("location:Carga.php");
?>