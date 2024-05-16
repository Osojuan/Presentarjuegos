<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="
  sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/dragAsoc.css">
  <script src="../js/dragAsoc.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

  <h1>¡ARRASTRA CADA ANIMAL A LA IMAGEN QUE LE CORRESPONDE!</h1>

  <!-- Aquí mostrarás los resultados  -->
  <div id="resultados">
    <p>Tiempo transcurrido: <span id="tiempo"></span> segundos</p>
    <p>Intentos realizados: <span id="intentos"></span></p>
   </div>

  <section class="draggable-elements">
    <i class="fas fa-cat draggable" draggable="true" style="color: #ff6384;" id="cat"></i>
    <i class="fas fa-dog draggable" draggable="true" style="color: #36a2eb;" id="dog"></i>
    <i class="fas fa-dove draggable" draggable="true" style="color: #ffce56;" id="dove"></i>
    <i class="fas fa-fish draggable" draggable="true" style="color: #9966ff;" id="fish"></i>
    <i class="fas fa-frog draggable" draggable="true" style="color: #4bc0c0;" id="frog"></i>
    <!-- <i class="fas fa-horse draggable" draggable="true" style="color: #333333;" id="horse"></i>
    <i class="fas fa-hippo draggable" draggable="true" style="color: #ff9f40;" id="hippo"></i>
    <i class="fas fa-spider draggable" draggable="true" style="color: #ff99cc;" id="spider"></i> -->
  </section>
  <section class="droppable-elements">
    <div class="droppable" data-draggable-id="frog"><span>RANA</span></div>
    <div class="droppable" data-draggable-id="dove"><span>PAJARO</span></div>
    <div class="droppable" data-draggable-id="cat"><span>GATO</span></div>
    <div class="droppable" data-draggable-id="fish"><span>PEZ</span></div>
    <div class="droppable" data-draggable-id="dog"><span>PERRO</span></div>
    <!-- <div class="droppable" data-draggable-id="spider"><span>Spider</span></div>
    <div class="droppable" data-draggable-id="horse"><span>Horse</span></div>
    <div class="droppable" data-draggable-id="hippo"><span>Hippo</span></div> -->
  </section>

  <a href="../content/home-user-l.php" class="rounded-corner-button">Ir al inicio</a>

  <audio id="audioCorrecto" src="../audios/monedita.mpeg"></audio>
    <audio id="audioPerdedor" src="../audios/erorrDIS.mpeg"></audio>
  <audio id="audioAplausos" src="../audios/mario.mpeg"></audio>

  <audio autoplay>
    <source src="../audios/fondoinstrumental.mpeg" type="audio/mpeg">
    </audio> 

</body>

</html>