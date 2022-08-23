<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sicha Vega Betsy Arlette">
        <title>ELIMINAR - SICHA VEGA</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>DISEÑAR PRODUCTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../diseniaProducto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../diseniaProducto/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../diseniaProducto/eliminar.php">ELIMINAR</a>
        </div>
        
        <!-- TU CODIGO EMPIEZA AQUI -->
        <?php
        require_once '../conexion.php';
        ?>
        <div style="margin-top:20px;"> 
        <form method="POST">   
            <div>                     
                <label>ID:</label>
        
        <?php
        if (!empty($_GET['id'])) {
            $data = ['id' => htmlentities($_GET['id'])];
            $sql = "select * from disenio_producto where disenio_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div>
                    <form method="post">

                        <input type="text" name="txtid" readonly="" value="<?php echo $fila['disenio_id'] ?>">
                        <label>cliente:</label><input type="text" name="txtcliente" value="<?php echo $fila['cliente'] ?>">

                        <input type="submit" value="Eliminar">
                    </form>

                </div>
            <?php
            }
        ?>
        <?php
        if (isset($_POST['txtid'])) {
            $data = ['id' => htmlentities($_POST['txtid'])];
            $sql = "delete from disenio_producto where disenio_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:consultar.php");
            } else {
                echo 'NO SE PUDO ELIMINAR EL REGISTRO';
            }
        }
        ?>    
        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>