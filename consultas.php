<?php
    include_once 'dao/clsClienteDAO.php';
    include_once 'model/clsConsulta.php';
    include_once 'model/clsHorario.php';
    include_once 'model/clsCliente.php';
    include_once 'dao/clsConexao.php';
    include_once 'dao/clsConsultaDAO.php';
    include_once 'dao/clsProcedimentoDAO.php';
    include_once 'model/clsProcedimento.php';
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
        
        
        <br><br><br><br><br><br><br><br><br>
          <a href="frmConsulta.php">
              <div id="btnMarcarNovaConsulta">
                    <button>Marcar nova Consulta</button></a>
              </div>
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
                <?php
    if (isset($_SESSION['logado']) && $_SESSION['logado'] ) {
        ?>
                <div id="tableConsulta">        
        <table border="1">
            <tr>
                <?php
                if(isset($_SESSION['tipo'])&& $_SESSION['tipo'] == "a"){
                    ?>
                <th>Código</th>
                <?php
                }
                ?>
                <?php
                if(isset($_SESSION['tipo'])&& $_SESSION['tipo'] == "a"){
                    ?>
                <th>Nome do Paciente</th>
                <?php
                }
                ?>
                <th>Nome do Medico</th>
                <th>Valor da Consulta</th>
                <th>Procedimento</th>
                <th>Horário</th>
                <th>Remarcar Consulta</th>
                <th>Cancelar Consulta</th>
            </tr>
            
            <?php
                    foreach ($lista as $con){
                        echo '<tr> ';
                        if(isset($_SESSION['tipo'])&& $_SESSION['tipo'] == "a"){
                        echo '   <td>'.$con->getId().'</td>';
                        }
                        if(isset($_SESSION['tipo'])&& $_SESSION['tipo'] == "a"){
                        echo '   <td>'.$con->getCliente()->getNome().'</td>';
                        }
                        echo '   <td>'.$con->getMedico()->getNome().'</td>';
                        
                        $valor = str_replace(".", ",",$con->getValor() );
                        echo '   <td>R$ '.$valor.'</td>';
                        
                        echo '   <td>'.$con->getProcedimento()->getNome().'</td>';
                        echo '   <td>'.$con->getHorario()->getHora().'</td>';
                        
                        
                      
                        
                        echo '   <td><a href="frmConsulta.php?editar&idConsulta='.$con->getId().'" ><button  >Remarcar</button></a></td>';
                        echo '   <td><a href="controller/salvarConsulta.php?excluir&idConsulta='.$con->getId().'" ><button  >Cancelar</button></a></td>';
                        echo '</tr>';
                        
                    }
            ?>
            
        </table>
        </div>
        <?php
        
            }else{
                
            }
            }
        ?>
        <div id="rodapeConsultas">
            <img id="rodapee" src="imagens/rodape.png" alt="final">     
        </div>
    </body>
</html>

