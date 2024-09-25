<?php
    require_once("database.php");
    session_start();

    echo $_SESSION["id"];
    if (isset($_GET['myFlag'])) {
        echo "Bandera Recibida ";
        $idUser = $_SESSION["id"];
        $consulta="SELECT * from usuario where idUsuario=$idUser";
        $consulta = $conexion->prepare("SELECT * from usuario where idUsuario=:idUser");
        $consulta->bindParam(":idUser",$idUser);
        $consulta->execute();
    } else {
        $idUser = 1;
    }
    
    $arr = $consulta->fetch();
    $sql2 = $conexion->prepare("Select * from comentUsuario where idUsuario=:idUser");
    $sql2->bindParam(":idUser",$idUser);
    $sql2->execute();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Aprovechamiento de Espacios Deportivos
        </title>
        <style>
            body{
                background-color:  rgb(35, 81, 0);
                display: flex;
                flex-direction: column;
            }
            nav{
                height: 5vw;
                display: flex;
                background-color: green;
                justify-content: center;
                align-items: center;
                
            }
            .sectCom{
                height: 60vw;
                max-height: 20vw;
                overflow-y: scroll;
                overflow-x: hidden;
                border: 1px solid #ccc; 
            }
            .navButton{
                flex: auto;
                text-align: center;
                text-decoration: none;
                color: white;
                
            }
            textarea{
                width: 100%;
                height: 100%;
            }
            .canvas2{
              display: flex;
                align-items: center;
              
            }
            .canvas{
              display: flex;
                
            }
            .coment{padding: 2%;}
            #imgDep{
                width: 100%;
            }
            #perfil{
                width: 10vh;
                height: 10vh;
            }
            .side{
                background-color: aliceblue;
                width: 33%;
                padding: 2%;
            }
            .info{
                background-color: aliceblue;
                width: 66%;
                padding: 2%;
            }
            .footer {
                padding: 20px;
                text-align: center;
                background: green;}
            
            </style>
    </head>
    <body>
        <nav class="nav">
            <a class="navButton" href="index.html">Inicio</a>
            <a class="navButton" href="deportivo.html">Deportivos</a>
            <a class="navButton" href="#"></a>
            <?php
                if($_SESSION!=NULL){
                    echo "<a class='navButton' href='perfil.php?myFlag'>Mi Cuenta</a><br>";
                    echo "<a class='navButton' href='logout.php'>Cerrar Sesión</a>";
                }else{
                    echo "<a class='navButton' href='login.php'>Inicio Sesión</a><br>";
                    echo "<a class='navButton' href='signup.php'>Registrar</a>";
                }
            ?>
        </nav>
        <div class="canvas">
            <div class="side">
                <img id="imgDep" src="https://st3.depositphotos.com/4111759/13425/v/450/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg"">
                
                <b><p>Deportes:</p></b>
                <b><p>Correo electrónico:</p></b>
                <p><?php echo $arr[2]?></p>
                <b><p>Descripción:</p></b>
                <p></p>
            </div>
            <div class="info">
                <h1><?php echo $arr[1]?></h1>
                <b><p>Reputación: <?php echo $arr[5]?>/5.0</p></b>
                <div>
                    <div>
                        <form>
                            
                            <button>Ver mis comentarios</button>
                        </form>
                    </div><br>
                    <div>
                        <p><b>Comentarios sobre ti:</b></p>
                        <div class="sectCom">
                            <?php while($row = $sql2->fetch()){
                                ?>
                                <div class="canvas2">
                                <img id="perfil" src="https://st3.depositphotos.com/4111759/13425/v/450/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg">
                                <div class="coment">
                                    <b><p><?php echo $row['autor']; ?></p></b>
                                    <p><?php echo $row['contenido']; ?></p>
                                </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
                </div>
                
        </div>
        <div class="footer">
            <p class="copyright-text">Copyright &copy; 2024 All Rights Reserved by 
            </p>
        </div>
    </body>
</html>