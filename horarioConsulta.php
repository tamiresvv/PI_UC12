<?php
include_once 'model/clsHorario.php';
include_once 'dao/clsHorarioDAO.php';
include_once 'dao/clsConexao.php';

$hora = ""; 
$action = "inserir"; 

if( isset($_REQUEST['editar'])) {  
    $id = $_REQUEST['idHorario'];
    $horario = HorarioDAO::getHorariosById($id); 
    $hora = $horario->getHora(); 
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
            require_once 'menu02.php';
        ?>
        
<!--        <h1 align="center">Horários</h1>-->
        
        <br><br><br><br><br><br><br><br><br>
        
        <div id="frmHora">
        <form action="controller/salvarHorario.php?<?php echo $action; ?>" method="POST" >
            <label>Horário: </label>
            <input type="text" name="txtHora" value="<?php echo $hora; ?>" />
            <input type="submit" value="Salvar" />
        </form>
        </div>
        
        
        
        <?php
            
            $lista = HorarioDAO::getHorarios();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum horário cadastrado</b></h2>';
            }else {
                
            
        ?>
        
        <div id="tableHora">
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
                            <a href="?editar&idHorario='.$horario->getId().'">
                            
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
            </div>
        
        <br><br><br>
        <?php
          }
        ?>
        <div id="rodapeHora">
            <img id="rodapee" src="imagens/rodape.png" alt="final">     
        </div>
    </body>
</html>

