<?php

class Pelicula {
    private $titulo;
    private $codigo;
    private $director;
    private $actor;
    private $estado;
    private $fech_nacimiento;

    public function __construct($titulo, $codigo, $director){
        $this->titulo=$titulo;
        $this->codigo=$codigo;
        $this->director=$director;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }

    public function getDirector(){
        return $this->director;
    }

    public function setDirector($director){
        $this->director = $director;
        return $this;
    }

    //toString
    public function __toString(){
        return "Titulo de la pelicula: ".$this->titulo." Su codigo es: ".$this->codigo." El director es: "
        .$this->director;   
    }

    public function mostrar_pelicula(){
        return $this->__toString();
    }
}