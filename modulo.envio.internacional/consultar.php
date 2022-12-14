<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Yánez Guillén Paula Adriana">
		<title>CONSULTAR - YÁNEZ</title>
		<style>
			table {
				border: #33FF93 1px solid;
			}
			td, th {
				border: #b2b2b2 1px solid;
			}
			</style>
	</head>
	<body>

		<?php
		include_once '../plantillas/encabezado.php';
		?>

		<hr style="border:1px solid;">
		<h2>ENVIOS INTERNACIONALES</h2>
		<div style="margin:20px 0 40px 0">
			<a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../modulo.envio.internacional/consultar.php">CONSULTAR</a>
			<a style="margin-right:20px; color:#0B5407;" href="../modulo.envio.internacional/insertar.php">INSERTAR</a>
			<a style="margin-right:20px; color:#0B5407;" href="../modulo.envio.internacional/eliminar.php">ELIMINAR</a>
		</div>

		<!-- TU CODIGO EMPIEZA AQUI -->
		  <?php    
	require_once '../conexion.php';

$sql = "select * from envio_internacional";
$stmt = $pdo->prepare($sql);// preparar la sentencia
$stmt->execute(); // ejecutar la sentencia
?>

<div>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Telefonos</th>
				<th>Email</th>
				<th>Direccion</th>
				<th>Recibir vía</th>
				<th>Pais</th>
				<th>Información</th>
				<th>Especificaciones</th>
				<th>Acción</th>



			</tr>
		</thead>
		<tbody>
			<?php
			$filas = $stmt->fetchAll(PDO::FETCH_ASSOC); // recuperar resultados
			foreach ($filas as $fila) {
				?>
				<tr>
					<td><?php echo $fila['internacional_id'] ?></td>
					<td><?php echo $fila['nombres'] ?></td>
					<td><?php echo $fila['apellidos'] ?></td>
					<td><?php echo $fila['telefono'] ?></td>
					<td><?php echo $fila['email'] ?></td>
					<td><?php echo $fila['direccion'] ?></td>
					<td><?php echo $fila['recibir_via'] ?></td>
					<td><?php echo $fila['pais'] ?></td>
					<td><?php if ($fila['recibir_info'] == 1) echo "SI"; else echo "NO"; ?></td>
					<td><?php echo $fila['especificaciones'] ?></td>

					<td>
						<a href="eliminar.php?id=<?php echo $fila['internacional_id'] ?>">Eliminar</a>
					</td>
				</tr>
			<?php
		   } 
		   ?>
		</tbody>
	</table>
</div>

		<!-- TU CODIGO TERMINA AQUI -->

	</body>
</html>
