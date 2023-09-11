<x-base-layout title="Register" is-sidebar-open="true" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">

                Parking Management Service 

            </h2>

            <div class="hidden h-full py-1 sm:flex">

                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>

            </div>



        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">





            <!-- Boxed Tabs With Icon -->

            <div class="card px-4 pb-4 sm:px-5">

                <div class="my-3 flex h-8 items-center justify-between">

                    <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">

                        {{ $address }}

                      </h2>

                      

                </div>

                <div class="max-w-5xl">

                    <div class="mt-5">

                        <div x-data="{ activeTab: 'tabHome' }" class="tabs flex flex-col">

                            <div

                                class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">

                                <div class="tabs-list flex px-1.5 py-1">

                                    <button @click="activeTab = 'tabHome'"

                                        :class="activeTab === 'tabHome' ?

                                            'bg-white shadow dark:bg-navy-500 dark:text-navy-100' :

                                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"

                                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"

                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">

                                            <path stroke-linecap="round" stroke-linejoin="round"

                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />

                                        </svg>

                                        <span> RESIDENT VEHICLE

                                            REGISTRATION</span>

                                    </button>

                                    <button @click="activeTab = 'tabProfile'"

                                        :class="activeTab === 'tabProfile' ?

                                            'bg-white shadow dark:bg-navy-500 dark:text-navy-100' :

                                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"

                                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"

                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">

                                            <path stroke-linecap="round" stroke-linejoin="round"

                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                                        </svg>

                                        <span>VISITORS PASS REGISTRATION</span>

                                    </button>

                                </div>

                            </div>

                            <div class="tab-content pt-4">

                                <div x-show="activeTab === 'tabHome'"

                                    x-transition:enter="transition-all duration-500 easy-in-out"

                                    x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"

                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">

                                    <div class="w-full">

                                        <form action="{{ route('visitors.registerResidentVehicle') }}" method="POST"

                                            class="form">

                                            <h2 class="text-center mb-4 mt-4">Pre-register your vehicle for a parking

                                                permit / Pre-registra tu vehículo para obtener un permiso de

                                                estacionamiento</h2>

                                            @csrf



                                            <div class="mb-3">

                                                <label for="resident_name" class="form-label">Resident's Name / Nombre

                                                    del residente:</label>

                                                <input type="text" name="resident_name" id="resident_name"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    required>

                                            </div>

                                            <input type="hidden" name="property_code"

                                                value="{{ request('property_code') }}">



                                            <div class="mb-3">

                                                <label for="email" class="form-label">Email / Correo

                                                    electrónico:</label>

                                                <input type="email" name="email" id="email"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    required>

                                            </div>

                                            <div class="mb-3">

                                                <label for="phone" class="form-label">Phone / Teléfono:</label>

                                                <input type="tel" name="phone" id="phone"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    required>

                                            </div>

                                            <div class="mb-3">

                                                <label for="apart_unit" class="form-label">Apart/Unit /

                                                    Apartamento/Unidad:</label>

                                                <input type="text" name="apart_unit" id="apart_unit"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    required>

                                            </div>

                                            <div class="mb-3">

                                                <label for="preferred_language" class="form-label">Preferred Language /

                                                    Idioma preferido:</label>

                                                <select name="preferred_language" id="preferred_language"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    required>

                                                    <option value="">-- Select preferred language / Selecciona el

                                                        idioma preferido --</option>

                                                    <option value="English">English</option>

                                                    <option value="Spanish">Spanish</option>

                                                </select>

                                            </div>

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





                                            <div class="flex justify-center">

                                                <button type="submit"

                                                    class="px-4 py-2 bg-yellow-500 text-white w-full font-semibold rounded hover:bg-yellow-600">Submit

                                                    / Enviar</button>

                                            </div>

                                        </form>



                                    </div>

                                </div>

                                <div x-show="activeTab === 'tabProfile'"

                                    x-transition:enter="transition-all duration-500 easy-in-out"

                                    x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"

                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">

                                    <div>

                                        <form action="{{ route('visitors.registerVisitorPass') }}" method="POST"

                                            class="form">

                                            <h2 class="text-center mb-4 pt-4">Register your vehicle for a temporary

                                                Visitor's Pass</h2>

                                            @csrf



                                            <input type="hidden" name="property_code"

                                                value="{{ request('property_code') }}">



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

                                                <input type="text"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    id="year" name="year" required>

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

                                                <label for="vehicle_type" class="form-label">Vehicle Type / Tipo de

                                                    Vehículo</label>

                                                <input type="text"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    id="vehicle_type" name="vehicle_type" required>

                                            </div>



                                            <div class="mb-3">

                                                <label for="resident_name" class="form-label">Resident's Name / Nombre

                                                    del Residente</label>

                                                <input type="text"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    id="resident_name" name="resident_name" required>

                                            </div>



                                            <div class="mb-3">

                                                <label for="unit_number" class="form-label">Resident's Unit Number /

                                                    Número de Unidad del Residente</label>

                                                <input type="text"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    id="unit_number" name="unit_number" required>

                                            </div>



                                            <div class="mb-3">

                                                <label for="resident_phone" class="form-label">Resident's Phone /

                                                    Teléfono del Residente</label>

                                                <input type="text"

                                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                    id="resident_phone" name="resident_phone" required>

                                            </div>



                                            <label class="relative flex mb-3">

                                                <input

                                                  x-init="$el._x_flatpickr = flatpickr($el, { enableTime: true, dateFormat: 'Y-m-d h:i K', time_24hr: false })"

                                                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                                  placeholder="Choose date and time..."

                                                  type="text"

                                                  name="valid_from"

                                                />

                                                <span

                                                  class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"

                                                >

                                                  <svg

                                                    xmlns="http://www.w3.org/2000/svg"

                                                    class="h-5 w-5 transition-colors duration-200"

                                                    fill="none"

                                                    viewBox="0 0 24 24"

                                                    stroke="currentColor"

                                                    stroke-width="1.5"

                                                  >

                                                    <path

                                                      stroke-linecap="round"

                                                      stroke-linejoin="round"

                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"

                                                    />

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

                        </div>

                    </div>

                </div>



            </div>

        </div>

        </div>

    </main>



</x-base-layout>

