<?php

class Usuario
{
	private $nombre;
	private $edad;
	private $correo;
	private $clave;
	private $foto;


	public function GetNombre()
	{
		return $this->nombre;
	}

	public function GetClave()
	{
		return $this->clave;
	}

	public function GetEdad()
	{
		return $this->edad;
	}

	public function GetCorreo()
	{
		return $this->correo;
	}
	public function GetFoto()
	{
		return $this->foto;
	}

	public function __construct($nom, $ed,$cor, $cla,$fo){

		$this->nombre = $nom;
		$this->edad = $ed;
		$this->correo = $cor;
		$this->clave=$cla;
		$this->foto=$fo;

	}


	public function Guardar()
	{
		$archivo=fopen("Archivos/usuarios.txt","a");
		$renglon=$this->nombre."=>".$this->edad."=>".$this->correo."=>".$this->clave."=>".$this->foto."\n";
		fwrite($archivo, $renglon);
		fclose($archivo);

		//echo "Registro Guardado";
	}

	public static function CrearTablaUsuarios()
	{
		if(file_exists("Archivos/usuarios.txt"))
		{	
			$cadena=" <table border=1><th> Nombre </th><th> Edad </th><th> Correo </th><th> Clave </th><th> Foto </th>";

			$archivo = fopen("Archivos/usuarios.txt","r");

			while (!feof($archivo)) {
				
				$archivoAuxiliar = fgets($archivo);

				$alumnos = explode("=>", $archivoAuxiliar);

				$alumnos[0] = trim($alumnos[0]);
				if($alumnos[0] != "")

					$cadena = $cadena."<tr> <td> ".$alumnos[0]."</td> <td> ".$alumnos[1]."</td><td>".$alumnos[2]."</td><td>".$alumnos[3]."</td><td> <img width=50px height=50px style=border-radius:50% src=Fotos/".$alumnos[4]."></img></td></tr> "; 
			}

			$cadena = $cadena." </table>";
			fclose($archivo);

			$archivo=fopen("Archivos/tablaUsuarios.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
		else
		{
			$cadena = "No hay Usuarios";

			$archivo = fopen("Archivos/tablaUsuarios.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
	
	}

	public static function Borrar($p)
	{
     
	$arrPersonas = array();
		
		$a = fopen("Archivos/usuarios.txt", "r");
		
		while(!feof($a)){  //mientras no encuentre el fin del archivo o el ultimo renglon, sigue. Devuvel treu o false depende si llego o no
		
			$arr = explode("=>", fgets($a));

			if(count($arr) > 1){
				if((int)$arr[1] == $p->GetEdad())
				{

					continue;  //lo saltea es decir no lo agrega al array.

				}
				$persona = new Usuario($arr[0],$arr[1],$arr[2],$arr[3],$arr[4]);
				array_push($arrPersonas, $persona); //agrega esa persyona al array a lo ultimo del array.

			}

		}
		fclose($a);
		
		// var_dump($arrPersonas);
		// die();

		$a = fopen("Archivos/usuarios.txt", "w"); //aca se modifica el txt, aca queda el txt en blanco
		foreach ($arrPersonas as $aux)
		 {

			fwrite($a, $aux->GetNombre()."=>".$aux->GetEdad()."=>".$aux->GetCorreo()."=>".$aux->GetClave()."=>".$aux->GetFoto()."\r\n");
		 }
		fclose($a);


	}






}
?>