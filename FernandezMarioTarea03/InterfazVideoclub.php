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

    require("Videoclub.php");
    require("Pelicula.php");
    
    if (isset($_POST["agregar_videoclub"])){

        $pelicula= $_POST["pelicula"];
        $genero= $_POST["genero"];
        $codigo= $_POST["codigo"];

        $videoclub = new Videoclub($pelicula, $genero, $codigo);

        if (isset($_SESSION['lista_videoclubs'])){
            $_SESSION['lista_videoclubs'][] = serialize($videoclub);
        }else{
            $_SESSION['lista_videoclubs'] = [serialize($videoclub)];
        }

    }

    ?>
       
   

    <div>
        <form action="" method="post">
            <h1>Agregar nuevo videoclub</h1>
            Peliculas
            <select name="pelicula">
            <?php
                if (isset($_SESSION['lista_peliculas'])){
                    foreach ($_SESSION['lista_peliculas'] as $pelicula) {
                        $peli = unserialize($pelicula);
                        echo "<option value='".$peli->getCodigo()."'>".$peli->getTitulo()."</option>";
                    }
                }
            ?>
            </select>
            <p>
            Generos
            <select name="genero">
                <option value="drama">Drama</option>
                <option value="infantil">Infantil</option>
                <option value="terror">Terror</option>
            </select>
            </p>  
            <p>Codigo<input type="text" name="codigo"></p>  
            <input type="submit" name="agregar_videoclub" value="Agregar Videoclub">      
        </form>
    </div>

    <br>

    <div>

        
        <h2>===== Listado de videoclubs =====</h2>

        <?php
            if (isset($_SESSION['lista_videoclubs'])){
                foreach ($_SESSION["lista_videoclubs"] as $videoclub) {
                    $vid = unserialize($videoclub);
                    echo "<p>Videoclub: ".$vid->getCodigo()." </p>";
                }
            }
        ?>

    </div>

    <h1>Secciones:</h1>
    <a href="interfazActor.php">Gestión actor</a>
    <a href="interfazPelicula.php">Gestión pelicula</a>

    <br>
    <br>
    <p><a href="inicio.php">volver a inicio</a></p>
</body>
</html>
