document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
    darkMode();
});

function eventListeners() {
    const mobilemenu = document.querySelector('.mobile-menu');

    mobilemenu.addEventListener('click', navegacionResponsive);

    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }



    // navegacion.classList.toggle('mostrar'); Este codigo es lo mismo pero mas corto
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-Mode');
    } else {
        document.body.classList.remove('dark-Mode');
    }

    prefiereDarkMode.addEventListener('change', function () {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-Mode');
        } else {
            document.body.classList.remove('dark-Mode');
        }
    })


    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-Mode');
    })
}

function alertEmailSuccess() {
    Swal.fire({
        icon: 'success',
        title: '¡Gracias por el interes!',
        text: 'Te contactaremos lo más rapido posible',
    })
}

function alertEmailError() {
    Swal.fire({
        icon: 'error',
        title: 'Oops... :(',
        text: 'Algo salio mal, intentelo mas tarde ^^',
    })
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'Telefono') {
        contactoDiv.innerHTML = ` 
            <label class="mt-4" for="telefono">Numero de Teléfono</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]" required>

            <p>Elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" required>
        `;
    } else if (e.target.value === 'Email') {
        contactoDiv.innerHTML = `
            <label class="mt-4" for="email">E-Mail:</label>
            <input type="email" placeholder="Tu Correo Electrónico" id="email" name="contacto[email]" required>

        
        `
    }
}