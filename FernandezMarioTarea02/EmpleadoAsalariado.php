<?php

class EmpleadoAsalariado{
  private $name;
  private $surName;
  private $numSS;
  private $salarioBruto;
  private $incrementarSalario;
  

  function __construct($name, $surName,$salarioBruto,$incrementarSalario)
{
    $this->name=$name;
    $this->surName=$surName;
    $this->numSS;
    $this->salarioBruto=$salarioBruto;
    $this->incrementarSalario=$incrementarSalario;
    
}

// Setter and Getter
public function getName()
{
return $this->name;
}

public function setName($name)
{
$this->name = $name;

return $this;
}

public function getSurName()
{
return $this->surName;
}

public function setSurName($surName)
{
$this->surName = $surName;

return $this;
}
 
public function getNumSS()
{
return $this->numSS;
}
 
public function setNumSS($numSS)
{
$this->numSS = $numSS;

return $this;
}

public function getSalarioBruto()
{
  return $this->salarioBruto;
}

public function setSalarioBruto($salarioBruto)
  {
    $this->salarioBruto = $salarioBruto;

    return $this;
  }
  
  public function getIncrementarSalario()
  {
    return $this->incrementarSalario;
  }

 
  public function setIncrementarSalario($incrementarSalario)
  {
    $this->incrementarSalario = $incrementarSalario;

    return $this;
  }




  
// Devuelve Nombre Completo
public function getNameComplete(){
return $this->name." ".$this->surName;
}
// Devuelve Salario Mes
public function getSalarioMes (){
return $this->salarioBruto/14;
}

// Incrementar salario
public function incrementarSalario (){
  $incremento = ($this->incrementarSalario*$this->salarioBruto/100);
  return  $this->salarioBruto = $this->salarioBruto + $incremento;
}

//Comparar
function comparar ($otroAsalariado){
 return $this->salarioBruto - $otroAsalariado->getSalarioBruto();
}
  

  
  
}

?>
