const formulario = document.querySelector('form');

if (formulario) {

    formulario.addEventListener('submit', function (event) {

        const email = document.querySelector('#email');
        const password = document.querySelector('#password');

        if (!email.value.trim()) {

            event.preventDefault();

            alert('Ingresá tu email.');

            email.focus();

            return;
        }

        if (!password.value.trim()) {

            event.preventDefault();

            alert('Ingresá tu contraseña.');

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