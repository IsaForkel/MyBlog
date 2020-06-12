<?php

class Comentario{

    private $id;
    private $autor_id;
    private $publicacion_id;
    private $titulo;
    private $texto;
    private $fecha;

    public function __construct($id, $autor_id, $publicacion_id, $titulo, $texto, $fecha){
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> publicacion_id = $publicacion_id;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> fecha = $fecha;
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

    public function getPublicacionId(){
        return $this -> publicacion_id;
    }

    public function setPublicacionId($publicacion_id){
        $this -> publicacion_id = $publicacion_id;
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
}