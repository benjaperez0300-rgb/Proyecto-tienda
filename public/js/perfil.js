const formulario = document.querySelector('form');

if (formulario) {

    formulario.addEventListener('submit', function (event) {

        const nombre = document.querySelector('#nombre');
        const apellido = document.querySelector('#apellido');
        const email = document.querySelector('#email');

        if (!nombre.value.trim()) {

            event.preventDefault();

            alert('El nombre es obligatorio.');

            nombre.focus();

            return;
        }

        if (!apellido.value.trim()) {

            event.preventDefault();

            alert('El apellido es obligatorio.');

            apellido.focus();

            return;
        }

        if (!email.value.trim()) {

            event.preventDefault();

            alert('El email es obligatorio.');

            email.focus();

            return;
        }

    });

}