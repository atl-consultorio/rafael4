
<?php

include_once 'dao/conexion.php';
	//capturar los valores del formulario//
	$fecha =$_POST['fecha'];
    $descripcion =$_POST['descripcion'];
    $hora =$_POST['hora'];


	
//sentencia sql para insertar
try {  
 $sql_insertar_cita = 'INSERT INTO tbl_cita (fecha,descripcion,hora)
VALUES (?,?,?)';
 //preparar la consulta por PDO
 $consulta_insertar_cita = $pdo->prepare($sql_insertar_cita);
 //ejecutar la consulta
 $consulta_insertar_cita->execute(array($fecha,$descripcion,$hora));
 //redireccionar o refrescar la pagina
  }
  catch ( Exception $ex) { echo $ex ; }
	
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>citas</title>
 </head>
 <body>
     
 <form action="" method="post">
	 <!-- datos para la tabla cita-->
		<label>fecha</label>
		<input type="date" name="fecha" placeholder="escribe día, mes, año">
		<br>
		<label>hora</label>
		<input type="time" name="hora" placeholder="escribe la hora">
		<br>
		<label>descripcion</label>
		<input type="text" name="descripcion" placeholder="describe lo que buscas de la cita">
		<br>
		<button type="submit">agendar</button>
		<a href="usuario/perfil.php" class="button">volver a perfíl</a>
		
		
	<br>
	<br>

 </body>
 </html>