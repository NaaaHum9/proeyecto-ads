<?php
    require_once("database.php");
    
    session_start();
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
                <form action="#" name="login" method="post">
                    <h1>Bienvenido</h1>
                    <label>Correo electrónico</label><br>
                    <input type="text" name="email"><br>
                    <label>Contraseña</label><br>
                    <input type="password" name="pass"><br><br>
                    <input type="submit" name="logSub" value="Iniciar Sesión"><br><br>
                    <label>¿No tienes cuenta?</label><br>
                    <a href="signup.php">Registrate</>
                </form>
            </div>
        </div>
    </body>
</html>
<?php

if (!empty($_POST["logSub"])) {
    if (empty($_POST["email"]) and empty($_POST["pass"])) {
        echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        $consulta=$conexion->prepare("SELECT * from usuario where correo=:correo and pass=:pass");
        $correo=$_POST["email"];
        $pass=password_verify($_POST["pass"],PASSWORD_DEFAULT);
        $consulta->bindParam(":correo",$correo);
        $consulta->bindParam(":pass",$pass);
        $consulta->execute();
        $arr = $consulta->fetch(PDO::FETCH_ASSOC);
        
        if (empty($arr)) {
            
            
            echo "<br>";
            echo "<br>";
            echo '<div class="alert alert-danger">Acceso DENEGADO</div>';
            
        } else {
            $_SESSION["nombre"]= $arr['nombre'];
            $_SESSION["correo"]=$arr['correo'];
            $_SESSION["id"]= $arr['id'];

            header("location: index.php");
            
        }
    }
}

?>