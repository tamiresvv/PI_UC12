<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<header>
    <div id="menu">
        <img id="logo" src="imagens/logo.png" alt="VL"   
    <a href="index.php">Início</a>
    <a href="horarios.php">Sobre</a>
    
    <?php
    if (!isset($_SESSION['logado']) ||
            !$_SESSION['logado'] ) {
        ?>
     <a href="frmCliente.php">Cadastre-se</a>
    |
    <img id="usuario" src="imagens/usuario3.png" alt="botao">
     
        
    <form id="formulario" action="entrar.php" method="POST" >
            <input type="text" name="txtLogin" required
                   placeholder="E-mail ou CPF: " />

            <input type="password" name="txtSenha"
                   placeholder="Senha: " required />

            <input type="submit" value="Entrar" />
        </form> 
    
    <?php
            }else{
                ?>
    
        <a href="consultas.php">Consultas</button</a>  
    <?php
    if(isset($_SESSION['tipo'])&& $_SESSION['tipo'] == "a"){
        echo ' <a href="clientes.php">Usuários</a>';
        echo ' <a href="cidades.php">Cidades</a>';  
        echo ' <a href="procedimentos.php">Procedimentos</a>';  
        echo ' <a href="horarioConsulta.php">Horários</a>'; 
        
    }
                ?>
        
        <?php
        echo 'Olá, ' . $_SESSION['nome'];
        echo '<a href="sair.php">Sair</a>';
        
    } 
        ?>
   
        
    </div>
</header>


