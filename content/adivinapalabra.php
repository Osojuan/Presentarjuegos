<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <link rel="stylesheet" href="../css/stylesAdivinalapalabra.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Adivina la palabra</title>
</head>

<body>
    <section>
        <h2>¡Adivina el animal!</h2>
        <div id="palabra">
            <div class="letra pintar">L</div>
            <div class="letra">E</div>
            <div class="letra">O</div>
            <div class="letra">N</div>
        </div>

        <!-- Imágenes -->
        <div id="imagenPalabra"></div>
         <img id="imagenAyuda" src="">

        <h3>Ayuda: <span id="ayuda"> El rey de la selva, tiene una majestuosa melena.</span> </h3>
        <h3>Intentos restantes: <span id="intentos">5</span></h3>
        <h3>Letras ingresadas: <span id="letrasIngresadas"></span></h3>

        <button onclick="cargarNuevaPalabra()">Nueva Palabra</button>
    </section>

    <a href="../content/home-user-l.php" class="rounded-corner-button">Ir al inicio</a>

    <script src="../js/scriptadivinapalabra.js"></script>

    <audio id="audioAplausos" src="../audios/monedita.mpeg"></audio>
    <audio id="audioPerdedor" src="../audios/erorrDIS.mpeg"></audio>

    <audio autoplay>
    <source src="../audios/fondoinstrumental.mpeg" type="audio/mpeg">
    </audio> 


</body>

</html>