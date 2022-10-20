<?php

class Actor {
    private $fechaNacimiento;
    private $edad;
    private $nombre;
    private $nif;

function __construct ($fechaNacimiento,$nombre,$nif){
    $this->fechaNacimiento=$fechaNacimiento;
    $this->nombre=$nombre;
    $this->nif=$nif;
    
}
  
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

     
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
 
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNif()
    {
        return $this->nif;
    }

    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }
     
    //calcula edad mediante la fecha nacimiento
    public function obtener_edad_segun_fecha($fecha_nacimiento){
         $nacimiento = new DateTime($fecha_nacimiento);
         $ahora = new DateTime(date("Y-m-d"));
         $diferencia = $ahora->diff($nacimiento);
         return $diferencia->format("%y");
    }

    

    //validar NIF
    public function validar_dni($nif){
        $letra = substr($nif, -1);
        $numeros = substr($nif, 0, -1);
        if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 
            && strlen ($numeros) == 8 ){
              return true;
        }else{
              return false;
        }
    }
            
} 

?>