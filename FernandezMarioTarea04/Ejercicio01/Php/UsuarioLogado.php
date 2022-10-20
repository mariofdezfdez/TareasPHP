<?php

    session_start();

    require_once("../Php/funciones.php");

    if(isset($_POST["logueado"])){
        $nombre= $_POST["name"];
        $contraseña= $_POST["password"];
        if(!isset($_POST["check"])){
            $time = $_POST["time"];
        }

        //comprobar datos correctos
        if (!file_exists("../UsuariosRegistrados/".$nombre.".txt")){
            die("credenciales incorrectas");
        }
        else{
            $hashPwd = getPwdFile($nombre);
            if (password_verify($contraseña, $hashPwd)){
                $_SESSION['username'] = $nombre;
                $_SESSION['inicio_sesion'] = time();
                if (!isset($_POST["check"])){
                    $_SESSION['tiempo_sesion'] = $time;
                }else{
                    unset($_SESSION['tiempo_sesion']);
                }
                //die(BASE_URL_PROJECT."Templates/UsuarioLogado.php");
                header("Location: ../Templates/UsuarioLogado.php"); 
            }else{
                die("Las contraseñas no coinciden");
            }
        } 

        

       


    }
?>