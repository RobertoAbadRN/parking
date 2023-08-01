<x-app-layout title="properties" is-sidebar-open="true" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">

                Dashboards

            </h2>

            <div class="hidden h-full py-1 sm:flex">

                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>

            </div>

            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">

                <li class="flex items-center space-x-2">

                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">ALL PROPERTIES LIST</a>

                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />

                    </svg>

                </li>

            </ul>

        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

            <!-- From HTML Table -->

            <div class="inline-flex space-x-2">

                <div class="inline-flex space-x-4">

                    <div class="inline-flex space-x-4">

                        <a href="{{ route('utiles_excel') }}" class="btn custom-btn-lg">

                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 2.79365V29.2064C8 30.7492 9.23122 32 10.75 32H29.25C30.7688 32 32 30.7492 32 29.2064V7.35127C32 6.60502 31.7061 5.88979 31.1838 5.36503L26.6478 0.807413C26.133 0.29013 25.4381 0 24.714 0H10.75C9.23122 0 8 1.25076 8 2.79365ZM9.75 29.2064V2.79365C9.75 2.2326 10.1977 1.77778 10.75 1.77778H24.375V7.87302C24.375 8.92499 25.2145 9.77778 26.25 9.77778H30.25V29.2064C30.25 29.7674 29.8023 30.2222 29.25 30.2222H10.75C10.1977 30.2222 9.75 29.7674 9.75 29.2064ZM30.25 8V7.35127C30.25 7.07991 30.1431 6.81982 29.9532 6.629L26.125 2.78254V7.87302C26.125 7.94315 26.181 8 26.25 8H30.25Z"
                                    fill="#0EA5E9" />

                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5 13.125C20.5 12.6418 20.8918 12.25 21.375 12.25H27.125C27.6082 12.25 28 12.6418 28 13.125C28 13.6082 27.6082 14 27.125 14H21.375C20.8918 14 20.5 13.6082 20.5 13.125Z"
                                    fill="#69C997" />

                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5 17.125C20.5 16.6418 20.8918 16.25 21.375 16.25H27.125C27.6082 16.25 28 16.6418 28 17.125C28 17.6082 27.6082 18 27.125 18H21.375C20.8918 18 20.5 17.6082 20.5 17.125Z"
                                    fill="#54AD7D" />

                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5 21.125C20.5 20.6418 20.8918 20.25 21.375 20.25H27.125C27.6082 20.25 28 20.6418 28 21.125C28 21.6082 27.6082 22 27.125 22H21.375C20.8918 22 20.5 21.6082 20.5 21.125Z"
                                    fill="#2B593D" />

                                <path
                                    d="M0 9.25C0 8.42157 0.671573 7.75 1.5 7.75H16.5C17.3284 7.75 18 8.42157 18 9.25V24.25C18 25.0784 17.3284 25.75 16.5 25.75H1.5C0.671573 25.75 0 25.0784 0 24.25V9.25Z"
                                    fill="#3D8A58" />

                                <path
                                    d="M5 21.7715L7.80957 16.542L5.25977 11.75H7.20117L8.84863 14.9697L10.4619 11.75H12.3828L9.83301 16.6172L12.6426 21.7715H10.6396L8.81445 18.3057L6.98926 21.7715H5Z"
                                    fill="white" />

                            </svg>

                        </a>

                        <a href="{{ route('addproperty') }}"
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                            style="background-color: #0EA5E9; width: auto; height: 35px;">

                            <i class="fa fa-home"></i>&nbsp;Add Property

                        </a>



                    </div>



                </div>



            </div>



            <!-- Basic Table -->

            <div class="card px-4 pb-4 sm:px-5">

                <div class="container mx-auto  pt-5">

                    <table id="properties" class="table-auto min-w-full">

                        <thead>

                            <tr>

                                <th class="px-4 py-2">Area</th>

                                <th class="px-4 py-2">Property Name</th>

                                <th class="px-4 py-2"> Address</th>

                                <th class="px-4 py-2"> City</th>

                                <th class="px-4 py-2"> State</th>

                                <th class="px-4 py-2"> Property Code</th>

                                <th class="px-4 py-2">Type</th>

                                <th class="px-4 py-2">#places</th>

                                <th class="px-4 py-2"># Vehicles</th>

                                <th class="px-4 py-2"># Users</th>

                                <th class="px-4 py-2">Status</th>

                                <th class="px-4 py-2">Actions</th>



                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($properties as $property)
                                <tr>

                                    <td class="px-4 py-2">

                                        {{ $property->area }}



                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->name }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->address }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->city }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->state }}

                                    </td>



                                    <td class="px-4 py-2">

                                        <button id="boton-modelo-{{ $property->id }}"
                                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                            style="background-color: #0EA5E9;">

                                            {{ $property->property_code }}

                                        </button>

                                        <!-- Ventana modal -->

                                        <div id="modal-modelo-{{ $property->id }}"
                                            class="fixed z-10 inset-0 overflow-y-auto hidden">

                                            <div class="flex items-center justify-center min-h-screen px-4">

                                                <div class="fixed inset-0 bg-black opacity-50"></div>

                                                <!-- Capa de fondo semitransparente -->

                                                <div class="bg-white rounded-lg max-w-lg mx-auto p-6 relative">

                                                    <h2
                                                        class="text-lg text-center mb-2 text-slate-700 dark:text-navy-100">

                                                        {{ $property->address }}

                                                    </h2>

                                                    <h4
                                                        class="text-lg text-center mb-2 text-slate-700 dark:text-navy-100">

                                                        QR code: {{ $property->property_code }}

                                                    </h4>

                                                    <div class="visible-print flex justify-center items-center">

                                                        {!! QrCode::size(200)->generate(
                                                            'https://amartineztowingop.com/visitors/addvisitors?property_code=' . $property->property_code,
                                                        ) !!}

                                                    </div>

                                                    <p class="my-2">Scan me to return to the original page.</p>



                                                    <button id="cerrar-modal-modelo-{{ $property->id }}"
                                                        class="btn bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded inline-flex items-center">

                                                        Cerrar

                                                    </button>



                                                </div>

                                            </div>

                                        </div>
                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->location_type }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->places }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->total_cars }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $property->total_users }}

                                    </td>



                                    <td class="px-4 py-2 text-center">

                                        @if ($property->permit_status == 1)
                                            on

                                            <label class="inline-flex items-center space-x-2">

                                                <input id="permit-status-toggle-{{ $property->id }}"
                                                    class="form-switch is-outline h-5 w-10 rounded-full border border-slate-400/70 bg-transparent before:rounded-full before:bg-slate-300 checked:!border-info checked:before:!bg-info dark:border-navy-400 dark:before:bg-navy-300"
                                                    type="checkbox" checked
                                                    onclick="updatePermitStatus('{{ $property->id }}', this.checked)" />



                                            </label>
                                        @else
                                            off

                                            <label class="inline-flex items-center space-x-2">

                                                <input id="permit-status-toggle-{{ $property->id }}"
                                                    class="form-switch is-outline h-5 w-10 rounded-full border border-slate-400/70 bg-transparent before:rounded-full before:bg-slate-300 checked:!border-info checked:before:!bg-info dark:border-navy-400 dark:before:bg-navy-300"
                                                    type="checkbox"
                                                    onclick="updatePermitStatus('{{ $property->id }}', this.checked)" />



                                            </label>
                                        @endif



                                    </td>

                                    <!-- Agrega esta etiqueta script en el head o antes de usar la función updatePermitStatus -->

                                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



                                    <script>
                                        function updatePermitStatus(propertyId, isChecked) {

                                            const permitStatus = isChecked ? 1 : 0;



                                            // Realiza una solicitud al servidor para actualizar el campo permit_status en la base de datos

                                            // Puedes utilizar AJAX o enviar una solicitud HTTP al endpoint correspondiente



                                            // Ejemplo utilizando Axios

                                            axios.put(`/properties/${propertyId}/update-permit-status`, {

                                                    permitStatus

                                                })

                                                .then(response => {

                                                    console.log(response.data);

                                                })

                                                .catch(error => {

                                                    console.error(error);

                                                });

                                        }
                                    </script>

                                    <td class="px-4 py-2 text-center">

                                        <div class="flex justify-center space-x-2">

                                            <a href="{{ route('properties.edit', $property->id) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">

                                                <i class="fa fa-edit"></i>

                                            </a>

                                            <a href="{{ route('properties.vehicles', $property->property_code) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">

                                                <i class="fa fa-car"></i>

                                            </a>

                                            <a href="{{ route('properties.users', $property->property_code) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">

                                                <i class="fas fa-users"></i>

                                            </a>



                                            <a href="{{ route('properties.destroy', $property->id) }}"
                                                class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                                                onclick="event.preventDefault(); showConfirmation('{{ $property->id }}');">

                                                <i class="fa fa-trash-alt"></i>

                                            </a>



                                            <script>
                                                function showConfirmation(propertyId) {

                                                    Swal.fire({

                                                        title: 'Are you sure?',

                                                        text: 'You will not be able to recover this property!',

                                                        icon: 'warning',

                                                        showCancelButton: true,

                                                        confirmButtonColor: '#d33',

                                                        cancelButtonColor: '#3085d6',

                                                        confirmButtonText: 'Yes, delete it!',

                                                        cancelButtonText: 'Cancel'

                                                    }).then((result) => {

                                                        if (result.isConfirmed) {

                                                            document.getElementById('delete-form-' + propertyId).submit();

                                                        }

                                                    });

                                                }
                                            </script>





                                            <form id="delete-form-{{ $property->id }}"
                                                action="{{ route('properties.destroy', $property->id) }}"
                                                method="POST" style="display: none;">

                                                @csrf

                                                @method('DELETE')

                                            </form>



                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <script>
            $(document).ready(function() {

                $('#properties').DataTable({

                    responsive: true

                });

            });
        </script>

        <script>
            const botonesModelo = document.querySelectorAll('[id^="boton-modelo-"]');

            const modalesModelo = document.querySelectorAll('[id^="modal-modelo-"]');

            const botonesCerrarModal = document.querySelectorAll('[id^="cerrar-modal-modelo-"]');



            botonesModelo.forEach((boton, index) => {

                boton.addEventListener('click', () => {

                    modalesModelo[index].classList.remove('hidden');

                });

            });



            botonesCerrarModal.forEach((boton, index) => {

                boton.addEventListener('click', () => {

                    modalesModelo[index].classList.add('hidden');

                });

            });
        </script>

        <script>
            // Obtener el elemento de la imagen del QR code por su ID

            const qrCodeImage = document.querySelector('.visible-print img');



            // Agregar el evento de clic a la imagen del QR code

            qrCodeImage.addEventListener('click', function() {

                // Obtener el URL de la imagen del QR code

                const qrCodeUrl = qrCodeImage.src;



                // Crear un elemento temporal de input para copiar el URL al portapapeles

                const tempInput = document.createElement('input');

                tempInput.value = qrCodeUrl;



                // Agregar el elemento de input al DOM

                document.body.appendChild(tempInput);



                // Seleccionar el texto dentro del elemento de input

                tempInput.select();

                tempInput.setSelectionRange(0, 99999); // Para dispositivos móviles



                // Intentar copiar el texto al portapapeles

                document.execCommand('copy');



                // Remover el elemento de input del DOM

                document.body.removeChild(tempInput);



                // Mostrar una notificación o realizar cualquier otra acción para indicar que se ha copiado el URL

                alert('URL del QR code copiado al portapapeles: ' + qrCodeUrl);

            });
        </script>







    </main>



</x-app-layout>
