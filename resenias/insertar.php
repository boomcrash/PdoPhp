<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Emely Mishell Apráez González">
        <title>INSERTAR - APRAEZ</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>RESEÑAS</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../resenias/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../resenias/insertar.php">INSERTAR</a>
            <a style="color:#0B5407;"href="../resenias/eliminar.php">ELIMINAR</a>
        </div>
        <div style="margin-top:20px;"> 
            <form method="POST">
                <div style="margin-bottom:10px;">
                    <label>NOMBRE:</label>
                    <input type="text" name="nombre">
                </div>
                <div style="margin-bottom:10px;">
                    <label>EMAIL:</label>
                    <input type="email" name="email">
                </div>
                <div style="margin-bottom:10px;">
                    <label>VALORACIÓN:</label>
                    <select id="valoracion" name="valoracion">
                        <option value="0">Seleccione</option>
                        <option value="5">5 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="2">2 estrellas</option>
                        <option value="1">1 estrella</option>
                        </select>
                </div>
                <div style="margin-bottom:10px;">
                    <label>SERVICIO:</label>
                    <input type="radio" name="radio" value="1">
                    <label>A domicilio</label>
                    <input type="radio" name="radio" value="2" style="margin-left:30px;">
                    <label>Internacional</label>
                </div>
                <div style="margin-bottom:10px;">
                    <label>RESEÑA:</label>
                </div>
                <div style="margin-bottom:10px;">
                    <textarea name="nuevaResenia" rows="5" cols="40"></textarea>   
                </div>
                <div>
                    <input type="checkbox" name="recibiremail"/>
                    <label>Recibir alertas de promociones a este email.</label>
                </div>
                <div>
                    <input style="margin-top:20px;" type="submit" value="INSERTAR">
                </div>
            </form>
        </div>

        <?php
        require_once '../conexion.php';

        if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['valoracion']) && 
            !empty($_POST['radio']) && !empty($_POST['nuevaResenia'])) {
          
            $nombre = htmlentities($_POST['nombre']);            
            $email = htmlentities($_POST['email']);
            $valoracion = htmlentities($_POST['valoracion']);
            $nuevaResenia = htmlentities($_POST['nuevaResenia']);
            
            if (htmlentities($_POST['radio']) == 1) {
                $radio = "A domicilio";
            }else if (htmlentities($_POST['radio']) == 2){
                $radio = "Internacional";
            }            
            
            if (isset($_POST['recibiremail'])) {
                $recibiremail = 1;
            }else{
                $recibiremail = 0;
            }
                        
            $data = [
                'nombre' => $nombre,
                'email' => $email,
                'valoracion'=>$valoracion,
                'servicio'=>$radio,
                'nuevaResenia' => $nuevaResenia,
                'recibiremail' =>$recibiremail
            ];

            $sql = "insert into resenia(nombre, email, valoracion, servicio, resenia, recibir_promo) ".
                    "values(:nombre, :email,:valoracion, :radio, :nuevaResenia, :recibiremail)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            
            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            }else{
                echo "Error al insertar reseña";
            }
        }
        ?>

    </body>
</html>