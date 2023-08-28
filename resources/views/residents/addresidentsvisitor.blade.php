<x-app-layout title="Add visitor" is-header-blur="true">

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

                <li>Add visitor</li>

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
                        Add Visitor
                    </p>

                    <form action="{{ route('store.visitor') }}" method="POST">
                        @csrf

                    <h2 class="text-center mb-4 pt-4">Register your vehicle for a temporary

                        Visitor's Pass</h2>

                    @csrf
                    <input type="hidden" name="property_code" value="{{ $propertyCode }}">
                    <input type="hidden" name="user_id" value="{{ request('user_id') }}">

                    <div class="mb-3">

                        <label for="visitor_name" class="form-label">Visitor's Name / Nombre

                            del Visitante</label>

                        <input type="text"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="visitor_name" name="visitor_name" required>

                    </div>


                    <div class="mb-3">

                        <label for="visitor_phone" class="form-label">Visitor's Phone /

                            Teléfono del Visitante</label>

                        <input type="text"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="visitor_phone" name="visitor_phone" required>

                    </div>


                    <div class="mb-3">

                        <label for="license_plate" class="form-label">License Plate / Placa

                            del Vehículo</label>

                        <input type="text"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="license_plate" name="license_plate" required>

                    </div>


                    <div class="mb-3">
                        <label for="year" class="form-label">Year / Año</label>
                        <input type="number"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="year" name="year" required max="{{ date('Y') }}">
                    </div>
                    



                    <div class="mb-3">
                        <label for="make" class="form-label">Make / Marca</label>

                        <input type="text"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="make" name="make" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="model" name="model" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color / Color</label>
                        <input type="text"
                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="color" name="color" required>
                    </div>
                    <div class="mb-3">
                        <label for="vehicle_type" class="form-label">Vehicle Type / Tipo de Vehículo</label>
                        <select class="form-select w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                id="vehicle_type" name="vehicle_type" required>
                            <option value="">Select Vehicle Type / Seleccionar Tipo de Vehículo</option>
                            <option value="car">Car / Automóvil</option>
                            <option value="truck">Truck / Camión</option>
                            <option value="motorcycle">Motorcycle / Motocicleta</option>
                            <!-- Agrega más opciones según tus necesidades -->
                        </select>
                    </div>
                    

                    <label class="relative flex mb-3">
                        <input x-init="$el._x_flatpickr = flatpickr($el, {
                            enableTime: true,
                            dateFormat: 'Y-m-d h:i K',
                            time_24hr: false,
                            minDate: 'today' // Set minimum date to today
                        })"
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Choose date and time..." type="text" name="valid_from" />
                    
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                    </label>
                    

                    <button type="submit"
                        class="px-4 py-2 bg-yellow-500 text-white w-full font-semibold rounded hover:bg-yellow-600">Submit

                        / Enviar</button>

                </form>

                </div>

            </div>

        </div>



    </main>

</x-app-layout>
