<x-app-layout title="List of vehicles" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                    href="#">
                    <p>LIST OF VEHICLES: </p>
                </a>
            </h4>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
        </div>
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
                <!-- Enlace para agregar un vehículo -->
                @php
                    // Obtener el ID del usuario desde la URL actual
                    $userId = request()->segment(2); // El segundo segmento de la URL después de "residents"
                @endphp

                <a href="{{ route('addvehicleresident', ['vehicleId' => $userId]) }}"
                    class="btn bg-primary text-white hover:bg-primary/80 focus:bg-primary/80 active:bg-primary/90">
                    Add Vehicle
                </a>
            </div>


            <!-- Basic Table -->
            <div class="card px-4 pb-4 sm:px-5">
                <div class="container mx-auto">
                    <table id="example" class="table-auto min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Create at</th>
                                <th class="px-4 py-2">License/Plate</th>
                                <th class="px-4 py-2">Make</th>
                                <th class="px-4 py-2">Model</th>
                                <th class="px-4 py-2">Permit Type</th>
                                <th class="px-4 py-2">Permit Status</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">Color</th>
                                <th class="px-4 py-2">VIN</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $vehicle)
                                <tr>

                                    <td class="px-4 py-2">
                                        {{ date('d/m/Y', strtotime($vehicle->created_at)) }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $vehicle->license_plate }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $vehicle->make }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $vehicle->model }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $vehicle->permit_type }}
                                    </td>
                                    <td>
                                        @php
                                            $currentDate = date('Y-m-d');
                                            $endDate = $vehicle->lease_expiration; // End date from the table (format: 'Y-m-d')
                                            $diff = strtotime($endDate) - strtotime($currentDate);
                                            $daysRemaining = round($diff / (60 * 60 * 24));
                                        @endphp

                                        @if ($vehicle->permit_status === 'pending')
                                            <span
                                                class="btn font-medium text-warning hover:bg-warning/20 focus:bg-warning/20 active:bg-warning/25">Pending
                                                to approve</span>
                                        @elseif ($vehicle->permit_status === 'suspended')
                                            <span
                                                class="btn font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">Suspended</span>
                                        @else
                                            @if ($daysRemaining <= 0)
                                                <span
                                                    class="btn font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">Expired</span>
                                            @else
                                                <span
                                                    class="btn font-medium text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">Valid
                                                    for- {{ $daysRemaining }} days</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $vehicle->vehicle_type }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $vehicle->color }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $vehicle->vin }}
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
                $('#example').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
</x-app-layout>
