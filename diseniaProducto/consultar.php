<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sicha Vega Betsy Arlette">
        <title>CONSULTAR - SICHA VEGA </title>
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

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>DISEÑAR PRODUCTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../diseniaProducto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../diseniaProducto/insertar.php">INSERTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../diseniaProducto/eliminar.php">ELIMINAR</a>
        </div>

        <?php
            require_once '../conexion.php';

            $sql = "select * from disenio_producto ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        ?>

        <div style="margin-top:20px;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PRODUCTO</th>
                        <th>CLIENTE</th>
                        <th>DISEÑO</th>
                        <th>MODELO</th>
                    </tr>
                </thead>
            <tbody>

        <?php
            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($filas as $fila) {
        ?>
            <tr>
                <td><?php echo $fila['disenio_id'] ?></td>
                <td><?php echo $fila['producto'] ?></td>
                <td><?php echo $fila['cliente'] ?></td>
                <td><?php echo $fila['disenio'] ?></td>
                <td><?php echo $fila['modelo'] ?></td>
                <td>
                    <a href="eliminar.php?id=<?php echo $fila['disenio_id'] ?>">ELIMINAR</a>
                </td>
            </tr>
        <?php } ?>
            </tbody>
            </table>
                <a href="insertar.php">INSERTAR</a>
        </div>
    </body>
</html>