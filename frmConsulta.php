<?php
include_once 'model/clsCidade.php';
include_once 'model/clsCliente.php';
include_once 'dao/clsCidadeDAO.php';
include_once 'dao/clsClienteDAO.php';
include_once 'dao/clsConexao.php';

session_start();

$medico = "";
$horario = "";
$valor = "";
$action = "inserir";

if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['idConsulta'];
    $consulta = ConsultaDAO::getConsultaById($id);
    $medico = $consulta->getMedico();
    $horario = $consulta->getHorario();
    $valor = $consulta->getValor();
    
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
            
           
            <label>Horario: </label>
            <input type="datetime" name="txtHorario" value="<?php echo $horario; ?>" maxlength="30" /> <br><br>
            <label>Valor: </label>
            
            
            <label>Medico: </label>
            <select name="medico" >
                <option value="0"  >Selecione...</option>
                <?php
                $lista = ClienteDAO::getMedicos();

                foreach ($lista as $med) {
                    $selecionar = "";
                    if ($medico->getId() == $med->getId()) {
                        $selecionar = " selected ";
                    }

                    echo '<option ' . $selecionar . ' value="' . $med->getId() . '" >' .
                    $med->getNome() . '</option>';
                }
                ?>
                <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" />


            
        </form>
    </body>
</html>