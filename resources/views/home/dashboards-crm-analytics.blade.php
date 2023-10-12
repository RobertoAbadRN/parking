<x-app-layout title="Analytics Dashboard" is-header-blur="true">

    <!-- Main Content Wrapper -->

    <main class="main-content w-full pb-8">

        <div
            class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">

            <div class="col-span-12 lg:col-span-8">

                <div class="flex items-center justify-between space-x-2">

                    <h2 class="text-base font-medium tracking-wide text-slate-800 line-clamp-1 dark:text-navy-100">

                        DASHBOARD

                    </h2>

                </div>

            </div>


            @if (Auth::user()->hasRole('Company administrator'))
                <div class="col-span-12 lg:col-span-12">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-5">



                        <div x-data="{ expandedItem1: false }"
                            class="flex flex-col space-y-4 sm:space-y-5 overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                            <!-- Encabezado del primer acordeón -->
                            <div
                                class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                                <!-- Contenido del encabezado -->
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-car text-primary dark:text-accent"></i>
                                    <p class="mt-1 text-xs+">Vehicles</p>
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ number_format($totalVehicles) }}
                                    </p>
                                </div>
                                <button @click="expandedItem1 = !expandedItem1"
                                    class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i :class="expandedItem1 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                                        class="text-sm transition-transform"></i>
                                </button>
                            </div>

                            <!-- Contenido desplegable del primer acordeón -->
                            <div x-collapse x-show="expandedItem1">
                                <div class="px-4 py-4 sm:px-5">
                                    <!-- Contenido del acordeón desplegado -->
                                    <div class="rounded-lg bg-white dark:bg-navy-600 p-4 shadow-md">
                                        <table class="w-full border border-gray-300 dark:border-navy-500">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase border-b border-gray-300 dark:border-navy-500">
                                                        Type
                                                    </th>
                                                    <th
                                                        class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase border-b border-gray-300 dark:border-navy-500">
                                                        Count
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        No Permit
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $noPermitVehiclesCount }}
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Carport
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $carportVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Contractor
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $contractorVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Employee
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $employeeVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Reserved
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $reservedVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Resident
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $residentVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Sub-contractor
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $subContractorVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Temporary
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $temporaryVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        V.I.P.
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $vipVehiclesCount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        Visitor
                                                    </td>
                                                    <td
                                                        class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                        {{ $visitorVehiclesCount }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- acordeosn 2  -->
                        <div x-data="{ expandedItem2: false }"
                            class="flex flex-col space-y-4 sm:space-y-5 overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                            <!-- Encabezado del segundo acordeón -->
                            <div
                                class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                                <!-- Contenido del encabezado -->
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-users text-primary dark:text-accent"></i>
                                    <p class="mt-1 text-xs+">Residents</p>
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ $recidentsCount }}
                                    </p>
                                </div>
                                <button @click="expandedItem2 = !expandedItem2"
                                    class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i :class="expandedItem2 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                                        class="text-sm transition-transform"></i>
                                </button>
                            </div>

                            <!-- Contenido desplegable del segundo acordeón -->
                            <div x-collapse x-show="expandedItem2">
                                <div class="px-4 py-4 sm:px-5">
                                    <table
                                        class="w-full border border-gray-300 dark:border-navy-500 divide-y divide-gray-300 dark:divide-navy-500">
                                        <thead class="bg-slate-150 dark:bg-navy-700">
                                            <tr>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Type
                                                </th>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Count
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white dark:bg-navy-600 divide-y divide-gray-300 dark:divide-navy-500">
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Resident
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $residentUsersCount }}
                                                </td>
                                            </tr>
                                            <!-- Repite este patrón para los otros tipos de vehículos -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>



                        <!-- acordeosn 3-->
                        <div x-data="{ expandedItem3: false }"
                            class="flex flex-col space-y-4 sm:space-y-5 overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                            <!-- Encabezado del tercer acordeón -->
                            <div
                                class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                                <!-- Contenido del encabezado -->
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-home text-primary dark:text-accent"></i>
                                    <p class="mt-1 text-xs+">Properties</p>
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ $propertiesCount }}
                                    </p>

                                </div>
                                <button @click="expandedItem3 = !expandedItem3"
                                    class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i :class="expandedItem3 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                                        class="text-sm transition-transform"></i>
                                </button>
                            </div>

                            <!-- Contenido desplegable del tercer acordeón -->
                            <!-- Contenido desplegable del tercer acordeón -->
                            <div x-collapse x-show="expandedItem3">
                                <div class="px-4 py-4 sm:px-5">
                                    <table
                                        class="w-full border border-gray-300 dark:border-navy-500 divide-y divide-gray-300 dark:divide-navy-500">
                                        <thead class="bg-slate-150 dark:bg-navy-700">
                                            <tr>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Types
                                                </th>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Count
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white dark:bg-navy-600 divide-y divide-gray-300 dark:divide-navy-500">
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Apartment Building
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $apartmentBuildingPropertiesCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Apartment Complex
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $apartmentComplexPropertiesCount }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Company Parking
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $companyParkingPropertiesCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Private Parking
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $privateParkingPropertiesCount }}
                                                </td>
                                            </tr>
                                            <!-- Repite este patrón para los otros tipos de vehículos -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>



                        <!-- acordeosn 4  -->
                        <div x-data="{ expandedItem4: false }"
                            class="flex flex-col space-y-4 sm:space-y-5 overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                            <!-- Encabezado del cuarto acordeón -->
                            <div
                                class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                                <!-- Contenido del encabezado -->
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-users text-primary dark:text-accent"></i>
                                    <p class="mt-1 text-xs+">Visitors Pass</p>
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ $visitorPassesCount }}
                                    </p>

                                </div>
                                <button @click="expandedItem4 = !expandedItem4"
                                    class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i :class="expandedItem4 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                                        class="text-sm transition-transform"></i>
                                </button>
                            </div>

                            <!-- Contenido desplegable del cuarto acordeón -->
                            <!-- Contenido desplegable del cuarto acordeón -->
                            <div x-collapse x-show="expandedItem4">
                                <div class="px-4 py-4 sm:px-5">
                                    <table
                                        class="w-full border border-gray-300 dark:border-navy-500 divide-y divide-gray-300 dark:divide-navy-500">
                                        <thead class="bg-slate-150 dark:bg-navy-700">
                                            <tr>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Validity
                                                </th>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Count
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white dark:bg-navy-600 divide-y divide-gray-300 dark:divide-navy-500">
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Today
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $registeredTodayCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Next 7 Days
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $next7DaysCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Later
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $laterCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Expired
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $expiredCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Invalid
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $invalidCount }}
                                                </td>
                                            </tr>
                                            <!-- Repite este patrón para los otros tipos de vehículos -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- acordeosn5 -->
                        <div x-data="{ expandedItem5: false }"
                            class="flex flex-col space-y-4 sm:space-y-5 overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                            <!-- Encabezado del quinto acordeón -->
                            <div
                                class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                                <!-- Contenido del encabezado -->
                                <div class="flex items-center space-x-2">

                                    <i class="fas fa-users text-primary dark:text-accent"></i>
                                    <p class="mt-1 text-xs+">Users</p>
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ $usersCount }}
                                    </p>
                                </div>
                                <button @click="expandedItem5 = !expandedItem5"
                                    class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i :class="expandedItem5 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                                        class="text-sm transition-transform"></i>
                                </button>
                            </div>

                            <!-- Contenido desplegable del quinto acordeón -->
                            <!-- Contenido desplegable del quinto acordeón -->
                            <div x-collapse x-show="expandedItem5">
                                <div class="px-4 py-4 sm:px-5">
                                    <table
                                        class="w-full border border-gray-300 dark:border-navy-500 divide-y divide-gray-300 dark:divide-navy-500">
                                        <thead class="bg-slate-150 dark:bg-navy-700">
                                            <tr>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Type
                                                </th>
                                                <th
                                                    class="py-2 px-4 text-left text-xs font-medium text-slate-700 dark:text-navy-100 uppercase">
                                                    Count
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white dark:bg-navy-600 divide-y divide-gray-300 dark:divide-navy-500">
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Property Leasing Agent
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $propertyLeasionAgentCount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Property Manager
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $propertyManagerCount }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Property Owner
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $propertyOwnerCount }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Parking Inspector
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $parkingInspectorCount }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    Company Administrator
                                                </td>
                                                <td
                                                    class="py-2 px-4 text-sm text-slate-700 dark:text-navy-100 border-b border-gray-300 dark:border-navy-500">
                                                    {{ $companyAdministratorCount }}
                                                </td>
                                            </tr>
                                            <!-- Repite este patrón para los otros tipos de vehículos -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            @elseif(Auth::user()->hasRole('Property manager'))
                <div class="col-span-12 lg:col-span-12">
                    <div class="grid grid-cols-1 gap-3 sm:gap-5">
                        <div x-data="{ expandedItem: null }"
                            class="flex flex-col divide-y divide-indigo-400 overflow-hidden rounded-lg border border-primary dark:border-accent">
                            <div x-data="accordionItem('item-1')">
                                <div @click="expanded = !expanded"
                                    class="flex cursor-pointer items-center justify-between bg-primary px-4 py-4 text-base font-medium text-white dark:bg-accent sm:px-5">
                                    @foreach ($properties as $property)
                                        <p>
                                            {{ $property->name }},
                                            <i class="fas fa-map-marker-alt"></i> <!-- Ícono de dirección -->
                                            {{ $property->address }}
                                        </p>
                                    @endforeach
                                    <div class="flex space-x-4">
                                        <!-- Botones con enlaces y íconos -->
                                        <a href="{{ route('vehicles') }}"
                                            class="text-white hover:text-indigo-300 flex items-center">
                                            <i class="fas fa-car mr-1"></i> Vehicles
                                        </a>
                                        <a href="{{ route('recidents') }}"
                                            class="text-white hover:text-indigo-300 flex items-center">
                                            <i class="fas fa-users mr-1"></i> Residents
                                        </a>
                                        <a href="{{ route('visitors_pass') }}"
                                            class="text-white hover:text-indigo-300 flex items-center">
                                            <i class="fas fa-ticket mr-1"></i> Visitors
                                        </a>
                                    </div>

                                    <div :class="expanded ? '-rotate-180' : ''"
                                        class="text-sm font-normal leading-none text-indigo-100 transition-transform duration-300">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>

                                <div x-collapse x-show="expanded">
                                    <div class="px-4 py-4 sm:px-5">
                                        <table class="table-auto w-full">
                                            <thead>
                                                <tr>
                                                    <th class="px-4 py-2">Property Information</th>
                                                    <th class="px-4 py-2">Vehicles</th>
                                                    <th class="px-4 py-2">Visitors Pass</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-4 py-2 flex items-center justify-center">
                                                        <ul>
                                                            <li class="mt-2 mb-2">Property Code:
                                                                {{ $property->property_code }}</li>
                                                            <li class="mt-4 mb-4">
                                                                <a href="https://amartineztowingop.com/addnewresident/{{ $property->property_code }}"
                                                                    class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600">
                                                                    Pre-registration
                                                                </a>
                                                            </li>
                                                            <li class="mt-4 mb-4">
                                                                <h6 class="mb-5">Registration QR-Code:</h6>
                                                                <div
                                                                    class="visible-print flex justify-center items-center">
                                                                    {!! QrCode::size(150)->generate('https://amartineztowingop.com/addnewresident/' . $property->property_code) !!}
                                                                </div>
                                                                <div class="mt-10 text-center">
                                                                    <a href="mailto:?body=https://amartineztowingop.com/addnewresident/{{ $property->property_code }}"
                                                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                                        Send URL via Email
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>

                                                    <!-- Contenido de la segunda columna -->
                                                    <td class="border px-4 py-2">
                                                        <ul>
                                                            <li class="mt-2 mb-2">
                                                                <p>Total Vehicles: {{ $totalVehiclesByProperty[$property->property_code] ?? 0 }}</p>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    
                                                
                                                    

                                                    <!-- Contenido de la tercera columna -->
                                                    <td class="border px-4 py-2">
                                                        <ul>
                                                            <li class="mt-2 mb-2">
                                                                <p>Total Visitors: {{ $totalVisitorsByProperty[$property->property_code] ?? 0 }}</p>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

            @endif

    </main>


</x-app-layout>
