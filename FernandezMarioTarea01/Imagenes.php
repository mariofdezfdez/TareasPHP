<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<?php

// Definir constantes
define('PROTOCOL', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/');
define('BASE_URL', PROTOCOL.basename(__DIR__));
define('BASE_PATH', __DIR__);



// Obtener la password dentro del fichero pass.txt
function getPassFile($path){
    $myfile = fopen($path.'/pass.txt','r');
    $pass = fgets($myfile);
    fclose($myfile);
    return $pass;
}

function getImages($path, $rel_path, $url){
    // Obtener las imagenes del directorio
    $files_arr = scandir($path);
    
    $Imagenes = "<div class='fila'>";
    
    // Recorrer las imágenes
    foreach ($files_arr as $imgFile) {
        //Get the file path
        $file_path = $imgFile;
        // Get the file extension
        $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
        if ($file_ext=="jpg" || $file_ext=="png" || $file_ext=="JPG" || $file_ext=="PNG") {
            $Imagenes .= "<div><a href=".$url."/".$imgFile.">Ir</a><img src=".$rel_path."/".$file_path." class='imagen'></div>";
        }
    }

    $Imagenes .= "</div>";

    return $Imagenes;

}


if(isset($_POST["existente"])){
    $name_ex = $_POST["nombre"];
    $pass_ex = $_POST["contraseña"];

    // Comprobar si el usuario existe (tiene carpeta)
    
    $path = BASE_PATH."/imagenes/".$name_ex;
    $rel_path = "imagenes/".$name_ex;
    $url = BASE_URL."/imagenes/".$name_ex;
    if(file_exists($path)){
        $passFile = getPassFile($path);
        if ($pass_ex == $passFile){
            echo "<h2>Imágenes del usuario '$name_ex'</h2>";

            // Mostrar las imagenes del usuario.
            echo getImages($path, $rel_path, $url);

            // Mostrar formulario para subir imágenes.
        }else{
            die("Contraseña incorrecta, introduzca la contraseña del usuario correctamente");
        }
    }else{
        die("El usuario no existe. Debe registrarlo.");
    }

}

if(isset($_POST['enviar_fichero'])){
    $user = $_POST["usuario"];
    $path = BASE_PATH."/imagenes/".$user;
    $rel_path = "imagenes/".$user;
    $url = BASE_URL."/imagenes/".$user;
    
    if (isset($_FILES['imagen_1']['tmp_name'])){
        $file_up = $path."/".basename($_FILES['imagen_1']['name']);
        move_uploaded_file($_FILES['imagen_1']['tmp_name'], $file_up);
    }

    if (isset($_FILES['imagen_2']['tmp_name'])){
        $file_up = $path."/".basename($_FILES['imagen_2']['name']);
        move_uploaded_file($_FILES['imagen_2']['tmp_name'], $file_up);
    }

    if (isset($_FILES['imagen_3']['tmp_name'])){
        $file_up = $path."/".basename($_FILES['imagen_3']['name']);
        move_uploaded_file($_FILES['imagen_3']['tmp_name'], $file_up);
    }
    
    
    echo "<h2>Imágenes del usuario '$user'</h2>";

    // Mostrar las imagenes del usuario.
    echo getImages($path, $rel_path, $url);
    

}


?>

<?php if (isset($_POST["existente"]) || isset($_POST["enviar_fichero"])): ?>
<!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
<form enctype="multipart/form-data" method="POST">
    
    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
    <p> Examinar... <input name="imagen_1" type="file" /></p>
    <p> Examinar... <input name="imagen_2" type="file" /></p>
    <p> Examinar... <input name="imagen_3" type="file" /></p>
    <input type="hidden" name="usuario" value = "<?php echo $name_ex ?>" >
    <input type="submit" value="Enviar fichero" name="enviar_fichero" />
</form>
<?php endif ?>
</body>
</html>


