<?php
include_once 'model/clsCidade.php';
include_once 'dao/clsCidadeDAO.php';
include_once 'dao/clsConexao.php';

$nome = ""; 
$action = "inserir"; 

if( isset($_REQUEST['editar'])) {  
    $id = $_REQUEST['idCidade'];
    $cidade = CidadeDAO::getCidadeById($id); 
    $nome = $cidade->getNome(); 
    $action = "editar&idCidade=".$cidade->getId();
}



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Cidades</title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            require_once 'menu.php';
            require_once 'menu02.php';
        ?>
        
<!--        <h1 align="center">Cidades</h1>-->
        
<br><br><br><br><br><br><br><br><br>
    <div id="frmCidade">
        <form action="controller/salvarCidade.php?<?php echo $action; ?>" method="POST" >
            <label>Nome: </label>
            <input type="text" name="txtNome" value="<?php echo $nome; ?>" />
            <input type="submit" value="Salvar" />
        </form>
    </div>    
        
        
        <?php
            
            $lista = CidadeDAO::getCidades();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhuma cidade cadastrada</b></h2>';
            }else {
                
            
        ?>
    <div id="tableCidade">
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $cidade) {
                    echo '<tr>
                        <td>'.$cidade->getId().'</td>
                        <td>'.$cidade->getNome().'</td>
                        <td> 
                            <a href="?editar&idCidade='.$cidade->getId().'">
                            
                            <button>Editar</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarCidade.php?excluir&idCidade='.$cidade->getId().'">
                            
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
        <div id="rodapeCidade">
            <img id="rodapee" src="imagens/rodape.png" alt="final">     
        </div>
    </body>
</html>
