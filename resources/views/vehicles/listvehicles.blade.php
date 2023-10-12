<x-app-layout title="List of vehicles" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                    href="{{ url('/vehicles') }}">
                    <p>LIST OF VEHICLES FOR: {{ $property_name }}</p>
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
                <div class="inline-flex space-x-4">
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('listvehicles_excel', ['property_code' => $property_code]) }}">
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

                    </div>
                </div>
            </div>
            <!-- Basic Table -->
            <div class="card px-4 pb-4 sm:px-5 ">
                <div class="container mx-auto mt-5">
                    <table id="example" class="table-auto min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2" style="font-size: 11px;">Create at</th>
                                <th class="px-4 py-2"style="font-size: 11px;">Resident Name</th>
                                <th class="px-4 py-2"style="font-size: 11px;">Aparment/Unit</th>
                                <th class="px-4 py-2" style="font-size: 11px;">License/Plate</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Make</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Model</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Permit Type</th>
                                <th class="px-4 py-2" style="font-size: 11px;">#Reserved</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Permit Status</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Actions</th>                                
                                <th class="px-4 py-2" style="font-size: 11px;">Language</th>
                                <th class="px-4 py-2" style="font-size: 11px;">E-mail</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Phone</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Type</th>
                                <th class="px-4 py-2" style="font-size: 11px;">Color</th>
                                <th class="px-4 py-2" style="font-size: 11px;">VIN</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>
                                        {{ date('d/m/Y', strtotime($vehicle->created_at)) }}

                                    </td>
                                    <td>
                                        {{ $vehicle->resident_name }}
                                    </td>
                                    <td>
                                        {{ $vehicle->apart_unit }}
                                    </td>
                                    <td>
                                        {{ $vehicle->license_plate }}
                                    </td>
                                    <td>
                                        {{ $vehicle->make }}
                                    </td>
                                    <td>
                                        {{ $vehicle->model }}
                                    </td>
                                    <td>
                                        {{ $vehicle->permit_type }}
                                    </td>
                                    <td>
                                        {{ $vehicle->reserved_space }}
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
                                    <td>
                                        <div class="flex justify-center space-x-2">

                                            <!-- Botón de aprobación -->
                                            <form method="POST" action="{{ route('update.vehicle.status', ['vehicleId' => $vehicle->id]) }}">
                                                @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
                                            
                                                <button type="submit" name="status" value="approved"
                                                    class="btn h-8 w-8 p-0 text-green-500 hover:bg-green-200 focus:bg-green-200 active:bg-green-300 rounded-full">
                                                    <i class="fas fa-check"></i> <!-- Icono de checkmark -->
                                                </button>
                                            </form>
                                            
                                            
                                            <!-- Botón de rechazo -->
                                            <form method="POST" action="{{ route('vehicles.suspend', ['id' => $vehicle->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn h-8 w-8 p-0 text-red-500 hover:bg-red-200 focus:bg-red-200 active:bg-red-300 rounded-full">
                                                    <i class="fas fa-times"></i> <!-- Icono de X roja -->
                                                </button>
                                            </form>
                                            


                                            <a href="{{ route('edit.vehicle', ['id' => $vehicle->id, 'property_code' => $vehicle->property_code]) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-edit"></i>
                                                <!-- Using the "edit" icon from FontAwesome -->
                                            </a>
                                            <a href="{{ route('vehicles.show', ['vehicle' => $vehicle->id]) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-print"></i>
                                            </a>


                                            <a href="{{ route('send.email', ['id' => $vehicle->id, 'property_code' => $property_code, 'email' => $vehicle->email]) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-envelope"></i>
                                            </a>


                                            <a href="{{ route('vehicles.destroy', ['vehicle' => $vehicle->id, 'property_code' => $property_code]) }}"
                                                class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                                                onclick="event.preventDefault(); showConfirmation('{{ $vehicle->id }}');">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                            @if ($vehicle->permit_status === 'suspended')
                                                <a href="#"
                                                    class="btn h-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                                                    onclick="event.preventDefault(); sendSuspensionEmail('{{ $vehicle->id }}');">
                                                    <i class="fa fa-ban"></i>
                                                </a>
                                            @else
                                                <a href="#"
                                                    class="btn h-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                                                    onclick="event.preventDefault(); sendSuspensionEmail('{{ $vehicle->id }}');">
                                                    <i class="fa fa-ban"></i>
                                                </a>
                                            @endif


                                            <script>
                                                function showConfirmation(vehicleId) {
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: 'You will not be able to recover this vehicle!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#3085d6',
                                                        confirmButtonText: 'Yes, delete it!',
                                                        cancelButtonText: 'Cancel'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delete-form-' + vehicleId).submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                            <form id="delete-form-{{ $vehicle->id }}"
                                                action="{{ route('vehicles.destroy', ['vehicle' => $vehicle->id, 'property_code' => $property_code]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>

                                    </td>
                                    <td>
                                        {{ $vehicle->prefered_language }}
                                    </td>
                                    <td>
                                        {{ $vehicle->email }}
                                    </td>
                                    <td>
                                        {{ $vehicle->phone }}
                                    </td>
                                    <td>
                                        {{ $vehicle->vehicle_type }}
                                    </td>
                                    <td>
                                        {{ $vehicle->color }}
                                    </td>
                                    <td>
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
        <script>
            function sendSuspensionEmail(vehicleId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This will suspend the vehicle and send a notification email to parking inspectors!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, suspend it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to suspend the vehicle and send the email
                        axios.post(`/remocar-vehicle/${vehicleId}`)
                            .then(response => {
                                // Handle the response if necessary
                                Swal.fire('Success', 'Vehicle suspended and email sent.', 'success')
                                    .then(() => {
                                        if (response.data === 'success') {
                                            // Reload the chat section using AJAX
                                            reloadChatSection();
                                        }
                                    });
                            })
                            .catch(error => {
                                // Handle the error if necessary
                                Swal.fire('Error', 'An error occurred while processing the request.', 'error');
                            });
                    }
                });
            }

            function reloadChatSection() {
                // Use AJAX to reload the chat section
                var chatSection = document.getElementById('chat-section'); // Replace with the actual ID of the chat section
                if (chatSection) {
                    axios.get('/get-chat-section') // Replace with the actual endpoint to fetch the chat section content
                        .then(response => {
                            chatSection.innerHTML = response.data; // Update the chat section content
                        })
                        .catch(error => {
                            console.error('Error reloading chat section:', error);
                        });
                }
            }
        </script>



    </main>
</x-app-layout>
