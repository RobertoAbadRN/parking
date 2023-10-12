<x-app-layout title="Persist Extension" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Inspector
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <div class="card px-4 pb-4 sm:px-5">
                <div class="my-3 flex h-8 items-center justify-between">
                    <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                        Inspecting:
                    </h2>
                </div>

                <div class="max-w-xl">
                    <div class="flex -space-x-px">
                        <select id="property_selector"
                            class="form-input h-10 w-full rounded-l-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            name="property_id">
                            <option value="">Select a Property</option>
                            @foreach ($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->name }}</option>
                            @endforeach
                        </select>

                        <button
                            class="btn z-2 h-10 w-10 shrink-0 rounded-l-none bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            onclick="searchProperty()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                    </div>

                    <div id="search-results">
                        <!-- Contenido de resultados de búsqueda aquí -->
                    </div>

                    <div id="no-results" style="display: none;">
                        No se encontraron resultados.
                    </div>

                    <!-- Elemento select para mostrar las placas de los vehículos -->
                    <div class="mt-4">
                        <label class="block">
                            <span>Select a Vehicle</span>
                            <select id="vehicle_select"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value=""></option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script>
            // Agrega un evento change al elemento select de propiedades
            $('#property_selector').change(function() {
                // Llama a la función searchProperty para actualizar los vehículos
                searchProperty();
            });

            function searchProperty() {
                var propertyId = $('#property_selector').val();

                axios.get("{{ route('inspector.search') }}", {
                        params: {
                            property_id: propertyId
                        }
                    })
                    .then(function(response) {
                        var data = response.data;
                        if (data.results && data.results.length > 0) {
                            var tableHtml = '<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">';
                            tableHtml += '<thead class="bg-gray-50 dark:bg-gray-800">';
                            tableHtml += '<tr>';
                            tableHtml +=
                                '<th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Visitors Pass Vehicles</th>';
                            tableHtml += '</tr></thead>';
                            tableHtml +=
                                '<tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">';

                            data.results.forEach(function(result, index) {
                                var vpCode = 'child_' + index;
                                tableHtml += '<tr class="hover:bg-gray-100 dark:hover:bg-gray-800">';
                                tableHtml +=
                                    '<td colspan="2" class="px-2 py-2 sm:px-4 sm:py-4 md:px-6 md:py-4 whitespace-nowrap">';
                                tableHtml +=
                                    '<div x-data="{expanded:false}" class="flex flex-col divide-y divide-indigo-400 overflow-hidden rounded-lg border dark:border-accent">';

                                // Verificar si valid_from es menor o igual a la fecha actual
                                var validFromDate = new Date(result.valid_from);
                                var now = new Date();

                                if (validFromDate <= now) {
                                    // Si es menor o igual, aplicar clase de color rojo en dispositivos móviles
                                    tableHtml +=
                                        '<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-red-500 px-2 py-2 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium text-white dark:bg-accent sm:px-5">';
                                } else {
                                    // Si es mayor, aplicar clase de color verde en dispositivos móviles
                                    tableHtml +=
                                        '<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-green-500 px-2 py-2 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium text-white dark:bg-accent sm:px-5">';
                                }

                                tableHtml += '<p class="text-xs sm:text-sm">License Plate: ' + result
                                    .license_plate + ' ' + result.vehicle_type + ' ' + result.color + ' ' + result
                                    .year + ' VP CODE: ' + result.vp_code + '</p>';
                                tableHtml +=
                                    '<div :class="expanded && \'-rotate-180\'" class="text-xs sm:text-sm font-normal leading-none text-indigo-100 transition-transform duration-300">';
                                tableHtml += '<i class="fas fa-chevron-down"></i>';
                                tableHtml += '</div>';
                                tableHtml += '</div>';
                                tableHtml += '<div x-collapse x-show="expanded">';
                                tableHtml +=
                                    '<div class="px-2 py-2 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm">';
                                tableHtml += '<p class="text-xs sm:text-sm">' + result.created_at + ' / ' + result
                                    .valid_from + '</p>';
                                // Agregar datos del visitor y residente
                                tableHtml += '<p class="text-xs sm:text-sm">Visitor: ' + result.visitor_name + ' ' +
                                    result.visitor_phone + '</p>';
                                // tableHtml += '<p class="text-xs sm:text-sm">Resident: ' + result.resident_name + ' unit:# ' + result.resident_unit + ' ' + result.resident_phone + '</p>';
                                tableHtml += '</div>';
                                tableHtml += '</div>';
                                tableHtml += '</div>';
                                tableHtml += '</td>';
                                tableHtml += '</tr>';
                            });

                            tableHtml += '</tbody>';
                            tableHtml += '</table>';

                            $('#search-results').html(tableHtml);
                            $('#search-results').show();
                            $('#no-results').hide();

                            // Limpia el contenido anterior del select de vehículos
                            let vehicleSelect = document.getElementById('vehicle_select');
                            vehicleSelect.innerHTML =
                                '<option value="">Select a Vehicle</option>'; // Agrega una opción predeterminada


                            // ...
                            if (data.vehicles && data.vehicles.length > 0) {
                                data.vehicles.forEach(function(vehicle) {

                                    // Aquí está el console.log para inspeccionar el valor
                                   // console.log('Permit Status:', vehicle.permit_status);

                                    // Decide el color basado en el estado del vehículo
                                    var textColor;
                                    if (vehicle.permit_status =='suspended') {
                                        textColor = 'text-red-500';
                                    } else if (vehicle.permit_status === 'active') {
                                        textColor = 'text-green-500';
                                    } else {
                                        textColor = 'text-gray-500'; // Default color for other statuses
                                    }

                                    var vehicleInfo =
                                        `<span class="${textColor}">${vehicle.vehicle_license_plate} / ${vehicle.vin} / ${vehicle.make}/ ${vehicle.vehicle_color}</span>`;
                                    var option = document.createElement('option');
                                    option.value = vehicle.vehicle_license_plate;
                                    option.innerHTML = vehicleInfo;
                                    vehicleSelect.appendChild(option);
                                });

                            } else {
                                console.log('No vehicles found.');
                            }

                            // ...



                        } else {
                            // No se encontraron resultados, mostrar mensaje de error
                            $('#search-results').hide();
                            $('#no-results').show().html("No results found.");
                        }
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
            }
            searchProperty();
        </script>


    </main>
</x-app-layout>
