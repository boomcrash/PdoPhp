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
                        <option value="5">Bolso</option>
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
          
            
                if (htmlentities($_POST['cbxproducto']) == "1") {
                    $producto = "Camiseta";
                    }else if (htmlentities($_POST['cbxproducto']) == "2"){
                        $producto = "Abrigo";
                        }else if(htmlentities($_POST['cbxproducto']) == "3"){ 
                            $producto = "Gorra";
                            }else if(htmlentities($_POST['cbxproducto']) == "4"){ 
                                $producto = "Taza";
                                }else if(htmlentities($_POST['cbxproducto']) == "5"){ 
                                    $producto = "Bolso";
                                }

                $cliente = htmlentities($_POST['txtcliente']);


                if (htmlentities($_POST['cbxdisenio']) == "1") {
                    $disenio = "Personalizado";
                    }else if (htmlentities($_POST['cbxdisenio']) == "2"){
                        $disenio = "Estandar";
                        }else if(htmlentities($_POST['cbxdisenio']) == "3"){ 
                            $disenio = "Sorpresa";
                        }


                if (htmlentities($_POST['rbmodelo']) == "real") {
                    $modelo = "realista";
                    }else if (htmlentities($_POST['rbmodelo']) == "cari"){
                        $modelo = "caricatura";
                        }else if(htmlentities($_POST['rbmodelo']) == "an"){ 
                            $modelo = "anime";
                        }
                
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
    </body>
</html>