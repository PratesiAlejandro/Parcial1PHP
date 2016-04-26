<?php

require"Usuario.php";

Usuario::CrearTablaUsuarios();

?>


<!DOCTYPE html>
<html lang="en-US">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title> Archivos </title>

  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="css/animacion.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
 
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
  <script type="text/javascript" src="js/funcionAutoCompletar.js"></script>

  <!--script type="text/javascript" src="js/currency-autocomplete.js"></script-->
</head>
 <body>
    <div class="CajaUno animated bounceInDown">

            <form action="Ingreso.php" method="post" enctype="multipart/form-data" >
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese el Nombre"/>
            <br/>
            <input type="text" name="edad"  id="edad" placeholder="Ingrese su Edad" /> 
            <br>
            <input type="text" name="correo"  id="correo" placeholder="Ingrese correo" require="mail"/>
          
            <br>
            <input type="text" name="clave"  id="clave" placeholder="Ingrese clave" />
            <br>
            <br>
            <input type="file" name="archivo" />
               <hr>
              <br>
          
            <input type="submit" id="botonIngreso" class="MiBotonUTN" value="ingresar" onclick="Validar();" name="ingresar" />
            <br>
            <input type="submit" id="botonIngreso" class="MiBotonUTN" value="eliminar" name="ingresar"/>
            
            </form>

<div id="outputbox">
    <p id="outputcontent">*Nota: Eliminar por edad</p>
  </div>

    </div>
      <div class="CajaEnunciado animated bounceInLeft">
      <h2>Usuarios:</h2>
            
         <?php include"Archivos/tablaUsuarios.php"; ?> 

    </div>
 
          
  </body>
</html>
