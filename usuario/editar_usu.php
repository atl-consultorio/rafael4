<?php
include_once '../dao/conexion.php';
$direccion =$_POST['direccion'];
$sexo =$_POST['sexoden'];
$estado_civil =$_POST['estadoc'];
$natalicio =$_POST['natalicio'];
$ocupacion =$_POST['ocupacion'];
$c_emergencia =$_POST['cemergencia'];


//sentencia sql
$sql_editar_usu="UPDATE tbl_usuario 
SET direccion=?,sexo=?,estado_civil=?,ocupacion=?,natalicio=?,cont_emergencia=? WHERE idusuario = ?";
//preparar consulta
$consulta_editar = $pdo->prepare($sql_editar_usu);
//ejecutar consulta
$consulta_editar->execute(array($direccion,$sexo,$estado_civil,$ocupacion,$natalicio,$c_emergencia, 3));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<!-- formulari de datos de usuario -->
<form action="" method="post">
<br>
<label>datos importantes</label>
<br>
<label >dirección de residencia</label>
<input type="text" name="direccion" placeholder="escribe tu dirección">
<br>
<label>sexo de nacimiento</label>
<input type="text" name="sexoden" placeholder="">
<br>
<label >estado civíl</label>
<input type="text" name="estadoc" placeholder="escribe tu estado cívil">
<br>
<label >fecha de nacimiento</label>
<input type="date" name="natalicio">
<br>
<label>ocupación</label>
<input type="text" name="ocupacion" placeholder="a que te dedicas">
<br>
<label >contacto de emergencia</label>
<input type="text" name="cemergencia" placeholder="un número de confianza">
<br>
<button type="submit">agendar</button>

</form>

</body>
</html>


