<?php

class Procedimento {
    private $id;
    private $nome;
    private $valor;
    
    function __construct($id = NULL, $nome = NULL, $valor = NULL) {
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }



}
