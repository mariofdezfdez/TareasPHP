<?php

    // Función para devolver el pwd hash de un usuario que se le pasa como parámetro.
    function getPwdFile($nombre){
        $fichero = fopen("../UsuariosRegistrados/".$nombre.".txt", "r");
        $hash = fgets($fichero);
        fclose($fichero);
        return $hash;
    }

    function changePass($pass, $new, $rep){
        $nombre = $_SESSION['username'];
        if ($new == $rep){
            $oldPass = getPwdFile($nombre);
            if (password_verify($pass, $oldPass)){
                $hashPassword= password_hash($new, PASSWORD_BCRYPT);
                $fichero = fopen("../UsuariosRegistrados/".$nombre.".txt", "w") or die("Se produjo un error al crear el archivo");
                fwrite($fichero, $hashPassword) or die("No se pudo escribir en el archivo");
                fclose($fichero);

                return true;
                
            }
        }else{
            die("Las contraseñas no coinciden");
        }
        
    }


?>
