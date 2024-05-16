class Memorama {

    constructor() {

        this.canPlay = false;

        this.card1 = null;
        this.card2 = null;

        this.availableImages = [16, 7, 102, 103];
        this.orderForThisRound = [];
        this.cards = Array.from( document.querySelectorAll(".board-game figure") );

        this.maxPairNumber = this.availableImages.length;

        this.startGame();

        this.startTime = null; // Variable para almacenar el tiempo de inicio del juego
        this.endTime = null; // Variable para almacenar el tiempo de finalización del juego
        this.intentosRealizados = 0; // Variable para contar los intentos realizados

    }

    startGame() {

        this.foundPairs = 0;
        this.setNewOrder();
        this.setImagesInCards();
        this.openCards();
        this.startTime = new Date(); // Iniciar el tiempo al comenzar el juego

    }

    setNewOrder() {

        this.orderForThisRound = this.availableImages.concat(this.availableImages);
        this.orderForThisRound.sort( () => Math.random() - 0.5 );
        confetti();

    }

    setImagesInCards() {

        for (const key in this.cards) {
            
            const card = this.cards[key];
            const image = this.orderForThisRound[key];
            const imgLabel = card.children[1].children[0];

            card.dataset.image = image;
            imgLabel.src = `https://randomfox.ca/images/${image}.jpg`;

        }

    }

    openCards() {

        this.cards.forEach(card => card.classList.add("opened"));

        setTimeout(() => {
            this.closeCards();
        }, 10000);

    }

    closeCards() {

        this.cards.forEach(card => card.classList.remove("opened"));
        this.addClickEvents();
        this.canPlay = true;

    }

    addClickEvents() {

        this.cards.forEach(_this => _this.addEventListener("click", this.flipCard.bind(this)));

    }

    removeClickEvents() {

        this.cards.forEach(_this => _this.removeEventListener("click", this.flipCard));

    }

    flipCard(e) {

        const clickedCard = e.target;

        if (this.canPlay && !clickedCard.classList.contains("opened")) {
            
            clickedCard.classList.add("opened");
            this.intentosRealizados++; // Incrementar el contador de intentos realizados
            this.checkPair( clickedCard.dataset.image );

        }

    }

    checkPair(image) {

        if (!this.card1) this.card1 = image;
        else this.card2 = image;

        if (this.card1 && this.card2) {
            
            if (this.card1 == this.card2) {

                this.canPlay = false;
                setTimeout(this.checkIfWon.bind(this), 1000)
                
            }
            else {

                this.canPlay = false;
                setTimeout(this.resetOpenedCards.bind(this), 3000)

            }

        }

    }

    resetOpenedCards() {
        
        const firstOpened = document.querySelector(`.board-game figure.opened[data-image='${this.card1}']`);
        const secondOpened = document.querySelector(`.board-game figure.opened[data-image='${this.card2}']`);

        firstOpened.classList.remove("opened");
        secondOpened.classList.remove("opened");

        this.card1 = null;
        this.card2 = null;

        this.canPlay = true;

    }

    checkIfWon() {

        this.foundPairs++;

        this.card1 = null;
        this.card2 = null;
        this.canPlay = true;

        if (this.maxPairNumber == this.foundPairs) {

            this.endTime = new Date(); // Tiempo actual al completar el juego
            const elapsedTime = (this.endTime - this.startTime) / 1000; // Diferencia de tiempo en segundos

            // Reproducir el sonido de aplauso
            const audioAplauso = document.getElementById("audioAplauso");
            audioAplauso.play();

            //alert(`¡Ganaste en ${this.intentosRealizados} intentos y ${elapsedTime.toFixed(2)} segundos!`);
            Swal.fire({
                title: '¡Felicidades!',
                text: `Lo lograste en ${this.intentosRealizados} intentos`, //y ${elapsedTime.toFixed(2)} segundos`,
                icon: 'success',
                confirmButtonText: 'Aceptar',
                customClass: {
                  popup: 'mi-estilo-customizado',
                  confirmButton: 'mi-boton-customizado'
                }
              });
            this.setNewGame();

        }

    }

    setNewGame() {

        this.removeClickEvents();
        this.cards.forEach(card => card.classList.remove("opened"));

        setTimeout(this.startGame.bind(this), 1000);

    }

}


document.addEventListener("DOMContentLoaded", () => {

    new Memorama();

});