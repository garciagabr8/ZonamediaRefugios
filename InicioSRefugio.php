<?php

session_start();

  // Obtengo los datos cargados en el formulario de login.
  $nombre = $_POST['nombre'];
  $passwo = $_POST['pw'];
   
  // Datos para conectar a la base de datos.
 
include 'Conexion.php';
  // Crear conexión con la base de datos.
  $con= mysqli_connect($host, $user, $password, $db) or die ("problema al conectar");
// Validar la conexión de base de datos.
mysqli_select_db($con, $db) or die ("problema al conectar BD");

   
  // Consulta segura para evitar inyecciones SQL.
  //$sql = sprintf ( "SELECT * FROM usuarios WHERE email = ' %s ' AND password = ' %s ' ” , mysqli_real_escape_string ( $ email ) , mysqli_real_escape_string ( $ password ) ) ;
  $registro=mysqli_query ($con, "SELECT * FROM refugios WHERE nombre ='$_POST[nombre]'AND Contraseña='$_POST[pw]'") or die ("problema en consultar:" . mysqli_error($con));
  // Verificando si el usuario existe en la base de datos.
  if ($reg= mysqli_fetch_array($registro)){
    // Guardo en la sesión el email del usuario.
    $_SESSION['nombre'] = $nombre;
    // Redirecciono al usuario a la página principal del sitio.
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: InicioRefugio.php"); 
  }else{
    echo 'El nombre o el password es incorrecto, <a href="loginRF.php">vuelva a intenarlo</a>.<br/>';
  }
 
?>