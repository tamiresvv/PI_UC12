<?php



/**
 * Description of clsConsulta
 *
 * @author 181700008
 */
class Consulta {
    private $id, $cliente, $medico, $horario, $valor;
    
    function __construct($id = NULL, $cliente = NULL, $medico = NULL, $horario = NULL, $valor = NULL) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->medico = $medico;
        $this->horario = $horario;
        $this->valor = $valor;
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

    function getValor() {
        return $this->valor;
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



}
