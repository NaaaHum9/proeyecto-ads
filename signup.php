<?php
    require_once("database.php");
?>



<!DOCTYPE html>
<html>
    <head>
        <title>
            Aprovechamiento de Espacios Deportivos
        </title>
        <style>
            .canvas{display:flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                
                background-image: url("https://www.rivasciudad.es/wp-content/uploads/2019/04/Plano-centro-deportivo-La-Luna.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
            .item{
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5%;
                background-color: rgba(255, 255, 255,.85);
                padding: 1vh;
                width: 50vh;

            }
        </style>
    </head>
    <body class="canvas">
        <div class="item">
            <div >
                <form action="#" name="signUp" method="post">
                    <h1>Bienvenido Registrate</h1>
                    <label>Nombre</label><br>
                    <input type="text" name="nombre"><br>
                    <label>Correo electrónico</label><br>
                    <input type="text" name="email"><br>
                    <label>Contraseña</label><br>
                    <input type="password" name="pass"><br><br>
                    <input type="submit" name="sign" value ="Registrate"><br><br>
                    <label>¿Ya tienes cuenta?</label><br>
                    <a href="login.php">Inicia Sesión</a>
                </form>
            </div>
        </div>
    </body>
</html>


<?php

    if(isset($_POST["sign"])){
        $nombre= $_POST["nombre"];
        $email= $_POST["email"];
        $pass= password_hash($_POST["pass"], PASSWORD_DEFAULT);
        //$id;
        $registro = $conexion->prepare("INSERT INTO usuario (nombre,correo,pass,reputacion) VALUES (:nombre,:email,:pass,0)");

        $registro->bindParam(":nombre",$nombre);
        $registro->bindParam(":email",$email);
        $registro->bindParam(":pass",$pass);
        $registro->execute();
        if($registro){
            echo "<script>alert('Registro exitoso')</script>";
        }else{
            echo "<script>alert('Error al registrar')</script>";
        }       
        header("Location: login.php", true, 301);

        exit();

    }

?>

