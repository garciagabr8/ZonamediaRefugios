<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styleINICIOS.css">
<title>Iniciar sesión usuarios</title>
</head>
<body>
  <div class="contenedor">
  <div class="for">
  <form name="form" action="InicioSUSU.php"    method="post" novalidate="novalidate" >
  <section class="tit">
      <h2>Iniciar sesión</h2>
      <table>
        <tr>
            <td>Nombre del usuario<td>
        <td><input class= "ref"type="text" name="nombre" required=""></td>
        </tr>
        <tr><td>Contraseña<td>
        <td><input class= "ref" type="password" name="pw" required=""></td>
        </tr>
      </table>
      <button type="submit" id="botons" class="bot">Inciar Sesión</button>
      <header>
          <ul id="op">
            <br>        
              <p><a href="UsuariosNormales.php">Crea un perfil de usuario</a><br></p>
            <br>
              <a href="Menu.php"><button type="button" class="bots">Volver</button></a>
                <!-- <p><a href="Usuarios.php">Crea un perfil del personal del refugios</a></p>-->
          </ul>  
      </header>
</form>
</form>

</body>
</div>
</html>