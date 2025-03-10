<?php
    /*$mysqli = new mysqli("localhost", "root", "Colombia1*", "prueba");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>*/
$host = "sqlXXX.epizy.com"; // cambia esto por el hostname real
$user = "epiz_12345678";    // tu nombre de usuario de MySQL
$password = "TuContraseña"; // la contraseña que usaste al crear la base
$database = "epiz_12345678_nombrebd"; // nombre de la base de datos

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
    echo "Error de conexión: " . $mysqli->connect_error;
    exit();
}
?>
