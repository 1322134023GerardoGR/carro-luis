function verificarRespuestas() {
    let RespuestasCorrectas = {
        pregunta1: "Belgica", pregunta2: "BuenosAires", pregunta3: "CostaRica", pregunta4: "Caracas",
        pregunta5: "Brasil", pregunta6: "Lima", pregunta7: "Trinidad y Tobago", pregunta8: "La Habana",
        pregunta10: "Quito"
    };
    let puntuacion = 0;


    for (let i = 1; i <= 10; i++) {
        let preguntaId = "pregunta" + i;
        let respuestaSeleccionada = document.getElementById(preguntaId).value;
        let respuestaDiv = document.getElementById("respuesta" + i);
        let retro = document.getElementsByClassName('resultados')
        if (respuestaSeleccionada === RespuestasCorrectas[preguntaId]) {
            respuestaDiv.src = "img/correcto-sin-fondo.png";
            respuestaDiv.style.width = '50px';
            respuestaDiv.classList.add('float-end')
            retro[i - 1].innerText = "Respuesta Correcta";
            puntuacion += 1;
        } else {
            respuestaDiv.src = "img/incorrecto-sin-fondo.png";
            respuestaDiv.style.width = '50px';
            respuestaDiv.classList.add('float-end')
            retro[i - 1].innerText = "Respuesta Incorrecta. La respuesta correcta es: " + RespuestasCorrectas[preguntaId];
        }
    }
    let puntaje=document.getElementById('puntaje')
    puntaje.innerText= 'Tu Puntuacion fue: '+puntuacion;
}
function Reiniciar() {
    let ps=document.getElementsByClassName('resultados')
    for (let i = 1; i <= 10; i++) {
        let casilla = document.getElementById("pregunta" + i);
        casilla.disabled = false;
        casilla.selectedIndex = 0;
        let p=ps[i-1];
        p.innerText=""
        let puntaje=document.getElementById('respuesta'+i)
        puntaje.src="";
    }
    let puntaje=document.getElementById('puntaje')
    puntaje.innerText= '';
}