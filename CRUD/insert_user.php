<?php 
include ('connection.php');
$con = connection();

// Obtener datos del formulario y limpiarlos
$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
$matricula = mysqli_real_escape_string($con, $_POST['matricula']);
$carrera = mysqli_real_escape_string($con, $_POST['carrera']);
$foto = mysqli_real_escape_string($con, $_POST['foto']);

// Consulta SQL
$sql = "INSERT INTO alumnos (nombre, matricula, carrera, foto) VALUES ('$nombre', '$matricula', '$carrera', '$foto')";
$query = mysqli_query($con, $sql);

if($query){
    // Redireccionar si la consulta se ejecutó correctamente
    header("Location: index1.php");
    exit; // Detener la ejecución del script después de la redirección
} else {
    // Manejar el error si la consulta falla
    echo "Error al agregar usuario: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);
?>
