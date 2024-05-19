let num1 = document.querySelector("#num1");
let num2 = document.querySelector("#num2");
let respuesta_usuario = document.querySelector("#respuesta_usuario");
let msj_correccion = document.querySelector("#msj_correccion");
let operacion = document.querySelector("#operacion");
let operacion_actual;
let n1, n2;
let contadorSumasCorrectas = 0,
    contadorRestasCorrectas = 0,
    contadorProductosCorrectos = 0,
    contadorDivisionesCorrectas = 0;
let startTime; // Variable para almacenar el tiempo de inicio del juego

function btnSumar() {
    msj_correccion.innerHTML = "";
    activarBoton("suma");
    operacion_actual = "+";
    operacion.innerHTML = " + ";
    nuevaSuma();
}

function nuevaSuma() {
    n1 = parseInt(Math.random() * 10);
    n2 = parseInt(Math.random() * 10);
    num1.innerHTML = n1;
    num2.innerHTML = n2;
    respuesta_usuario.focus();
}

function btnProducto() {
    msj_correccion.innerHTML = "";
    activarBoton("producto");
    operacion_actual = "*";
    operacion.innerHTML = " x ";
    nuevoProducto();
}

function nuevoProducto() {
    n1 = parseInt(Math.random() * 10);
    n2 = parseInt(Math.random() * 10);
    num1.innerHTML = n1;
    num2.innerHTML = n2;
    respuesta_usuario.focus();
}

function btnResta() {
    msj_correccion.innerHTML = "";
    activarBoton("resta");
    operacion_actual = "-";
    operacion.innerHTML = " - ";
    nuevaResta();
}

function nuevaResta() {
    n1 = parseInt(Math.random() * 5 + 5);
    n2 = parseInt(Math.random() * 5);
    num1.innerHTML = n1;
    num2.innerHTML = n2;
    respuesta_usuario.focus();
}

function btnDivision() {
    msj_correccion.innerHTML = "";
    activarBoton("division");
    operacion_actual = "/";
    operacion.innerHTML = " / ";
    nuevaDivision();
}

function nuevaDivision() {
    let divisores = [];
    n1 = parseInt(Math.random() * 9 + 1);
    for (var i = 1; i <= n1; i++) {
        if (n1 % i === 0) {
            divisores.push(i);
        }
    }
    let pos = parseInt(Math.random() * (divisores.length));
    n2 = divisores[pos];
    num1.innerHTML = n1;
    num2.innerHTML = n2;
    respuesta_usuario.focus();
}

function reproducirAudioCorrecto() {
    var audioCorrecto = document.getElementById("audioCorrecto");
    audioCorrecto.play();
}

function reproducirAudioPerdedor() {
    var audioPerdedor = document.getElementById("audioPerdedor");
    audioPerdedor.play();
}

function corregir() {
    if (respuesta_usuario.value == "") {
        return;
    }

    let solucion;
    let operacion = n1 + operacion_actual + n2;
    solucion = eval(operacion);

    var i = document.createElement("i");
    if (respuesta_usuario.value == solucion) {
        i.className = "fa-regular fa-face-grin";
        reproducirAudioCorrecto();
        actualizarContador();
    } else {
        i.className = "fa-regular fa-face-frown";
        reproducirAudioPerdedor();
    }

    msj_correccion.appendChild(i);

    if (operacion_actual == "+") {
        nuevaSuma();
    } else if (operacion_actual == "-") {
        nuevaResta();
    } else if (operacion_actual == "*") {
        nuevoProducto();
    } else if (operacion_actual == "/") {
        nuevaDivision();
    }

    respuesta_usuario.value = "";
}

respuesta_usuario.onkeydown = function(e) {
    var ev = document.all ? window.event : e;
    if (ev.keyCode == 13) {
        corregir();
    }
}

function actualizarContador() {
    if (operacion_actual == "+") {
        contadorSumasCorrectas++;
        if (contadorSumasCorrectas === 10) {
            finalizarJuego();
        }
    } else if (operacion_actual == "-") {
        contadorRestasCorrectas++;
        if (contadorRestasCorrectas === 10) {
            finalizarJuego();
        }
    } else if (operacion_actual == "*") {
        contadorProductosCorrectos++;
        if (contadorProductosCorrectos === 10) {
            finalizarJuego();
        }
    } else if (operacion_actual == "/") {
        contadorDivisionesCorrectas++;
        if (contadorDivisionesCorrectas === 10) {
            finalizarJuego();
        }
    }
}

function finalizarJuego() {
    let endTime = new Date(); // Tiempo actual al finalizar el juego
    let elapsedTime = (endTime - startTime) / 1000; // Diferencia de tiempo en segundos
    //msj_correccion.innerHTML = "¡Juego terminado! Tiempo transcurrido: " + elapsedTime.toFixed(2) + " segundos";
    respuesta_usuario.disabled = true;

    // Mostrar la alerta después de una pequeña pausa
    setTimeout(() => {
        
        Swal.fire({
            title: '¡Felicidades, juego terminado!',
            text: `Tiempo transcurrido: ${elapsedTime.toFixed(2)} segundos`,
            icon: 'info',
            confirmButtonText: 'Aceptar',
            timer: null // Esto evitará que se cierre automáticamente
        });
    }, 100);
    
}

function activarBoton(idBoton) {
    document.getElementById("suma").className = "";
    document.getElementById("resta").className = "";
    document.getElementById("producto").className = "";
    document.getElementById("division").className = "";
    document.getElementById(idBoton).className = "activado";
}

function iniciarJuego() {
    startTime = new Date(); // Tiempo actual al iniciar el juego
    btnSumar(); // Comenzar con la primera operación
}

window.addEventListener('load', iniciarJuego);
