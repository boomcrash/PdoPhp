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
                <label>Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                <input type="number" name="txtid"> <br>
	           </div>
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
                <input class="via" type="radio" name="via" id="v1" value="S" />ServiEntrega
                <input class="via" type="radio" name="via" id="v2" value="T" />Tramaco
                <input class="via" type="radio" name="via" id="v3" value="M" />MundoExpress
	         </div>
			 <div><label>Pais:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="txtpais"> <br></div>
				<div>
                <label>Recibir información:</label>
                <input type="checkbox" name="acc1" value="1" id="acc1" 
                class="formItem acc principal" />  <br></div>
              <div><label>Especificaciones:</label><br>
              <textarea class="form-control formItem"name="area" id="texto" rows="4" cols="100"></textarea> <br></div>
			  <br>         
                <input type="submit" value="Agregar">
            </form>
        </div>
        <?php
         require_once '../conexion.php';

        if (!empty($_POST['txtid']) && !empty($_POST['txnombres']) && 
                !empty($_POST['txtapellidos']) && !empty($_POST['txttelefono'])
                && !empty($_POST['txtemail'])&& !empty($_POST['txtdireccion'])
                && !empty($_POST['via'])&& !empty($_POST['txtpais'])){
          
            $id = htmlentities($_POST['txtid']);
            $nombres = htmlentities($_POST['txtnombres']);
            $apellidos = htmlentities($_POST['txtapellidos']);
            $via= htmlentities($_POST['via']);
            $direccion = htmlentities($_POST['txtdireccion']);
            $email = isset($_POST['txtemail'])? htmlentities($_POST['txtemail']):'';
            $pais= htmlentities($_POST['txtpais']);
            $info= htmlentities($_POST['acc1']);
            $especificaciones= htmlentities($_POST['area']);


            
            $data = [
                'id' =>htmlentities($_POST['txtid']),
                'nom' =>htmlentities($_POST['txtnombre']),
                'apell'=>$apellidos,
                'via' =>$via,
                'dir'=>$direccion,
                'email' => $email,
                'pais' =>$pais,
                'info' =>$info,
                'esp' =>$especificaciones


            ];
 $sql = "insert into envio_internacional (internacional_id, nombres, apellidos, telefonos,email,direccion,recibir_via,pais,recibir_info,especificaciones) values(:id, :nom, :apell,:via,:dir,:email,:pais,:info,:esp)";
            $stmt = $pdo->prepare($sql);// prepara sentencia
            $stmt->execute($data);// ejecutar sentencia
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:presentar.php");
            }else{
                echo "Error al insertar usuario";
            }
        }
        ?>


		<!-- TU CODIGO TERMINA AQUI -->

   </body>
</html> 