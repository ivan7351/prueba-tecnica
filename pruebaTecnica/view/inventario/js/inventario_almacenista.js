document.addEventListener('DOMContentLoaded', () => {
    
   // Función para cargar productos y mostrar en la tabla
function cargarProductos() {
    fetch('../../controller/inventario/inventario_almacenista.php')
        .then(r => r.json())
        .then(data => {
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

