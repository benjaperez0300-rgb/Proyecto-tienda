const formulario = document.querySelector('.form-producto');

if (formulario) {

    formulario.addEventListener('submit', function (event) {

        const confirmar = confirm(
            '¿Querés agregar este producto al carrito?'
        );

        if (!confirmar) {

            event.preventDefault();

        }

    });

}