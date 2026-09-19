const formulario = document.querySelector('form');

if (formulario) {

    formulario.addEventListener('submit', function (event) {

        const metodoPago = document.querySelector('#metodo_pago');
        const cuotas = document.querySelector('#numero_cuota');

        if (!metodoPago.value) {

            event.preventDefault();

            alert('Seleccioná un método de pago.');

            metodoPago.focus();

            return;
        }

        if (!cuotas.value) {

            event.preventDefault();

            alert('Seleccioná la cantidad de cuotas.');

            cuotas.focus();

            return;
        }

        const confirmar = confirm(
            '¿Querés confirmar esta compra?'
        );

        if (!confirmar) {

            event.preventDefault();

        }

    });

}