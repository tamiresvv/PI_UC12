<?php
include_once 'model/clsHorario.php';
include_once 'dao/clsHorarioDAO.php';
include_once 'dao/clsConexao.php';

$hora = ""; 
$action = "inserir"; 

if( isset($_REQUEST['editar'])) {  
    $id = $_REQUEST['idHorario'];
    $horario = HorarioDAO::getHorarioById($id); 
    $hora = $procedimento->getHora(); 
    $action = "editar&idHorario=".$horario->getId();
}



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Horários</title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            require_once 'menu.php';
        ?>
        
        <h1 align="center">Horários</h1>
        
        <br><br><br>
        
        <form action="controller/salvarHorario.php?<?php echo $action; ?>" method="POST" >
            <label>Horário: </label>
            <input type="text" name="txtHora" value="<?php echo $hora; ?>" />
            <input type="submit" value="Salvar" />
        </form>
        
        <hr>
        
        <?php
            
            $lista = HorarioDAO::getHorarios();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum horário cadastrado</b></h2>';
            }else {
                
            
        ?>
        
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Horário</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $horario) {
                    echo '<tr>';
                    echo '<td>'.$horario->getId().'</td>';   
                    echo '<td>'.$horario->getHora().'</td>'; 
                    echo '<td> 
                            <a href="?editar&idProcedimento='.$horario->getId().'">
                            
                            <button>Editar</button></a>
                        </td>';    
                    echo '<td>
                            <a href="controller/salvarHorario.php?excluir&idHorario='.$horario->getId().'">
                            
                            <button>Excluir</button></a>
                            </td>
                          </tr> ';            
                }
            ?>
            
        </table>
        
        <br><br><br>
        <?php
          }
        ?>
        
    </body>
</html>

