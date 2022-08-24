<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Quito Yambay Ruth Maria">
        <title>INSERTAR - QUITO</title>
    </head>
    <body>

        <?php
        include_once '../plantillas/encabezado.php';
        ?>

        <hr style="border:1px solid;">
        <h2>CONTACTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../modulo.contacto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../modulo.contacto/insertar.php">INSERTAR</a>
            <a style="color:#0B5407;"href="../modulo.contacto/eliminar.php">ELIMINAR</a>
        </div>

        <!-- TU CODIGO EMPIEZA AQUI -->
        <div style="margin-top:20px;"> 
            <form method="POST">
                <div style="margin-bottom:10px;">
                    <label>NOMBRE:</label>
                    <input type="text" name="nombre">
                </div>
                <div style="margin-bottom:10px;">
                    <label>APELLIDO:</label>
                    <input type="text" name="apellido">
                </div>
                <div style="margin-bottom:10px;">
                    <label>CELULAR:</label>
                    <input type="text" name="celular" size=10 maxlength=10>
                </div>
                <div style="margin-bottom:10px;">
                    <label>EMAIL:</label>
                    <input type="email" name="email">
                </div>
                <div style="margin-bottom:10px;">
                    <label>GENERO:</label>
                    <input type="radio" name="radio" value="1">
                    <label>Femenino</label>
                    <input type="radio" name="radio" value="2" style="margin-left:30px;">
                    <label>Masculino</label>
                    <input type="radio" name="radio" value="3" style="margin-left:30px;">
                    <label>Otro</label>     
                </div>
                <div style="margin-bottom:10px;">
                    <label>ESTADO CIVIL:</label>
                    <select id="estadoC" name="estadoC">
                        <option value="0">Seleccione</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Viudo</option>
                        <option value="4">Otro</option>
                        </select>
                </div>
                <div>
                    <label>Recibir más información por correo</label>
                    <input type="checkbox" name="info"/>  <br></div>
                </div>
                <div style="margin-bottom:10px;">
                    <label>Fecha de nacimiento:</label>
                    <input type="date" name="fechaN">
                </div>
                <div style="margin-bottom:10px;">
                    <label>COMENTARIO:</label>
                </div>
                <div style="margin-bottom:10px;">
                    <textarea name="nuevoComent" rows="5" cols="40"></textarea>   
                </div>
                <div>
                    <input style="margin-top:20px;" type="submit" value="INSERTAR">
                </div>
            </form>
        </div>

        <?php
        require_once '../conexion.php';

        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['celular']) &&
            !empty($_POST['email']) && !empty($_POST['radio']) && !empty($_POST['estadoC'])
            && !empty($_POST['fechaN'])) {
          
            $nombre = htmlentities($_POST['nombre']);
            $apellido = htmlentities($_POST['apellido']);
            $celular = htmlentities($_POST['celular']);            
            $email = htmlentities($_POST['email']);
            $estadoC = htmlentities($_POST['estadoC']);
            $fechaN = htmlentities($_POST['fechaN']);
            $nuevoComent = htmlentities($_POST['nuevoComent']);
           


            if (htmlentities($_POST['radio']) == 1) {
                $radio = "Femenino";
            }else if (htmlentities($_POST['radio']) == 2){
                $radio = "Masculino";
            }else if (htmlentities($_POST['radio']) == 3){
                $radio = "Otro";
            } 
            
            if (isset($_POST['info'])) {
                $info = 1;
            }else{
                $info = 0;
            }             
                        
            $data = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'celular' => $celular,
                'email' => $email,
                'genero' => $radio,
                'estadoC'=>$estadoC,
                'interes' => $info,
                'fechaN' => $fechaN,
                'nuevoComent' => $nuevoComent,
            ];

            $sql = "insert into contacto(nombre, apellido, celular, email, genero, estado_civil, intereses, fecha_nacimiento, comentario) ".
                    "values(:nombre, :apellido, :celular, :email, :genero, :estadoC, :interes, :fechaN, :nuevoComent)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            
            if ($stmt->rowCount() > 0) {
                header("location:consultar.php");
            }else{
                echo "Error al insertar contacto";
            }
        }
        ?>
        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>