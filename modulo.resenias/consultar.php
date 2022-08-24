<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Apráez González Emely Mishell">
        <title>CONSULTAR - APRAEZ</title>
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
        include_once '../plantillas/encabezado.php';
        ?>

        <hr style="border:1px solid;">
        <h2>RESEÑAS</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../modulo.resenias/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.resenias/insertar.php">INSERTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.resenias/eliminar.php">ELIMINAR</a>
        </div>
        
        <?php
        require_once '../conexion.php';
        $sql = "select * from resenia";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>

        <div style="margin-top:20px;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>VALORACIÓN</th>
                        <th>SERVICIO</th>
                        <th>RESEÑA</th>
                        <th>RECIBIR PROMOCIONES AL EMAIL</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $fila['resenia_id'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td><?php if ($fila['valoracion'] == 1) echo "1 estrella"; else echo $fila['valoracion']; ?> estrellas</td>
                            <td><?php echo $fila['servicio'] ?></td>
                            <td><?php echo $fila['resenia'] ?></td>
                            <td><?php if ($fila['recibir_promo'] == 1) echo "SI"; else echo "NO"; ?></td>
                            <td>
                                <a href="eliminar.php?id=<?php echo $fila['resenia_id']?>">ELIMINAR</a>
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