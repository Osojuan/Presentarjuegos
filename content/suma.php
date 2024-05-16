<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
	<title>Juego de suma</title>
	<link rel="stylesheet" href="../css/stylesSuma.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
	<h1>¡Resuelve 10 sumas en el menor tiempo posible!</h1>
	<div class="container">
		<div class="izquierdo">
			<div class="container-operacion">
				<span id="suma">9 + 9 =</span>
				<span class="resultado" id="resultado"> 18</span>
			</div>
			<span class="msj" id="msj">

			</span>
		</div>
		<div class="derecha">
			<span id="op1" class="opcion" onclick="controlarRespuesta(this)">18</span>
			<span id="op2" class="opcion" onclick="controlarRespuesta(this)">17</span>
			<span id="op3" class="opcion" onclick="controlarRespuesta(this)">8</span>
		</div>
	</div>

	<a href="../content/home-user.php" class="rounded-corner-button">Ir al inicio</a>

	<script src="../js/scriptsuma.js"></script>

	<audio id="audioCorrecto" src="../audios/monedita.mpeg"></audio>
    <audio id="audioPerdedor" src="../audios/erorrDIS.mpeg"></audio>
	<audio id="audioFinal" src="../audios/mario.mpeg"></audio>


</body>

</html>