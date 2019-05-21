<?php
include_once 'model/clsCidade.php';
include_once 'model/clsCliente.php';
include_once 'model/clsProcedimento.php';
include_once 'model/clsHorario.php';
include_once 'dao/clsCidadeDAO.php';
include_once 'dao/clsClienteDAO.php';
include_once 'dao/clsProcedimentoDAO.php';
include_once 'dao/clsHorarioDAO.php';
include_once 'dao/clsConexao.php';
include_once 'dao/clsConsultaDAO.php';
include_once 'model/clsConsulta.php';


session_start();

$idMedico = 0;
$idHorario = 0;
$idProcedimento = 0;
$horario = "";
$procedimento = "";
$medico = "";
$action = "inserir";
$data = "";
if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['idConsulta'];
    $consulta = ConsultaDAO::getConsultaById($id);
    $medico = $consulta->getMedico();
    $horario = $consulta->getHorario();
    $procedimento = $consulta->getProcedimento();
    $idHorario = $horario->getId();
    $idProcedimento = $procedimento->getId();
    $idMedico = $medico->getId();
    $data = $consulta->getData();
    $action = "editar&idConsulta=" . $consulta->getId();
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Consul tas</title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require_once 'menu.php';
        require_once 'menu02.php';
        ?>
         

        <br><br><br><br><br><br><br><br><br><br><br>
        <form action="controller/salvarConsulta.php?<?php echo $action; ?>" method="POST" 
              enctype="multipart/form-data">
            
           
            <label>Data: </label>
            <input type="date" name="txtData" value="<?php echo $data; ?>" /><br><br>
            <label>Horario: </label>
                <select name="horario">
                    <option value="0"  >Selecione...</option>
                    <?php
                    $listaHor = HorarioDAO::getHorarios();
                    foreach ($listaHor as $hor) {
                    $selecionar = "";
                    
                    if ($idHorario == $hor->getId()) {
                        $selecionar = " selected ";
                    }

                    echo '<option ' . $selecionar . ' value="' . $hor->getId() . '" >' .
                    $hor->getHora() . '</option>';
                    
                }
                    
                    ?>
                    
                </select>
            <br><br>
            
            <label>Procedimento: </label>
            <select name="procedimento">
               <option value="0"  >Selecione...</option>
               <?php
               $listaProc = ProcedimentoDAO::getProcedimentos();
               foreach ($listaProc as $proced) {
                    $selecionar = "";
                    if ($idProcedimento == $proced->getId()) {
                        $selecionar = " selected ";
                    }

                    echo '<option ' . $selecionar . ' value="' . $proced->getId() . '" >' .
                    $proced->getNome() . '</option>';
                    
                }
               ?>
               
            </select>
            
            <br><br>
            
            <label>Medico: </label>
            <select name="medico" >
                <option value="0"  >Selecione...</option>
                <?php
                $listaMed = ClienteDAO::getMedicos();
                
                foreach ($listaMed as $med) {
                    $selecionar = "";
                    
                    if ($idMedico == $med->getId()) {
                        $selecionar = " selected ";
                    }

                    echo '<option ' . $selecionar . ' value="' . $med->getId() . '" >' .
                    $med->getNome() . '</option>';
                    
                }
                
                ?>
                
                </select>
            <br><br>
            
                <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" />


            
        </form>
    </body>
</html>
