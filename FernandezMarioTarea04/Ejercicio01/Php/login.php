<?php

session_start();

function addUsuario($nombre, $hashPassword){
    // Comprobar si existe
    
    if(!file_exists("../UsuariosRegistrados/".$nombre.".txt")){
        // Si no existe
        $fichero = fopen("../UsuariosRegistrados/".$nombre.".txt", "w") or die("Se produjo un error al crear el archivo");
        fwrite($fichero, $hashPassword) or die("No se pudo escribir en el archivo");
        fclose($fichero);
    }else{
        die("Ya existe el usuario");
    }
}

function registrarUsuario ($nombre, $contraseña){
    $hashPassword= password_hash($contraseña, PASSWORD_BCRYPT);
    // Crear carpeta
    addUsuario($nombre, $hashPassword);
}

if (isset($_POST["registro"])){

    $nombre= $_POST["name"];
    $contraseña= $_POST["password"];
    $contraseñaRep= $_POST["passwordRep"];

    if($contraseña !=$contraseñaRep){
       echo "Introduzca correctamente las contraseñas"; 
    }else{
        registrarUsuario($nombre,$contraseña);
        die("El usuario $nombre ha sido registrado. Puede resalizar el login");
    }

    
}


?>