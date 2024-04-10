<?php
include('connection.php');

$con = connection();

$sql="SELECT * FROM alumnos";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #7A7A7A;
            margin: 0;
            padding: 0;

        }

        .container {
            text-align: center;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #B9B9B9;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
            background-color: gold;
            color: black;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-align: left;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div>
        <form action="insert_user.php" method="POST">
            <h1>Crear usuario</h1>

            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="matricula" placeholder="Matrícula">
            <input type="text" name="carrera" placeholder="Carrera">
            <input type="text" name="foto" placeholder="Foto">

            <input type="submit" value="Agregar Usuario">
        </form>

        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Matrícula</th>
                    <th>Carrera</th>
                    <th>Foto</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['nombre']?></td>
                    <td><?= $row['matricula']?></td>
                    <td><?= $row['carrera']?></td>
                    <td><?= $row['foto']?></td>
                    <td><a href="update.php?id=<?=$row['id']?>">Editar</a></td>
                    <td><a href="delete_user.php?id=<?=$row['id']?>">Eliminar</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>