<?php

class Consulta {
    private $id, $cliente, $medico, $horario, $valor, $data, $procedimento;
    
    function __construct($id = NULL, $cliente = NULL, $medico = NULL, $horario = NULL, $valor = NULL, $data = NULL, $procedimento = NULL) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->medico = $medico;
        $this->horario = $horario;
        $this->valor = $valor;
        $this->data = $data;
        $this->procedimento = $procedimento;
    }
    function getId() {
        return $this->id;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getMedico() {
        return $this->medico;
    }

    function getHorario() {
        return $this->horario;
    }
    function getData() {
        return $this->data;
    }

    function getValor() {
        return $this->valor;
    }
    function getProcedimento(){
        return $this->procedimento;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setMedico($medico) {
        $this->medico = $medico;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    function setData($data) {
        $this->data = $data;
    }
    function setProcedimento($procedimento) {
        $this->procedimento = $procedimento;
    }



}
