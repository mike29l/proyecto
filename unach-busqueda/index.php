<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNACH</title>
    <link rel="stylesheet" href="est.css">
    <link rel="shortcut icon" href="descarga.jpeg">

</head>
<body>

<div class="contenedor">
    <form action="" class="t" method="GET"><br>
    <p class = "pp">POR LA CONCIENCIA DE LA NECESIDAD DE SERVIR</p>
<div class="img">
    <img src="descarga.jpeg" width="100">
</div>
    </form>
</div>
<div class="">
    <form action="" class="t" method="GET"><br>
<input type="text" class="text" name="busqueda" placeholder="MATRICULA"><br><br>
<input type="submit" class="b" name="enviar" value="buscar"><br><br>
</form>
</div>
<br><br><br>

<?php 
if(isset($_GET['enviar'])) {
    // Verificar si se ingresó texto en el campo de búsqueda
    if(!empty($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];

        // Ejecutar la consulta solo si hay texto en el campo de búsqueda
        $consulta = $conn->query("SELECT * FROM alumnos WHERE matricula = '$busqueda'");

        if($consulta->num_rows > 0){
            echo "<div class=f><ul>";
            while($row = $consulta->fetch_assoc()){
                echo   "Nombre del Alumno: " . $row["nombre"] . "<br>" . " Carrera actual: " . $row["carrera"] . "<br>" . " Matricula: " . $row["matricula"] . "</div>";
                // Mostrar la imagen si está definida
                if(!empty($row['foto'])) {
                    echo '<div class=p><img src="' . $row['foto'] . '" alt="Foto del alumno" width="300" height="250">'. "</div>";
                }
            }
            echo "</ul>";
        } else {
            echo "<div class=f>no está registrado $busqueda en la institución" . "</div>";
        }
    } else {
        echo "<div class=f>No se ingresó ninguna búsqueda.</div>";
    }
    $conn->close();
}
?>

</body>
</html>
