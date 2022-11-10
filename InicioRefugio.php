<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInicioRef.css"/>
    <title></title>
</head>
<body> <form name="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form"> 
        <h1>Información:</h1>
        <br>
        <div class="form1">
            <img src='pet.jpg' class='imgRedonda'/><div class="nom">
            <h3>BIENVENID@:</html><?php 
            echo ucwords($_SESSION['nombre']);?></h3></div>
        </div>
        <div class="form2">
            <input class="botonmoo" type="submit" name="per" value="Ver Personal">
            <a href="Usuarios.php"><input class="au" type="button" value="Agregar Personal"></a>
            <input class="botonan" type="submit" name="anim" value="Ver Animales">
            <input type="text" class="boto1" name="nombrea">
            <input class="boto" type="submit" name="bora" value="Borrar Animales">
            <input type="text" class="boto2" name="nombrep">
            <input class="botos" type="submit" name="borrap" value="Borrar Personal">
        </div>
        <div class="form3">
            <a href="EditarPerfil.php"><input class="ed"type="button" value="Editar Perfil"></a>
            <a href="cerrars.php"><input class="cs"type="button" value="Cerrar Sesión"></a><br><br><div class="ali">
            <a href="LoginRF.php"><button class="cv" type="button">Volver</button></a></div>
        </div>
        
</html>
<?php
if(isset($_POST['per'])){
    Include 'Conexion.php';
    $con = mysqli_connect($host, $user,$password,$db) or die ("Problema al conectar");
    mysqli_select_db($con,$db) or die ("Problema al conectar BD");
    $registro=mysqli_query($con, "SELECT * FROM personal") or die ("Problema al consultar: " . mysqli_error($con));
    ?> <html>
        <div class="tabla">
        <h2 align="top">Lista de personal</h2>
        <table width="70%" border="1px" align="top">
        <tr align ="top">
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Numero telefonico</td>
        <td>E-Mail</td>
        <td>servicio a cargo</td>
        </tr></html>
        <?php 
        while ($reg= mysqli_fetch_array($registro)){?><tr>
            <td><?php echo $reg['nombre']?></td>
            <td><?php echo $reg['apellido1']?></td>
            <td><?php echo $reg['telefono']?></td>
            <td><?php echo $reg['email']?></td> 
            <td><?php echo $reg['servicio_a_cargo']?></td>
        </div>
    <?php 
	}
}
if(isset($_POST['anim'])){
    Include 'Conexion.php';
    $con = mysqli_connect($host, $user,$password,$db) or die ("Problema al conectar");
    mysqli_select_db($con,$db) or die ("Problema al conectar BD");
    $registro=mysqli_query($con, "SELECT * FROM animales") or die ("Problema al consultar: " . mysqli_error($con));
    ?> <html><div class="tabla">
            <table>
            <h2 align="top">Animales disponibles</h2>

              <tr>
                <td><strong>Nombre</strong></td>
                <td><strong>Tipo</strong></td>
                <td><strong>raza</strong></td>
              </tr>
              </html> <?php
            while ($reg = mysqli_fetch_array($registro)){ 
              ?>
              <html>
              <tr>
              <td><?php echo $reg['nombre_animal'] . "\n"; ?> <html> </td>
              <td></html> <?php echo $reg['tipo'] . "\n"; ?> <html></td>
              <td></html> <?php echo $reg['raza'] . "<br>"; ?> <html></td>
            </tr>
            </form></div>
        </html> <?php
        }           
}

if(isset($_POST['borrap'])){
    Include 'Conexion.php';
    $con = mysqli_connect($host, $user,$password,$db) or die ("Problema al conectar");
    
    mysqli_select_db($con,$db) or die ("Problema al conectar BD");
    
    $registro=mysqli_query($con, "SELECT nombre FROM personal") or die ("Problema al consultar: " . mysqli_error($con));
    

    if($regs= mysqli_fetch_array($registro)){
        mysqli_query($con, "DELETE FROM personal WHERE nombre = '$_POST[nombrep]'");
        echo " Datos eliminados";
        }else{
        echo "Datos no eliminados";
        }
    
}

if(isset($_POST['bora'])){
    Include 'Conexion.php';
    $con = mysqli_connect($host, $user,$password,$db) or die ("Problema al conectar");
    
    mysqli_select_db($con,$db) or die ("Problema al conectar BD");
    
    $registro=mysqli_query($con, "SELECT nombre_animal FROM animales") or die ("Problema al consultar: " . mysqli_error($con));
    

    if($regs= mysqli_fetch_array($registro)){
        mysqli_query($con, "DELETE FROM animales WHERE nombre_animal = '$_POST[nombrea]'");
        echo " Datos eliminados";
        }else{
        echo "Datos no eliminados";
        }
}
?>
</div>
<html>
</body>
</html>