const draggableElements = document.querySelectorAll(".draggable");
const droppableElements = document.querySelectorAll(".droppable");
let startTime; // Variable para almacenar el tiempo de inicio de la actividad
let intentosRealizados = 0; // Variable para contar los intentos realizados

draggableElements.forEach(elem => {
  elem.addEventListener("dragstart", dragStart); // Fires as soon as the user starts dragging an item - This is where we can define the drag data
  // elem.addEventListener("drag", drag); // Fires when a dragged item (element or text selection) is dragged
  // elem.addEventListener("dragend", dragEnd); // Fires when a drag operation ends (such as releasing a mouse button or hitting the Esc key) - After the dragend event, the drag and drop operation is complete
});

droppableElements.forEach(elem => {
  elem.addEventListener("dragenter", dragEnter); // Fires when a dragged item enters a valid drop target
  elem.addEventListener("dragover", dragOver); // Fires when a dragged item is being dragged over a valid drop target, repeatedly while the draggable item is within the drop zone
  elem.addEventListener("dragleave", dragLeave); // Fires when a dragged item leaves a valid drop target
  elem.addEventListener("drop", drop); // Fires when an item is dropped on a valid drop target
});

// Drag and Drop Functions

//Events fired on the drag target

function dragStart(event) {
  event.dataTransfer.setData("text", event.target.id); // or "text/plain" but just "text" would also be fine since we are not setting any other type/format for data value
  startTime = new Date(); // Iniciar el tiempo al comenzar a arrastrar un elemento

}

//Events fired on the drop target

function dragEnter(event) {
  if(!event.target.classList.contains("dropped")) {
    event.target.classList.add("droppable-hover");
  }
}

function dragOver(event) {
  if(!event.target.classList.contains("dropped")) {
    event.preventDefault(); // Prevent default to allow drop
  }
}

function dragLeave(event) {
  if(!event.target.classList.contains("dropped")) {
    event.target.classList.remove("droppable-hover");
  }
}

function drop(event) {
  event.preventDefault(); // This is in order to prevent the browser default handling of the data
  event.target.classList.remove("droppable-hover");
  const draggableElementData = event.dataTransfer.getData("text"); // Get the dragged data. This method will return any data that was set to the same type in the setData() method
  const droppableElementData = event.target.getAttribute("data-draggable-id");
  const isCorrectMatching = draggableElementData === droppableElementData;

  if(isCorrectMatching) {
    const draggableElement = document.getElementById(draggableElementData);
    event.target.classList.add("dropped");confetti();
    // event.target.style.backgroundColor = draggableElement.style.color; // This approach works only for inline styles. A more general approach would be the following: 
    event.target.style.backgroundColor = window.getComputedStyle(draggableElement).color;confetti();
    draggableElement.classList.add("dragged");
    confetti();
    draggableElement.setAttribute("draggable", "false");
    event.target.insertAdjacentHTML("afterbegin", `<i class="fas fa-${draggableElementData}"></i>`);

    // Reproducir el sonido de correcto
    const audioCorrecto = document.getElementById("audioCorrecto");
    audioCorrecto.play();

    
    intentosRealizados++; // Incrementar el contador de intentos realizados

    // Verificar si se completó la actividad
    if (document.querySelectorAll(".dropped").length === droppableElements.length) {
      const endTime = new Date(); // Tiempo actual al completar la actividad
      const elapsedTime = (endTime - startTime) / 100; // Diferencia de tiempo en segundos
      mostrarResultados(elapsedTime, intentosRealizados);
    }

  } else {
    // Reproducir el sonido de incorrecto
    const audioPerdedor = document.getElementById("audioPerdedor");
    audioPerdedor.play();
  }
}

function mostrarResultados(tiempo, intentos) {
  // Actualizar el contenido de los elementos en el HTML
  document.getElementById("tiempo").innerHTML = tiempo.toFixed(2);
  document.getElementById("intentos").innerHTML = intentos;

  // Mostrar la alerta con SweetAlert
  Swal.fire({
    title: '¡Actividad completada!',
    html: `
      <p>Tiempo transcurrido: <span>${tiempo.toFixed(2)}</span> segundos</p>
      <p>Intentos realizados: <span>${intentos}</span></p>
    `,
    icon: 'success',
    confirmButtonText: 'Aceptar'
  });

  // Reproducir el sonido de incorrecto
  const audioAplausos = document.getElementById("audioAplausos");
  audioAplausos.play();
}
