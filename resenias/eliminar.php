<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Emely Mishell Apráez González">
        <title>ELIMINAR - APRAEZ</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>RESEÑAS</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../resenias/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../resenias/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../resenias/eliminar.php">ELIMINAR</a>
        </div>
        <?php
        require_once '../conexion.php';

        if (!empty($_GET['resenia_id'])) {
            $data = ['id' => htmlentities($_GET['resenia_id'])];
            $sql = "select * from resenia where resenia_id = :id";            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            
            
            <div style="margin-top:20px;"> 
                <form method="POST">   
                    <div>                     
                        <label>ID:</label>
                        <input type="text" name="txtid" readonly="" value="<?php echo $fila['resenia_id']?>">
                    </div>
                    <div> 
                        <input style="margin-top:20px;" type="submit" value="ELIMINAR">
                    </div>
                </form>
            </div>
        <?php           
        }
        ?>

        <?php
        if (isset($_POST['txtid'])) {
            $data = ['id' => htmlentities($_POST['txtid'])];
            $sql = "delete from resenia where resenia_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            } else {
                echo 'No se pudo eliminar la reseña';
            }
        }
        ?>

    </body>
</html>