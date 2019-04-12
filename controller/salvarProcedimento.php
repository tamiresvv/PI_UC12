<?php
include_once '../model/clsProcedimento.php';
include_once '../dao/clsProcedimentoDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $procedimento = new Procedimento();
    $procedimento->setNome( $_POST['txtNome']  );
    $valor = $_POST['txtValor'];
    $valor = str_replace(",", ".", $valor);
    $procedimento->setValor($valor);
    
    
    ProcedimentoDAO::inserir($procedimento);
    
    header("Location: ../procedimentos.php");
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idProcedimento'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Procedimento  </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idProcedimento='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../cidades.php" ><button>NÃO</button></a>';
}


if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idProcedimento'];
    ProcedimentoDAO::excluir($id);
    header("Location: ../procedimentos.php");
}



if( isset( $_REQUEST['editar'] ) ){
    $id = $_REQUEST['idProcedimento'];
    
    
    $procedimento = new Procedimento();
    $procedimento->setId($id);
    $procedimento->setNome($_POST['txtNome']);
    $valor = $_POST['txtValor'];
    $valor = str_replace(",", ".", $valor);
    $procedimento->setValor($valor);
    
    
    ProcedimentoDAO::editar($procedimento);
    header("Location: ../procedimentos.php");
}

