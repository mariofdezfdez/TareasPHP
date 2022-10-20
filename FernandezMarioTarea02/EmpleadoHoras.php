<?php

class EmpleadoHoras{
private $nameHoras;
private $surNameHoras;
private $numSSHoras;
private $horas;
private $importe;
private $incrementoImporte;


function __construct($nameHoras, $surNameHoras,$horas,$importe,$incrementoImporte)
{
    $this->nameHoras=$nameHoras;
    $this->surNameHoras=$surNameHoras;
    $this->numSSHoras;
    $this->horas=$horas;
    $this->importe=$importe;
    $this->incrementoImporte=$incrementoImporte;
}
// Setter and Getters

public function getNameHoras()
{
return $this->nameHoras;
}


public function setNameHoras($nameHoras)
{
$this->nameHoras = $nameHoras;

return $this;
}

public function getSurNameHoras()
{
return $this->surNameHoras;
}


public function setSurNameHoras($surNameHoras)
{
$this->surNameHoras = $surNameHoras;

return $this;
}


public function getNumSSHoras()
{
return $this->numSSHoras;
}


public function setNumSSHoras($numSSHoras)
{
$this->numSSHoras = $numSSHoras;

return $this;
}


public function getHoras()
{
return $this->horas;
}


public function setHoras($horas)
{
$this->horas = $horas;

return $this;
}

public function getImporte()
{
return $this->importe;
}


public function setImporte($importe)
{
$this->importe = $importe;

return $this;
}



// Devuelve Nombre Completo
public function getNameCompleteHoras(){
    return $this->nameHoras." ".$this->surNameHoras;
    }

// Devuelve salario mes
public function getSalarioMesHoras (){
    if ($this->horas<25){
        return (25 * $this->importe);
    }else{
        return $this->horas*$this->importe;
    }
    
}

//incrementar salario
function incrementarEmpleado (){
$incrementar = ($this->importe*$this->incrementoImporte/100);
$this->importe+$incrementar;
}

//comparar
function comparar ($otroEmpleado){
    return ($this->importe*$this->horas)-($otroEmpleado->getHoras()*$otroEmpleado->getimporte()); 
   }
}

?>