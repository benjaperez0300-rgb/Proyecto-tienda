const buscador = document.querySelector('.search');

const productos = document.querySelectorAll('.producto');


buscador.addEventListener('input', function () {

    const textoBuscado = buscador.value
        .toLowerCase()
        .trim();


    productos.forEach(function (producto) {

        const nombre = producto
            .querySelector('.producto-nombre')
            ?.textContent
            .toLowerCase() || '';


        const precio = producto
            .querySelector('.producto-precio')
            ?.textContent
            .toLowerCase() || '';


        const datos = producto
            .querySelectorAll('.producto-dato');


        let informacion = nombre + ' ' + precio;


        datos.forEach(function (dato) {

            informacion += ' ' + dato.textContent.toLowerCase();

        });


        if (informacion.includes(textoBuscado)) {

            producto.style.display = '';

        } else {

            producto.style.display = 'none';

        }

    });

});

