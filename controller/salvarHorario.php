<?php
include_once '../model/clsHorario.php';
include_once '../dao/clsHorarioDAO.php';
include_once '../dao/clsConexao.php';



if( isset( $_REQUEST['inserir'] ) ){
    $horario = new Horario();
    $horario->setHora( $_POST['txtHora']  );
    
    HorarioDAO::inserir($horario);
    
    header("Location: ../horarioConsulta.php");
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idHorario'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Horário  </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idHorario='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../horarioConsulta.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idHorario'];
    HorarioDAO::excluir($id);
    header("Location: ../horarioConsulta.php");
}
if( isset( $_REQUEST['editar'] ) ){
    $id = $_REQUEST['idHorario'];
    
    
    $horario = new Horario();
    $horario->setId($id);
    $horario->setNome($_POST['txtHora']);
    ProcedimentoDAO::editar($horario);
    header("Location: ../horarios.php");
}