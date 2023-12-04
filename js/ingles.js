document.getElementById('sumar').addEventListener('click', function () {

    for (let i = 1; i < 11; i++) {
        let preguntas1 = document.querySelector(`input[name=p${i}]:checked`).value;
        let imagen = document.createElement('img')
        let divpregunta = document.getElementById(`p${i}`)
        divpregunta.appendChild(imagen)

        if (preguntas1 == 1) {
            imagen.style.position = 'absolute'
            imagen.style.marginTop = '20px'
            imagen.style.marginLeft = '45%'
            imagen.style.width = '100px'
            imagen.src = 'img/correcto-sin-fondo.png'
        } else {
            imagen.style.position = 'absolute'
            imagen.style.marginTop = '20px'
            imagen.style.marginLeft = '45%'
            imagen.style.width = '100px'
            imagen.src = 'img/incorrecto-sin-fondo.png'
        }

    }
    
    let resultado = parseInt(numerogrupo1) + parseInt(numerogrupo2);

    textosalida.innerText = numerogrupo1 + ' ' + '+' + ' ' + numerogrupo2 + ' ' + '=' + ' ' + resultado;
});