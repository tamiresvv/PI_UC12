<?php
include_once '../model/clsConsulta.php';
include_once '../model/clsProcedimento.php';
include_once '../model/clsCliente.php';
include_once '../model/clsHorario.php';
include_once '../dao/clsConsultaDAO.php';
include_once '../dao/clsProcedimentoDAO.php';
include_once '../dao/clsClienteDAO.php';
include_once '../dao/clsConexao.php';
session_start();

if( isset($_REQUEST['inserir'])  ){
    
        $consulta= new Consulta();
        
        $cliente = new Cliente();
        $cliente->setId($_SESSION['idCliente']);
        $cliente->setNome( $_SESSION['nome'] );
        $consulta->setCliente($cliente);
        
//       $procedimento = ProcedimentoDAO::getProcedimentoById($_POST['procedimento']  );
//       $consulta->setValor( $procedimento->getValor() );
//       $consulta->setProcedimento($procedimento); 
        
        $procedimento = new Procedimento();
        $procedimento->setId( $_POST['procedimento']);
        $procedimento->setValor( $_POST['procedimento']);
        $consulta->setProcedimento( $procedimento ); 
        
       $consulta->setData($_POST['txtData']);
        
        $horario = new Horario();
        $horario->setId( $_POST['horario']  );
        $consulta->setHorario( $horario );
   
        
        $medico = new Cliente();
        $medico->setId( $_POST['medico']);
        $consulta->setMedico( $medico ); 
        
        ConsultaDAO::inserir( $consulta );
        
        header("Location: ../consultas.php");
      
}

if( isset( $_REQUEST['editar'] ) ){
    $id = $_REQUEST['idConsulta'];
    $consulta = ConsultaDAO::getConsultaById($id);
    
    $consulta = new Consulta();
    $consulta->setId($id);
 
    $medico = new Cliente();
    $medico->setId( $_POST['medico']);
    $consulta->setMedico( $medico );
    
    $horario = new Horario();
    $horario->setId( $_POST['horario']);
    $consulta->setHorario($horario);
    
    $cliente = new Cliente();
    $cliente->setId($_SESSION['idCliente']);
    $cliente->setNome( $_SESSION['nome'] );
    $consulta->setCliente($cliente);
    
    $procedimento = new Procedimento();
    $procedimento->setId( $_POST['procedimento']);
    $consulta->setProcedimento( $procedimento ); 
        
    $consulta->setData($_POST['txtData']);
   
    
    ConsultaDAO::editar($consulta);
    header("Location: ../consultas.php");
    

//if( isset($_REQUEST['editar'])){
//    
//    $id = $_REQUEST['idConsulta'];
//    $consulta = ConsultaDAO::getConsultaById($id);
//    
//    $consulta->setNome( $_POST['txtNome'] );
//    
//    //$consulta = $_POST['txtValor'];
//    //$valor = str_replace(",", ".", $valor);
//    //$consulta->setValor( $valor );
//    
//    $hor = $_POST['txtHorario'];
//    $hor = str_replace(",", ".", $hor);
//    $consulta->setHorario( $hor );
//
//
//    $med = new Medico();
//    $med->setId( $_POST['medico']);
//    $consulta->setCategoria( $med ); 
//    
//    ConsultaDAO::editar($consulta);
//    
//    header("Location: ../consultas.php");
//    
//}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idConsulta'];
    echo '<br><br><hr> '
       . '<h3>Confirma o cancelamento da consulta?  </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idConsulta='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../consultas.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idConsulta'];
    ConsultaDAO::excluir($id);
    header("Location: ../consultas.php");
}


}