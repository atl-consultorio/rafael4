<?php
include_once '../dao/conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h1> Iniciar sesion </h1>
    <form action="" method="POST">
    <label for="">Documento </label> 
    <input type="text" name="Cedula" placehorder="Documento">
    <br>
    <br> 
    <label for="">Contraseña </label> 
    <input type="password" name="Contrasena" placehorder="Contrasena">
    <br>
    <br> 
    <button type="submit"> Iniciar sesion </button>
    <button type="submit"><a href= '../usuario/registro.php'>Registrarse </a> </button>
   

</form>

    </div> 

    <?php
    include_once '../dao/conexion.php';
    //capturando las variables de formulario inicio de sesion//
    if ($_POST) {
     $Documento= $_POST['Cedula'];
     $Contrasena= $_POST ['Contrasena'];
     $sql_consultar_usu="SELECT * FROM tbl_usuario WHERE dni='$Documento' and contrasena='$Contrasena'";
     $consultar_usu= $pdo-> prepare ($sql_consultar_usu);
     $consultar_usu-> execute();
     $resultado_usu=$consultar_usu->fetchAll();
     var_dump($resultado_usu);
     foreach ($resultado_usu as $datos) {
          if ($datos['dni']==$Documento and $datos['contrasena']==$Contrasena) {
         header('location:perfil.php');
        } else {
         echo "usuario o contraseña incorrecta"; 
     }  
   }
    }

    ?>
</body>
</html>
