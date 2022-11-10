<?php
session_start();

$val = 0;
if(isset($_POST['nombre'])){
    $_POST['nombre'] = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $_POST['nombre'] = trim($_POST['nombre']); //quita espacios al inicio
    $_POST['nombre'] = htmlspecialchars($_POST['nombre']); //limpia caracteres
    $_POST['nombre'] = stripslashes($_POST['nombre']); //remueve diagonales
    if(empty($_POST ['nombre'])){
        echo "<p class='alert1'>Introduzca un nombre </p>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['apep'])){
    $_POST['apep'] = filter_var($_POST['apep'],FILTER_SANITIZE_STRING);
    $_POST['apep'] = trim($_POST['apep']); //quita espacios al inicio
    $_POST['apep'] = htmlspecialchars($_POST['apep']); //limpia caracteres
    $_POST['apep'] = stripslashes($_POST['apep']); //remueve diagonales
    if(empty($_POST ['apep'])){
        echo "<p class='alert1'>Introduzca un apellido paterno</p>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['apem'])){
    $_POST['apem'] = filter_var($_POST['apem'],FILTER_SANITIZE_STRING);
    $_POST['apem'] = trim($_POST['apem']); //quita espacios al inicio
    $_POST['apem'] = htmlspecialchars($_POST['apem']); //limpia caracteres
    $_POST['apem'] = stripslashes($_POST['apem']); //remueve diagonales
    if(empty($_POST ['apem'])){
        echo "<p class='alert1'>Introduzca un apellido materno</p>";
    }else{
        $val + 1;
    }
}
// if (isset($_POST['email'])) {
//     $_POST['email'] = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        
//         if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
//             echo "<p class='alert1'>'Formato de email incorrecto'</p>"; 
//         }else{
//             $val + 1;
//         }
// }else{
//     echo "<p class='alert1'>'Introduzca un correo electronico'</p>"; 
// }

 if(isset($_POST['email'])){
     $_POST['email'] = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
     // Queremos que el email tenga un formato adecuado
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST['email'] )) {
           echo "<p class='alert1'>'Formato de email incorrecto'</p>";
             }
 if (empty($_POST["email"])) {
     echo "<p class='alert1'>Introduzca un correo electronico</p>";
 }
    
 }

if(isset($_POST['ndom'])){
    $_POST['ndom'] = filter_var($_POST['ndom'],FILTER_SANITIZE_NUMBER_INT);
    if(empty($_POST ['ndom'])){
        echo "<p class='alert1'>Introduzca un numero de domicilio</p>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['tel'])){

    $_POST['tel'] = preg_replace('/[^\d]/', "",$_POST['tel']);
    // $_POST['telefono'] = strlen($_POST['telefono']);
    $ar= strlen($_POST['tel']);
    if ($ar < 10 ){
    
        
        echo "<p class='alert1'>Formato de telefono incorrecto</p>";
    }
    if(empty($_POST ['tel'])){
        echo "<p class='alert1'>Introduzca un número telefonico</p>";
    }else{
        $val + 1;
    }
    
}

if(isset($_POST['calle'])){
    $_POST['calle'] = filter_var($_POST['calle'],FILTER_SANITIZE_STRING);
    $_POST['calle'] = trim($_POST['calle']); //quita espacios al inicio
    $_POST['calle'] = htmlspecialchars($_POST['calle']); //limpia caracteres
    $_POST['calle'] = stripslashes($_POST['calle']); //remueve diagonales
    if(empty($_POST ['calle'])){
        echo "<p class='alert1'>Introduzca el nombre de una calle</p>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['col'])){
    $_POST['col'] = filter_var($_POST['col'],FILTER_SANITIZE_STRING);
    $_POST['col'] = trim($_POST['col']); //quita espacios al inicio
    $_POST['col'] = htmlspecialchars($_POST['col']); //limpia caracteres
    $_POST['col'] = stripslashes($_POST['col']); //remueve diagonales
    if(empty($_POST ['col'])){
        echo "<p class='alert1'>Introduzca una colonia</p>";
    } else {
        $val + 1;
    }
}

if(isset($_POST['serv'])){
    $_POST['serv'] = filter_var($_POST['serv'],FILTER_SANITIZE_STRING);
    $_POST['serv'] = trim($_POST['serv']); //quita espacios al inicio
    $_POST['serv'] = htmlspecialchars($_POST['serv']); //limpia caracteres
    $_POST['serv'] = stripslashes($_POST['serv']); //remueve diagonales
    if(empty($_POST ['serv'])){
        echo "<p class='alert1'>Seleccione un servicio</p>";
    } else {
        $val + 1;
    }
}

if(isset($_POST['mun'])){
    $_POST['mun'] = filter_var($_POST['mun'],FILTER_SANITIZE_STRING);
    $_POST['mun'] = trim($_POST['mun']); //quita espacios al inicio
    $_POST['mun'] = htmlspecialchars($_POST['mun']); //limpia caracteres
    $_POST['mun'] = stripslashes($_POST['mun']); //remueve diagonales
    if(empty($_POST ['mun'])){
        echo "<div class='alert1'>Introduzca un municipio</div>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['pw'])){
   
    if(empty($_POST ['pw'])){
        
       
    $digitos= strlen($_POST['pw']);
if($digitos<10){
    echo "<p class='alert1'>La contraseña es demacidao corta </p>";
}
echo "<p class='alert1'>Introduzca una contraseña</p>";

    }else{
        $val + 1;
    }
}
if(isset($_POST['pw2'])){
   
    if(empty($_POST ['pw2'])){
        
     if($_POST['pw2']!=$_POST['pw']){
        echo "<p class='alert1'>La contraseña de confirmación no corresponde con la anterior</p>";
     }
echo "<p class='alert1'>Confirme su contraseña</p>";

    }else{
        $val + 1;
    }
}


  ?>

<?php

// switch($val == 9) {
    include 'Conexion.php';
    if(isset($_POST ['nombre']) && !empty($_POST ['nombre']) &&
    isset($_POST ['apep']) && !empty($_POST ['apep']) &&
    isset($_POST ['apem']) && !empty($_POST ['apem']) &&
    isset($_POST ['calle']) && !empty($_POST ['calle']) &&
    isset($_POST ['ndom']) && !empty($_POST ['ndom']) && 
    isset($_POST ['col']) && !empty($_POST ['col']) &&
    isset($_POST ['mun']) && !empty($_POST ['mun']) &&
    isset($_POST ['tel']) && !empty($_POST ['tel']) &&
    isset($_POST ['serv']) && !empty($_POST ['serv']) &&
    isset($_POST ['email']) && !empty($_POST ['email']) &&
    isset($_POST ['rf']) && !empty($_POST ['rf']) &&
    isset($_POST ['pw']) && !empty($_POST ['pw']) &&
    isset($_POST ['pw2']) && !empty($_POST ['pw2']) &&
    $_POST['pw'] == $_POST['pw2']) {
    $con = mysqli_connect($host, $user,$password,$db) 
            or die("problema al conectar");
    mysqli_select_db($con,$db)
    or die("problema al conectar BD");
    
    mysqli_query($con, "INSERT INTO personal (nombre, apellido1, apellido2, calle, numero_domicilio, colonia, municipio, telefono, servicio_a_cargo, email, id_refugio,Contraseña) VALUES "." ('$_POST[nombre]', '$_POST[apep]', '$_POST[apem]', '$_POST[calle]', '$_POST[ndom]', '$_POST[col]', '$_POST[mun]', '$_POST[tel]', '$_POST[serv]', '$_POST[email]', '$_POST[rf]','$_POST[pw]')");
    echo 'datos insertados.<br>';
    
    echo "Nombre:" . $_POST['nombre'] . "<br>";
    echo "Apellido Paterno:" . $_POST['apep'] . "<br>";
    echo "Apellido Materno:" . $_POST['apem'] . "<br>";
    echo "Calle:" . $_POST['calle'] . "<br>";
    echo "Numero domicilio:" . $_POST['ndom'] . "<br>";
    echo "Colonia:" . $_POST['col'] . "<br>";
    echo "Municipio:" . $_POST['mun'] . "<br>";
    echo "Telefono:" . $_POST['tel'] . "<br>";
    echo "Servicio:" . $_POST['serv'] . "<br>";
    echo "Correo:" . $_POST['email'] . "<br>";
    echo "Refugio:" . $_POST['rf'] . "<br>";
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAgregarPer.css">
    <title>Document</title>
</head>
<body>
<div class="contenedor">
    
<div class="formularios">
<form name="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate="novalidate" >
<h1>Complete la información requerida</h1>
<br>
        <label>Nombre</label>
        <input type="text" name="nombre" required="">
        <br><br>
        
        <label>Apellido Paterno</label>
        <input type="text" name="apep" required="">
        <br><br>
        
        <label>Apellido Materno</label>
        <input type="text" name="apem" required="">
        <br><br>
        
        <label>Calle</label>
        <input type="text" name="calle" required="">
        <br><br>
        
        <label>Número de domicilio</label>
        <input type="text" name="ndom" required="">
        <br><br>
        
        <label>Colonia</label>
        <input type="text" name="col" required="">
        <br><br>
        
        <label>Municipio</label>
        <input type="text" name="mun" required="">
        <br><br>
        
        <label>Teléfono</label>
        <input type="text" name="tel" required="">
        <br><br>

        <label>Correo electrónico</label>
        <input type="email" name="email" required="">
        <br><br>

        <label>Servicio a cargo</label>
        <select name="serv" id="fr">
            <option value="d">Recepcion</option>
            <option value="e">Limpieza</option>
            <option value="f">Promocion</option>
        </select>

        <!-- <label>Servicio a cargo</label>
        <input type="text" name="serv" required=""> -->
        <br><br>

        <label>Refugio</label>
        <select name="rf" id="fr">
            <option value="a">Gira</option>
            <option value="b">Patitas Felices</option>
            <option value="c">PetsCerritos</option>
        </select>
        <!-- <label>Refugio</label>
        <input type="text" name="ref"> -->
        <br><br>
        
        <label>Contraseña</label>
        <input type="password" name="pw" required="">
        <br><br>
    
        <label>Confirmar Contraseña<label>
        <input type="password" name="pw2" required="">
        <br>

        <button type="submit" id="boton" class="enviar">Enviar datos</button>
        <!-- <button type="submit" id="boton" class="enviar">Cerar sesion</button>  -->
        <a href="InicioRefugio.php"><button type="button">Volver</button></a>
</form>
<?php
//echo "<p><a href='CerrarS.php'>Cerrar Sesion</a></p>";
?>
</body>
    </div>
        </div>
</html>