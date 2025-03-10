<?php
    include "conect.php";
    if (isset($_POST["view"])) {
        $id_user = $_POST["id_user"];
        $resultado = $mysqli->query("SELECT id, name, email FROM usuario WHERE id = '".$id_user."'");
        $row = mysqli_fetch_array($resultado);
        ?>
            <form method="post">
                <h2>data user select</h2>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?=$row["name"];?>">
                <br>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?=$row["email"];?>">
                <br>
            </form>
        <?php
    }
    else{
        echo "Intente nuevamente";
    } 
    $mysqli = null;
?>