<?php

$host = "localhost";
$usuario = "root";
$pass = "";
$name_BD = "recetas";

$mysqli = new mysqli($host,$usuario,$pass,$name_BD);

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

?>