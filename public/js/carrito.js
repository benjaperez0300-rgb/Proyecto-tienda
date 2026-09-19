const formulariosEliminar = document.querySelectorAll('.form-eliminar');

formulariosEliminar.forEach(function (formulario) {

    formulario.addEventListener('submit', function (event) {

        const confirmar = confirm(
            '¿Querés eliminar este producto del carrito?'
        );

        if (!confirmar) {
            event.preventDefault();
        }

    });

});


const formulariosCantidad = document.querySelectorAll('.form-cantidad');

formulariosCantidad.forEach(function (formulario) {

    formulario.addEventListener('submit', function (event) {

        const cantidad = formulario.querySelector('input[name="cantidad"]');

        if (cantidad.value < 1) {
            event.preventDefault();

            alert('La cantidad debe ser mayor a 0.');

            cantidad.focus();
        }

    });

});