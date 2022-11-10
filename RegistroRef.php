<?php
$val = 0;
if(isset($_POST['nombre'])){
    $_POST['nombre'] = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $_POST['nombre'] = trim($_POST['nombre']); //quita espacios al inicio
    $_POST['nombre'] = htmlspecialchars($_POST['nombre']); //limpia caracteres
    $_POST['nombre'] = stripslashes($_POST['nombre']); //remueve diagonales
    if(empty($_POST ['nombre'])){
        echo "<p class='alert1'>Introduzca el nombre de un refugio</p>";
    }else{
        $val + 1;
    }
}



 if(isset($_POST['email'])){
     $_POST['email'] = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
     // Queremos que el email tenga un formato adecuado
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST['email'] )) {
           echo "<p class='alert1'>Formato de email incorrecto</p>";
             }
 if (empty($_POST["email"])) {
     echo "<p class='alert1'>Introduzca un correo eléctronico</p>";
 }
    
 }

if(isset($_POST['capacidad'])){
    $_POST['capacidad'] = filter_var($_POST['capacidad'],FILTER_SANITIZE_NUMBER_INT);
    if(empty($_POST ['capacidad'])){
        echo "<p class='alert1'>Introduzca la capacidad de un refugio</p>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['telefono'])){

    $_POST['telefono'] = preg_replace('/[^\d]/', "",$_POST['telefono']);
    // $_POST['telefono'] = strlen($_POST['telefono']);
    $ar= strlen($_POST['telefono']);
    if ($ar < 10 ){
    
        
        echo "<p class='alert1'>Formato de teléfono incorrecto</p>";
    }
    if(empty($_POST ['telefono'])){
        echo "<p class='alert1'>Introduzca el número telefónico del refugio</p>";
    }else{
        $val + 1;
    }
    
}



if(isset($_POST['n_establecimiento'])){
    $_POST['n_establecimiento'] = filter_var($_POST['n_establecimiento'],FILTER_SANITIZE_STRING);
    $_POST['n_establecimiento'] = trim($_POST['n_establecimiento']); //quita espacios al inicio
    $_POST['n_establecimiento'] = htmlspecialchars($_POST['n_establecimiento']); //limpia caracteres
    $_POST['n_establecimiento'] = stripslashes($_POST['n_establecimiento']); //remueve diagonales
    if(empty($_POST ['n_establecimiento'])){
        echo "<p class='alert1'>Introduzca el número del establecimiento del refugio</p>";
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
        echo "<p class='alert1'>Introduzca la calle donde se ubica el refugio</p>";
    }else{
        $val + 1;
    }
}

if(isset($_POST['colonia'])){
    $_POST['colonia'] = filter_var($_POST['colonia'],FILTER_SANITIZE_STRING);
    $_POST['colonia'] = trim($_POST['colonia']); //quita espacios al inicio
    $_POST['colonia'] = htmlspecialchars($_POST['colonia']); //limpia caracteres
    $_POST['colonia'] = stripslashes($_POST['colonia']); //remueve diagonales
    if(empty($_POST ['calle'])){
        echo "<p class='alert1'>Introduzca la colonia donde se ubica el refugio</p>";
    } else {
        $val + 1;
    }
}

if(isset($_POST['municipio'])){
    $_POST['municipio'] = filter_var($_POST['municipio'],FILTER_SANITIZE_STRING);
    $_POST['municipio'] = trim($_POST['municipio']); //quita espacios al inicio
    $_POST['municipio'] = htmlspecialchars($_POST['municipio']); //limpia caracteres
    $_POST['municipio'] = stripslashes($_POST['municipio']); //remueve diagonales
    if(empty($_POST ['municipio'])){
        echo "<div class='alert1'>Introduzca el municipio donde se ubica el refugio</div>";
    }else{
        $val + 1;
    }
}





 //Prueba a cambiar el texto cadena por otro
if(isset($_POST['pw'])){
   
    if(empty($_POST ['pw'])){
        
       
    $digitos= strlen($_POST['pw']);
if($digitos<10){
    echo "<p class='alert1'>La contraseña es demaciado corta </p>";
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
include 'conexion.php';
if(isset($_POST ['nombre']) && !empty($_POST ['nombre']) &&
isset($_POST ['capacidad']) && !empty($_POST ['capacidad']) &&
isset($_POST ['telefono']) && !empty($_POST ['telefono']) &&
isset($_POST ['email']) && !empty($_POST ['email']) &&
isset($_POST ['n_establecimiento']) && !empty($_POST ['n_establecimiento']) && 
isset($_POST ['calle']) && !empty($_POST ['calle']) &&
isset($_POST ['colonia']) && !empty($_POST ['colonia']) &&
isset($_POST ['municipio']) && !empty($_POST ['municipio']) &&
isset($_POST ['pw']) && !empty($_POST ['pw']) &&
isset($_POST ['pw2']) && !empty($_POST ['pw2']) &&
$_POST['pw'] == $_POST['pw2']) {
$con = mysqli_connect($host, $user,$password,$db) 
        or die("problema al conectar");
mysqli_select_db($con,$db)
or die("problema al conectar BD");

mysqli_query($con, "INSERT INTO refugios (Nombre, Capacidad, Telefono, Email, numero_establecimiento, Calle, Colonia, Municipio, Contraseña) VALUES ".
"('$_POST[nombre]', '$_POST[capacidad]', '$_POST[telefono]', '$_POST[email]','$_POST[n_establecimiento]','$_POST[calle]','$_POST[colonia]','$_POST[municipio]','$_POST[pw]')");
echo "<div class='alert2'>Se creo un nuevo refugio animal. Bienvenido!</div>";
echo "Nombre:" . $_POST['nombre'] . "<br>";
echo "Capacidad:" . $_POST['capacidad'] . "<br>";
echo "Telefono:" . $_POST['telefono'] . "<br>";
echo "Email:" . $_POST['email'] . "<br>";
echo "Numero establecimiento:" . $_POST['n_establecimiento'] . "<br>";
echo "Calle:" . $_POST['calle'] . "<br>";
echo "Colonia:" . $_POST['colonia'] . "<br>";
echo "Municipio:" . $_POST['municipio'] . "<br>";
}

#https://diego.com.es/seguridad-web-en-php
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styleformularioRef.css">
<title>Insertar Datos</title>
</head>
<body>
<div class="contenedor">
<div class="formularios">

<section class="registro">
<form name="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate="novalidate" >
   
<section class="tit">
   <h3>Ingrese todos los datos solicitados para la creación del perfil de un refugio animal</h3>   

<br>

<label> Nombre del Refugio</label>
<input type="text" name="nombre" required="">
<br><br>


<label>Capacidad</label>
<input  type="number" name="capacidad" min="1" max="" required="">
<br><br>


<label>Teléfono</label>
<input  type="tel" name="telefono" required="">
<br><br>


<label>Email</label>
<input class= "ref" type="email" name="email" required=""
equired value="
        <?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
<br><br>

<label>Número Establecimiento</label>
<input class= "ref" type="text" name="n_establecimiento" required="">
<br><br>

<label>Calle</label>
<input class= "ref" type="text" name="calle" required="">
<br><br>

<label>Colonia</label>
<input class= "ref" type="text" name="colonia" required="">
<br><br>

<label>Municipio</label>
<input class= "ref" type="text" name="municipio" required="">
<br><br>

<label>Contraseña</label>
<input class= "ref" type="password" name="pw" required="">
<br><br>

<label>Confirmar Contraseña</label>
<input class= "ref" type="password" name="pw2" required="">
<br><br>


<button type="submit" id="boton1" >Crear perfil de refugio</button>
<a href="LoginRF.php"><button type="button">Volver</button></a>



</form>
</body>
</div>
    </div>
</html>

