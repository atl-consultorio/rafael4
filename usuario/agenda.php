<?php
include_once '../dao/conexion.php';


//llamar el archivo de conexión

//mostrar los datos
$sql_mostrar="SELECT id_cita, fecha,descripcion,hora FROM tbl_cita";
$consulta_mostrar = $pdo->prepare($sql_mostrar);
$consulta_mostrar->execute();
//fetch = traer arreglo o vector

$resultado_mostrar= $consulta_mostrar->fetchall();
//var_dump($resultado_mostrar);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h1>lista de citas</h1>
	<table style= "border: 1px solid black">
		<thead>
			<tr>

				<th style="border:1px solid black">id cita</th>
				<th style="border:1px solid black">fecha</th>
				<th style="border:1px solid black">descripcion</th>
				<th style="border:1px solid black">hora</th>
			</tr>
		</thead>
	<!-- cuerpo de tabla-->
	<tbody style="border:1px solid black">
		<!-- ciclo para llenar la tabla-->
		<?php foreach ($resultado_mostrar as $datos):?>
		<tr style="border:1px solid black">
			<td style="border:1px solid black"><?php echo $datos['id_cita']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['fecha']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['descripcion']; ?></td>
			<td style="border:1px solid black"><?php echo $datos['hora']; ?></td>
		
			<!-- botones editar  eliminar-->
			
		</tr>
	<?php endforeach ?>
	</tbody>
	</table>

    </body>
</html>







