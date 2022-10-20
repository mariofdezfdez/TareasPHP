<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 03</title>
</head>
<body>

<?php

    // Chequear nombre de usuario válido.
    function checkName($name){
        $res = false;
        if (strlen($name) >= 4 && strlen($name) <= 12){
            if (preg_match("/^[a-zA-Z0-9_-]+$/", $name)){
                $res = true;
            }
        }

        return $res;
    }

    // Chequear requisitos de contraseña.
    function checkPass($pass){
        return strlen($pass) > 5;
    }

    // Crear un fichero pass.txt con una password.
    function createFilepass($pass, $path){
        $myfile = fopen($path."/pass.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $pass);
        fclose($myfile);
    }

    if(isset($_POST["nuevo"])){

        $name_new = $_POST["nombre"];
        $pass_new = $_POST["contraseña"];
        $repeat_new = $_POST["repita"];

        if((isset($name_new) && isset($pass_new)) && ($pass_new == $repeat_new)) {
            $path = __DIR__."/imagenes/".$name_new;
            
            // Comprobar nombre de usuario y que la contraseña cumpla especificaciones.
            if (checkName($name_new) && checkPass($pass_new)){
                if(file_exists($path)){
                    echo "Existe el fichero";
                }else{
                    // Crear directorio.
                    mkdir($path);
                    createFilepass($pass_new, $path);
                    echo "Se ha creado el nuevo usuario con la carpeta "."/".$name_new;
                }
            }else{
                echo "Los datos introducidos no son correctos (user o password).";
            }
        }else{
            echo "Introduzca el usuario y la contraseña correctamente";
        }
    }


?>
    <form action="Imagenes.php" method="post">
        <h3>Usuario Existente:</h3>  
        <p>Nombre:<br><input type="text" name = "nombre" required></p>
        <p>Contraseña:<br><input type="password" name = "contraseña" required></p>
        <input type="submit" name="existente"  value="Enviar">  
    </form>

     <form action="" method="post">
        <h3>Nuevo Usuario:</h3>
        <p>Nombre:<br><input type="text" name = "nombre" required></p>
        <p>Contraseña:<br><input type="password" name = "contraseña" required></p>
        <p>Repita la contraseña:<br><input type="password" name ="repita" required></p>
        <input type="submit" name ="nuevo" value ="Enviar">
     </form>
  

    
</body>
</html>