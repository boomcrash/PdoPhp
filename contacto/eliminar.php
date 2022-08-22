<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Quito Yambay Ruth Maria">
        <title>ELIMINAR - QUITO</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>CONTACTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../contacto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../contacto/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../contacto/eliminar.php">ELIMINAR</a>
        </div>
        
        <!-- TU CODIGO EMPIEZA AQUI -->
        <?php
        require_once '../conexion.php';            
        ?>
                        
            <div style="margin-top:20px;"> 
                <form method="POST">   
                    <div>                     
                        
                        <?php
                        if (!empty($_GET['id'])){
                                 
                            $data = ['id' => htmlentities($_GET['id'])];
                            $sql = "select * from contacto where contacto_id = :id";            
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute($data);
                            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>

                    <div>
                    <form method="post">
                        <label>Id:</label><input type="text" name="txtid" readonly="" value="<?php echo $fila['contacto_id'] ?>">
                        <input type="submit" value="Eliminar">
                    </form>

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
            $sql = "delete from contacto where contacto_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            } else {
                echo 'No se pudo eliminar el contacto. Revise si el contacto existe.';
            }
        }
        ?>
  






        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>