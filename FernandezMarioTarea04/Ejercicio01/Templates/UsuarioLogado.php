<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <p><input type="submit" name="cerrar" value="Cerrar Sesion"></p>
        <input type="text" placeholder="Contraseña Actual" name="pass">
        <input type="text" placeholder="Nueva Contraseña" name="newPass">
        <input type="text" placeholder="Rep Contraseña" name="repPass">
        <input type="submit" name="changePass" value="Cambiar Contraseña">
    </form>
    <br><br>

    <?php
        session_start();
        require_once("../Php/funciones.php");
        
        if (isset($_SESSION['inicio_sesion']) && isset($_SESSION['tiempo_sesion'])){
            if ((time() - $_SESSION['inicio_sesion']) > $_SESSION['tiempo_sesion']) {
                unset($_SESSION['inicio_sesion']);
                session_unset(); 
                session_destroy(); 
                echo "session destroyed";
            }else{
                echo "Usuario logueado: ".$_SESSION["username"]."<br>";
                if (isset($_SESSION['tiempo_sesion'])){
                    echo "Duracion: ".$_SESSION['tiempo_sesion'];
                }
            }
        }elseif(isset($_SESSION['inicio_sesion'])){
            echo "Usuario logueado: ".$_SESSION["username"]."<br>";
        }else{
            header("Location: ../index.php"); 
        }

        if(isset($_POST["cerrar"])){
            unset($_SESSION['inicio_sesion']);
            session_unset(); 
            session_destroy(); 
            header("Location: ../index.php"); 
        }

        if(isset($_POST["changePass"])){
            $pass = $_POST['pass'];
            $new = $_POST['newPass'];
            $rep = $_POST['repPass'];

            if (changePass($pass, $new, $rep)){
                header("Location: ../index.php"); 
            }else{
                die("Error al cambiar la contraseña");
            }
        }

    ?>

    
</body>
</html>