<?php
include_once 'model/clsCidade.php';
include_once 'model/clsCliente.php';
include_once 'dao/clsCidadeDAO.php';
include_once 'dao/clsClienteDAO.php';
include_once 'dao/clsConexao.php';

session_start();

$nome = "";
$telefone = "";
$email = "";
$cpf = "";
$sexo = "";
$tipo = "";
$idCidade = 0;
$foto = "sem_foto.png";
$action = "inserir";

if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['idCliente'];
    $cliente = ClienteDAO::getClienteById($id);
    $nome = $cliente->getNome();
    $telefone = $cliente->getTelefone();
    $email = $cliente->getEmail();
    $cpf = $cliente->getCpf();
    $sexo = $cliente->getSexo();
    $tipo = $cliente->getTipo();
    $foto = $cliente->getFoto();
    $idCidade = $cliente->getCidade()->getId();
    $action = "editar&idCliente=" . $cliente->getId();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life - Cadastrar Clientes</title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        <?php
        require_once 'menu.php';
        require_once 'menu02.php';
        ?>


        <br><br><br><br><br><br><br><br><br><br>
    <div id="cadastro"><label>Preencha todas as informações corretamente!</label></div>
    <div id="frmCliente">
        <form action="controller/salvarCliente.php?<?php echo $action; ?>" method="POST" 
              enctype="multipart/form-data">
            
                  <?php
                  if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "a") {
                       $admin = "";                  
                       $cli = "";                  
                       $med = "";
                       ?> 
            <div id="tipoCli">
                       <label>Tipo: </label>     
                       <select name="tipo" >
                       <option value="0"  >Selecione...</option>
                       <option value="a" <?php echo '$admin' ?> >Admin</option>
                       <option value="c" <?php echo '$cli' ?> >Cliente</option>
                       <option value="m" <?php echo '$med' ?> >Medico</option>
                       <?php
                       if ($tipo == "a")
                           $admin = " selected ";
                       if ($tipo == "c")
                           $cli = " selected ";
                       if ($tipo == "m")
                           $med = " selected ";
                       
                       ?>
                       </select>
                       </div>
                       <br><br>
              <?php
                  }
                      ?>

            <label>Nome*: </label>
            <input type="text" name="txtNome" value="<?php echo $nome; ?>" required maxlength="100" /> <br><br>
            <label>Telefone: </label>
            <input type="text" name="txtTelefone" value="<?php echo $telefone; ?>" maxlength="30" /> <br><br>
            <label>E-mail*: </label>
            <input type="email" name="txtEmail" value="<?php echo $email; ?>" required /> <br><br>

            <label>CPF*: </label>
            <input type="text" name="txtCPF" value="<?php echo $cpf; ?>" required /> <br><br>

            <label>Cidade*: </label>
            <select name="cidade" >
                <option value="0"  >Selecione...</option>
                <?php
                $lista = CidadeDAO::getCidades();

                foreach ($lista as $cid) {
                    $selecionar = "";
                    if ($idCidade == $cid->getId()) {
                        $selecionar = " selected ";
                    }

                    echo '<option ' . $selecionar . ' value="' . $cid->getId() . '" >' .
                    $cid->getNome() . '</option>';
                }
                ?>

            </select>

            <br><br>
            <?php
            $feminino = "";
            $masculino = "";
            if ($sexo == "f") {
                $feminino = " checked ";
            }
            if ($sexo == "m") {
                $masculino = " checked ";
            }
            ?>

            <label>Sexo: </label>
            <input type="radio" name="rbSexo" <?php echo $feminino; ?> value="f" required /> Feminino 
            <input type="radio" name="rbSexo" <?php echo $masculino; ?> value="m" /> Masculino <br><br>

            <label>Foto: </label>

            <?php
            if (isset($_REQUEST['editar'])) {
                echo '<img src="fotos_clientes/' . $foto . '" width="30px" />';
            }
            ?>

            <input type="file" name="foto" /> <br><br>
            <?php
            if (!isset($_REQUEST['editar'])) {
                ?>
                <label>Senha*: </label>
                <input type="password" name="txtSenha" required maxlength="100"  /> <br><br>
                <label>Confirme sua Senha*: </label>
                <input type="password" name="txtSenhaConfirma" required maxlength="100" /> <br>
                <br><br>
                <?php
            }
            ?>
            <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" />


        </form>
    </div>

<div id="rodapeCliente">
            <img id="rodapeCli" src="imagens/rodape.png" alt="final">     
        </div>
    </body>
</html>
