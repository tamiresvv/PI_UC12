<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<header>
    <a href="index.php">
        <button>Início</button></a>
    
    <a href="horarios.php">
        <button>Sobre</button></a>


    <?php
    if (isset($_SESSION['logado']) &&
            $_SESSION['logado'] == TRUE) {
        ?>
        
        <a href="consultas.php">
            <button>Consultas</button></a>
        
    
    <?php
    if(isset($_SESSION['tipo'])&& $_SESSION['tipo'] == "a"){
        echo ' <a href="clientes.php">'; 
        echo ' <button>Usuários</button></a>';
        echo ' <a href="cidades.php">'; 
        echo ' <button>Cidades</button></a>';  
        
    }
                ?>
        
        <?php
        echo 'Olá, ' . $_SESSION['nome'];
        echo '<a href="sair.php"><button>Sair</button></a>';
    } else {
        ?>
        | 
        <form action="entrar.php" method="POST" >
            <input type="text" name="txtLogin" required
                   placeholder="E-mail ou CPF: " />

            <input type="password" name="txtSenha"
                   placeholder="Senha: " required />

            <input type="submit" value="Entrar" />
        </form> 

        <a href="frmCliente.php">
            <button>Cadastre-se</button></a>
        

        <?php
    }
    ?>

</header>

<hr>
