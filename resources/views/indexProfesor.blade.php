<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .panel {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 240px;
        }

        .sidebar button {
            width: 100%;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const content = document.querySelector(".content");

            function showLaboratories() {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Lista de Laboratorios</h2>
                    <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6'>
                        ${getLaboratoryCards()}
                    </div>
                `;
            }

            function showReservations() {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Reservas</h2>
                    <div class='bg-white p-4 rounded-lg shadow-md'>
                        <h3 class='text-lg font-semibold mb-2'>Lista de Reservas</h3>
                        <table class='min-w-full divide-y divide-gray-200'>
                            <thead class='bg-gray-50'>
                                <tr>
                                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Laboratorio</th>
                                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Hora</th>
                                </tr>
                            </thead>
                            <tbody class='bg-white divide-y divide-gray-200'>
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>Laboratorio 1</td>
                                    <td class='px-6 py-4 whitespace-nowrap'>09:00</td>
                                </tr>
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>Laboratorio 2</td>
                                    <td class='px-6 py-4 whitespace-nowrap'>10:00</td>
                                </tr>
                                <!-- Puedes agregar más filas dinámicamente aquí -->
                            </tbody>
                        </table>
                    </div>
                `;
            }

            function showHistory() {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Historial</h2>
                    <div class='bg-white p-4 rounded-lg shadow-md'>
                        <h3 class='text-lg font-semibold mb-2'>Historial de Reservas</h3>
                        <table class='min-w-full divide-y divide-gray-200'>
                            <thead class='bg-gray-50'>
                                <tr>
                                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Laboratorio</th>
                                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Fecha de Reserva</th>
                                </tr>
                            </thead>
                            <tbody class='bg-white divide-y divide-gray-200'>
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>Laboratorio 1</td>
                                    <td class='px-6 py-4 whitespace-nowrap'>2024-06-28</td>
                                </tr>
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>Laboratorio 2</td>
                                    <td class='px-6 py-4 whitespace-nowrap'>2024-06-27</td>
                                </tr>
                                <!-- Puedes agregar más filas dinámicamente aquí -->
                            </tbody>
                        </table>
                    </div>
                `;
            }

            function getLaboratoryCards() {
                const laboratories = [
                    { name: "Laboratorio 1", capacity: 20, availableEquipment: 15, available: true, image: "{{ asset('img/il-cisco2.jpg')}}" },
                    { name: "Laboratorio 2", capacity: 25, availableEquipment: 20, available: false, image:"{{ asset('img/il-cisco.jpg')}}" },
                    { name: "Laboratorio 3", capacity: 30, availableEquipment: 25, available: true, image: "{{ asset('img/il-multimedia.jpg')}}" },
                    { name: "Laboratorio 4", capacity: 15, availableEquipment: 10, available: true, image: "{{ asset('img/il-redes.jpg')}}" },
                    { name: "Laboratorio 5", capacity: 18, availableEquipment: 12, available: true, image: "{{ asset('img/il-redes2.jpg')}}" }
                ];

                return laboratories
                    .filter(lab => lab.available) // Filtrar solo laboratorios disponibles
                    .map(lab => `
                        <div class='bg-white p-4 rounded-lg shadow-md'>
                            <img src='${lab.image}' alt='${lab.name}' class='w-full h-32 object-cover rounded-t-lg'>
                            <div class='p-4'>
                                <h3 class='text-lg font-semibold'>${lab.name}</h3>
                                <p class='text-gray-600'>Capacidad: ${lab.capacity} personas</p>
                                <p class='text-gray-600'>Equipos disponibles: ${lab.availableEquipment}</p>
                                <button class='mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600' onclick='showReservationForm("${lab.name}")'>Reservar</button>
                            </div>
                        </div>
                    `).join("");
            }

            window.showReservationForm = function(labName) {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Reservar ${labName}</h2>
                    <form class='bg-white p-6 rounded-lg shadow-md'>
                        <div class='mb-4'>
                            <label class='block text-gray-700'>Nombre del Laboratorio</label>
                            <input type='text' value='${labName}' class='mt-1 block w-full border border-gray-300 rounded-md p-2' disabled>
                        </div>
                        <div class='mb-4'>
                            <label class='block text-gray-700'>Fecha de Reserva</label>
                            <input type='date' class='mt-1 block w-full border border-gray-300 rounded-md p-2'>
                        </div>
                        <div class='mb-4'>
                            <label class='block text-gray-700'>Horario</label>
                            <input type='time' class='mt-1 block w-full border border-gray-300 rounded-md p-2'>
                        </div>
                        <div class='mb-4'>
                            <label class='block text-gray-700'>Tipo de Reserva</label>
                            <select class='mt-1 block w-full border border-gray-300 rounded-md p-2'>
                                <option>Uso General</option>
                                <option>Investigación</option>
                                <option>Clase</option>
                            </select>
                        </div>
                        <button type='submit' class='bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600'>Enviar Reserva</button>
                    </form>
                `;
            }

            // Funciones para controlar las pestañas
            const tabs = document.querySelectorAll(".sidebar button");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    tabs.forEach(t => t.classList.remove("bg-blue-500", "text-white"));
                    this.classList.add("bg-blue-500", "text-white");
                    const tabName = this.getAttribute("data-tab");
                    if (tabName === "laboratories") {
                        showLaboratories();
                    } else if (tabName === "reservations") {
                        showReservations();
                    } else if (tabName === "history") {
                        showHistory();
                    }
                });
            });

            // Mostrar contenido inicial
            showLaboratories();
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="panel">
        <div class="sidebar bg-gray-800 text-gray-100 py-6">
            <h2 class="text-lg font-semibold mb-6 px-4">Panel de Control</h2>
            <button class="block px-4 py-2 mb-2 text-left hover:bg-gray-700 focus:bg-gray-700 focus:outline-none transition duration-300 ease-in-out" data-tab="laboratories">Lista de Laboratorios</button>
            <button class="block px-4 py-2 mb-2 text-left hover:bg-gray-700 focus:bg-gray-700 focus:outline-none transition duration-300 ease-in-out" data-tab="reservations">Reservas</button>
            <button class="block px-4 py-2 mb-2 text-left hover:bg-gray-700 focus:bg-gray-700 focus:outline-none transition duration-300 ease-in-out" data-tab="history">Historial</button>
        </div>
        <div class="content p-6 flex-1">
            <!-- El contenido se cargará aquí dinámicamente -->
        </div>
    </div>
</body>
</html>
