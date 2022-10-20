<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        div{
            text-align: center;
        }
    </style>
</head>
<body>

    <?php

    session_start();

    require("Actor.php");
    
        if(isset($_POST["agregar_actor"])){
            $nombre= $_POST["nombre"];
            $fecha_nacimiento= $_POST["nacimiento"];
            $nif= $_POST["nif"];

            $actor = new Actor($fecha_nacimiento, $nombre, $nif);
            if (isset($_SESSION['lista_actores'])){
                $_SESSION['lista_actores'][] = $actor->getNombre();
            }else{
                $_SESSION['lista_actores'] = [$actor->getNombre()];
            }
               
        }

    ?>
        <div>
        <form action="" method="POST">
            <h1>Agregar nuevo actor</h1>
            <p>Fecha de nacimiento <input type="date" name="nacimiento" required></p>
            <p>Nombre <input type="text" name="nombre" required></p>
            <p>NIF <input type="text" name="nif" required></p>
            <input type="submit" name="agregar_actor" value="Agregar Actor">
        
        </form>
    </div>
   
    <h1>Secciones:</h1>
    <a href="interfazPelicula.php">Gestión pelicula</a>
    <a href="interfazVideoclub.php">Gestión videclub</a>

    <br>
    <br>
    <p><a href="inicio.php">volver a inicio</a></p>

</body>
</html>