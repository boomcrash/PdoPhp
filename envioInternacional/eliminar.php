<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Yánez Guillén Paula Adriana">
        <title>ELIMINAR - YÁNEZ</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>ENVIOS INTERNACIONALES</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../envioInternacional/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../envioInternacional/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../envioInternacional/eliminar.php">ELIMINAR</a>
        </div>
        
        <!-- TU CODIGO EMPIEZA AQUI -->
        <?php
        require_once '../conexion.php';            
        ?>
                        
            <div style="margin-top:20px;"> 
                <form method="POST">   
                    <div>                     
                        <label>Id:</label>
                        
                        <?php
                        if (!empty($_GET['id'])){
                                 
                            $data = ['id' => htmlentities($_GET['id'])];
                            $sql = "select * from envio_internacional where internacional_id = :id";            
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute($data);
                            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>

                    <div>
                    <form method="post">
                        <label>Id:</label><input type="text" name="txtid" readonly="" value="<?php echo $fila['internacional_id'] ?>">
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
            $sql = "delete from envio_internacional where internacional_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            } else {
                echo 'No se pudo eliminar el envío realizado. Ingrese un ID correcto.';
            }
        }
        ?>
  






        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>