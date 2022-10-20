<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        require("conexionDB.php");

        $id = $_GET['id'];

        $sql = "SELECT  r.nombre as receta, c.nombre as nombre_chef, c.apellido1 as apel, 
                g.nombre, r.dificultad, r.tiempo, r.elaboración, i.nombre as ingrediente,
                ri.cantidad, ri.medida
                FROM receta r 
                INNER JOIN chef c on r.cod_chef = c.codigo
                INNER JOIN grupo g on r.cod_grupo = g.codigo
                INNER JOIN receta_ingrediente ri on r.codigo = ri.cod_receta
                INNER JOIN ingrediente i on i.codigo = ri.cod_ingrediente
                WHERE r.codigo = $id";

        $res = $mysqli->query($sql);

        /* obtener un array asociativo */
        $datos = $res->fetch_all(MYSQLI_ASSOC);
    
        
    ?>

    <h1>Ficha de la receta</h1>
    
    <?php
        echo "<div> Receta: ".$datos[0]['receta']."  -  Chef: ".$datos[0]['nombre_chef']."</div>";
        echo "<div> Grupo: ".$datos[0]['nombre']."  -  Dificultad: ".$datos[0]['dificultad']."  -  Tiempo: ".$datos[0]['tiempo']."</div>";
        echo "<div> Elaboración: ".$datos[0]['elaboración']."</div>";

        echo "<h3>Ingredientes:</h3>";
        foreach ($datos as  $ing) {
            echo "<div> ".$ing['ingrediente'].": ".$ing['cantidad']." ".$ing['medida']."</div>";
        }

        /* liberar el conjunto de resultados */
        $res->free();
        
        /* cerrar la conexión */
        $mysqli->close();
    ?>
    
    
</body>
</html>


