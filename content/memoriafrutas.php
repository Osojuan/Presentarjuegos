<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Memoria</title>
    <link rel="stylesheet" href="../css/stylememoriafrutas.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <script src="../js/scriptmemoriafrutas.js" defer></script>
    <img src="../images/frozen.jpeg" alt="frozen" width="900">
</head>

<body>
    <div class="game">
        <div class="controls">
            <button>Inicio</button>
            <div class="stats">
                <div class="moves">0 movimientos</div>
                <div class="timer">Tiempo: 0 segundos</div>
            </div>
        </div>
        <div class="board-container">
            <div class="board" data-dimension="4"></div>
            <div class="win">Lo lograste</div>
        </div>
    </div>

    <audio id="audioAplauso" src="../audios/mario.mpeg"></audio>

    <audio id="audioCorrecto" src="../audios/monedita.mpeg"></audio>
    
    <audio autoplay>
    <source src="../audios/fondoinstrumental.mpeg" type="audio/mpeg">
    </audio> 

    <a href="../content/home-user-l.php" class="rounded-corner-button">Ir al inicio</a>
</body>


</html>