<x-app-layout title="Residents" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                <a
                    class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">Bienvenido:
                    {{ $residentName }}
                </a>

            </h4>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
        </div>
        @if (session('error'))
            <div id="error-message" class="alert flex rounded-lg bg-error px-4 py-4 text-white sm:px-5">
                {{ session('error') }}
            </div>
            <script>
                // Ocultar el mensaje de error después de 5 segundos
                setTimeout(function() {
                    var errorMessage = document.getElementById('error-message');
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                }, 5000);
            </script>
        @endif

        @if (session('success_message'))
            <div id="success-message" class="alert flex rounded-lg border border-success px-4 py-4 text-success sm:px-5">
                {{ session('success_message') }}
            </div>
        @endif

        <script>
            // Ocultar el mensaje de éxito después de 5 segundos
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 5000);
        </script>


        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <div class="inline-flex space-x-2">
                <div class="inline-flex space-x-4">
                    <div class="inline-flex space-x-4">                     
                        <a href="{{ route('addResidentvehicles', ['user_id' => $residentid]) }}"
                            class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-car" aria-hidden="true"></i> &nbsp; Add Vehicle
                        </a>
                        <a href="{{ route('add.visitor', ['user_id' => $residentid]) }}"
                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-car" aria-hidden="true"></i> &nbsp; Add Visitor
                        </a>

                    </div>
                </div>
            </div>
            <!-- Basic Table -->
            <div class="card px-4 pb-4 sm:px-5">
                <div class="container mx-auto pt-5 pb-5">
                    <table id="residents" class="table-auto min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Resident Name</th>
                                <th class="px-4 py-2">Aparment / Unit</th>
                                <th class="px-4 py-2">E-mail</th>
                                <th class="px-4 py-2">Reserved</th>
                                <th class="px-4 py-2">Residents Code</th>
                                <th class="px-4 py-2">License Plate</th>
                                <th class="px-4 py-2">Make</th>
                                <th class="px-4 py-2">Model</th>
                                <th class="px-4 py-2">Permit Type</th>
                                <th class="px-4 py-2">Permit Status</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residentVehicles as $vehicle)
                                <tr>
                                    <td>{{ $residentName }}</td>
                                    <td>{{ $residentDetails->apart_unit }}</td>
                                    <td>{{ $residentEmail }}</td>
                                    <td>{{ $reservedSpace }}</td>
                                    <td class="px-4 py-2">
                                        <button id="boton-modelo-{{ $residentid }}"
                                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                            style="background-color: #0EA5E9;"
                                            onclick="toggleModal({{ $residentid }})">

                                            {{ $residentid }}

                                        </button>

                                        <!-- Ventana modal -->

                                        <div id="modal-modelo-{{ $residentid }}"
                                            class="fixed z-10 inset-0 overflow-y-auto hidden">

                                            <div class="flex items-center justify-center min-h-screen px-4">

                                                <div class="fixed inset-0 bg-black opacity-50"></div>

                                                <!-- Capa de fondo semitransparente -->

                                                <div class="bg-white rounded-lg max-w-lg mx-auto p-6 relative">

                                                    <h2
                                                        class="text-lg text-center mb-2 text-slate-700 dark:text-navy-100">

                                                        {{ $residentName }}

                                                    </h2>

                                                    <h4
                                                        class="text-lg text-center mb-2 text-slate-700 dark:text-navy-100">

                                                        QR code: {{ $residentDetails->apart_unit }}

                                                    </h4>
                                                    <div class="visible-print flex justify-center items-center">
                                                        {!! QrCode::size(200)->generate('https://amartineztowingop.com/register?user_id=' . $residentid) !!}
                                                    </div>
                                                    <p class="my-2">Scan me to return to the original page.</p>

                                                    <button id="cerrar-modal-modelo-{{ $residentid }}"
                                                        class="btn bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded inline-flex items-center"
                                                        onclick="toggleModal({{ $residentid }})">

                                                        Cerrar

                                                    </button>

                                                </div>

                                            </div>

                                        </div>
                                    </td>

                                    <script>
                                        function toggleModal(residentid) {
                                            const modal = document.getElementById(`modal-modelo-${residentid}`);
                                            modal.classList.toggle('hidden');
                                        }
                                    </script>
                                    <td>{{ $vehicle->license_plate }}</td>
                                    <td>{{ $vehicle->make }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->permit_type }}</td>
                                    <td>{{ $vehicle->permit_status }}</td>
                                    <td>
                                        <a href="{{ route('editResidentVehicle', ['id' => $vehicle->id]) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="text-green-500 hover:text-green-700 mr-2"
                                            onclick="window.print()">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        <a href="{{ route('deleteResidentVehicle', ['id' => $vehicle->id]) }}"
                                            class="text-red-500 hover:text-red-700 mr-2"
                                            onclick="event.preventDefault(); document.getElementById('delete-vehicle-form-{{ $vehicle->id }}').submit();">
                                             <i class="fas fa-trash"></i>
                                         </a>
                                         
                                         <form id="delete-vehicle-form-{{ $vehicle->id }}"
                                               action="{{ route('deleteResidentVehicle', ['id' => $vehicle->id]) }}"
                                               method="POST"
                                               style="display: none;">
                                             @csrf
                                             @method('DELETE')
                                         </form>
                                         
                                        <a href="#" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </td>
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
                $('#residents').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
</x-app-layout>
