<?php ob_start() ?>
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
            include_once '../plantillas/encabezado.php';
        ?>

        <hr style="border:1px solid;">
        <h2>DISEÑAR PRODUCTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.disenia.producto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.disenia.producto/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../modulo.disenia.producto/eliminar.php">ELIMINAR</a>
        </div>
        
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

                                $filas = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                    <input type="text" name="txtid" readonly="" value="<?php echo $filas['disenio_id']?>">
                </div>

                <div style="margin-top:10px;"><label>CLIENTE:</label></div>
                <div style="margin-bottom:10px;"><input type="text" name="txtcliente" readonly="" value="<?php echo $filas['cliente']?>"> </div>
        
                <?php
                    }else{?>
                        <input type="number" name="txtid">
                            <?php
                    }
                ?>
                    <div> 
                        <input style="margin-top:20px;" type="submit" value="ELIMINAR">
                    </div>
            </form>

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
    </body>
</html>