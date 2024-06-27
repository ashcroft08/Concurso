<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .sidebar {
            width: 240px;
            height: 100vh; /* Altura del 100% del viewport */
            position: fixed; /* Fijar la barra lateral */
            top: 0;
            left: 0;
            z-index: 1000; /* Asegurar que esté encima de otros contenidos */
            background-color: #1a202c; /* Color de fondo */
            padding-top: 4rem; /* Espacio superior para el encabezado */
        }

        .sidebar button {
            width: 100%;
            padding: 1rem 2rem;
            text-align: left;
            transition: background-color 0.3s ease-in-out;
        }

        .sidebar button:hover {
            background-color: #2d3748;
        }

        .content {
            margin-left: 240px; /* Ajustar margen izquierdo para el contenido */
            padding: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2d3748;
            color: #fff;
        }

        td button {
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        td button:hover {
            background-color: #2d3748;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin-top: 1rem;
        }

        form input, form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            background-color: #1a202c;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        form button:hover {
            background-color: #2d3748;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const content = document.querySelector(".content");
            const tabs = document.querySelectorAll(".sidebar button");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    // Reiniciar estilos de pestañas
                    tabs.forEach(t => t.classList.remove("bg-blue-500", "text-white"));
                    this.classList.add("bg-blue-500", "text-white");

                    // Determinar qué contenido mostrar según la pestaña seleccionada
                    switch (this.dataset.tab) {
                        case "laboratories":
                            showLaboratories();
                            break;
                        case "reservations":
                            showReservations();
                            break;
                        case "reports":
                            showReports();
                            break;
                        default:
                            break;
                    }
                });
            });

            function showLaboratories() {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Gestión de Laboratorios</h2>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Capacidad</th>
                                    <th>Equipos Disponibles</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Laboratorio A</td>
                                    <td>30</td>
                                    <td>25</td>
                                    <td>
                                        <button>Agregar</button>
                                        <button onclick="showEditForm('Laboratorio A')">Modificar</button>
                                        <button>Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laboratorio B</td>
                                    <td>25</td>
                                    <td>20</td>
                                    <td>
                                        <button>Agregar</button>
                                        <button onclick="showEditForm('Laboratorio B')">Modificar</button>
                                        <button>Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laboratorio C</td>
                                    <td>20</td>
                                    <td>15</td>
                                    <td>
                                        <button>Agregar</button>
                                        <button onclick="showEditForm('Laboratorio C')">Modificar</button>
                                        <button>Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="formContainer" style="display: none;"></div>
                    </div>
                `;
            }

            function showAddForm() {
                const formContainer = document.getElementById("formContainer");
                formContainer.style.display = "block";
                formContainer.innerHTML = `
                    <form id="addForm" onsubmit="event.preventDefault(); addLaboratory()">
                        <h3 class="text-lg font-semibold mb-2">Agregar Laboratorio</h3>
                        <input type="text" id="name" placeholder="Nombre del Laboratorio" required>
                        <input type="number" id="capacity" placeholder="Capacidad" required>
                        <input type="number" id="equipment" placeholder="Equipos Disponibles" required>
                        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
                    </form>
                `;
            }

            function showEditForm(labName) {
                const formContainer = document.getElementById("formContainer");
                formContainer.style.display = "block";
                formContainer.innerHTML = `
                    <form id="editForm" onsubmit="event.preventDefault(); updateLaboratory('${labName}')">
                        <h3 class="text-lg font-semibold mb-2">Modificar Laboratorio</h3>
                        <input type="text" id="name" value="${labName}" disabled>
                        <input type="number" id="capacity" placeholder="Capacidad" required>
                        <input type="number" id="equipment" placeholder="Equipos Disponibles" required>
                        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Actualizar</button>
                    </form>
                `;
            }

            function addLaboratory() {
                const name = document.getElementById("name").value;
                const capacity = document.getElementById("capacity").value;
                const equipment = document.getElementById("equipment").value;

                // Aquí iría la lógica para enviar los datos al servidor o actualizar la tabla localmente (simulado)
                alert(`Laboratorio agregado:\nNombre: ${name}\nCapacidad: ${capacity}\nEquipos Disponibles: ${equipment}`);

                // Limpiar el formulario y actualizar la tabla (simulado)
                document.getElementById("addForm").reset();
                showLaboratories();
            }

            function updateLaboratory(labName) {
                const capacity = document.getElementById("capacity").value;
                const equipment = document.getElementById("equipment").value;

                // Aquí iría la lógica para enviar los datos al servidor o actualizar la tabla localmente (simulado)
                alert(`Laboratorio actualizado:\nNombre: ${labName}\nCapacidad: ${capacity}\nEquipos Disponibles: ${equipment}`);

                // Limpiar el formulario y actualizar la tabla (simulado)
                document.getElementById("editForm").reset();
                showLaboratories();
            }

            function showReservations() {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Gestión de Reservas</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del Laboratorio</th>
                                <th>Fecha de Reserva</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Laboratorio A</td>
                                <td>2024-06-28</td>
                                <td>Pendiente</td>
                                <td><button>Aceptar</button> <button>Rechazar</button></td>
                            </tr>
                            <tr>
                                <td>Laboratorio B</td>
                                <td>2024-06-29</td>
                                <td>Aceptada</td>
                                <td><button>Aceptar</button> <button>Rechazar</button></td>
                            </tr>
                            <tr>
                                <td>Laboratorio C</td>
                                <td>2024-06-30</td>
                                <td>Rechazada</td>
                                <td><button>Aceptar</button> <button>Rechazar</button></td>
                            </tr>
                        </tbody>
                    </table>
                `;
            }

            function showReports() {
                content.innerHTML = `
                    <h2 class='text-xl font-semibold mb-4'>Reportes de Reservas</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del Laboratorio</th>
                                <th>Fecha de Reserva</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Laboratorio A</td>
                                <td>2024-06-28</td>
                                <td>Pendiente</td>
                            </tr>
                            <tr>
                                <td>Laboratorio B</td>
                                <td>2024-06-29</td>
                                <td>Aceptada</td>
                            </tr>
                            <tr>
                                <td>Laboratorio C</td>
                                <td>2024-06-30</td>
                                <td>Rechazada</td>
                            </tr>
                        </tbody>
                    </table>
                `;
            }

            // Mostrar la gestión de laboratorios por defecto al cargar la página
            showLaboratories();
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="sidebar text-gray-100">
        <h2 class="text-lg font-semibold mb-6 px-4">Panel de Control</h2>
        <button class="block hover:bg-gray-700 focus:bg-gray-700 focus:outline-none transition duration-300 ease-in-out" data-tab="laboratories">Gestión de Laboratorios</button>
        <button class="block hover:bg-gray-700 focus:bg-gray-700 focus:outline-none transition duration-300 ease-in-out" data-tab="reservations">Gestión de Reservas</button>
        <button class="block hover:bg-gray-700 focus:bg-gray-700 focus:outline-none transition duration-300 ease-in-out" data-tab="reports">Reportes</button>
    </div>
    <div class="content">
        <!-- El contenido dinámico se cargará aquí -->
    </div>
</body>
</html>
