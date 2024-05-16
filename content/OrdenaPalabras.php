<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <link rel="stylesheet" href="../css/estiloOrdenaPalabras.css">
    <title>Palabras Desordenadas</title>
</head>

<body>
    <section id="pantalla-inicio">
        <h2>Ordena las <span>letras</span></h2>
        <h2>y adivina la <span>parte del cuerpo</span></h2>
        <button onclick="comenzarJuego()">JUGAR AHORA!</button>
    </section>
    <section id="pantalla-juego">
        <h2>Ordena las <span>letras</span></h2>
        <h2>y adivina la <span>palabra</span></h2>

        <div class="contenedor-pais" id="pais">
            <div class="letra">C</div>
            <div class="letra">A</div>
            <div class="letra">B</div>
            <div class="letra">E</div>
            <div class="letra">Z</div>
            <div class="letra">A</div>
        </div>

        <input type="text" id="paisIngresado" onkeyup="comparar()">

        <div id="myProgress">
            <div id="myBar"></div>
        </div>

        <div class="acertadas">
            <i class="fa-solid fa-thumbs-up"></i>
            <span id="contador">0</span>
        </div>
    </section>s
    <section id="pantalla-final">
        <h2>RESULTADO FINAL</h2>
        <h3 id="resultado">LOGRASTE DESCUBRIR <span id="acertadas">0</span>PALABRAS</h3>
        <h3>Tiempo transcurrido: <span id="tiempo-transcurrido">0</span> segundos</h3> 
        <button onclick="comenzarJuego()">JUGAR OTRA VEZ!</button>
    </section>

    <a href="../content/home-user-l.php" class="rounded-corner-button">Ir al inicio</a>

    <script src="../js/scriptOrdenaPalabras.js"></script>

    <audio id="audioCorrecto" src="../audios/monedita.mpeg"></audio>
    <audio id="audioPerdedor" src="../audios/erorrDIS.mpeg"></audio>

    <audio autoplay>
    <source src="../audios/fondoinstrumental.mpeg" type="audio/mpeg">
    </audio> 
 

</body>

</html>