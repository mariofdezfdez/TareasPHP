<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Php/login.php" method="POST">
        <h2>Registro</h2>
        <p>Nombre: <input type="text" name="name" required></p>
        <p>Contraseña: <input type="password" name="password" required></p>
        <p>Repita Contraseña: <input type="password" name="passwordRep" required></p>
        <input type="submit" name="registro" value="Registrarse">
    </form>
    
    <form action="Php/UsuarioLogado.php" method="POST">
        <h2>Inicio Sesion</h2>
        <p>Nombre: <input type="text" name="name" required></p>
        <p>Contraseña: <input type="password" name="password" required></p>
        <p>Mantener Sesion Iniciada <input type="checkbox" name="check"></p>
        <p>Tiempo de Sesion: <input type="number" name="time">
            
        </p>
        <input type="submit" name="logueado" value="Iniciar Sesion">

    </form>
    
</body>
</html>