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
                        <label>ID:</label>
                        
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
                        <!-- <input type="hidden" name="txtid" value=""> -->
                        <label>Id:</label><input type="text" name="txtid" readonly="" value="<?php echo $fila['internacional_id'] ?>">
                        <label>Usuario:</label><input type="text" name="txtusuario" value="<?php echo $fila['username'] ?>">
                        <input type="submit" value="Eliminar">
                    </form>

                   </div>


                            <input type="text" name="txtid" readonly="" value="<?php echo $fila['internacional_id']?>">
                            </div>
                            <div style="margin-top:10px;">
                                <label>Especificaciones:</label>
                            </div>
                            <div style="margin-bottom:10px;">
                            <textarea name="area" id="texto" rows="4" cols="100"></textarea> <br></div>
                                <textarea name="area" id="texto" rows="5" cols="40" readonly=""><?php echo $fila['especificaciones']?></textarea>   
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
                echo 'No se pudo eliminar la reseña. Ingrese un ID correcto.';
            }
        }
        ?>
  






        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>