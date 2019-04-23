<?php
    include_once 'dao/clsClienteDAO.php';
    include_once 'model/clsConsulta.php';
    include_once 'model/clsCliente.php';
    include_once 'dao/clsConexao.php';
    include_once 'dao/clsConsultaDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Consultas</title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            require_once 'menu.php';
            require_once 'menu02.php';
        ?>
        
        <h1 align="center">Consultas</h1>
        
        <br><br><br>
          <a href="frmConsulta.php">
                    <button>Marcar nova Consulta</button></a>
                <br><br>
        <?php
            if( isset( $_SESSION['admin']) && $_SESSION['admin'] ){
        ?>
              
        <?php
            }
            
            $lista = ConsultaDAO::getConsultas();
            
            if( $lista->count() == 0 ){
                echo '<h3><b>Nenhuma Consulta Marcada!</b></h3>';
            } else {
              
        ?>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome do Paciente</th>
                <th>Nome do Medico</th>
                <th>Valor da Consulta</th>
                <th>Horário</th>
                <th>Remarcar Consulta</th>
                <th>Cancelar Consulta</th>
            </tr>
            
            <?php
                    foreach ($lista as $con){
                        echo '<tr> ';
                        echo '   <td>'.$con->getId().'</td>';
                        echo '   <td>'.$con->getCliente()->getNome().'</td>';
                        echo '   <td>'.$con->getMedico()->getNome().'</td>';
                        
                        $valor = str_replace(".", ",",$con->getValor() );
                        echo '   <td>R$ '.$valor.'</td>';
                        
                        $hor = str_replace(".", ",",$con->getHorario() );
                        echo '   <td>'.$hor.'</td>';
                        
                        
                      
                        
                        echo '   <td><a href="frmConsulta.php?editar&idConsulta='.$con->getId().'" ><button  >Remarcar</button></a></td>';
                        echo '   <td><a href="controller/salvarConsulta.php?excluir&idConsulta='.$con->getId().'" ><button  >Cancelar</button></a></td>';
                        echo '</tr>';
                        
                    }
            ?>
            
        </table>
        
        <?php
        
            }
            
        ?>
        
    </body>
</html>

