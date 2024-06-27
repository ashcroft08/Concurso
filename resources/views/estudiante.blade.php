<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll("aside ul li a");
            const content = document.querySelector("#content");

            function showSection(text) {
                if (text === "Reservas") {
                    content.innerHTML = "<h2 class='text-xl font-semibold mb-4'>Reservas</h2><p>Aquí puedes gestionar tus reservas.</p>";
                } else if (text === "Lista de Laboratorios") {
                    content.innerHTML = `
                        <h2 class='text-xl font-semibold mb-4'>Lista de Laboratorios</h2>
                        <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6'>
                            <div class='bg-white p-4 rounded-lg shadow-md'>
                                <img src='https://via.placeholder.com/150' alt='Laboratorio 1' class='w-full h-32 object-cover rounded-t-lg'>
                                <div class='p-4'>
                                    <h3 class='text-lg font-semibold'>Laboratorio 1</h3>
                                    <p class='text-gray-600'>Capacidad: 20 personas</p>
                                    <p class='text-gray-600'>Equipos disponibles: 15</p>
                                    <p class='text-green-500'>Disponible</p>
                                    <button class='mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600' onclick='showReservationForm("Laboratorio 1")'>Reservar</button>
                                </div>
                            </div>
                            <div class='bg-white p-4 rounded-lg shadow-md'>
                                <img src='https://via.placeholder.com/150' alt='Laboratorio 2' class='w-full h-32 object-cover rounded-t-lg'>
                                <div class='p-4'>
                                    <h3 class='text-lg font-semibold'>Laboratorio 2</h3>
                                    <p class='text-gray-600'>Capacidad: 25 personas</p>
                                    <p class='text-gray-600'>Equipos disponibles: 20</p>
                                    <p class='text-red-500'>No disponible</p>
                                    <button class='mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600' disabled>No disponible</button>
                                </div>
                            </div>
                            <div class='bg-white p-4 rounded-lg shadow-md'>
                                <img src='https://via.placeholder.com/150' alt='Laboratorio 3' class='w-full h-32 object-cover rounded-t-lg'>
                                <div class='p-4'>
                                    <h3 class='text-lg font-semibold'>Laboratorio 3</h3>
                                    <p class='text-gray-600'>Capacidad: 30 personas</p>
                                    <p class='text-gray-600'>Equipos disponibles: 25</p>
                                    <p class='text-green-500'>Disponible</p>
                                    <button class='mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600' onclick='showReservationForm("Laboratorio 3")'>Reservar</button>
                                </div>
                            </div>
                        </div>
                    `;
                } else if (text === "Historial") {
                    content.innerHTML = "<h2 class='text-xl font-semibold mb-4'>Historial</h2><p>Aquí está tu historial.</p>";
                }
            }

            links.forEach(link => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const text = this.querySelector("span").textContent;
                    showSection(text);
                });
            });

            window.showReservationForm = function(labName) {
                showSection("Reservas");
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
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white p-4 shadow-md">
            <h1 class="text-2xl font-semibold">Panel de Control</h1>
        </header>
        <main class="flex flex-1">
            <aside class="w-64 bg-white p-6 border-r">
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="block p-4 bg-blue-50 rounded-lg hover:bg-blue-100">
                            <span class="text-lg font-medium text-blue-700">Reservas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-4 bg-blue-50 rounded-lg hover:bg-blue-100">
                            <span class="text-lg font-medium text-blue-700">Lista de Laboratorios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-4 bg-blue-50 rounded-lg hover:bg-blue-100">
                            <span class="text-lg font-medium text-blue-700">Historial</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <section id="content" class="flex-1 p-6">
                <h2 class="text-xl font-semibold mb-4">Bienvenido al Panel de Control</h2>
                <p>Seleccione una opción del menú para comenzar.</p>
            </section>
        </main>
    </div>
</body>
</html>
