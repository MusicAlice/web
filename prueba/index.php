<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            margin: 20px auto;
            display: inline-block;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Crear Usuario</h2>
    <form action="create.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <button name="save" type="submit">Guardar</button>
    </form>
    
    <h2>Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Actualizar</th>
                <th>Ver</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "conect.php";
                $resultado = $mysqli->query("SELECT id, name, email FROM usuario");
                while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><?= htmlspecialchars($row["name"]); ?></td>
                <td><?= htmlspecialchars($row["email"]); ?></td>
                <td>
                    <form action="update.php" method="post">
                        <input type="hidden" name="id_user" value="<?= $row["id"]; ?>">
                        <button name="update">Actualizar</button>
                    </form>
                </td>
                <td>
                    <form action="view.php" method="post">
                        <input type="hidden" name="id_user" value="<?= $row["id"]; ?>">
                        <button name="view">Ver</button>
                    </form>
                </td>
                <td>
                    <form action="delete.php" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                        <input type="hidden" name="id_user" value="<?= $row["id"]; ?>">
                        <button name="delete" style="background-color: #dc3545;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>