document.addEventListener('DOMContentLoaded', () => {
    // Formulario: Agregar producto

    document.getElementById('formAgregar').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch('../../controller/inventario/agregar_inventario.php', {
            method: 'POST',
            body: formData
        })
        .then(r => r.text())
        .then(res => {
            e.preventDefault();
            alert(res);
            this.reset();
            cargarProductos(); // recargar lista
        })
        .catch(err => alert('Error al agregar producto'));
    });

    // Formulario: Movimiento de productos
    document.getElementById('formMovimiento').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch('../../controller/inventario/entrada_inventario.php', {
            method: 'POST',
            body: formData
        })
        .then(r => r.text())
        .then(res => {
            alert(res);
            this.reset();
            cargarProductos();
        })
        .catch(err => alert('Error en el movimiento de inventario'));
    });

    // Formulario: Cambio de estatus
    document.getElementById('formEstatus').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch('../../controller/inventario/estatus_inventario.php', {
            method: 'POST',
            body: formData
        })
        .then(r => r.text())
        .then(res => {
            alert(res);
            this.reset();
            cargarProductos();
        })
        .catch(err => alert('Error al cambiar el estatus'));
    });

   // Función para cargar productos y llenar los selects dinámicos
function cargarProductos() {
    fetch('../../controller/inventario/obtener_inventario.php')
        .then(r => r.json())
        .then(data => {
            const selects = document.querySelectorAll('select[name="productoId"]');
            selects.forEach(select => {
                select.innerHTML = '<option value="">Seleccione un producto</option>';
                data.forEach(p => {
                    select.innerHTML += `<option value="${p.idproducto}">${p.nombre}</option>`;
                });
            });

            // Actualiza tabla sin filtro por estatus
            const tbody = document.querySelector('#tablaInventario tbody');
            tbody.innerHTML = '';
            data.forEach(p => {
                tbody.innerHTML += `
                    <tr>
                        <td>${p.nombre}</td>
                        <td>${p.descripcion}</td>
                        <td>${p.cantidad}</td>
                        <td>${p.estatus == 1 ? 'Activo' : 'Inactivo'}</td>
                    </tr>`;
            });
        });
}

// Llamar la función al cargar la página
cargarProductos();

});

