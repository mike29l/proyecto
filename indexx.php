<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNACH</title>
    <link rel="shortcut icon" href="descarga.jpeg">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura total de la ventana */
            background-image: url('fondo.gif'); /* Imagen de fondo animada */
            background-size: cover; /* Ajusta la imagen para cubrir todo el fondo */
            background-position: center; /* Centra la imagen */
        }

        .contenedor {
            border-radius: 20px;
            padding: 40px;
            text-align: center; /* Centra horizontalmente */
            max-width: 400px; /* Máximo ancho */
            width: 100%; /* Ajusta a la pantalla */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Sombra para profundidad */
        }

        .titulo {
            font-size: 25px;
            color: transparent;
            background-clip: text;
            background: linear-gradient(#1497be, #1c2aec);
            -webkit-background-clip: text;
            animation: text 5s linear infinite;
        }
        .resultados{
            color:red;
            font-size: 30px;
        }
        .resultado{
            color:white;
            font-size: 20px;
        }
        .text {
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 100%; /* Ancho total */
            background-color: #e1e1d5;
            text-align: left;
            color: black;
        }

        @keyframes text {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }


        .b {
            color: blanco;
            background-color: #4CAF50; 
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        

        /* Clase para dar color específico al texto importante */
        .highlight {
            font-size: 25px;
            color: transparent;
            background-clip: text;
            background: linear-gradient(red, orange, blue);
            -webkit-background-clip: text;
            animation: text 5s linear infinite;
            font-size: 25px;
        }
    </style>
    
    <script>
    function redirectAfterDelay() {
        setTimeout(() => {
            window.location.href = 'indexx.php'; // Redirige a una página específica después de 5 segundos
        }, 7000);
    }
    </script>
</head>
<body>
<div class="contenedor">
    <form action="" method="GET">
        <p class="titulo">POR LA CONCIENCIA DE LA NECESIDAD DE SERVIR</p>
        <div class="imagen">
            <img src="logo.png" width="100" alt="Logo UNACH">
        </div>
        <input type="text" class="text" name="busqueda" placeholder="INGRESE UNA MATRÍCULA"><br><br>
        <input type="submit" class="b" name="enviar" value="Buscar"><br><br>
    </form>
    
    <?php 
    if(isset($_GET['enviar'])) {
        if(!empty($_GET['busqueda'])) {
            $busqueda = $_GET['busqueda'];
            $consulta = $conn->query("SELECT * FROM alumnos WHERE matricula = '$busqueda'");

            if($consulta->num_rows > 0) {
                echo "<div class='resultado'>";
                while($row = $consulta->fetch_assoc()) {
                    echo "<span class='highlight'>Nombre del Alumno:</span> " . "<br>". $row["nombre"] . "<br>";
                    echo "<span class='highlight'>Carrera actual:</span> " . "<br>". $row["carrera"] . "<br>";
                    echo "<span class='highlight'>Matrícula:</span> " . "<br>".$row["matricula"] . "<br>";
                    if(!empty($row['foto'])) {
                        echo '<img src="' . $row['foto'] . '" alt="Foto del alumno" width="300" height="250"><br>';
                    }
                }
                echo "</div>";
                
                // Inicia el temporizador para redirigir después de mostrar resultados
                echo "<script>redirectAfterDelay();</script>";

            } else {
                echo "<div class='resultados'>No está registrado $busqueda en la institución.</div>";
                echo "<script>redirectAfterDelay();</script>";

            }
        } else {
            echo "<div class='resultados'>No se ingresó ninguna búsqueda.</div>";
        }
        $conn->close();
    }
    ?>
</div>

</body>

</html>