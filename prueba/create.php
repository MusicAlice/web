<?php
    include "conect.php";
    if (isset($_POST["save"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $query = "INSERT INTO usuario (name, email) VALUES ('".$name."', '".$email."');";
        $resultat = $mysqli->query($query);
    }
    header('Location: ../prueba');
    $mysqli = null;
?>