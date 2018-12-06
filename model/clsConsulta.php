<?php



/**
 * Description of clsConsulta
 *
 * @author 181700008
 */
class Consulta {
    private $id, $codCliente, $codMedico, $horario, $valor;
    
    function __construct($id, $codCliente, $codMedico, $horario, $valor) {
        $this->id = $id;
        $this->codCliente = $codCliente;
        $this->codMedico = $codMedico;
        $this->horario = $horario;
        $this->valor = $valor;
    }
    function getId() {
        return $this->id;
    }

    function getCodCliente() {
        return $this->codCliente;
    }

    function getCodMedico() {
        return $this->codMedico;
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

    function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    function setCodMedico($codMedico) {
        $this->codMedico = $codMedico;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }



}
