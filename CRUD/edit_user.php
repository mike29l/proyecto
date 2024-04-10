<?php

include ('connection.php');
$con = connection();


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$foto = $_POST['foto'];

$sql = "UPDATE alumnos SET nombre = '$nombre', matricula='$matricula', carrera='$carrera', foto='$foto' WHERE id='$id'";
$query = mysqli_query($con, $sql); 

if($query){
    Header("Location: index1.php");
};
?>
