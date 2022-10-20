<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 01</title>
</head>
<body>
    <form method="post">
        <p>Introduzca un numero: <input type="number" name="numero" id=""></p>
        <p>Selecciona operacion:</p>
        <input type="radio" name="operacion" value="A">Primo
        <input type="radio" name="operacion" value="B">Cuadrado
        <p><input type="submit" name="Enviar" value="Enviar"></p>
    </form>

<?php
    
if (isset($_POST["Enviar"])){

        $numero = $_POST ["numero"];
        $operacion = $_POST ["operacion"];

    function primo($numero){
        $contador=0;
        
        for($i=2;$i<=$numero;$i++)
        {
            if($numero%$i==0)
            {
                if(++$contador>1)
                    return false;
            }
        }
        return true;
    }


    function Ejecuta_Operacion ($numero,$operacion){
        if ($operacion == "B"){
            $cuadrado =$numero*$numero;
            echo "el cuadrado de ".$numero. " es ".$cuadrado;
        }   

        else if(primo($numero))
            echo "El número ".$numero." es primo";
        else
            echo  "El número ".$numero." no es primo";

    }

    Ejecuta_Operacion($numero,$operacion);
    
}
?>
</body>
</html>



