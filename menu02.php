<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<header>
    <div id="menu02">   
        <img id="logo" src="imagens/logo.png" alt="logo"> 
    //<?php
//    echo '   Olá, ' . $_SESSION['nome'];
//    ?>
    <a href="index.php">Início</a>
    <a href="horarios.php">Sobre</a>
    
    <?php
    if (!isset($_SESSION['logado']) ||
            !$_SESSION['logado'] ) {
        ?>
     <a href="frmCliente.php">Cadastre-se</a>
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
        
        echo '<a href="sair.php">Sair</a>';
        
    } 
        ?>
    </div>
    
</header>        

