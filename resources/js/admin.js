import Chart from 'chart.js/auto';

if (document.body.id === 'admin-page') {
    window.openModal = function(id, nombre, email, telefono, asunto, mensaje, answer, created_at) {
        document.getElementById('respuestaModal').classList.remove('hidden');
        document.getElementById('contact_id').value = id;
        document.getElementById('nombreUsuario').innerText = nombre;
        document.getElementById('emailUsuario').innerText = email;
        document.getElementById('telefonoUsuario').innerText = telefono;
        document.getElementById('asuntoUsuario').innerText = asunto;
        document.getElementById('mensajeUsuario').innerText = mensaje;
        document.getElementById('fechaCreacion').innerText = created_at;
        document.getElementById('answerTextarea').value = answer ?? '';
    };

    window.cerrarModal = function() {
        document.getElementById('respuestaModal').classList.add('hidden');
    };

    window.cerrarModalPedidos = function() {
        document.getElementById('modalPedidos').classList.add('hidden');
    };

    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('answerTextarea');
        const charCount = document.getElementById('charCount');

        if (textarea && charCount) {
            textarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });
        }
    });

    window.toggleDetallesPedido = function(id) {
        const fila = document.getElementById(`detalles-pedido-${id}`);
        fila.classList.toggle('hidden');
    };

    let salesChart;

    function crearGrafico(periodo, datos) {
        document.getElementById('chart-container').innerHTML = '<canvas id="salesChart"></canvas>';
        const ctx = document.getElementById('salesChart').getContext('2d');

        salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: datos.labels,
                datasets: [{
                    label: 'Ventas',
                    data: datos.values,
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => '€' + value
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: context => 'Ventas: €' + context.parsed.y
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    function actualizarBotones(activeBtnId) {
        document.querySelectorAll('.periodo-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-blue-100', 'text-blue-700');
            btn.classList.add('text-gray-500', 'hover:bg-gray-100');
        });

        const btn = document.getElementById(activeBtnId);
        if (btn) {
            btn.classList.remove('text-gray-500', 'hover:bg-gray-100');
            btn.classList.add('active', 'bg-blue-100', 'text-blue-700');
        }
    }

    function cargarDatos(url, periodo, btnId) {
        document.getElementById('chart-container').innerHTML =
            '<div class="text-center"><i class="fas fa-spinner fa-spin text-blue-500 text-2xl"></i><p class="text-gray-500 mt-2">Cargando datos...</p></div>';

        fetch(url)
            .then(response => response.json())
            .then(data => {
                crearGrafico(periodo, data);
                actualizarBotones(btnId);
            })
            .catch(() => {
                document.getElementById('chart-container').innerHTML =
                    '<div class="text-center"><i class="fas fa-exclamation-circle text-red-500 text-2xl"></i><p class="text-gray-500 mt-2">Error al cargar datos</p></div>';
            });
    }

    window.initChart = function () {
        if (salesChart) salesChart.destroy();
        cargarDatos('/admin/ventas/mensuales', 'mensual', 'btn-mensual');
    };

    document.addEventListener('DOMContentLoaded', () => {
        const btnMensual = document.getElementById('btn-mensual');
        const btnTrimestral = document.getElementById('btn-trimestral');
        const btnAnual = document.getElementById('btn-anual');

        if (btnMensual) btnMensual.addEventListener('click', () => cargarDatos('/admin/ventas/mensuales', 'mensual', 'btn-mensual'));
        if (btnTrimestral) btnTrimestral.addEventListener('click', () => cargarDatos('/admin/ventas/trimestrales', 'trimestral', 'btn-trimestral'));
        if (btnAnual) btnAnual.addEventListener('click', () => cargarDatos('/admin/ventas/anuales', 'anual', 'btn-anual'));

        if (document.getElementById('salesChart')) initChart();
    });
}