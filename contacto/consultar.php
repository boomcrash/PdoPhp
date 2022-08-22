<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Quito Yambay Ruth Maria">
        <title>CONSULTAR - QUITO</title>
        <style>table {
                border: #b2b2b2 1px solid;
            }
            td, th {
                border: #b2b2b2 1px solid;
                padding: 5px;
            }</style>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>CONTACTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../contacto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../contacto/insertar.php">INSERTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../contacto/eliminar.php">ELIMINAR</a>
        </div>
        
        <!-- TU CODIGO EMPIEZA AQUI -->
        <?php
        require_once '../conexion.php';
        $sql = "select * from contacto";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>

        <div style="margin-top:20px;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>CELULAR</th>
                        <th>EMAIL</th>
                        <th>GENERO</th>
                        <th>ESTADO CIVIL</th>
                        <th>INTERESES</th>
                        <th>FECHA DE NACIMIENTO</th>
                        <th>COMENTARIO</th>                       
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $fila['contacto_id'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['apellido'] ?></td>
                            <td><?php echo $fila['celular'] ?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td><?php echo $fila['genero'] ?></td>
                            <td><?php echo $fila['estado_civil'] ?></td>
                            <td><?php if ($fila['intereses'] == 1) echo "SI"; else echo "NO"; ?></td>
                            <td><?php echo $fila['fecha_nacimiento'] ?></td>
                            <td><?php echo $fila['comentario'] ?></td>
                            <td>
                                <a href="eliminar.php?id=<?php echo $fila['contacto_id']?>">ELIMINAR</a>
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