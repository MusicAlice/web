<?php
    include "conect.php";
    if (isset($_POST["update"])) {
        $id_user = $_POST["id_user"];
        $resultado = $mysqli->query("SELECT id, name, email FROM usuario WHERE id = '".$id_user."'");
        $row = mysqli_fetch_array($resultado);
        ?>
        <form method="post">
            <h2>update info user</h2>
            <input type="hidden" name="id_user" value="<?=$id_user;?>">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?=$row["name"];?>">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$row["email"];?>">
            <br>
            <button name="upsave" type="submit" >Update</button>
        </form>
        <?php
    }
    else{
        header('Location: ../prueba');
    }
    if (isset($_POST["upsave"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $query = "UPDATE usuario SET name='".$name."', email='".$email."' WHERE id = '".$_POST["id_user"]."'";
        $resultat = $mysqli->query($query);
        if($resultat){
            header('Location: ../prueba');
        }
        else{
            echo "Intente nuevamente";
        }
    }
    $mysqli = null;
?>