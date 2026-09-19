const formulario = document.querySelector('form');

if (formulario) {

    formulario.addEventListener('submit', function (event) {

        const nombre = document.querySelector('#nombre');
        const apellido = document.querySelector('#apellido');
        const email = document.querySelector('#email');
        const password = document.querySelector('#password');

        if (!nombre.value.trim()) {

            event.preventDefault();

            alert('Ingresá tu nombre.');

            nombre.focus();

            return;
        }

        if (!apellido.value.trim()) {

            event.preventDefault();

            alert('Ingresá tu apellido.');

            apellido.focus();

            return;
        }

        if (!email.value.trim()) {

            event.preventDefault();

            alert('Ingresá tu email.');

            email.focus();

            return;
        }

        if (password.value.length < 6) {

            event.preventDefault();

            alert('La contraseña debe tener al menos 6 caracteres.');

            password.focus();

            return;
        }

    });

}


const botonPassword = document.querySelector('#mostrar-password');
const password = document.querySelector('#password');

if (botonPassword && password) {

    botonPassword.addEventListener('click', function () {

        if (password.type === 'password') {

            password.type = 'text';

            botonPassword.textContent = 'Ocultar';

        } else {

            password.type = 'password';

            botonPassword.textContent = 'Mostrar';

        }

    });

}