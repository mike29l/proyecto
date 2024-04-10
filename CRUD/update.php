<?php 

include ('connection.php');
$con = connection();

$id=$_GET['id'];

$sql = "SELECT * FROM alumnos WHERE id= '$id'";
$query = mysqli_query($con, $sql); 
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar usuario</title>
</head>
<body>
<div>
        <form action="edit_user.php" method="POST">
            <h1>editar usuario</h1>
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <input type="text" name="nombre" placeholder="nombre" value="<?= $row['nombre']?>">
            <input type="text" name="matricula" placeholder="matricula" value="<?= $row['matricula']?>">
            <input type="text" name="carrera" placeholder="carrera" value="<?= $row['carrera']?>">
            <input type="text" name="foto" placeholder="foto" value="<?= $row['foto']?>">


            <input type ="submit" value="Actualizar infromacion">
        </form>
    </div>
</body>
</html>