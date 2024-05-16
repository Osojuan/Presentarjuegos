const totalCards = 12;
const availableCards = ['A', 'K', 'Q', 'J'];
let cards = [];
let selectedCards = [];
let valuesUsed = [];
let currentMove = 0;
let currentAttempts = 0;

let startTime = null; // Variable para almacenar el tiempo de inicio del juego
let endTime = null; // Variable para almacenar el tiempo de finalización del juego

let cardTemplate = '<div class="card"><div class="back"></div><div class="face"></div></div>';
confetti();
function reproducirAplausos() {
   var audioAplausos = document.getElementById("audioAplausos");
   audioAplausos.play();
   confetti();
}

function reproducirAudioCorrecto() {
   var audioCorrecto = document.getElementById("audioCorrecto"); 
   audioCorrecto.play();  
}

function activate(e) {
   if (currentMove < 2) {
      
      if ((!selectedCards[0] || selectedCards[0] !== e.target) && !e.target.classList.contains('active') ) {
         e.target.classList.add('active');
         selectedCards.push(e.target);

         if (++currentMove == 2) {

            currentAttempts++;
            document.querySelector('#stats').innerHTML = currentAttempts + ' intentos';

            if (!startTime) {
               startTime = new Date(); // Iniciar el tiempo al comenzar el juego
            }

            if (selectedCards[0].querySelectorAll('.face')[0].innerHTML == selectedCards[1].querySelectorAll('.face')[0].innerHTML) {
               selectedCards = [];
               currentMove = 0;

               // Verificar si todas las cartas han sido emparejadas
               if (document.querySelectorAll('.card:not(.active)').length === 0) {
                  endTime = new Date(); // Tiempo actual al completar el juego
                  mostrarResultados(); // Mostrar los resultados al completar el juego
               }
            }
            else {
               setTimeout(() => {
                  selectedCards[0].classList.remove('active');
                  selectedCards[1].classList.remove('active');
                  selectedCards = [];
                  currentMove = 0;
               }, 2000);
            }
         }
      }
   }
}

function randomValue() {
   let rnd = Math.floor(Math.random() * totalCards * 0.5);
   let values = valuesUsed.filter(value => value === rnd);
   if (values.length < 2) {
      valuesUsed.push(rnd);
   }
   else {
      randomValue();
   }
}

function getFaceValue(value) {
   let rtn = value;
   if (value < availableCards.length) {
      rtn = availableCards[value];
   }
   return rtn;
}

function mostrarResultados() {
   const elapsedTime = (endTime - startTime) / 1000; // Diferencia de tiempo en segundos
   //alert(`¡Ganaste en ${currentAttempts} intentos y ${elapsedTime.toFixed(2)} segundos!`);
   Swal.fire({
      title: '¡Felicidades!',
      text: `Lo lograste en ${currentAttempts} intentos y ${elapsedTime.toFixed(2)} segundos`,
      icon: 'success',
      confirmButtonText: 'Aceptar',
      customClass: {
        popup: 'mi-estilo-customizado',
        confirmButton: 'mi-boton-customizado'
      }
    });   
    reproducirAplausos();
}

for (let i=0; i < totalCards; i++) {
   let div = document.createElement('div');
   div.innerHTML = cardTemplate;
   cards.push(div);
   document.querySelector('#game').append(cards[i]);
   randomValue();
   cards[i].querySelectorAll('.face')[0].innerHTML = getFaceValue(valuesUsed[i]);
   cards[i].querySelectorAll('.card')[0].addEventListener('click', activate);

}

document.getElementById("restartButton").addEventListener("click", () => {
   // Reiniciar el juego
   currentAttempts = 0;
   document.querySelector('#stats').innerHTML = '0 intentos';
   cards.forEach(card => card.classList.remove("active"));
   selectedCards = [];
   currentMove = 0;
   valuesUsed = [];
   startTime = null;
   endTime = null;
   cards.forEach(card => {
      card.querySelector('.face').innerHTML = '';
      randomValue();
      card.querySelector('.face').innerHTML = getFaceValue(valuesUsed[i]);
   });
});