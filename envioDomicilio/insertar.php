<?php ob_start() ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Elizalde Gaibor Milton Alexander">
        <title>INSERTAR - APELLIDO</title>
        <style>
        label{
            font-weight: bold;
        }
        input{
            border-radius: 40px;
        }
        textarea{
            border-radius: 5px;
        }
        input[type="submit"],input[type="reset"]
        {
            background-color: #2e2e2e;
            color: white;
            border-radius: 100px;
            margin-top: 13px;
            width: fit-content;
            margin-left: 10px;
           
        }

        input[type="submit"]:hover{
            background-color: white;
            font-weight: bold;
            color: black;
        }

        input[type="reset"]:hover{
            background-color: red;
            font-weight: bold;
            color: white;
        }

        input[type="text"]{
            width: 26%;
        }

        #correo{
            width: 30%;
        }

        div{
            padding: 10px 0 10px 0;
        }
        .formulario{
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2B2729;
            width: 40%;
            color: white;
            border-radius: 40px;
        }

        .formulario:hover{
            box-shadow: 0 0 18px black,
            0 0 48px black,
            0 0 78px black,
            0 0 98px black;
            transition: 1s;
        }

        

        .seccion-segundo{
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: auto;
            padding: 20px 0;
        }
        img[src="img/milton-domicilio.png"]{
            width: 50%; height: 60%;
            animation-name: coche;
            
            animation-timing-function: ease;
            animation-duration: 5s;
            animation-iteration-count: 1;
        }



        @keyframes coche{
            0%{
                
            }
            50%{
                transform: translateX(35%);
            }
            100%{
                transform: translateX(100%);
            }
        }

        @media (max-width:600px) {
            .formulario{
                width: 90%;
                margin: 0;
                padding: 0;
            }

        }

        @media (max-width:900px) {
            .formulario{
                width: 70%;
                margin: 0;
                padding: 0;
            }

        }
    </style>
    </head>
    <body>

<?php include_once '../templates/header.php'; ?>
<h2>ENVIOS A DOMICILIO</h2>
<div style="margin:20px 0 40px 0">
    <a style="margin-right:20px; color:#0B5407;" href="../envioDomicilio/consultar.php">CONSULTAR</a>
    <a style="margin-right:20px; color:#0B5407; font-weight:bold;" href="../envioDomicilio/insertar.php">INSERTAR</a>
    <a style="color:#0B5407;"href="../envioDomicilio/eliminar.php">ELIMINAR</a>
</div>

<!-- TU CODIGO EMPIEZA AQUI -->
<section class="seccion-segundo">
        <div class="formulario">
            <form id="myForm" style="display: flex; flex-direction: column;  width: 90% ; " method="POST">
                <div style="display:flex; flex-direction: row; align-items: center; justify-content: space-between;">
                        <div style="display: flex; flex-direction: column; width: 35%; ">
                            <label  >Cedula:</label>
                            <input style="width: 90%;" name="cedula" id="cedula" type="text"/>
                        
                        </div>
                        <div style="display: flex; flex-direction: column; width: 35%; ">
                            <label for="celular">Numero Celular:</label>
                            <input style="width: 95%;" name="celular" id="celular" type="text" />
                        
                        </div>
                </div>
                <div style="display:flex; flex-direction: column; align-items:center;">
                        <label >Correo Electronico:</label>
                        <input id="correo" name="correo" type="text"/>
                </div>
                <div style="display: flex; justify-content: space-between;">
                        <div > <!-- RADIOS BUTTON -->
                        
                            <label >Tipo Envio :</label>
                            <div style="display: grid; grid-template-columns: 0.1fr 1fr; width: 100%;  justify-content: start;">
                            <input type="radio" value="Express" name="gen"/>Express (1-2 dias)
                            <input type="radio" value="Rapido" name="gen"/>Rapido (2-3 dias)
                            <input type="radio" value="Express" name="gen"/>Normal (3-5 dias)
                            <input type="radio" value="Economico" name="gen"/>Economico (5-10 dias)
                            </div>
                        </div>
                        <div > <!-- CHECK BOX -->
                        <label >Productos:</label>
                        <div style="display: grid; grid-template-columns: 0.2fr 1fr; width: 100%; justify-content: start;">
                            <input type="checkbox" value="Camisas" name="env[]"/>Camisas
                            <input type="checkbox" value="Tazas" name="env[]"/>Tazas
                            <input type="checkbox" value="Abrigos" name="env[]"/>Abrigos
                            <input type="checkbox" value="Gorros" name="env[]"/>Gorros
                            <input type="checkbox" value="Bolsos" name="env[]"/>Bolsos
                        </div>
                        
                            
                            
            
                        </div>
                </div>
                    
                
                    <div style="display: flex; justify-content: space-between;" >
                        <div style="display: flex; flex-direction: column; width: 45%;">
                            <label >Elija su ciudad:</label>
                            <select name="cities" id="ciudad" style="width: 100%;">
                            <option name value="Guayaquil">Seleccione</option>
                                <option value="Guayaquil">Guayaquil</option>
                                <option value="Cuenca">Cuenca</option>
                                <option value="Quito">Quito</option>
                                <option value="Machala">Machala</option>
                                <option value="Riobamba">Riobamba</option>
                                <option value="Quevedo">Quevedo</option>
                                <option value="Ibarra">Ibarra</option>
                                <option value="Duran">Duran</option>
                                <option value="Santo Domingo">Santo Domingo</option>
                                <option value="Ambato">Ambato</option>
                            </select>
                        </div>
                        <div style="display: flex; flex-direction: column;  width: 45%;">
                                <label>Codigo postal:</label>
                                <input style="width: 80%;" id="postal" name="postal" type="text"/>   
                        </div>
                    </div>
                    <label>Ingrese Referencias del destino del producto:</label>
                    <textarea name="referencias" id="area_referencias"></textarea>
                    <div style="display: flex; align-items: flex-end; justify-content: center;">
                    <input type="submit">
                    <input type="reset">
                    </div>
                    
            </form>
        </div>
</section>
<?php
    require_once '../conexion.php';

    if (!empty($_POST['cedula']) && !empty($_POST['celular']) && !empty($_POST['correo']) && 
        !empty($_POST['cities']) && !empty($_POST['postal']) && !empty($_POST['gen']) 
        && !empty($_POST['env']) && !empty($_POST['referencias'])) {
        
        $cedula = htmlentities($_POST['cedula']);            
        $celular = htmlentities($_POST['celular']);
        $correo = htmlentities($_POST['correo']);
        $cities = htmlentities($_POST['cities']);
        $postal = htmlentities($_POST['postal']);
        $gen = htmlentities($_POST['gen']);
        $env_array = $_POST['env'];
        
        $env="";
        foreach($env_array as $opcion){
            $env.=$opcion." ";
        }
        
        $referencias = htmlentities($_POST['referencias']);         
        $data = [
            'cedula' => $cedula,
            'celular' => $celular,
            'correo'=>$correo,
            'cities'=>$cities,
            'postal' => $postal,
            'gen' =>$gen,
            'env' => $env,
            'referencias' =>$referencias
        ];

        $sql = "insert into envio_domicilio(cedula, celular, correo, postal, referencias,tipo_envio, productos,ciudad) ".
                "values(:cedula, :celular,:correo, :postal, :referencias, :gen,:env,:cities )";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        
        if ($stmt->rowCount() > 0) {
            header("Location:consultar.php");
        }else{
            echo "Error al insertar su solicitud de envio";
        }
    }
?>
    </body>
</html>