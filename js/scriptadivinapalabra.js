let arrayPalabras = ["LEON", "ELEFANTE", "TIGRE", "JIRAFA", "CEBRA", "TORTUGA"];
        let imagenesPalabras = ["../images/leon.jpg", "../images/elefante.jpg", "../images/tigre.jpg", "../images/jirafa.jpg", "../images/cebra.jpg", "../images/tortuga.jpg"];
        let ayudas = [
            "El rey de la selva, tiene una majestuosa melena.",
            "Tiene una trompa larga y poderosa que utiliza para beber agua y alimentarse.",
            "Tiene rayas en su pelaje y es uno de los grandes felinos más temidos.",
            "Tiene un cuello largo que le permite alcanzar las hojas más altas de los árboles.",
            "Tiene un pelaje a rayas blanco y negro que la hace fácilmente reconocible",
            "Tiene un caparazón duro que le sirve de protección."
        ];
        let cantPalabrasJugadas = 0;
        let intentosRestantes = 5;
        let posActual;
        let arrayPalabraActual = [];
        let cantidadAcertadas = 0;
        let divsPalabraActual = [];
        let totalQueDebeAcertar;

        // Variables para almacenar el tiempo de inicio y fin del juego
        let tiempoInicio;
        let tiempoFin;

        // Variable para controlar si el juego ha comenzado o no
        let juegoIniciado = false;

        function cargarNuevaPalabra() {
            if (!juegoIniciado) {
                // Registro el tiempo de inicio al cargar la primera palabra
                tiempoInicio = performance.now();
                juegoIniciado = true;
            }
        
            if (arrayPalabras.length === 0) {
                // Todas las palabras han sido adivinadas, el juego ha terminado
                terminarJuego();
                return;
            }
        
            cantPalabrasJugadas++;
            if (cantPalabrasJugadas > 6) {
                arrayPalabras = ["LEON", "ELEFANTE", "TIGRE", "JIRAFA", "CEBRA", "TORTUGA"];
                imagenesPalabras = ["../images/leon.jpg", "../images/elefante.jpg", "../images/tigre.jpg", "../images/jirafa.jpg", "../images/cebra.jpg", "../images/tortuga.jpg"];
                ayudas = [
                    "El rey de la selva, tiene una majestuosa melena.",
                    "Tiene una trompa larga y poderosa que utiliza para beber agua y alimentarse.",
                    "Tiene rayas en su pelaje y es uno de los grandes felinos más temidos.",
                    "Tiene un cuello largo que le permite alcanzar las hojas más altas de los árboles.",
                    "Tiene ocho patas y teje telarañas para atrapar a sus presas.",
                    "Tiene un caparazón duro que le sirve de protección."
                ];
            }
        
            posActual = Math.floor(Math.random() * arrayPalabras.length);
        
            let palabra = arrayPalabras[posActual];
            totalQueDebeAcertar = palabra.length;
            cantidadAcertadas = 0;
        
            arrayPalabraActual = palabra.split('');
        
            document.getElementById("palabra").innerHTML = "";
            document.getElementById("letrasIngresadas").innerHTML = "";
        
            for (i = 0; i < palabra.length; i++) {
                var divLetra = document.createElement("div");
                divLetra.className = "letra";
                document.getElementById("palabra").appendChild(divLetra);
            }
        
            divsPalabraActual = document.getElementsByClassName("letra");
        
            intentosRestantes = 5;
            document.getElementById("intentos").innerHTML = intentosRestantes;
        
            document.getElementById("ayuda").innerHTML = ayudas[posActual];
        
            document.getElementById("imagenPalabra").innerHTML = `<img src="${imagenesPalabras[posActual]}" alt="${palabra}" style="width: 200px;">`;
        
            arrayPalabras.splice(posActual, 1);
            imagenesPalabras.splice(posActual, 1);
            ayudas.splice(posActual, 1);
        
            // Registro el tiempo de inicio al cargar una nueva palabra
            tiempoInicio = performance.now();
        }
        
        function terminarJuego() {
            // Registro el tiempo de finalización cuando se adivinan todas las palabras
            //tiempoFin = performance.now();
        
            // Calculo la duración del juego en segundos
            //let duracionJuego = (tiempoFin - tiempoInicio) / 100;
        
            // Muestro la duración del juego
            Swal.fire({
                title: '¡Felicidades!',
                text: 'Adivinaste todas los animales',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                customClass: {
                  popup: 'mi-estilo-customizado',
                  confirmButton: 'mi-boton-customizado'
                }
              });
              
        }
        
        // Llama a cargarNuevaPalabra para iniciar el juego
        cargarNuevaPalabra();

        function reproducirAplausos() {
            var audioAplausos = document.getElementById("audioAplausos");
            audioAplausos.play();
        }

        function reproducirAudioPerdedor() {
            var audioPerdedor = document.getElementById("audioPerdedor");
            audioPerdedor.play();
        }

        document.addEventListener("keydown", event => {
            if (isLetter(event.key)) {
                let letrasIngresadas = document.getElementById("letrasIngresadas").innerHTML;
                letrasIngresadas = letrasIngresadas.split('');

                if (letrasIngresadas.lastIndexOf(event.key.toUpperCase()) === -1) {
                    let acerto = false;

                    for (i = 0; i < arrayPalabraActual.length; i++) {
                        if (arrayPalabraActual[i] == event.key.toUpperCase()) {
                            divsPalabraActual[i].innerHTML = event.key.toUpperCase();
                            acerto = true;
                            cantidadAcertadas = cantidadAcertadas + 1;
                        }
                    }

                    if (acerto == true) {
                        if (totalQueDebeAcertar == cantidadAcertadas) {
                            for (i = 0; i < arrayPalabraActual.length; i++) {
                                divsPalabraActual[i].className = "letra pintar";
                            }

                            if (intentosRestantes >= 0 && intentosRestantes <= 5) {
                                reproducirAplausos();
                            }
                            
                            // Registro el tiempo de finalización cuando se adivinan todas las palabras
                        tiempoFin = performance.now();

                        // Calculo la duración del juego en segundos
                        let duracionJuego = (tiempoFin - tiempoInicio) / 1000;

                        // Muestro la duración del juego
                        Swal.fire({
                            title: '¡Felicidades!',
                            text: 'Adivinaste el animal en ' + duracionJuego.toFixed(2) + ' segundos.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            customClass: {
                              popup: 'mi-estilo-customizado',
                              confirmButton: 'mi-boton-customizado'
                            }
                          }
                        );
                          
                        }
                        reproducirAplausos();
                        
                    } else {
                        intentosRestantes = intentosRestantes - 1;
                        document.getElementById("intentos").innerHTML = intentosRestantes;

                        if (intentosRestantes <= 0) {
                            for (i = 0; i < arrayPalabraActual.length; i++) {
                                divsPalabraActual[i].className = "letra pintarError";
                            }
                            reproducirAudioPerdedor();
                        }
                    }

                    document.getElementById("letrasIngresadas").innerHTML += event.key.toLocaleUpperCase() + " - ";
                }
            }
        });

        function isLetter(str) {
            return str.length === 1 && str.match(/[a-z]/i);
        }