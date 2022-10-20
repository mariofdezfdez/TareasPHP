<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 02</title>
</head>
<body>
    <form action="" method="post">
        <p>Introduzca una cadena de caracteres: <input type="text" name="cadena"></p>
        <input type="submit" name="convertir" value="Convertir a mayusculas">
       
    </form>

    <?php

    if (isset($_POST["convertir"])){
        $cadena =$_POST["cadena"];
        echo $cadena."<br>";

        function mayusculas (&$cadena){
            echo strtoupper ($cadena);
        }
        mayusculas ($cadena);
    }
        
    ?>
    
</body>
</html>