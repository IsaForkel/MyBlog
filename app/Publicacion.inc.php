<?php

class Publicacion{

    private $id;
    private $autor_id;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;

    public function __construct($id, $autor_id, $titulo, $texto, $fecha, $activa){
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> fecha = $fecha;
        $this -> activa = $activa;
    }

    public function getId(){
        return $this -> id;
    }

    public function setId($id){
        $this -> id = $id;
    }

    public function getAutorId(){
        return $this -> autor_id;
    }

    public function setAutorId($autor_id){
        $this -> autor_id = $autor_id;
    }
    
    public function getTitulo(){
        return $this -> titulo;
    }

    public function setTitulo($titulo){
        $this -> titulo = $titulo;
    }

    public function getTexto(){
        return $this -> texto;
    }

    public function setTexto($texto){
        $this -> texto = $texto;
    }

    public function getFecha(){
        return $this -> fecha;
    }

    public function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    public function getActiva(){
        return $this -> activa;
    }

    public function setActiva($activa){
        $this -> activa = $activa;
    }
}