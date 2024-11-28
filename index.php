<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto de Funciones</title>
    <link rel="icon" href="https://i.ibb.co/3Sgvh6F/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .transition {
            transition: all 0.3s ease;
        }

        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .spin {
            animation: spin 0.5s linear;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .calculator-container {
            width: 100%;
            max-width: 300px;
            height: auto;
            background-color: black;
            border-radius: 20px;
            padding: 20px;
        }

        #outputScreen {
            height: 80px;
            font-size: 32px;
            overflow-x: auto;
        }

        .calculator-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }

        .calculator-buttons button {
            width: 100%;
            height: 60px;
            font-size: 24px;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 p-6">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 mb-6">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://i.ibb.co/5954hqy/logo.png" class="h-8" alt="FlexiHub Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FlexiHub</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <button onclick="cambiarModulo('calcular-fechas')"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500">Date
                            Calc</button>
                    </li>
                    <li>
                        <button onclick="cambiarModulo('calcular-tiempo-pasado')"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500">Past
                            Time Calc</button>
                    </li>
                    <li>
                        <button onclick="cambiarModulo('generador-contrasenas')"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500">Pwd
                            Gen</button>
                    </li>
                    <li>
                        <button onclick="cambiarModulo('registro-actividades')"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500">Activity
                            Log</button>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div id="modulos">
        <div class="module bg-white p-4 rounded-lg shadow-md transition hover:shadow-lg mb-6 max-w-md mx-auto"
            id="calcular-fechas">
            <h2 class="text-xl font-semibold mb-4">Calcular Fechas</h2>
            <input type="date" id="fechaBase" class="border p-2 rounded w-full mb-2">
            <input type="number" id="cantidad" placeholder="Cantidad" class="border p-2 rounded w-full mb-2">
            <select id="unidad" class="border p-2 rounded w-full mb-2">
                <option value="dias">Días</option>
                <option value="meses">Meses</option>
                <option value="años">Años</option>
            </select>
            <button onclick="sumarFecha()" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">Sumar
                Fecha</button>
            <p id="resultadoFechas" class="mt-2"></p>
        </div>

        <div class="module bg-white p-4 rounded-lg shadow-md transition hover:shadow-lg mb-6 max-w-md mx-auto hidden"
            id="calcular-tiempo-pasado">
            <h2 class="text-xl font-semibold mb-4">Calcular Tiempo Pasado</h2>
            <label for="fechaInicial" class="block mb-2">Fecha Inicial:</label>
            <input type="date" id="fechaInicial" class="border p-2 rounded w-full mb-2">
            <label for="fechaFinal" class="block mb-2">Fecha Final:</label>
            <input type="date" id="fechaFinal" class="border p-2 rounded w-full mb-2">
            <button onclick="calcularTiempoEntreFechas()"
                class="bg-green-500 text-white p-2 rounded hover:bg-green-600 transition">Calcular Tiempo Entre
                Fechas</button>
            <p id="resultadoTiempoPasado" class="mt-2"></p>
        </div>
    </div>

    <div class="module hidden bg-white p-4 rounded-lg shadow-md transition hover:shadow-lg mb-6 max-w-md mx-auto"
        id="suma-resta">
        <h2 class="text-xl font-semibold mb-2">Calculadora</h2>
        <div class="flex justify-center items-center">
            <div class="calculator-container">
                <p id="outputScreen" class="mb-5 p-5 font-extrabold rounded-xl text-white bg-black text-right"></p>
                <div class="calculator-buttons">
                    <button class="rounded-full border-solid border-gray-500 bg-slate-300 p-4"
                        onclick="clr()">C</button>
                    <button class="rounded-full border-solid border-gray-500 bg-slate-300 p-4"
                        onclick="del()">Del</button>
                    <button class="rounded-full border-solid border-gray-500 bg-slate-300 p-4"
                        onclick="display('%')">%</button>
                    <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4"
                        onclick="display('/')">
                        /
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('7')">
                        7
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('8')">
                        8
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('9')">
                        9
                    </button>
                    <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4"
                        onclick="display('*')">
                        *
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('4')">
                        4
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('5')">
                        5
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('6')">
                        6
                    </button>
                    <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4"
                        onclick="display('-')">
                        -
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('1')">
                        1
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('2')">
                        2
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white px-2"
                        onclick="display('3')">
                        3
                    </button>
                    <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4"
                        onclick="display('+')">
                        +
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-4 col-span-2"
                        onclick="display('0')">
                        0
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-4"
                        onclick="display('.')">
                        .
                    </button>
                    <button class="rounded-full border-solid border-gray-500 bg-amber-500 text-white p-4"
                        onclick="calc()">
                        =
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="module hidden bg-white p-4 rounded-lg shadow-md transition hover:shadow-lg mb-6 max-w-md mx-auto"
        id="generador-contrasenas">
        <h2 class="text-xl font-semibold mb-2">Generador de Contraseñas</h2>
        <div class="mb-4">
            <label for="passwordLength" class="block font-medium mb-2">Longitud de la contraseña:</label>
            <input type="number" id="passwordLength" min="8" max="32" value="12" class="border p-2 rounded w-full">
        </div>
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" id="uppercase" class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2">Incluir mayúsculas</span>
            </label>
            <label class="inline-flex items-center ml-4">
                <input type="checkbox" id="lowercase" class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2">Incluir minúsculas</span>
            </label>
        </div>
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" id="numbers" class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2">Incluir números</span>
            </label>
            <label class="inline-flex items-center ml-4">
                <input type="checkbox" id="symbols" class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2">Incluir símbolos</span>
            </label>
        </div>
        <div class="flex items-center">
            <button id="generateBtn" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">Generar
                Contraseña</button>
            <button id="clipboardBtn" class="ml-2 p-2">
                <svg class="w-6 h-6 text-blue-500 hover:text-blue-600 transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-2M16 3v4a2 2 0 002 2h4M16 3H9a2 2 0 00-2 2v11" />
                </svg>
            </button>
        </div>
        <p id="passwordResult" class="mt-2 block"></p>
    </div>


    <div class="module hidden bg-white p-4 rounded-lg shadow-md transition hover:shadow-lg mb-6 max-w-md mx-auto"
        id="registro-actividades">
        <h2 class="text-xl font-semibold mb-2">Registro de Actividades y Conocimientos</h2>

        <!-- Formulario -->
        <div class="mb-6">
            <textarea id="registro" placeholder="Escribe aquí tus actividades..."
                class="border p-2 rounded w-full mb-2"></textarea>
            <input type="date" id="fechaActividad" class="border p-2 rounded w-full mb-2">
            <input type="time" id="horaActividad" class="border p-2 rounded w-full mb-2">
            <button onclick="guardarRegistro()"
                class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">Guardar Registro</button>
            <p id="resultadoRegistro" class="mt-2"></p>
        </div>

        <!-- Tabla de actividades en un formulario separado -->
        <form class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Actividades Guardadas</h3>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Actividad</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3">Hora de Inicio</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody id="listaActividades" class="text-gray-700">
                    <!-- Ejemplo de fila editable -->
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            <input type="text" value="Actividad 1" class="border rounded p-1 w-full" />
                        </td>
                        <td class="px-6 py-4">
                            <input type="date" value="2024-01-01" class="border rounded p-1 w-full" />
                        </td>
                        <td class="px-6 py-4">
                            <input type="time" value="12:00" class="border rounded p-1 w-full" />
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="editarActividad(this)"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Guardar</button>
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            <input type="text" value="Actividad 2" class="border rounded p-1 w-full" />
                        </td>
                        <td class="px-6 py-4">
                            <input type="date" value="2024-01-02" class="border rounded p-1 w-full" />
                        </td>
                        <td class="px-6 py-4">
                            <input type="time" value="13:00" class="border rounded p-1 w-full" />
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="editarActividad(this)"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Guardar</button>
                        </td>
                    </tr>
                    <!-- Agregar más filas según sea necesario -->
                </tbody>
            </table>
        </form>
    </div>

    <script>
        // Cargar el módulo predeterminado al iniciar
        window.onload = function () {
            cambiarModulo('calcular-fechas');
        };

        function cambiarModulo(modulo) {
            const modulos = document.querySelectorAll('.module');
            modulos.forEach(m => m.classList.add('hidden'));
            document.getElementById(modulo).classList.remove('hidden');
        }

        function sumarFecha() {
            const fechaBase = new Date(document.getElementById('fechaBase').value);
            const cantidad = parseInt(document.getElementById('cantidad').value);
            const unidad = document.getElementById('unidad').value;

            let nuevaFecha;
            if (unidad === 'dias') {
                nuevaFecha = new Date(fechaBase);
                nuevaFecha.setDate(nuevaFecha.getDate() + cantidad);
            } else if (unidad === 'meses') {
                nuevaFecha = new Date(fechaBase);
                nuevaFecha.setMonth(nuevaFecha.getMonth() + cantidad);
            } else if (unidad === 'años') {
                nuevaFecha = new Date(fechaBase);
                nuevaFecha.setFullYear(nuevaFecha.getFullYear() + cantidad);
            }

            document.getElementById('resultadoFechas').innerText = `Nueva Fecha: ${nuevaFecha.toLocaleDateString()}`;
        }

        function calcularTiempoEntreFechas() {
            const fechaInicial = new Date(document.getElementById('fechaInicial').value);
            const fechaFinal = new Date(document.getElementById('fechaFinal').value);

            // Verificar que la fecha inicial no sea mayor que la fecha final
            if (fechaInicial > fechaFinal) {
                document.getElementById('resultadoTiempoPasado').innerText = "La fecha inicial no puede ser mayor que la fecha final.";
                return;
            }

            // Calcular la diferencia entre las fechas
            let años = fechaFinal.getFullYear() - fechaInicial.getFullYear();
            let meses = fechaFinal.getMonth() - fechaInicial.getMonth();
            let dias = fechaFinal.getDate() - fechaInicial.getDate();

            // Ajustar el cálculo si los meses o los días son negativos
            if (dias < 0) {
                // Si los días son negativos, restamos un mes y sumamos los días del mes anterior
                meses--;
                const ultimoDiaDelMesAnterior = new Date(fechaFinal.getFullYear(), fechaFinal.getMonth(), 0).getDate();
                dias += ultimoDiaDelMesAnterior;
            }

            if (meses < 0) {
                // Si los meses son negativos, restamos un año
                años--;
                meses += 12; // Ajustar a un valor positivo
            }

            // Mostrar el resultado
            document.getElementById('resultadoTiempoPasado').innerText =
                `Han pasado: ${años} años, ${meses} meses y ${dias} días entre las fechas seleccionadas.`;
        }




        function realizarCalculos(operacion) {
            const num1 = parseFloat(document.getElementById('num1').value);
            const num2 = parseFloat(document.getElementById('num2').value);
            let resultado;

            switch (operacion) {
                case 'suma':
                    resultado = num1 + num2;
                    break;
                case 'resta':
                    resultado = num1 - num2;
                    break;
                case 'multiplicacion':
                    resultado = num1 * num2;
                    break;
                case 'division':
                    if (num2 !== 0) {
                        resultado = num1 / num2;
                    } else {
                        resultado = 'Error: División por cero';
                    }
                    break;
                default:
                    resultado = 'Operación no válida';
            }

            document.getElementById('resultadoCalculos').innerText = `Resultado: ${resultado}`;
        }

        function generarContrasena() {
            const palabra = document.getElementById('palabra').value;
            const fecha = document.getElementById('fecha').value.split('/');
            const dia = fecha[0];
            const mes = fecha[1];
            const anio = fecha[2];
            const usarSimbolos = document.getElementById('usarSimbolos').checked;

            // Crear la contraseña segura
            let contrasena = `${dia[0]}${palabra.slice(1)}${palabra[0]}${mes}${anio[0]}`;
            if (usarSimbolos) {
                contrasena += '!';
            }
            document.getElementById('resultadoContrasena').innerText = `Contraseña Generada: ${contrasena}`;
        }

        'use strict'

        function getRandomLower() {
            return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
        }

        function getRandomUpper() {
            return String.fromCharCode(Math.floor(Math.random() * 26) + 65);
        }

        function getRandomNumber() {
            return +String.fromCharCode(Math.floor(Math.random() * 10) + 48);
        }

        function getRandomSymbol() {
            const symbols = "!@#$%{}_-[]";
            return symbols[Math.floor(Math.random() * symbols.length)];
        }

        const randomFunc = {
            lower: getRandomLower,
            upper: getRandomUpper,
            number: getRandomNumber,
            symbol: getRandomSymbol,
        };

        const generateBtn = document.getElementById("generateBtn");
        generateBtn.addEventListener("click", () => {
            const length = document.getElementById("passwordLength").value;
            const hasUpper = document.getElementById("uppercase").checked;
            const hasLower = document.getElementById("lowercase").checked;
            const hasNumber = document.getElementById("numbers").checked;
            const hasSymbol = document.getElementById("symbols").checked;
            const result = document.getElementById("passwordResult");
            result.innerText = generatePassword(
                hasLower,
                hasUpper,
                hasNumber,
                hasSymbol,
                length
            );
        });

        function generatePassword(lower, upper, number, symbol, length) {
            let generatedPassword = "";
            const typesCount = lower + upper + number + symbol;
            const typesArr = [{ lower }, { upper }, { number }, { symbol }].filter(
                (item) => Object.values(item)[0]
            );

            for (let i = 0; i < length; i += typesCount) {
                typesArr.forEach((type) => {
                    const funcName = Object.keys(type)[0];
                    generatedPassword += randomFunc[funcName]();
                });
            }

            const finalPassword = generatedPassword.slice(0, length);
            return finalPassword;
        }

        // Function for copy to clipboard
        let clipboardBtn = document.getElementById("clipboardBtn");
        clipboardBtn.addEventListener("click", (e) => {
            e.preventDefault();
            navigator.clipboard.writeText(document.getElementById("passwordResult").innerText);
            alert("Contraseña copiada al portapapeles");
        });


        function convertirImagen() {
            const input = document.getElementById('imagenInput');
            const formato = document.getElementById('formatoSalida').value;

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = new Image();
                    img.src = e.target.result;
                    img.onload = function () {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);

                        // Convertir y descargar
                        canvas.toBlob(function (blob) {
                            const link = document.createElement('a');
                            link.href = URL.createObjectURL(blob);
                            link.download = `imagen_convertida.${formato}`;
                            link.click();
                        }, `image/${formato}`);
                    };
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('resultadoImagen').innerText = 'Por favor, selecciona una imagen.';
            }
        }

        const actividades = [];

        function guardarRegistro() {
            const actividad = document.getElementById('registro').value;
            const fecha = document.getElementById('fechaActividad').value;
            const hora = document.getElementById('horaActividad').value;

            if (actividad && fecha && hora) {
                actividades.push({ actividad, fecha, hora });
                document.getElementById('registro').value = ''; // Limpiar el campo de texto
                document.getElementById('fechaActividad').value = ''; // Limpiar la fecha
                document.getElementById('horaActividad').value = ''; // Limpiar la hora
                actualizarListaActividades();
                document.getElementById('resultadoRegistro').innerText = `Registro Guardado: ${actividad}`;
            } else {
                document.getElementById('resultadoRegistro').innerText = 'Por favor, completa todos los campos.';
            }
        }

        function actualizarListaActividades() {
            const lista = document.getElementById('listaActividades');
            lista.innerHTML = ''; // Limpiar la lista
            actividades.forEach((item) => {
                const tr = document.createElement('tr');
                const tdActividad = document.createElement('td');
                const tdFecha = document.createElement('td');
                const tdHora = document.createElement('td');

                tdActividad.className = 'py-2 px-4 border-b';
                tdActividad.textContent = item.actividad;
                tdFecha.className = 'py-2 px-4 border-b';
                tdFecha.textContent = item.fecha;
                tdHora.className = 'py-2 px-4 border-b';
                tdHora.textContent = item.hora;

                tr.appendChild(tdActividad);
                tr.appendChild(tdFecha);
                tr.appendChild(tdHora);
                lista.appendChild(tr);
            });
        }
        function guardarRegistro() {
            // Lógica para guardar el nuevo registro
        }

        function editarActividad(button) {
            const row = button.closest('tr');
            const actividad = row.querySelector('input[type="text"]').value;
            const fecha = row.querySelector('input[type="date"]').value;
            const hora = row.querySelector('input[type="time"]').value;

            // Aquí puedes implementar la lógica para guardar la actividad editada
            console.log(`Actividad editada: ${actividad}, Fecha: ${fecha}, Hora: ${hora}`);
        }

        //LOGICA PARA CALCULADORA

        // setting C to clear LCD 
        function clr() {
            document.getElementById('outputScreen').innerText = '';
        }

        // Del button 
        function del() {
            document.getElementById('outputScreen').innerText = document.getElementById('outputScreen').innerText.slice(0, -1);
        }
        // Making button works 
        function display(n) {
            document.getElementById('outputScreen').innerText += n;
        }

        // making the calculaton 
        function calc() {
            try {
                document.getElementById('outputScreen').innerText = eval(document.getElementById('outputScreen').innerText);
            } catch {
                document.getElementById('outputScreen').innerText = 'আমি ক্যালকুলটর হইলেও মানুষ ভাই!';
            }
        }

        // Enable Keyboard Input
        document.addEventListener("keydown", key, false);

        function key(e) {
            var keynum;
            if (window.event) {
                keynum = e.keyCode;
            } else if (e.which) {
                keynum = e.which;
            }
            console.log(String.fromCharCode(keynum));
            display(String.fromCharCode(keynum));
        }

        // Enable Keyboard Input
        document.addEventListener("keydown", handleKeyPress, false);

        function handleKeyPress(event) {
            const key = event.key;
            switch (key) {
                case '0':
                case '1':
                case '2':
                case '3':
                case '4':
                case '5':
                case '6':
                case '7':
                case '8':
                case '9':
                    display(key);
                    break;
                case '+':
                case '-':
                case '*':
                case '/':
                case '%':
                    display(key);
                    break;
                case '.':
                    display('.');
                    break;
                case 'Enter':
                    calc();
                    break;
                case 'Backspace':
                    del();
                    break;
                case 'Escape':
                    clr();
                    break;
                default:
                    break;
            }
        }
    </script>
</body>

</html>