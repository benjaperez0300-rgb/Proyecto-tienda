
// ==================================================
// JAVASCRIPT GENERAL DE LA TIENDA
// ==================================================

document.addEventListener('DOMContentLoaded', function () {

    console.log('JavaScript de la tienda cargado correctamente.');


    // ==================================================
    // BUSCADOR DE PRODUCTOS
    // ==================================================

    const buscador = document.getElementById('buscarProducto');

    if (buscador) {

        buscador.addEventListener('input', function () {

            const texto = this.value.toLowerCase().trim();

            const productos = document.querySelectorAll('.producto');

            let encontrados = 0;

            productos.forEach(function (producto) {

                const contenido =
                    producto.dataset.busqueda?.toLowerCase() || '';

                if (contenido.includes(texto)) {

                    producto.classList.remove('oculto');

                    encontrados++;

                } else {

                    producto.classList.add('oculto');

                }

            });


            // ------------------------------------------
            // MENSAJE CUANDO NO HAY RESULTADOS
            // ------------------------------------------

            const sinResultados =
                document.getElementById('sinResultados');

            if (sinResultados) {

                if (encontrados === 0) {

                    sinResultados.classList.remove('oculto');

                } else {

                    sinResultados.classList.add('oculto');

                }

            }

        });

    }


    // ==================================================
    // BOTÓN LIMPIAR BUSCADOR
    // ==================================================

    const limpiarBusqueda =
        document.getElementById('limpiarBusqueda');

    if (limpiarBusqueda) {

        limpiarBusqueda.addEventListener('click', function () {

            if (buscador) {

                buscador.value = '';

                buscador.dispatchEvent(
                    new Event('input')
                );

                buscador.focus();

            }

        });

    }


    // ==================================================
    // CONFIRMAR ELIMINACIÓN
    // ==================================================

    const botonesEliminar =
        document.querySelectorAll('.confirmar-eliminar');

    botonesEliminar.forEach(function (boton) {

        boton.addEventListener('click', function (event) {

            const confirmar = confirm(
                '¿Está seguro de que desea eliminar este elemento?'
            );

            if (!confirmar) {

                event.preventDefault();

            }

        });

    });


    // ==================================================
    // CANTIDAD DEL CARRITO - DISMINUIR
    // ==================================================

    const botonesMenos =
        document.querySelectorAll('.cantidad-menos');

    botonesMenos.forEach(function (boton) {

        boton.addEventListener('click', function () {

            const contenedor =
                this.closest('.cantidad');

            if (!contenedor) {
                return;
            }

            const input =
                contenedor.querySelector('.cantidad-input');

            if (!input) {
                return;
            }

            let cantidad =
                parseInt(input.value) || 1;


            if (cantidad > 1) {

                cantidad--;

                input.value = cantidad;

                input.dispatchEvent(
                    new Event('change')
                );

            }

        });

    });


    // ==================================================
    // CANTIDAD DEL CARRITO - AUMENTAR
    // ==================================================

    const botonesMas =
        document.querySelectorAll('.cantidad-mas');

    botonesMas.forEach(function (boton) {

        boton.addEventListener('click', function () {

            const contenedor =
                this.closest('.cantidad');

            if (!contenedor) {
                return;
            }

            const input =
                contenedor.querySelector('.cantidad-input');

            if (!input) {
                return;
            }

            let cantidad =
                parseInt(input.value) || 1;


            cantidad++;

            input.value = cantidad;

            input.dispatchEvent(
                new Event('change')
            );

        });

    });


    // ==================================================
    // VALIDAR CANTIDADES DEL CARRITO
    // ==================================================

    const inputsCantidad =
        document.querySelectorAll('.cantidad-input');

    inputsCantidad.forEach(function (input) {

        input.addEventListener('input', function () {

            let cantidad =
                parseInt(this.value);

            if (isNaN(cantidad) || cantidad < 1) {

                this.value = 1;

            }

        });

    });


    // ==================================================
    // OCULTAR MENSAJES AUTOMÁTICAMENTE
    // ==================================================

    const mensajes =
        document.querySelectorAll('.mensaje');

    mensajes.forEach(function (mensaje) {

        setTimeout(function () {

            mensaje.classList.add('oculto');

        }, 4000);

    });


    // ==================================================
    // MOSTRAR / OCULTAR CONTRASEÑA
    // ==================================================

    const botonesPassword =
        document.querySelectorAll('.mostrar-password');

    botonesPassword.forEach(function (boton) {

        boton.addEventListener('click', function () {

            const input =
                document.getElementById(
                    this.dataset.input
                );

            if (!input) {
                return;
            }


            if (input.type === 'password') {

                input.type = 'text';

                this.textContent = 'Ocultar';

            } else {

                input.type = 'password';

                this.textContent = 'Mostrar';

            }

        });

    });


    // ==================================================
    // VALIDACIÓN BÁSICA DE FORMULARIOS
    // ==================================================

    const formularios =
        document.querySelectorAll('.validar-formulario');

    formularios.forEach(function (formulario) {

        formulario.addEventListener('submit', function (event) {

            const campos =
                formulario.querySelectorAll('[required]');

            let formularioValido = true;


            campos.forEach(function (campo) {

                if (!campo.value.trim()) {

                    campo.classList.add('campo-error');

                    formularioValido = false;

                } else {

                    campo.classList.remove('campo-error');

                }

            });


            if (!formularioValido) {

                event.preventDefault();

                alert(
                    'Complete todos los campos obligatorios.'
                );

            }

        });

    });


    // ==================================================
    // QUITAR ERROR AL ESCRIBIR
    // ==================================================

    const campos =
        document.querySelectorAll('.campo-error');

    campos.forEach(function (campo) {

        campo.addEventListener('input', function () {

            if (this.value.trim()) {

                this.classList.remove('campo-error');

            }

        });

    });

});

// ==================================================
// FUNCIÓN GENERAL PARA FETCH
// ==================================================

async function realizarFetch(url, opciones = {}) {

    try {

        const respuesta =
            await fetch(url, opciones);


        if (!respuesta.ok) {

            throw new Error(
                'Error HTTP: ' + respuesta.status
            );

        }


        return await respuesta.json();

    } catch (error) {

        console.error(
            'Error en la petición:',
            error
        );

        return null;

    }

}




function obtenerTokenCSRF() {

    const meta =
        document.querySelector(
            'meta[name="csrf-token"]'
        );

    if (!meta) {

        console.error(
            'No se encontró el token CSRF.'
        );

        return null;

    }

    return meta.getAttribute('content');

}


// ==================================================
// FETCH POST PARA LARAVEL
// ==================================================
//
// Esta función queda preparada para cuando
// necesitemos enviar información desde JavaScript
// a una ruta Laravel.
// ==================================================

async function enviarDatos(url, datos) {

    const token = obtenerTokenCSRF();

    return await realizarFetch(
        url,
        {
            method: 'POST',

            headers: {

                'Content-Type':
                    'application/json',

                'Accept':
                    'application/json',

                'X-CSRF-TOKEN':
                    token

            },

            body: JSON.stringify(datos)

        }
    );

}
