<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de recetas</h1>
    <table>
        <thead>
            <tr>
                <td><strong>RECETA</strong></td>
                <td><strong>CHEF</strong></td>
                <td></td>
            </tr>
        </thead>

        <tbody>
            <?php
                // Incluimos la declaración donde se realiza la conexión a la DB
                require("conexionDB.php");

                // La consulta SQL a ejecutar (obtner las recetas)
                $sql = "SELECT receta.codigo as id, receta.nombre as receta, 
                               chef.nombre as nombre_chef, chef.apellido1 as apel
                        FROM receta 
                        INNER JOIN chef on receta.cod_chef = chef.codigo";

                // Se ejecuta la consulta SQL y se obtienen los datos
                if ($res = $mysqli->query($sql)) {

                    /* obtener un array asociativo */
                    while ($fila = $res->fetch_assoc()) {
                        echo "<tr><td>{$fila['receta']}</td><td>{$fila['nombre_chef']} {$fila['apel']}</td><td><a href='fichaReceta.php?id={$fila['id']}'>Mas información</a></td></tr>";
                    }
                
                    /* liberar el conjunto de resultados */
                    $res->free();
                }
                
                /* cerrar la conexión */
                $mysqli->close();
            ?>
        </tbody>

    </table>
    
</body>
</html>


