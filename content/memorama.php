<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
   <link rel="stylesheet" href="../css/stylesmemorama.css">
</head>

<body>

   <div id="stats">0 intentos</div>
   <div id="wrapper">
      <div id="game"></div>
   </div>


   <script src="../js/scriptmemorama.js"></script>

   <a href="../content/home-user-l.php" class="rounded-corner-button">Ir al inicio</a>

   <audio id="audioAplausos" src="../audios/mario.mpeg"></audio>

   <button id="restartButton">Reiniciar juego</button>

   <audio id="audioCorrecto" src="../audios/monedita.mpeg"></audio>

   <audio autoplay>
      <source src="../audios/fondoinstrumental.mpeg" type="audio/mpeg">
   </audio>


</body>

</html>