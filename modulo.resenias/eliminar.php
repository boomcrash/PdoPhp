<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Apráez González Emely Mishell">
        <title>ELIMINAR - APRAEZ</title>
    </head>
    <body>

        <?php
        include_once '../plantillas/encabezado.php';
        ?>

        <hr style="border:1px solid;">
        <h2>RESEÑAS</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.resenias/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.resenias/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../modulo.resenias/eliminar.php">ELIMINAR</a>
        </div>

        <?php
        require_once '../conexion.php';            
        ?>
                        
            <div style="margin-top:20px;"> 
                <form method="POST">   
                    <div>                     
                        <label>ID:</label>
                        
                        <?php
                        if (!empty($_GET['id'])){
                                 
                            $data = ['id' => htmlentities($_GET['id'])];
                            $sql = "select * from resenia where resenia_id = :id";            
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute($data);
                            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <input type="text" name="txtid" readonly="" value="<?php echo $fila['resenia_id']?>">
                            </div>

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
            </div>
        

        <?php
        if (isset($_POST['txtid'])) {
            $data = ['id' => htmlentities($_POST['txtid'])];
            $sql = "delete from resenia where resenia_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            } else {
                echo 'No se pudo eliminar la reseña. Ingrese un ID correcto.';
            }
        }
        ?>

    </body>
</html>