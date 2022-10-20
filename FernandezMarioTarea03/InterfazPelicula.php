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

    require("Pelicula.php");
    
        

        if (isset($_POST["agregar_pelicula"])){
            $titulo= $_POST["titulo"];
            $codigo= $_POST["codigo"];
            $director= $_POST["director"];

            $pelicula = new Pelicula($titulo, $codigo, $director);
            if (isset($_SESSION['lista_peliculas'])){
                $_SESSION['lista_peliculas'][] = serialize($pelicula);
            }else{
                $_SESSION['lista_peliculas'] = [serialize($pelicula)];
            }
           

        }


    ?>
        
   

    <div>
        <form action="" method="POST" >
            <h1>Agregar nueva pelicula</h1>
            <p>Titulo <input type="text" name="titulo" required></p>
            <p>Codigo <input type="text" name="codigo" required></p>
            <p>Director <input type="text" name="director" required></p>
                Actor 
            <select name="actor">
            <?php
                 if (isset($_SESSION['lista_actores'])){
                    foreach ($_SESSION['lista_actores'] as $actor) {
                        echo "<option value='".$actor."'>".$actor."</option>";
                    }
                 }
            ?>
                
            </select>
            <p>Disponible <input type="radio" name="estado" value="disponible">
                Alquilada<input type="radio" name= "estado" value="alquilada"></p>
            <p>Fecha de devolucion <input type="date" name="devolucion"></p>
            <input type="submit" name="agregar_pelicula" value="Agregar pelicula">
        
        </form>
    </div>

    <div>
        <form action="" method="POST" >
            <h1>Buscar pelicula por codigo</h1>
            Codigo <input type="text" name="codigo_pelicula" required>
            <input type="submit" name="buscar_pelicula" value="Buscar">
        </form>

        <?php
            if (isset($_POST["buscar_pelicula"])){
                $codigo= $_POST["codigo_pelicula"];
                if (isset($_SESSION['lista_peliculas'])){
                    foreach ($_SESSION['lista_peliculas'] as $pelicula) {
                        $peli = unserialize($pelicula);
                        if ($codigo == $peli->getCodigo()){
                            echo "<p> ----- Películas localizadas ----- </p>";
                            echo "<p>".$peli->getCodigo()." - ".$peli->getTitulo()."</p>";
                        }
                    }
                }
            }
        ?>
    </div>

    <div>
        
        <h1>Listado de todas las peliculas</h1>
            
        <?php
            
        if (isset($_SESSION['lista_peliculas'])){
            foreach ($_SESSION['lista_peliculas'] as $pelicula) {
                $peli = unserialize($pelicula);
                echo "<p>".$peli->getCodigo()." - ".$peli->getTitulo()."</p>";
            }
        }
            
        ?>
    </div>

    <h1>Secciones:</h1>
    <a href="interfazActor.php">Gestión actor</a>
    <a href="interfazVideoclub.php">Gestión videclub</a>
    
    <br>
    <br>
    <p><a href="inicio.php">volver a inicio</a></p>
</body>
</html>
