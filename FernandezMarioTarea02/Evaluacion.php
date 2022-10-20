<?php
include ("EmpleadoAsalariado.php");
include ("EmpleadoHoras.php");

$arrayEmpleado = array (
$newEmpleadoAsalariado01= new EmpleadoAsalariado("Mario","Fernandez",25000,10),
$newEmpleadoAsalariado02= new EmpleadoAsalariado("Jorge","Pereira",22000,5),
);

$arrayHoras = array (
$newEmpleadoHoras01=new EmpleadoHoras ("Daniel","Perez",55,9,0),
$newEmpleadoHoras02=new EmpleadoHoras ("Veronica","Lopez",155,9,0),
);


echo $newEmpleadoAsalariado01->getNameComplete()." es un empleado asalariado y cobra al mes ".
$newEmpleadoAsalariado01->getSalarioMes()."<br>";

echo $newEmpleadoHoras01->getNameCompleteHoras()." es un empleado de horas y cobro al mes ".
$newEmpleadoHoras02->getSalarioMesHoras()."<br>"; 

echo "cinco años despues ".$newEmpleadoAsalariado01->getNameComplete()." incremento su salario anual un ".
$newEmpleadoAsalariado01->getincrementarSalario()."%. Actualemnte cobra al año: ".$newEmpleadoAsalariado01
->IncrementarSalario()."<br>";

echo $newEmpleadoAsalariado01->getNameComplete()." cobro ".$newEmpleadoAsalariado01
->comparar($newEmpleadoAsalariado02)." que el otro chico";


?>