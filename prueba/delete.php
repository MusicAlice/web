<?php
    include "conect.php";
    if (isset($_POST["delete"])) {
        $id_user = $_POST["id_user"];
        $resultado = $mysqli->query("SELECT id, name FROM usuario WHERE id = '".$id_user."'");
        $row = mysqli_fetch_array($resultado);
        ?>
        <form method="post">
            <h2>delete user</h2>
            <p>do your are sure of delete to user <?=$row["name"];?>?<b></b></p>
            <input type="hidden" name="id_user" value="<?=$id_user;?>">
            <button name="yes" type="submit" >Yes</button>
            <button name="no" type="submit" >No</button>
        </form>
        <?php
    }
    else{
        header('Location: ../prueba');
    }
    if (isset($_POST["yes"])) {
        $query = "DELETE from  usuario WHERE id = '".$_POST["id_user"]."'";
        $resultat = $mysqli->query($query);
        if($resultat){
            header('Location: ../prueba');
        }
        else{
            echo "Intente nuevamente";
        }
    }
    if (isset($_POST["no"])) {
        header('Location: ../prueba');
    }
    $mysqli = null;
?>