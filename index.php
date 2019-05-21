<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vision Life</title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <script>
            function funcao1(){
                alert("Você deve estar logado para marcar uma consulta!");
            }
    </script>
    <body>
        
        <?php
            require_once 'menu.php';
            require_once 'menu02.php';
        ?>
        
        <br><br><br><br><br><br><br><br>
        
        <img id="olho" src="imagens/olho.JPG" alt="botao">
        
        <div id="marcarConsulta">
            <label id="lblmarcar">Marque sua consulta conosco</label>
            <a href="frmConsulta.php"><button id="btnMarcar" onclick="funcao1()" value="Exibir alert">Marcar consulta</button></a>
        </div>
        
        <div id="cirurgia">
            <a href="cirurgiaOcular.php"><img id="cirurgia" src="imagens/ciroculares.PNG" alt="cir"></a>
        </div>
        <div id="exame">
            <a href="exameOcular.php"><img id="exame" src="imagens/examesoculares.PNG" alt="cir"></a>
        </div>
        <div id="doenca">
            <a href="doencaOcular.php"><img id="doenca" src="imagens/doencasoculares.PNG" alt="cir"></a>
        </div>
        <div id="lentes">
            <a href="lentesOculos.php"><img id="lentes" src="imagens/oculoselente.PNG" alt="cir"></a>
        </div>
        <div id="teste">
            <img id="teste" src="imagens/oftalmopediatria.png" alt="cir">
        </div>
        <div id="pediatria">
            <img id="teste" src="imagens/pediatria.png" alt="cir">
        </div>
        <div id="textOlhinho">
            <a href="testeDoOlhinho.php"><label>TESTE DO OLHINHO</label></a>
        </div>
        <div id="Oftalmoped">
            <a href="oftalmopediatria.php"><label>OFTALMOPEDIATRIA</label></a>
        </div>
        <div id="visionl">
            <img id="visionl" src="imagens/visionl.PNG" alt="cir">
        </div>
        <div id="rodape">
            <img id="rodapee" src="imagens/rodape.png" alt="final">     
        </div>
        
        
        
        <?php
            
        ?>
    </body>
</html>