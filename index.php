<?php
//llamar el archivo de conexión
include_once 'conexion.php';

//mostrar los datos
$sql_mostrar="SELECT idusuario, dni,apellido,nombre,celular,correo FROM tbl_usuario";
$consulta_mostrar = $pdo->prepare($sql_mostrar);
$consulta_mostrar->execute();
//fetch = traer arreglo o vector

$resultado_mostrar= $consulta_mostrar->fetchall();
//var_dump($resultado_mostrar);

if ($_POST) {
	//capturar los valores del formulario//
	$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$dni =$_POST['identificacion'];
$celular =$_POST['celular'];
$contrasena =$_POST['contrasena'];
$correo =$_POST['correo'];
//sentencia sql para insertar
 $sql_insertar = 'INSERT INTO tbl_usuario (nombre,apellido,dni,celular,contrasena,correo)
VALUES (?,?,?,?,?,?)';
 //preparar la consulta por PDO
 $consulta_insertar = $pdo->prepare($sql_insertar);
 //ejecutar la consulta
 $consulta_insertar->execute(array($nombre,$apellido,$dni,$celular,$contrasena,$correo));
 //redireccionar o refrescar la pagina
 header('location:index.php');
}
 /*llenando formulario para editar*/
 if ($_GET) {
	 $id_editar = $_GET['id'];
	 //sentencia sql
	 $sql_editar_usu = "SELECT * FROM tbl_usuario WHERE idusuario=?";
	 //preparar la sentencia
	 $consulta_editar_usu = $pdo->prepare($sql_editar_usu);
	 //ejecutar
	 $consulta_editar_usu->execute(array($id_editar));
	 $resultado_editar=$consulta_editar_usu->fetch();
	 //var_dump($resultado_editar);
 }

 

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>index</title>
</head>
<body>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- formulario de registro -->
<?php if (!$_GET) { ?>

	<h1>registro de usuario</h1>
	
	<form action="" method="POST">
		<label>nombre</label>
		<input type="text" name="nombre" placeholder="ingresa tu nombre">
		<br>
		<label>apellido</label>
		<input type="text" name="apellido" placeholder="ingresa tu apellido">
		<br>
		<label>dni</label>
		<input type="text" name="identificacion" placeholder="ingresa tu identificación">
		<br>
		<label>contraseña</label>
		<input type="text" name="contrasena" placeholder="ingresa tu contraseña">
		<br>
		<label>correo</label>
		<input type="text" name="correo" placeholder="ingresa tu correo">
		<br>
		<label>celular</label>
		<input type="text" name="celular" placeholder="ingresa tu celular">
		<br>
		<button type="submit">registrar</button>
	</form>
	<br>
	<br>
	<?php } ?>
	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--Formulario de edición-->
<?php if ($_GET) { ?>

	<h1>editar usuario</h1>

	<!-- formulario de edición -->
	<form action="editar.php" method="GET">
		<label>nombre</label>
		<input type="text" name="nombre" value="<?php echo $resultado_editar ['nombre'] ?>">
		<br>
		<label>apellido</label>
		<input type="text" name="apellido"  value="<?php echo $resultado_editar ['apellido']?>">
		<br>
		<label>dni</label>
		<input type="text" name="identificacion" value="<?php echo $resultado_editar ['dni']?>">
		<br>
		<label>contraseña</label>
		<input type="text" name="contrasena" value="<?php echo $resultado_editar ['contrasena']?>">
		<br>
		<label>correo</label>
		<input type="text" name="correo" value="<?php print $resultado_editar ['correo']?>">
		<br>
		<label>celular</label>
		<input type="text" name="celular" value="<?php echo $resultado_editar ['celular']?>">
		<br>
		<br>
		<input type="hidden" name="id" value="<?php echo $resultado_editar ['idusuario'] ?>" >
		
		<button type="submit">editar</button>
	</form>
	<br>
	<br>
<?php }?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--dibujando tablas de usuarios-->
    <h1>lista de usuarios</h1>
	<table style= "border: 1px solid black">
		<thead>
			<tr>

				<th style="border:1px solid black">dni</th>
				<th style="border:1px solid black">nombre</th>
				<th style="border:1px solid black">apellido</th>
				<th style="border:1px solid black">celular</th>
				<th style="border:1px solid black">correo</th>
			</tr>
		</thead>
			<!-- cuerpo de tabla-->
	<tbody style="border:1px solid black">
		<!-- ciclo para llenar la tabla-->
		<?php foreach ($resultado_mostrar as $datos):?>
		<tr style="border:1px solid black">
			<td style="border:1px solid black"><?php echo $datos['dni']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['nombre']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['apellido']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['celular']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['correo']; ?></td>
			<!-- botones editar  eliminar-->
			<td ><a href="index.php?id=<?php echo $datos['idusuario'];?>"><button>editar</button></a></td>
			<td ><a href="eliminar.php?id=<?php echo $datos['idusuario'];?>"><button>eliminar</button></a></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	</table>


</body>
</html>