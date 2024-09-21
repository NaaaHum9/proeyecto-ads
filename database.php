<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave ="root";
    $baseDeDatos = "aprovDep";
    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$clave,array(PDO::ATTR_PERSISTENT => true));
    }catch(PDOException $e){
        echo "No se pudo conectar a la base de datos";
        error_log("Error en la base de datos: ".$e->getMessage());
    }
    //$enlace= mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);
?>