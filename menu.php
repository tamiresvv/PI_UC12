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
       <a href="https://www.instagram.com/clinicavisionlife/?hl=pt-br"><img id="instagram" src="imagens/instagram.png" alt="insta"></a> 
       <a href="https://twitter.com/VisionLife6"><img id="twitter" src="imagens/twitter.png" alt="tt"></a> 
        </div>
        <div id="redes">Redes Sociais:  </div>
    </div>
</header>


