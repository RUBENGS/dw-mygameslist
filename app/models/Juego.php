<?php

class Juego {

    private $idJuego;
    private $nombre;
    private $descripcion;
    private $caratula;
    private $precio;

    public function __construct() {

    }

    public function getIdJuego() {
        return $this->idJuego;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public  function getCaratula() {
        return $this->caratula;
    }

    public  function getPrecio() {
        return $this->precio;
    }

    public function setIdJuego($idJuego) {
        $this->idJuego = $idJuego;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCaratula($caratula) {
        $this->caratula = $caratula;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

//Función para pintar cada criatura
    function juego2HTML() {
        $result = '<div class=" col-md-4 ">';
        $result .= '<div class="card ">';
        $result .= ' <img class="card-img-top rounded mx-auto d-block avatar" src='.$this->getCaratula().' alt="Card image cap">';
        $result .= '<div class="card-block">';
        $result .= '<h2 class="card-title">' . $this->getNombre() . '</h2>';
        $result .= '<p class=" card-text description">'.$this->getDescripcion().'</p>';
        $result .= '<p class=" card-text">'.$this->getPrecio().'</p>';
        $result .= '</div>';
        $result .= ' <div  class=" btn-group card-footer" role="group">';
        $result .= '<a type="button" class="btn btn-secondary" href="app/views/detail.php?id='.$this->getIdJuego().'">Detalles</a>';
        $result .= '<a type="button" class="btn btn-success" href="app/views/edit.php?id='.$this->getIdJuego().'">Modificar</a> ';
        $result .= '<a type="button" class="btn btn-danger" href="app/controllers/deleteController.php?id='.$this->getIdJuego().'">Borrar</a> ';
        $result .= ' </div>';
        $result .= '</div>';
        $result .= '</div>';


        return $result;
    }


}
