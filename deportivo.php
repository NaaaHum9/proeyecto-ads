<?php
    require_once("database.php");
    session_start();
    $consulta = $conexion->prepare("SELECT * from deportivo where idDeportivo=1");
    echo $_SESSION["id"];
    if (isset($_GET['myFlag'])) {
        echo "Bandera Recibida ";
        $idUser = $_SESSION["id"];
        
    } else {
        $idUser = 1;
    }
    
    //$sql=mysqli_query($enlace,$consulta);
    //$arr = mysqli_fetch_array($sql);
    //$sql2=mysqli_query($enlace,"Select * from comentdeportivo where idDeportivo=1");
    $consulta2 = $conexion->prepare("Select * from comentdeportivo where idDeportivo=1");
    $consulta->execute();
    
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
            a{  
                color: black;
                text-decoration: none;}
            
            </style>
    </head>
    <body>
        <nav class="nav">
            <a class="navButton" href="index.html">Inicio</a>
            <a class="navButton" href="#">Deportivos</a>
            <a class="navButton" href="#"></a><?php
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
                <img id="imgDep" src="dep18.png">
                <b><p>Calificación: <?php echo $arr[6]; ?>/5.0</p></b>
                <b><p>Dirección:</p></b>
                <p><?php echo $arr[2]; ?></p>
                <b><p>Horario:</p></b>
                <p><?php echo $arr[3]; ?></p>
                <b><p>Instalaciones y Actividades:</p></b>
                <p><?php echo $arr[4]; ?></p>
            </div>
            <div class="info">
                <h1><?php echo $arr[1]; ?></h1>
                <div>
                    <div>
                        <form>
                            <textarea placeholder="Ingresa un comentario o avisa cuando irás de visita. Recuerda ser respetuoso en todo momento."></textarea><br>
                            <button>Enviar comentario</button>
                        </form>
                    </div><br>
                    <div>
                        <div class="sectCom">
                        <?php 
                            foreach($consulta2 as $row){
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