<?php
include_once 'model/clsProcedimento.php';
include_once 'dao/clsProcedimentoDAO.php';
include_once 'dao/clsConexao.php';

$nome = ""; 
$valor = ""; 
$action = "inserir"; 

if( isset($_REQUEST['editar'])) {  
    $id = $_REQUEST['idProcedimento'];
    $procedimento = ProcedimentoDAO::getProcedimentoById($id); 
    $nome = $procedimento->getNome(); 
    $valor = $procedimento->getValor(); 
    $action = "editar&idProcedimento=".$procedimento->getId();
}



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Procedimentos</title>
    </head>
    <body>
        <?php
            require_once 'menu.php';
        ?>
        
        <h1 align="center">Procedimentos</h1>
        
        <br><br><br>
        
        <form action="controller/salvarProcedimento.php?<?php echo $action; ?>" method="POST" >
            <label>Nome: </label>
            <input type="text" name="txtNome" value="<?php echo $nome; ?>" />
            <label>Valor: </label>
            <input type="text" name="txtValor" value="<?php echo $valor; ?>" />
            <input type="submit" value="Salvar" />
        </form>
        
        <hr>
        
        <?php
            
            $lista = ProcedimentoDAO::getProcedimentos();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum procedimento cadastrado</b></h2>';
            }else {
                
            
        ?>
        
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $procedimento) {
                    echo '<tr>';
                    echo '<td>'.$procedimento->getId().'</td>';   
                    echo '<td>'.$procedimento->getNome().'</td>'; 
                    $valor = str_replace(".", ",", $procedimento->getValor());
                    echo '   <td>R$' . $valor . '</td>';
                    echo '<td> 
                            <a href="?editar&idProcedimento='.$procedimento->getId().'">
                            
                            <button>Editar</button></a>
                        </td>';    
                    echo '<td>
                            <a href="controller/salvarProcedimento.php?excluir&idProcedimento='.$procedimento->getId().'">
                            
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
