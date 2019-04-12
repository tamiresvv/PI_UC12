<?php

class Horario {
    private $id;
    private $hora;
    
    function __construct($id = NULL, $hora = NULL) {
        $this->id = $id;
        $this->hora = $hora;
    }
    
    function getId() {
        return $this->id;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }





}
