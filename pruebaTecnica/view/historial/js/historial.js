document.addEventListener('DOMContentLoaded', () => {
    const selectFiltro = document.getElementById('tipoMovimiento');

    // Cargar historial completo al inicio
    cargarHistorial();

    // Escuchador para el filtro de tipo de movimiento
    selectFiltro.addEventListener('change', () => {
        const tipo = selectFiltro.value;
        cargarHistorial(tipo);
    });

    function cargarHistorial(filtro = 'todos') {
        fetch('../../controller/historial/obtener_historial.php')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#tablaMovimientos tbody');
                tbody.innerHTML = ''; // Limpiar tabla

                // Filtrado de datos
                const datosFiltrados = data.filter(item => {
                    if (filtro === 'entrada') return item.tipo_movimiento == 1;
                    if (filtro === 'salida') return item.tipo_movimiento == 2;
                    return true; // 'todos'
                });

                // Construcción de filas
                datosFiltrados.forEach(item => {
                    const fila = document.createElement('tr');
                    const tipoMovimiento = item.tipo_movimiento == 1 ? 'Entrada' :
                                           item.tipo_movimiento == 2 ? 'Salida' : 'Desconocido';

                    fila.innerHTML = `
                        <td>${item.fecha_hora}</td>
                        <td>${item.producto}</td>
                        <td>${item.cantidad}</td>
                        <td>${tipoMovimiento}</td>
                        <td>${item.usuario}</td>
                    `;

                    tbody.appendChild(fila);
                });
            })
            .catch(error => {
                console.error('Error al cargar el historial:', error);
            });
    }
});
