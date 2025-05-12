document.addEventListener('DOMContentLoaded', () => {
    // Formulario: Registrar salida
    document.getElementById('formSalida').addEventListener('submit', function(e) {
        e.preventDefault();

        const cantidadSolicitada = parseInt(document.getElementById('cantidad').value);
        const select = document.getElementById('producto');
        const selectedOption = select.options[select.selectedIndex];
        const stockDisponible = parseInt(selectedOption.getAttribute('data-stock'));

        // Validación: no permitir salida mayor a stock
        if (cantidadSolicitada > stockDisponible) {
            document.getElementById('error').style.display = 'block';
            return;
        } else {
            document.getElementById('error').style.display = 'none';
        }

        const formData = new FormData(this);
        fetch('../../controller/salida/salida_inventario.php', {
            method: 'POST',
            body: formData
        })
        .then(r => r.text())
        .then(res => {
            alert(res);
            this.reset();
            cargarProductos(); // recarga productos con stock actualizado
        })
        .catch(err => alert('Error al registrar salida'));
    });

    // Cargar productos en el select
    function cargarProductos() {
        fetch('../../controller/salida/obtener_productos.php') // Ajusta la ruta según tu estructura
            .then(r => r.json())
            .then(data => {
                const select = document.getElementById('producto');
                select.innerHTML = '<option value="">Selecciona un producto</option>';
                data.forEach(p => {
                    const option = document.createElement('option');
                    option.value = p.idproducto;
                    option.textContent = `${p.nombre} - ${p.cantidad} unidades`;
                    option.setAttribute('data-stock', p.cantidad);
                    select.appendChild(option);
                });
            });
    }

    // Llamar al cargar la página
    cargarProductos();
});
