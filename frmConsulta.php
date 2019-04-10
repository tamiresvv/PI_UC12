<?php
include_once 'model/clsCidade.php';
include_once 'model/clsCliente.php';
include_once 'dao/clsCidadeDAO.php';
include_once 'dao/clsClienteDAO.php';
include_once 'dao/clsConexao.php';

session_start();

$idMedico = 0;
$horario = "";
$action = "inserir";
$data = "";
if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['idConsulta'];
    $consulta = ConsultaDAO::getConsultaById($id);
    $medico = $consulta->getMedico();
    $horario = $consulta->getHorario();
    
    $action = "editar&idConsulta=" . $consulta->getId();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Consultas</title>
    </head>
    <body>
        <?php
        require_once 'menu.php';
        ?>
         <h1 align="center">Cadastrar Consulta</h1>

        <br><br><br>
        <form action="controller/salvarConsulta.php?<?php echo $action; ?>" method="POST" 
              enctype="multipart/form-data">
            
           
            <label>Data: </label>
            <input type="datetime" name="txtData" value="<?php echo $data; ?>" /><br><br>
            <label>Horario: </label>
                <select name="horario">
                    <option value="0"  >Selecione...</option>
                    <?php
                    foreach ($listaHor as $hor) {
                    $selecionar = "";
                    
                    if ($idHorario == $hor->getId()) {
                        $selecionar = " selected ";
                    }

                    echo '<option ' . $selecionar . ' value="' . $hor->getId() . '" >' .
                    $hor->getNome() . '</option>';
                    
                }
                    
                    ?>
                    
                </select>
            <br><br>
            
            <label>Procedimento: </label>
            <?php
            //   $lista = ProcedimentoDAO::getProcedimentos();
             $listaMed = ClienteDAO::getMedicos();
             
             
                
            
            ?>
            <select name="procedimento">
               <option value="0"  >Selecione...</option>
               <?php
            
               foreach ($lista as $proced) {
                    $selecionar = "";
                    if ($proced->getId() == $proced->getId()) {
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
