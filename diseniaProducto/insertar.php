<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sicha Vega Betsy Arlette">
        <title>INSERTAR - SICHA VEGA </title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';
        ?>

        <hr style="border:1px solid;">
        <h2>DISEÑAR PRODUCTO</h2>
        <div style="margin:20px 0 40px 0">
            <a style="margin-right:20px; color:#0B5407;" href="../diseniaProducto/consultar.php">CONSULTAR</a>
            <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../diseniaProducto/insertar.php">INSERTAR</a>
            <a style="color:#0B5407;"href="../diseniaProducto/eliminar.php">ELIMINAR</a>
        </div>
        
        <!-- TU CODIGO EMPIEZA AQUI -->
        <div style="margin-top:20px;"> 
            <form method="post">

            <div style="margin-bottom:10px;">
                <label>ID</label>
                <input type="number" name="txtid">
            </div>

            <div style="margin-bottom:10px;">
                <label>PRODUCTO:</label>
                <select name="cbxproducto" id="cbxprod">
                    <option value="0">Seleccione...</option>
                    <option value="1">Camiseta</option>
                    <option value="2">Abrigo</option>
                    <option value="3">Gorra</option>
                    <option value="4">Taza</option>
                    <option value="4">Bolso</option>
                </select>
            </div>

            <div style="margin-bottom:10px;">
                <label>CLIENTE:</label>
                <input type="text" name="txtcliente">
            </div>

            <div style="margin-bottom:10px;">
                <label>DISEÑO:</label>
                <select name="cbxdisenio" id="cbxdis">
                    <option value="0">Seleccione...</option>
                    <option value="1">Personalizado</option>
                    <option value="2">Estándar</option>
                    <option value="3">Sorpresa</option>   
                </select>
            </div>

            <div style="margin-bottom:10px;">
                <label>MODELO:</label>
                    <input type="radio" class="ms" id="realista" name="rbmodelo" value="real"/> Realista 
                    <input type="radio" class="ms" id="caricatura" name="rbmodelo" value="cari"/> Caricatura 
                    <input type="radio" class="ms" id="anime" name="rbmodelo" value="an"/> Anime
            </div>   
            
            <div style="margin-bottom:10px;">
                <input type="submit" value="Insertar">
            </div>
            </form>
        </div>

        <?php
         require_once '../conexion.php';

        if (!empty($_POST['cbxproducto']) && !empty($_POST['txtcliente']) 
        && !empty($_POST['cbxdisenio']) && !empty($_POST['rbmodelo']) ) {
          
            $producto = htmlentities($_POST['cbxproducto']);
            $cliente = htmlentities($_POST['txtcliente']);
            $disenio = htmlentities($_POST['cbxdisenio']);
            

            switch ($modelo) {
                case 'real':
                    $modelo="realista";
                    break;
                case 'cari':
                    $modelo="caricatura";
                    break;
                case 'an':
                    $modelo="anime";
                    break;
                default:
                    echo "NO SE SELECCIONO UN MODELO";
                    break;
            }
            /*if (htmlentities($_POST['rbmodelo']) == 1) {
                $modelo = "realista";
            }else if (htmlentities($_POST['rbmodelo']) == 2){
                $modelo = "caricatura";
            }else if(htmlentities($_POST['rbmodelo']) == 3){ 
                $modelo = "anime";
            }
            */
            $data = [
                'producto' => $producto,
                'cliente' => $cliente,
                'disenio'=>$disenio,
                'modelo' => $modelo,
            ];

            $sql = "insert into disenio_producto (producto, cliente, disenio, modelo)".
                    "values( :producto, :cliente, :disenio, :modelo)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:consultar.php");
            }else{
                echo "NO SE PUDO INSERTAR REGISTRO";
            }
        }
        ?>   
        <!-- TU CODIGO TERMINA AQUI -->

    </body>
</html>