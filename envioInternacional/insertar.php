<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Yánez Guillén Paula Adriana">
		<title>INSERTAR - APELLIDO</title>
		<style>

.formularios div {
			padding: 5px;
		}

		.formularios div:nth-child(2n) {
			background: #9EE9A1;
		}
		

		</style>
	</head>
	<body>

		<?php
		include_once '../templates/header.php';
		?>

		<hr style="border:1px solid;">
		<h2>ENVIOS INTERNACIONALES</h2>
		<div style="margin:20px 0 40px 0">
			<a style="margin-right:20px; color:#0B5407;" href="../envioInternacional/consultar.php">CONSULTAR</a>
			<a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../envioInternacional/insertar.php">INSERTAR</a>
			<a style="color:#0B5407;"href="../envioInternacional/eliminar.php">ELIMINAR</a>
		</div>
		
		<!-- TU CODIGO EMPIEZA AQUI -->
		<?php
        $titulo="Agregar envío internacional";
        include_once '../templates/header.php';
        ?>
        <div class="formularios">
            <form method="post">
			   <div>
                <label>Nombres:&nbsp;&nbsp;</label>
                <input type="text" name="txtnombres"> <br>
	           </div>
			   <div>
                <label>Apellidos:&nbsp;</label>
                <input type="text" name="txtapellidos"> <br>
	           </div>
			   <div>
                <label>Telefono:&nbsp;&nbsp;</label>
                <input type="text" name="txttelefono"> <br>
	          </div>
			  <div><label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="txtemail"> <br></div>			
			<div><label>Direccion:</label>
                <input type="text" name="txtdireccion"> <br></div>
			<div> <label>Recibir vía:</label>
                <input class="via" type="radio" name="radio"  value="1" />ServiEntrega
                <input class="via" type="radio" name="radio"  value="2" />Tramaco
                <input class="via" type="radio" name="radio"  value="3" />MundoExpress
	         </div>
			 <div><label>Pais:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="txtpais"> <br></div>
				<div>
                <label>Recibir información:</label>
                <input type="checkbox" name="info"/>  <br></div>
              <div><label>Especificaciones:</label><br>
              <textarea name="area" id="texto" rows="4" cols="100"></textarea> <br></div>
			  <br>         
                <input type="submit" value="Agregar">
            </form>
        </div>
        <?php
         require_once '../conexion.php';

        if (!empty($_POST['txnombres']) &&  !empty($_POST['txtapellidos']) && !empty($_POST['txttelefono'])
        && !empty($_POST['txtemail'])&& !empty($_POST['txtdireccion'])&& !empty($_POST['radio'])&& !empty($_POST['txtpais'])){
          
            $nombres = htmlentities($_POST['txtnombres']);
            $apellidos = htmlentities($_POST['txtapellidos']);
            $direccion = htmlentities($_POST['txtdireccion']);
            $email = isset($_POST['txtemail'])? htmlentities($_POST['txtemail']):'';
            $pais= htmlentities($_POST['txtpais']);
            $especificaciones= htmlentities($_POST['area']);
          
            if (htmlentities($_POST['radio']) == 1) {
                $radio = "Servientrega";
            }else if (htmlentities($_POST['radio']) == 2){
                $radio = "Tramaco";
            }else if(htmlentities($_POST['radio']) == 3){
                $radio = "MundoExpress";

            }          
            
            if (isset($_POST['info'])) {
                $info = 1;
            }else{
                $info = 0;
            }
           

            
            $data = [
                'nom' =>$nombres,
                'apell'=>$apellidos,
                'radio' =>$radio,
                'dir'=>$direccion,
                'email' => $email,
                'pais' =>$pais,
                'info' =>$info,
                'esp' =>$especificaciones


            ];
 $sql = "insert into envio_internacional (nombres, apellidos, telefonos,email,direccion,recibir_via,pais,recibir_info,especificaciones) 
 values(:nom, :apell,:via,:dir,:email,:pais,:info,:esp)";
            $stmt = $pdo->prepare($sql);// prepara sentencia
            $stmt->execute($data);// ejecutar sentencia
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:consultar.php");
            }else{
                echo "Error al insertar usuario";
            }
        }
        ?>


		<!-- TU CODIGO TERMINA AQUI -->

   </body>
</html> 