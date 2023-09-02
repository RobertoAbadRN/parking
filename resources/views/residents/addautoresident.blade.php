<x-app-layout title="Add New auto" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">

                DASHBOARD

            </h2>

            <div class="hidden h-full py-1 sm:flex">

                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>

            </div>

            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">

                <li class="flex items-center space-x-2">

                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">Users</a>

                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />

                    </svg>

                </li>

                <li>Add New auto</li>

            </ul>

        </div>



        <template x-if="$store.breakpoints.isXs">

            <div x-data="{ isStuck: false }" class="pb-6" x-intersect:enter.full.margin.-60px.0.0.0="isStuck = false"
                x-intersect:leave.full.margin.-60px.0.0.0="isStuck = true">

                <div :class="isStuck && 'fixed right-0 top-[60px] w-full z-10'">

                    <div class="transition-all duration-200"
                        :class="isStuck && 'py-2.5 px-4 bg-white dark:bg-navy-700 shadow-lg relative'">

                        <ol class="steps with-space-line">

                            <li class="step before:bg-primary dark:before:bg-accent">

                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">

                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />

                                    </svg>

                                </div>

                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">

                                    Create Account

                                </h3>

                            </li>

                            <li class="step before:bg-primary dark:before:bg-accent">

                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">

                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />

                                    </svg>

                                </div>

                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">

                                    Select Service

                                </h3>

                            </li>

                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">

                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">

                                    3

                                </div>

                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">

                                    Address

                                </h3>

                            </li>

                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">

                                <div
                                    class="step-header rounded-full bg-slate-200 text-slate-800 dark:bg-navy-500 dark:text-white">

                                    4

                                </div>

                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">

                                    Review

                                </h3>

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </template>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">

            <div class="col-span-12 sm:col-span-10">

                <div class="card p-4 sm:p-5">

                    <p class="text-base font-medium text-slate-700 dark:text-navy-100 mb-5">
                        Add New auto
                    </p>
                    @if(session('error-message'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error-message') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 5.652a1 1 0 011.414 0l4 4a1 1 0 11-1.414 1.414L14 7.414l-4.348 4.346a1 1 0 01-1.414-1.414l4-4z"/>
                            </svg>
                        </span>
                    </div>
                    <script>
                        setTimeout(function(){
                            document.querySelector('.alert').classList.add('fadeOut');
                        }, 10000); // 10 segundos
                    </script>
                @endif

                    <form action="{{ route('storeResidentVehicle') }}" method="POST" class="form">
                        @csrf
                        <input type="hidden" name="property_code" value="{{ $propertyCode }}">
                        <input type="hidden" name="user_id" value="{{ request('user_id') }}">

                        <div class="mb-3">

                            <label for="license_plate" class="form-label">License Plate /

                                Matrícula:</label>

                            <input type="text" name="license_plate" id="license_plate"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                        </div>

                        <div class="mb-3">

                            <label for="vin" class="form-label">VIN:</label>

                            <input type="text" name="vin" id="vin"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                        </div>

                        <div class="mb-3">

                            <label for="make" class="form-label">Make / Marca:</label>

                            <input type="text" name="make" id="make"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                        </div>

                        <div class="mb-3">

                            <label for="model" class="form-label">Model / Modelo:</label>

                            <input type="text" name="model" id="model"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                        </div>

                        <div class="mb-3">

                            <label for="year" class="form-label">Year / Año:</label>

                            <input type="number" name="year" id="year"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                        </div>

                        <div class="mb-3">

                            <label for="color" class="form-label">Color:</label>

                            <input type="text" name="color" id="color"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                        </div>



                        <label class="block mb-3">

                            <span>Vehicle Type / Tipo de vehículo:</span>

                            <select name="vehicle_type" id="vehicle_type"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                required>

                                <option value="">-- Select vehicle type / Selecciona el tipo

                                    de vehículo --</option>

                                <option value="Car">Car</option>

                                <option value="Truck">Truck</option>

                                <option value="Motorcycle">Motorcycle</option>

                            </select>

                        </label>
                        <label class="block pt-4 mb-5">
                            <span class="font-medium text-slate-600 dark:text-navy-100">Permit Type</span>
                            <select name="permit_type"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                @php
                                    $permitTypes = ['visitor', 'resident', 'temporary', 'employee', 'contractor', 'vip', 'carport', 'reserved', 'handicap', 'fire lane'];
                                @endphp
                                <option value="">-- Select permit type / Selecciona el tipo de permiso --</option>
                                @foreach ($permitTypes as $permitType)
                                    <option value="{{ $permitType }}">{{ $permitType }}</option>
                                @endforeach
                            </select>
                        </label>


                        <div class="flex justify-center">

                            <button type="submit"
                                class="px-4 py-2 bg-yellow-500 text-white w-full font-semibold rounded hover:bg-yellow-600">Submit

                                / Enviar</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>



    </main>

</x-app-layout>
