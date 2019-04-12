<?php
include_once '../model/clsConsulta.php';
include_once '../model/clsCliente.php';
include_once '../dao/clsConsultaDAO.php';
include_once '../dao/clsClienteDAO.php';
include_once '../dao/clsConexao.php';
session_start();

if( isset($_REQUEST['inserir'])  ){
    
        $consulta= new Consulta();
        $cliente = new Cliente();
        $cliente->setId($_SESSION['idCliente']);
        $cliente->setNome( $_SESSION['nome'] );
        $consulta->setCliente($cliente);
        
        $valor = $_POST['txtValor'];
        $valor = str_replace(",", ".", $valor);
        $consulta->setValor( $valor );
        
        $horario = new Horario();
        $horario->setId( $_POST['horario']  );
        $consulta->setHorario( $horario );
   
        
        $medico = new medico();
        $med->setId( $_POST['medico']);
        $consulta->setMedico( $med ); 
        
        ConsultaDAO::inserir( $consulta );
        
        header("Location: ../consultas.php");
      
}



if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idConsulta'];
    $consulta = ConsultaDAO::getConsultasById($id);
    
    $consulta->setNome( $_POST['txtNome'] );
    
    $consulta = $_POST['txtValor'];
    $valor = str_replace(",", ".", $valor);
    $consulta->setValor( $valor );
    
    $hor = $_POST['txtHorario'];
    $hor = str_replace(",", ".", $hor);
    $consulta->setHorario( $hor );


    $med = new Medico();
    $med->setId( $_POST['medico']);
    $consulta->setCategoria( $med ); 
    
    ConsultaDAO::editar($consulta);
    
    header("Location: ../consultas.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idConsulta'];
    $consulta = consultaDAO::getConsultasById($id);
    echo '<br><br><hr> '
       . '<h3>Confirma o cancelamento da consulta ?  '
       .$consulta->getNome(). '? </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idConsulta='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../consulta.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idConsulta'];
    $consulta = ConsultaDAO::getConsultasById($id);
    ConsultaDAO::excluir($consulta);
    header("Location: ../consultas.php");
}


