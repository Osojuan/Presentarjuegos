let paises = [];
paises = ["BRAZO", "PIERNA", "NARIZ", "PIE", "MANO", "OJO", "BOCA", "NARIZ", "OREJA", "CABEZA"];
let paisesDesordenados = [];
let posJuegoActual = 0;
let cantidadAcertados = 0;
let imagenesPorPalabra = {
    "BRAZO": "../images/brazo.jpg",
    "PIERNA": "../images/pierna.jpg",
    "NARIZ": "../images/nariz.jpg",
    "PIE": "../images/pie.jpg",
    "MANO": "../images/mano.jpg",
    "OJO": "../images/ojo.jpg",
    "BOCA": "../images/boca.jpg",
    "OREJA": "../images/oreja.jpg",
    "CABEZA": "../images/cabeza.jpg"
};

let tiempoInicio; // Variable para almacenar el tiempo de inicio del juego
let tiempoFin; // Variable para almacenar el tiempo de finalización del juego


function desordenarPaises() {
    for (let i = 0; i < paises.length; i++) {
        let pais = paises[i];
        pais = pais.split('');
        let paisDesordenado;
        paisDesordenado = pais.sort(function () {
            return Math.random() - 0.5
        });
        paisDesordenado = paisDesordenado.join("");
        paisesDesordenados.push(paisDesordenado);
    }
}

function mostrarNuevoPais() {
  if (posJuegoActual >= paises.length) {
      mostrarPantallaFinal();
      return;
  }
  let contenedorPais = document.getElementById("pais");
  contenedorPais.innerHTML = "";
  let palabraDesordenada = paisesDesordenados[posJuegoActual];
  let palabraOriginal = paises[posJuegoActual];
  for (let i = 0; i < palabraDesordenada.length; i++) {
      let divLetra = document.createElement("div");
      divLetra.className = "letra";
      divLetra.innerHTML = palabraDesordenada[i];
      contenedorPais.appendChild(divLetra);
      confetti();

  }
  let img = document.createElement("img");
  img.className = "imagen-palabra"; // Aplica la clase CSS para la imagen
  img.src = imagenesPorPalabra[palabraOriginal];
  contenedorPais.appendChild(img);
  clearInterval(idInterval);
  move();
}

function mostrarPantallaFinal() {
  clearInterval(idInterval);
  document.getElementById("pantalla-juego").style.display = "none";
  document.getElementById("pantalla-final").style.display = "flex";
  document.getElementById("acertadas").innerHTML = cantidadAcertados;

  tiempoFin = Date.now(); // Establecer el tiempo de finalización cuando termina el juego
  let tiempoTranscurrido = (tiempoFin - tiempoInicio) / 1000; // Calcula el tiempo transcurrido en segundos
  document.getElementById("tiempo-transcurrido").innerHTML = tiempoTranscurrido.toFixed(2);
}


function comparar() {
    var paisOrdanedo = paises[posJuegoActual];
    var paisIngresado = document.getElementById("paisIngresado").value;
    paisIngresado = paisIngresado.toUpperCase();
    confetti();

    if (paisOrdanedo == paisIngresado) {
        posJuegoActual++;
        cantidadAcertados++;
        confetti();

        document.getElementById("contador").innerHTML = cantidadAcertados;
        paisIngresado = document.getElementById("paisIngresado").value = "";
        confetti();

        mostrarNuevoPais();

        
        // Reproducir el sonido de acierto
        const audioCorrecto = document.getElementById("audioCorrecto");
        audioCorrecto.play();
    }
}

let x = 0;
let idInterval;
function move() {
    if (x == 0) {
        x = 1;
        let elem = document.getElementById("myBar");
        let width = 1;
        idInterval = setInterval(frame, 600);
        function frame() {
            if (width >= 100) {
                clearInterval(idInterval);
                x = 0;
                posJuegoActual++;
                mostrarNuevoPais();
            } else {
                width++;
                elem.style.width = width + "%";
            }
        }
    }
}

function comenzarJuego() {
    tiempoInicio = Date.now(); // Establecer el tiempo de inicio cuando comienza el juego
    paisesDesordenados = [];
    posJuegoActual = 0;
    cantidadAcertados = 0;
    desordenarPaises();
    document.getElementById("pantalla-inicio").style.display = "none";
    document.getElementById("pantalla-juego").style.display = "block";
    document.getElementById("pantalla-final").style.display = "none";
    mostrarNuevoPais();
    document.getElementById("contador").innerHTML = 0;
    document.getElementById("paisIngresado").focus();
    tiempoInicio = new Date(); // Almacena el tiempo de inicio del juego
}

