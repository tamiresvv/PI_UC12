<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<header>
    <div id="menu">
    |
        <img id="usuario" src="imagens/usuario3.png" alt="botao">

        <form id="formulario" action="entrar.php" method="POST" >
                <input type="text" name="txtLogin" required
                       placeholder="E-mail ou CPF: " />

                <input type="password" name="txtSenha"
                       placeholder="Senha: " required />

                <input type="submit" value="Entrar" />

        </form>
        <div id="divface">
       <a href="https://www.facebook.com/ClinicaVisionLife"><img id="facebook" src="imagens/facebook.png" alt="fb"></a> 
        </div>
    </div>
</header>


