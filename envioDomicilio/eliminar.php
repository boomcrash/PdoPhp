
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Elizalde Gaibor Milton Alexander">
        <title>ELIMINAR - APELLIDO</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>ENVIOS A DOMICILIO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../envioDomicilio/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407;" href="../envioDomicilio/insertar.php">INSERTAR</a>
            <a style="color:#0B5407; font-weight:bold;" href="../envioDomicilio/eliminar.php">ELIMINAR</a>
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
                            $sql = "select * from envio_domicilio where domicilio_id = :id";            
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute($data);
                            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <input type="text" name="txtid" readonly="" value="<?php echo $fila['domicilio_id']?>">
                            </div>
                            <div style="margin-top:10px;">
                                <label>Envio Domicilio:</label>
                            </div>
                                <div style="margin-top:20px;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CEDULA</th>
                                                <th>CELULAR</th>
                                                <th>CORREO</th>
                                                <th>POSTAL</th>
                                                <th>REFERENCIAS</th>
                                                <th>TIPO ENVIO</th>
                                                <th>PRODUCTOS</th>
                                                <th>CIUDAD</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td><?php echo $fila['domicilio_id'] ?></td>
                                                    <td><?php echo $fila['cedula'] ?></td>
                                                    <td><?php echo $fila['celular'] ?></td>
                                                    <td><?php echo $fila['correo'] ?></td>
                                                    <td><?php echo $fila['postal'] ?></td>
                                                    <td><?php echo $fila['referencias'] ?></td>
                                                    <td><?php echo $fila['tipo_envio'] ?></td>
                                                    <td><?php echo $fila['productos'] ?></td>
                                                    <td><?php echo $fila['ciudad'] ?></td>
                                                </tr>
                                        </tbody>
                                    </table>
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
            $sql = "delete from envio_domicilio where domicilio_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            } else {
                echo 'ERROR: No se logro eliminar (asegurese de ahber ingresado un Id)';
            }
        }
        ?>






        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>