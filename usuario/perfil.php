
<?php
echo "Bienvenidos a tu perfíl ";

?>
 <?php 
    //include_once '../dao/conexion.php';
    //capturando las variables de formulario inicio de sesion//
   
   //$sql_consultar_nombre_usu = " SELECT * FROM tbl_usuario WHERE dni='$dni' and nombre='$nombre'";
   //$consultar_nombre_usu = $pdo-> prepare ($sql_consultar_nombre_usu);
   //$consultar_nombre_usu-> execute();
   //$resultado_nombre_usu=$consultar_nombre_usu->fetchAll();
   //var_dump ($resultado_nombre_usu);
    ?>
 <?php

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
<button type="submit"><a href= '../usuario/editar_usu.php'>datos de usuario</a> </button>
<button type ="submit"><a href='../cita.php'>registrar cita </a></button>
<button type ="submit"><a href="agenda.php">agenda de citas</a></button>

 </body>
 </html>