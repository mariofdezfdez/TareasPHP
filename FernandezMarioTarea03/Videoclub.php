<?php

class Videoclub{
    private $pelicula;
    private $genero;
    private $codigo;

    function __construct ($pelicula ,$genero ,$codigo){
        $this->pelicula=$pelicula;
        $this->genero=$genero;
        $this->codigo=$codigo;
    }

  
    public function getPelicula()
    {
        return $this->pelicula;
    }

    public function setPelicula($pelicula)
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
//validar codigo
    public function validar_codigo($codigo){
        if(preg_match("/^[A-Z]\d{3}[a-z]$/", $codigo)) return true;
        return false;
        
    }
}
?>