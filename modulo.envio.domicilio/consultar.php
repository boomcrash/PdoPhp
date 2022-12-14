<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Elizalde Gaibor Milton Alexander">
    <title>CONSULTAR - APELLIDO</title> 
    <style>
            table {
                border: #b2b2b2 1px solid;
                border-collapse: collapse;
            }
            td, th {
                border: #b2b2b2 1px solid;
                padding: 5px;
            }
        </style>
</head>
<body>
<?php include_once '../plantillas/encabezado.php'; ?>

<h2>ENVIOS A DOMICILIO</h2>
<div style="margin:20px 0 40px 0">
    <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../modulo.envio.domicilio/consultar.php">CONSULTAR</a>
    <a style="margin-right:20px; color:#0B5407;" href="../modulo.envio.domicilio/insertar.php">INSERTAR</a>
    <a style="margin-right:20px; color:#0B5407;" href="../modulo.envio.domicilio/eliminar.php">ELIMINAR</a>
</div>
        
<?php
require_once '../conexion.php';
$sql = "select * from envio_domicilio";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>

<div style="margin-top:20px;">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CEDULA</th>
                <th>CELULAR</th>
                <th>CORREO</th>
                <th>POSTAL</th>
                <th>REFERENCIAS</th>
                <th>TIPO ENVIO</th>
                <th>PRODUCTOS</th>
                <th>CIUDAD</th>
            </tr>
        </thead>
        <tbody>
<?php
$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($filas as $fila) {
?>
            <tr>
                <td><?php echo $fila['domicilio_id'] ?></td>
                <td><?php echo $fila['cedula'] ?></td>
                <td><?php echo $fila['celular'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><?php echo $fila['postal'] ?></td>
                <td><?php echo $fila['referencias'] ?></td>
                <td><?php echo $fila['tipo_envio'] ?></td>
                <td><?php echo $fila['productos'] ?></td>
                <td><?php echo $fila['ciudad'] ?></td>
                <td>
                    <a href="eliminar.php?id=<?php echo $fila['domicilio_id']?>">ELIMINAR</a>
                </td>
            </tr>
<?php 
} 
?>
        </tbody>
    </table>
</div>
</body>
</html>